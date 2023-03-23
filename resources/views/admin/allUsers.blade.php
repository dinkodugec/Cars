@extends('adminlte::page')

@section('title', 'All Users')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Delete User</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td><a class="btn btn-sm btn-light ml-2" href="/user/{{ $user->id }}/edit"><i class="fas fa-edit">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <th>  <form class="float-right" style="display: inline" action="/user/{{ $user->id }}" method="post">
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