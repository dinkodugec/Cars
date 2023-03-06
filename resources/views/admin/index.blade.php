@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Manufacturer</th>
        <th scope="col">Name</th>
        <th scope="col">Edit</th>
        <th scope="col">Edit</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cars as $car)
        <tr>
            <td>{{ $car->manufacturer }}</td>
            <td>{{ $car->name }}</td>
            <td>  <a class="btn btn-sm btn-light ml-2" href="/car/{{ $car->id }}/edit"><i class="fas fa-edit"></i>Edit</a></td>
            <th>  <form class="float-right" style="display: inline" action="/car/{{ $car->id }}" method="post">
                @csrf
                @method("DELETE")
                <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
            </form></th>
        </tr> 
         
        @endforeach
     
    
    </tbody>
  </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop