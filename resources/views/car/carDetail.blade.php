<x-homeMaster>
    @section('content')
           <!-- Title -->
           <h1 class="mt-4">{{$car->name}}</h1>
 
           <!-- Author -->
           <p class="lead">
             by
             <a href="/user/{{ $car->user->id }}">{{ $car->user->name }}</a>
           </p>
   
           <hr>
   
           <!-- Date/Time -->
           <p>Created on {{ $car->created_at->diffForHumans()}}</p>
   
           <hr>
          
   
           <!-- Preview Image -->
           
            @if(Auth::user() && file_exists('img/cars/' . $car->id ."_large.jpg"))
              <a href="/img/cars/{{$car->id}}_large.jpg"  data-lightbox="img/cars/{{$car->id}}_large.jpg" >
              <img src="/img/cars/{{$car->id}}_large.jpg" class="card-img" alt="..."></a>
              <i class="fa fa-search-plus"></i> Click image to enlarge
           @endif
           @if(!Auth::user() && file_exists('img/cars/' . $car->id ."_pixelated.jpg"))
             <img src="/img/cars/{{$car->id}}_pixelated" class="card-img" alt="...">
           @endif
   
           <hr>
           @if($car->tags->count() > 0)
               <b>Used Categories (click to remove)</b>
              <p>   @foreach($car->tags as $tag)
              <a href="/car/{{ $car->id }}/tag/{{ $tag->id }}/detach"><span class="badge bg-{{ $tag->style }}">{{ $tag->name }}</span></a>
            @endforeach
           </p>
           @endif

           @if($availableTags->count() > 0)
           <b>Available Categories (click to asign)</b>
           <p>   @foreach($availableTags as $tag)
            <a href="/car/{{ $car->id }}/tag/{{ $tag->id }}/attach"><span class="badge bg-{{ $tag->style }}">{{ $tag->name }}</span></a>
            @endforeach
           </p>
           @endif
   
           <!-- Post Content -->
           <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
   
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
   
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
   
           <blockquote class="blockquote">
             <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
             <footer class="blockquote-footer">Someone famous in
               <cite title="Source Title">Source Title</cite>
             </footer>
           </blockquote>
   
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>
   
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>
   
           <hr>

           <div class="col-md-3">
            <a href="/img/400x300.jpg" data-lightbox="400x300.jpg" data-title="{{ $car->name }}">
                <img class="img-fluid" src="/img/400x300.jpg" alt="">
            </a>
            <i class="fa fa-search-plus"></i> Click image to enlarge
        </div>
   
           <!-- Comments Form -->
           <div class="card my-4">
             <h5 class="card-header">Leave a Comment:</h5>
             <div class="card-body">
               <form>
                 <div class="form-group">
                   <textarea class="form-control" rows="3"></textarea>
                 </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
               </form>
             </div>
           </div>
   
           <!-- Single Comment -->
           <div class="media mb-4">
             <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
             <div class="media-body">
               <h5 class="mt-0">Commenter Name</h5>
               Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
             </div>
           </div>
   
           <!-- Comment with nested comments -->
           <div class="media mb-4">
             <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
             <div class="media-body">
               <h5 class="mt-0">Commenter Name</h5>
               Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
   
               <div class="media mt-4">
                 <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                 <div class="media-body">
                   <h5 class="mt-0">Commenter Name</h5>
                   Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                 </div>
               </div>
   
               <div class="media mt-4">
                 <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                 <div class="media-body">
                   <h5 class="mt-0">Commenter Name</h5>
                   Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                 </div>
               </div>
             </div>
             
           </div>
           <div class="mt-2 mb-4">
            <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}"><i class="fas fa-arrow-circle-up"></i> Back to Overview</a>
        </div>
   
    @endsection
 </x-homeMaster>