<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public function __construct()
    {
          $this->middleware('auth');
          $this->authorizeResource(User::class, 'user');  

    }
  

        
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             
       $users = User::orderBy('created_at', 'DESC')->paginate(10); 

       return view('admin\allUsers')->with([
        'users' => $users
       ]);

     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show')->with([
            'user' => $user
        ]);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.editUser')->with([
            'user' => $user,
            'message_success' => Session::get('message_success'),
            'message_warning' => Session::get('message_warning')
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
           $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|min:5',
             'image'=> 'mimes:jpeg,jpg,bmp,png,gif' 
            
        ]);

        if ($request->image) { //if image is in request
          $this->saveimages($request->image, $user->id);
        }


        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'about_me' => $request['about_me'],
            'motto' => $request['motto']
        ]);

        return $this->index()->with(
            [
                'message_success' => "User" . $user->name . "was updated "
            ]
        ); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
           $oldName = $user->name;
        $user->delete();
        return $this->index()->with(
            [
                'message_success' => "The User <b>" . $oldName . "</b> was deleted."
            ]
        );
    }

        public function saveimages($imageInput, $user_id)
    {
        $image = Image::make($imageInput); //new instance store n variable
        if ( $image->width() > $image->height() ) { // Landscape
            $image->widen(500) /* 1200px */
                ->save(public_path() . "/img/users/" . $user_id . "_large.jpg")
                ->widen(300)->pixelate(12)
                ->save(public_path() . "/img/users/" . $user_id . "_pixelated.jpg");
            $image = Image::make($imageInput);
            $image->widen(60)
                ->save(public_path() . "/img/users/" . $user_id . "_thumb.jpg");
        } else { // Portrait
            $image->heighten(500)
                ->save(public_path() . "/img/users/" . $user_id . "_large.jpg")
                ->heighten(300)->pixelate(12)
                ->save(public_path() . "/img/users/" . $user_id . "_pixelated.jpg");
            $image = Image::make($imageInput);
            $image->heighten(60)
                ->save(public_path() . "/img/users/" . $user_id . "_thumb.jpg");
        }


    }

    public function deleteImages($user_id)
    {
        if(file_exists(public_path() . "/img/users/" . $user_id . "_large.jpg"))
            unlink(public_path() . "/img/users/" . $user_id . "_large.jpg"); 
        if(file_exists(public_path() . "/img/users/" . $user_id . "_thumb.jpg"))
            unlink(public_path() . "/img/users/" . $user_id . "_thumb.jpg");
        if(file_exists(public_path() . "/img/users/" . $user_id . "_pixelated.jpg"))
            unlink(public_path() . "/img/users/" . $user_id . "_pixelated.jpg");

        return back()->with(
            [
                'message_success' => "The Image was deleted."
            ]
        );
    }
}
