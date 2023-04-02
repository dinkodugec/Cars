@extends('layouts.car')
  
  <div class="container">
      <div class="row mt-5">
        @isset($filter)
          <div class="card-header">Filtered cars by
              <span style="font-size: 130%;" class="badge bg-{{ $filter->style }}">{{ $filter->name }}</span>
               <span class="float-end"><a href="/car">Show all Cars</a></span>
          </div>
            @else
              <div class="card-header">All the cars</div>
        @endisset


     
        
     <section class="cars">
      <div class="row mt-5">
       @foreach($cars as $car)
         <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 mb-5 offset-sm-1">
             
          <div class="card" style="width: 300px">
            <div class="col-xs-6 col-md-3">
              @if(file_exists('img/cars/' . $car->id ."_large.jpg"))
                <a href="/car/{{ $car->id }}"><img style="max-width: 300px; max-height: 200px;" src="/img/cars/{{$car->id}}_large.jpg"  class="homePagePhoto"></a>
                @endif
              </div>
              <span class="mx-2">Posted by <a href="/user/{{ $car->user->id }}"> {{ $car->user->name }}</a> ({{ $car->user->cars->count() }} cars)</span>
           
             <div class="card-body">
                    <h5 class="d-inline"><b>{{ $car->name }}</b> </h5>
                    {{--  <h5 class="d-inline">
                        <div class="text-muted d-inline">{{ $car->description }}</div>
                    </h5> --}}
                    <p> {{ $car->description }}</p>

                    
                    @foreach($car->tags as $tag)
                    <a href="/car/tag/{{ $tag->id }}"><span class="badge bg-{{ $tag->style }}">{{ $tag->name }}</span></a>
                    @endforeach          
                </div>
                <span class="float-right ml-2">{{ $car->created_at->diffForHumans() }}</span>
                @can('delete', $car)
                   <form class="float-right" style="display: inline" action="/car/{{ $car->id }}" method="post">
                      @csrf
                      @method('DELETE')
                      <input class="btn btn-outline-danger btn-sm ml-2" type="submit" value="Delete">
                 </form>
                @endcan
               
           </div>
         <br>
        </div>
  
           <br>
          @endforeach
        </div>
     </section>

     <div class="mt-3">
      {{ $cars->links() }}
     </div>
   </div>
  
 </div>


</body>