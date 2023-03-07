@extends('layouts.car')
  
  <div class="container">
      <div class="row mt-5">
   
      @foreach($cars as $car)
         <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
             <div class="card">
                    <figure class="figure">
                        <img src="http://via.placeholder.com/640x360" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                        <figcaption class="figure-caption">A caption for the above image.</figcaption>
                        <span class="mx-2">Posted by {{ $car->user->name }} ({{ $car->user->cars->count() }} cars)</span>
                    </figure>
                <div class="card-body">
                    <h5 class="d-inline"><b>{{ $car->name }}</b> </h5>
                    {{--  <h5 class="d-inline">
                        <div class="text-muted d-inline">{{ $car->description }}</div>
                    </h5> --}}
                    <p> {{ $car->description }}</p>
                    <span class="float-right">{{ $car->created_at->diffForHumans() }}</span>
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