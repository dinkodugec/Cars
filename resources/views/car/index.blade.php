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
   
      @foreach($cars as $car)
         <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
             
            <div class="card">
           
                    <figure class="figure">
                        @if(file_exists('img/cars/' . $car->id ."_thumb.jpg"))
                         <img  style="max-width: 600px; max-height: 300px;" src="/img/cars/{{$car->id}}_large.jpg" class="Car thumb">
                        @endif
                        <figcaption class="figure-caption">A caption for the above image.</figcaption>
                        <span class="mx-2">Posted by <a href="/user/{{ $car->user->id }}"> {{ $car->user->name }}</a> ({{ $car->user->cars->count() }} cars)</span>
                    </figure>
               
                    <div class="card-body">
                    <h5 class="d-inline"><b>{{ $car->name }}</b> </h5>
                    {{--  <h5 class="d-inline">
                        <div class="text-muted d-inline">{{ $car->description }}</div>
                    </h5> --}}
                    <p> {{ $car->description }}</p>

                    
                    @foreach($car->tags as $tag)
                    <a href="/car/tag/{{ $tag->id }}"><span class="badge bg-{{ $tag->style }}">{{ $tag->name }}</span></a>
                    @endforeach
                
                  

                    <a href="/car/{{ $car->id }}"
                        class="btn btn-primary w-100 rounded my-2"> More<i class="fas fa-arrow-right"></i> </a>
            
                </div>
                <span class="float-right ml-2">{{ $car->created_at->diffForHumans() }}</span>
           </div>
         <br>
        </div>
  
           <br>
          @endforeach

     <div class="mt-3">
      {{ $cars->links() }}
     </div>
   </div>
  
 </div>


</body>