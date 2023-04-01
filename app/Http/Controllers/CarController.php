<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class CarController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
        $this->middleware('admin')->except(['index']);

    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            /* $cars = Car::all();  */ //all is eloquent function
          /* $cars = Car::paginate(10); */
       $cars = Car::orderBy('created_at', 'DESC')->paginate(10); //show last inserted car

       return view('car.index')->with([
        'cars' => $cars
    ]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|min:2',
            'description' => 'required|min:5',
            'manufacturer' => 'required|min:2',
             'image'=> 'mimes:jpeg,jpg,bmp,png,gif' 
            
        ]);

      


        $car = new Car([
            'manufacturer' => $request['manufacturer'],
            'name' => $request['name'], 
            'description' => $request['description'],
            'user_id' => auth()->id()   // Retrieve the currently authenticated user's ID
        ]);

        $car->save();

        if ($request->image) { //if image is in request
            $this->saveimages($request->image, $car->id);
          }

          return redirect('/car/' . $car->id)->with(
            [
                'message_warning' => "Car" . $car->name . "was creted "
            ]
        ); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {

        $allTags = Tag::all();
        $usedTags = $car->tags; //used tags via $car and method tags() - Eloquent relationship
        $availableTags = $allTags->diff($usedTags); //diff() part of collection method in Laravel ;) famous!!!

        return view('car.carDetail')->with([
            'car' => $car,
           'availableTags' => $availableTags,
           'message_success' => Session::get('message_success'),
           'message_warning' => Session::get('message_warning')

        ]);
      
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('admin.edit')->with([
            'car' => $car,
            'message_success' => Session::get('message_success'),
            'message_warning' => Session::get('message_warning')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required|min:2',
            'description' => 'required|min:5',
            'manufacturer' => 'required|min:2',
             'image'=> 'mimes:jpeg,jpg,bmp,png,gif' 
            
        ]);

        if ($request->image) { //if image is in request
          $this->saveimages($request->image, $car->id);
        }


        $car->update([
            'manufacturer' => $request['manufacturer'],
            'name' => $request['name'],
            'description' => $request['description'],
        
        ]);

        return $this->index()->with(
            [
                'message_success' => "Car" . $car->name . "was updated "
            ]
        ); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $oldName = $car->name;
        $car->delete();
        return $this->index()->with(
            [
                'message_success' => "The car <b>" . $oldName . "</b> was deleted."
            ]
        );
    }

    public function saveimages($imageInput, $car_id)
    {
        $image = Image::make($imageInput); //new instance store n variable

             // Landscape
            $image->resize(1200, 400, function ($constraint) {
                $constraint->aspectRatio();})
                 ->save(public_path() . "/img/cars/" . $car_id . "_large.jpg") //always converted in jpg
                 
                 ->resize(300, 400, function ($constraint) {
                    $constraint->aspectRatio();})
                 ->save(public_path() . "/img/cars/" . $car_id . "_thumb.jpg");
              /*    ->widen(300)
                 ->heighten(400)
                 ->save(public_path() . "/img/cars/" . $car_id . "_thumb.jpg"); */
            $image = Image::make($imageInput);
         
            // Portrait;
/*             $image->widen(1200)
                ->save(public_path() . "/img/cars/" . $car_id . "_large.jpg")
                ->heighten(400)->pixelate(12)
                ->save(public_path() . "/img/cars/" . $car_id . "_pixelated.jpg");
            $image = Image::make($imageInput);
            $image->heighten(200)
                   ->widen(300)
                  ->save(public_path() . "/img/cars/" . $car_id . "_thumb.jpg"); */
        


    }

    public function deleteImages($car_id)
    {
        if(file_exists(public_path() . "/img/cars/" . $car_id . "_large.jpg"))
            unlink(public_path() . "/img/cars/" . $car_id . "_large.jpg"); //unlink() ordinary php function
        if(file_exists(public_path() . "/img/cars/" . $car_id . "_thumb.jpg"))
            unlink(public_path() . "/img/cars/" . $car_id . "_thumb.jpg");
        if(file_exists(public_path() . "/img/cars/" . $car_id . "_pixelated.jpg"))
            unlink(public_path() . "/img/cars/" . $car_id . "_pixelated.jpg");

        return back()->with(
            [
                'message_success' => "The Image was deleted."
            ]
        );
    }
}
