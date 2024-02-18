<x-pagelayout>

    {{-- Posts --}}
    <div class="container">
        <h1 class="mt-3">All Posts</h1>
        <div class="row">

          @foreach ($posts as $post)
          
          <div class="col-md-4 mt-3">
            <div class="card">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                  <img src="{{asset('images/posts/'.$post->image)}}
                  
                  " class="img-fluid"/>
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$post->title}}</h5>
                  <p>( posted by {{$post->user->name}} )</p>
                  {{-- <p class="card-text">{{$post->content}}</p> --}}
                  <a href="{{route('seemore', $post->id)}}" class="btn btn-primary">see more</a>
                </div>
            </div>
        </div>
              
          @endforeach
            
          </div>
    </div>
</x-pagelayout>
