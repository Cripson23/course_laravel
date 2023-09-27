<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cars\StoreRequest;
use App\Http\Requests\Cars\UpdateRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    public function index() // TestServiceInterface $test
    {
        //dd($test->getTest());
        //dd(TestServiceInterface::getTest());
        $cars = Car::with(['tags', 'brand.country'])->orderBy('id')->get(); // Car::ofActive()->with(['tags', 'brand.country'])->orderBy('id')->get();
        $bodyTypes = config('app-cars.bodyTypes');
        return view('cars.index', compact('cars', 'bodyTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        $tags = Tag::orderBy('name')->pluck('name', 'id');
        $bodyTypes = config('app-cars.bodyTypes');
        return view('cars.create', compact('bodyTypes', 'brands', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreRequest $request)
    {
        $data = collect($request->validated());
        $car = Car::make($data->except(['cars'])->toArray());
        DB::transaction(function () use ($data, $car) {
            //$car = Car::create($data->except(['cars'])->toArray());
            $car->save();
            $car->tags()->sync($data->get('tags'));
        });
        return redirect()->route('cars.show', $car->id)->with('alert', config('alerts.cars.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param Car $car
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show(Car $car)
    {
        $bodyTypes = config('app-cars.bodyTypes');
        return view('cars.show', compact('car', 'bodyTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Car $car
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(Car $car)
    {
        $tags = Tag::orderBy('name')->pluck('name', 'id');
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        $bodyTypes = config('app-cars.bodyTypes');
        return view('cars.edit', compact('car', 'bodyTypes', 'brands', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Car $car
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Car $car)
    {
        $data = collect($request->validated());
        DB::transaction(function () use ($data, $car) {
            $car->update($data->except('tags')->toArray());
            $car->tags()->sync($data->get('tags'));
        });
        return redirect()->route('cars.show', $car->id)->with('alert', config('alerts.cars.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @return RedirectResponse
     */
    public function destroy(Car $car)
    {
        if ($car->canDelete) {
            $car->delete();
            return redirect()->route('cars.index')->with('alert', config('alerts.cars.destroyed'));
        } else {
            return redirect()->route('cars.index')->with(
                'alert',
                array_merge([
                    'params' => ['status' => $car->status->text()]],
                    config('alerts.cars.destroyed-fail-status')
                )
            );
        }
    }

    public function trashed()
    {
        $cars = Car::onlyTrashed()->orderBy('id')->get();
        $bodyTypes = config('app-cars.bodyTypes');
        return view('cars.trash', compact('cars', 'bodyTypes'));
    }

    public function restore(int $id)
    {
        $car = Car::onlyTrashed()->findOrFail($id);
        if (Car::where('vin', $car->vin)->exists()) {
            return redirect()->route('cars.trashed')->with('alert',
                array_merge(['params' => ['vin' => $car->vin]], config('alerts.cars.restored-fail-vin'))
            );
        }
        $car->restore();
        return redirect()->route('cars.trashed')->with('alert', config('alerts.cars.restored'));
    }

    public function delete(int $id)
    {
        $car = Car::onlyTrashed()->findOrFail($id);
        $car->forceDelete();
        return redirect()->route('cars.trashed')->with('alert', config('alerts.cars.deleted'));
    }
}
