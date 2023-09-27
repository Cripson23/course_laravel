<?php

namespace App\Http\Controllers\Web\Public;

use App\Http\Controllers\Controller;
use App\Models\Car;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        $bodyTypes = config('app-cars.bodyTypes');
        return view('public.cars.index', compact('cars', 'bodyTypes'));
    }
}
