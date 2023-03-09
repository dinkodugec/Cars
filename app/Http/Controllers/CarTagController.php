<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class CarTagController extends Controller
{
    public function getFilteredCars($tag_id) {

        $tag = new Tag();
        $cars = $tag::findOrFail($tag_id)->filteredCars()->paginate(10);

        $filter = $tag::find($tag_id);


        return view('car.index', [
            'cars' => $cars,
            'filter' => $filter
        ]);

    }
}
