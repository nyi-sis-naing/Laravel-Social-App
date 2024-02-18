<x-pagelayout>
    <div class="container mt-5 mb-3">
        <h2><p class="mt-3">{{$post->title}}</p> </h2>
        <img src="{{asset('images/posts/'.$post->image)}}" alt="" width="800" height="500">
        <p class="mt-3">{{$post->content}}</p>    
        @can('premiumAdminPostowner', $post->id)
        <a href="{{route('editPost', $post->id)}}" class="btn btn-success">Edit Post</a>
        <a href="{{route('deletePost', $post->id)}}" class="btn btn-danger">Delete Post</a>
        @endcan
    </div>  
</x-pagelayout>

