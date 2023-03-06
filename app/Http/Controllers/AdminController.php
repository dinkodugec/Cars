<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('admin.index')->with([
        'cars' => $cars
    ]);

    }
}
