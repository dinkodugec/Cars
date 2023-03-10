<?php

namespace App\Http\Controllers;

use App\Models\Car;
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

    public function attachTag($car_id, $tag_id)
    {
              $car = Car::find($car_id);//find a car with car_id and tag with tag_id in DB, CarTag table
              $tag = Tag::find($tag_id); //need only fetch tag to add succss message
              $car->tags()->attach($tag_id);
              return back()->with([
                'message_success' => "The Category " . $tag->name . " was added."
            ]);


    }

    public function detachTag($car_id, $tag_id)
    {
        $car = Car::find($car_id);
        $tag = Tag::find($tag_id); //need fetch tag to add succss message
        $car->tags()->detach($tag_id);
        return back()->with([
          'message_success' => "The Category" . $tag->name . " was removed."
      ]);



    }
}
