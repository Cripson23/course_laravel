<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Countries\StoreRequest;
use App\Http\Requests\Countries\UpdateRequest;
use App\Models\Country;

class CountriesController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('countries.index', compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(StoreRequest $request)
    {
        $country = Country::create($request->validated());
        return redirect()->route('countries.index')->with('alert', array_merge(['params' => ['name' => $country->name]], config('alerts.countries.created')));
    }

    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    public function update(UpdateRequest $request, Country $country)
    {
        $country->update($request->validated());
        return redirect()->route('countries.index')->with('alert', array_merge(['params' => ['name' => $country->name]], config('alerts.countries.edited')));
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index')->with('alert', array_merge(['params' => ['name' => $country->name]], config('alerts.countries.destroyed')));
    }
}
