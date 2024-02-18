<x-pagelayout>
<div class="container mt-3">
    <h1 class="text-center">User Profile</h1>
    <form class="mt-3" action="{{route('post_userProfile')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (session("success"))
            <div class="alert alert-success">
                {{session("success")}}
            </div>
        @endif
        @if (session("error"))
            <div class="alert alert-danger">
                {{session("error")}}
            </div>
        @endif
        
        <label for="">Username</label>
        <div class="form-outline mb-4">
            <input type="text" id="form1Example1" class="form-control" value="{{auth()->user()->name}}" name="name" />
        </div>
        <label for="">E-mail</label>
        <div class="form-outline mb-4">
            <input type="text" id="form1Example1" class="form-control" value="{{auth()->user()->email}}" name="email" />
        </div>

        <label for="">Image</label>
        <div class="form-outline mb-4">
            <input type="file" id="form1Example1" class="form-control" name="image" />
        </div>
        <img src="{{asset('images/profiles/'.auth()->user()->image)}}" alt="" width="250px" height="250px"><br>
      
        <label for="">Old password</label>
        <div class="form-outline mb-4">
            <input type="password" id="form1Example1" class="form-control" name="old_password" />
        </div>
        <label for="">New password</label>
        <div class="form-outline mb-4">
            <input type="password" id="form1Example1" class="form-control" name="new_password" />
        </div>
      
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block my-4">Save</button>
      </form>
</div>
</x-pagelayout>