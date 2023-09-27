<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brands\StoreRequest;
use App\Http\Requests\Brands\UpdateRequest;
use App\Models\Brand;
use App\Models\Country;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::all()->sortBy('id');
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        $countries = Country::orderBy('id')->pluck('name', 'id');
        return view('brands.create', compact('countries'));
    }

    public function store(StoreRequest $request)
    {
        $brand = Brand::create($request->validated());
        return redirect()->route('brands.index')->with('alert', array_merge(['params' => ['title' => $brand->title]], config('alerts.brands.created')));
    }

    public function show(Brand $brand)
    {
        return view('brands.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        $countries = Country::orderBy('id')->pluck('name', 'id');
        return view('brands.edit', compact('brand', 'countries'));
    }

    public function update(UpdateRequest $request, Brand $brand)
    {
        $brand->updateOrFail($request->validated());
        return redirect()->route('brands.index')->with('alert', array_merge(['params' => ['title' => $brand->title]], config('alerts.brands.edited')));
    }

    public function destroy(Brand $brand)
    {
        $brand->deleteOrFail();
        return redirect()->route('brands.index')->with('alert', array_merge(['params' => ['title' => $brand->title]], config('alerts.brands.destroyed')));
    }
}
