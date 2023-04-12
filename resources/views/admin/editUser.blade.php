<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite('resources/js/app.js')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
       
    </head>

    <body class="font-sans antialiased">
          
          <div class="container">
                @isset($message_success)
                <div class="container">
                    <div class="alert alert-success" role="alert">
                        {{  $message_success }}
                    </div>
                </div>
              @endisset

              @isset($message_warning)
              <div class="container">
                  <div class="alert alert-warning" role="alert">
                      {{  $message_warning  }}
                  </div>
              </div>
          @endisset
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            @if($errors->any())
            <div class="container">
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            <div class="container ">
                <div class="card-header">Edit User
                <div class="card-body">
                    <form class="" autocomplete="off" action="/user/{{$user->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' border-danger' : '' }}" value="{{$user->name ?? old('name') }}" id="name" name="name">
                           
                            <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control{{ $errors->has('email') ? ' border-danger' : '' }}" id="email" value=" {{ $user->email ?? old('email') }}" name="email">
                            <small class="form-text text-danger">{!! $errors->first('email') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="about_me">About Me</label>
                            <textarea class="form-control{{ $errors->has('about_me') ? ' border-danger' : '' }}" id="about_me" value=" {{ $user->about_me ?? old('about_me ') }}" name="about_me " cols="10" rows="10"></textarea>
                            <small class="form-text text-danger">{!! $errors->first('about_me') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="motto">Motto</label>
                            <input type="text" class="form-control{{ $errors->has('motto') ? ' border-danger' : '' }}" id="motto" value=" {{ $user->motto ?? old('motto') }}" name="motto">
                            <small class="form-text text-danger">{!! $errors->first('motto') !!}</small>
                        </div>

                        @if(file_exists('img/users/' . $user->id . '_large.jpg'))
                        <div class="mb-2 mt-5">
                            <img style="max-width: 400px; max-height: 300px;" src="/img/users/{{$user->id}}_large.jpg" alt="">
                            <a class="btn btn-outline-danger float-right" href="/delete-images/user/{{$user->id}}">Delete Image</a>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control{{ $errors->has('image') ? ' border-danger' : '' }}" id="image" name="image" value="">
                            <small class="form-text text-danger">{!! $errors->first('image') !!}</small>
                        </div>

                      
                        <input class="btn btn-outline-primary mt-4" type="submit" value="Edit User">
                        <a class="btn btn-primary float-right" href="/mydashboard"> Back to my dashboard</a>
                    </form>
                
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

    </body>

