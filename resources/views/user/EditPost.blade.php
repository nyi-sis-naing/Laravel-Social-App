<x-pagelayout>
    
    <div class="container mt-3">
        <h1 class="text-center">Create Posts</h1>
        <form class="mt-3" action="{{route('updatePost', $edit_post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            
            <label for="">Title</label>
            <div class="form-outline mb-4">
                <input type="text" id="form1Example1" class="form-control" name="title" value="{{$edit_post->title}}"/>
            </div>

            <label for="">Image</label>
            <div class="form-outline mb-4">
                <input type="file" id="form1Example1" class="form-control" name="image" value="" />
                <img src="{{asset('images/posts/'.$edit_post->image)}}" alt="" width="250px" height="250px"><br>
            </div>
          
           <label for="">Content</label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$edit_post->content}}</textarea>
          
            
          
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block my-4">Update post</button>
        </form>
    </div>
</x-pagelayout>