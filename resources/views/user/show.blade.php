<x-homeMaster>
    @section('content')
           <!-- Title -->
           <h1 class="mt-4">{{$user->name}}</h1>
 
   
           <hr>
   
           <!-- Date/Time -->
           <p>Created on {{ $user->created_at->diffForHumans()}}</p>
   
           <hr>
   
           <!-- Preview Image -->
           @if(file_exists('img/users/' . $user->id ."_thumb.jpg"))
           <img src="/img/users/{{$user->id}}_large.jpg" class="card-img" alt="...">
           @endif
   
           <hr>

         
   
           <!-- Post Content -->
           <p class="lead"><br>{{ $user->about_me }}</p>
   
           <blockquote class="blockquote">
             <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
             <footer class="blockquote-footer">Someone famous in
               <cite title="Source Title">Source Title</cite>
             </footer>
           </blockquote>
   
           <h5>Cars of {{ $user->name }}</h5>
           <ul class="list-group">
               @if($user->cars->count() > 0)
                   @foreach($user->cars as $car)
                   <div class="card text-bg-dark" >
                    @if(file_exists('img/cars/' . $car->id ."_thumb.jpg"))
                    <img src="/img/cars/{{$car->id}}_large.jpg" class="card-img" alt="...">
                    @endif
                    <div class="card-img-overlay" style="width: 18rem;">
                      <h5 class="card-title">{{ $car->name }}</h5> 
                      <p class="card-text">{{ $car->description }}</p>
                     {{--  <p class="card-text"><small>Last updated 3 mins ago</small></p> --}}
                    </div>
                  </div>
                  
                       <li class="list-group-item">
                           <a title="Show Details" href="/car/{{ $car->id }}">{{ $car->name }}</a>
                           <span class="float-right mx-2">{{ $car->created_at->diffForHumans() }}</span>
                           <br>
                           @foreach($car->tags as $tag)
                               <a href="/car/tag/{{ $tag->id }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                           @endforeach
                       </li>
                   @endforeach
           </ul>
           @else
               <p>
                   {{ $user->name }} has not created any cars yet.
               </p>
           @endif
   
           <hr>
   
        
           <div class="mt-2 mb-4">
            <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}"><i class="fas fa-arrow-circle-up"></i> Back to Overview</a>
        </div>
   
    @endsection
 </x-homeMaster>