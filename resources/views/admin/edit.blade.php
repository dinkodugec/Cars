@extends('adminlte::page')

@section('title', 'Edit a Car')


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
                <div class="card-header">Edit a Car</div>
                <div class="card-body">
                    <form class="" action="/car" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Manufacturer</label>
                            <input type="text" class="form-control{{ $errors->has('manufacturer') ? ' border-danger' : '' }}" value="{{$car->manufacturer ?? old('manufacturer') }}" id="name" name="manufacturer">
                           
                            <small class="form-text text-danger">{!! $errors->first('manufacturer') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' border-danger' : '' }}" id="name" value=" {{ $car->name ?? old('name') }}" name="name">
                            <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control{{ $errors->has('description') ? ' border-danger' : '' }}" id="description" value="{{ $car->description ?? old('description') }}" name="description" rows="5"></textarea>
                            <small class="form-text text-danger">{!! $errors->first('description') !!}</small>
                        </div>

                       

                       {{--  <div class="form-group">
                            <label for="file">Image</label>
                                <input type="file"
                                       name="image"
                                       class="form-control-file">
                          </div> --}}
                        <input class="btn btn-primary mt-4" type="submit" value="Edit a Car">
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