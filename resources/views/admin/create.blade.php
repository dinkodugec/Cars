@extends('adminlte::page')

@section('title', 'Create a Car')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create New Car</div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Manufacturer</label>
                            <input type="text" class="form-control" id="name" name="manufacturer">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="file">Image</label>
                                <input type="file"
                                       name="image"
                                       class="form-control-file">
                          </div>
                        <input class="btn btn-primary mt-4" type="submit" value="Save Car">
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