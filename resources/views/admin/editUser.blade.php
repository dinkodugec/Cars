@extends('adminlte::page')

@section('title', 'Edit User')


@section('content')
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
                <div class="card-header">Edit User</div>
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
                            <input type="text" class="form-control{{ $errors->has('about_me') ? ' border-danger' : '' }}" id="about_me" value=" {{ $user->about_me ?? old('about_me') }}" name="about_me">
                            <small class="form-text text-danger">{!! $errors->first('about_me') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="motto">Motto</label>
                            <input type="text" class="form-control{{ $errors->has('motto') ? ' border-danger' : '' }}" id="motto" value=" {{ $user->motto ?? old('motto') }}" name="motto">
                            <small class="form-text text-danger">{!! $errors->first('motto') !!}</small>
                        </div>

                        @if(file_exists('img/users/' . $user->id . '_large.jpg'))
                        <div class="mb-2">
                            <img style="max-width: 400px; max-height: 300px;" src="/img/users/{{$user->id}}_large.jpg" alt="">
                            <a class="btn btn-outline-danger float-right" href="/delete-images/user/{{$user->id}}">Delete Image</a>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control{{ $errors->has('image') ? ' border-danger' : '' }}" id="image" name="image" value="">
                            <small class="form-text text-danger">{!! $errors->first('image') !!}</small>
                        </div>

                      
                        <input class="btn btn-primary mt-4" type="submit" value="Edit User">
                    </form>
                    <a class="btn btn-primary float-right" href="/car"><i class="fas fa-arrow-circle-up"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop