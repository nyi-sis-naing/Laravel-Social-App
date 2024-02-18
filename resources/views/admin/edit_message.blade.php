<x-adminlayout>

    <div class="">
        <div class="container mt-3">
            <h3 class="text-center">Update Message</h3>

            @if (session("sent"))
                <div class="alert alert-success">
                    {{session("sent")}}
                </div>
            @endif

            <form action="{{route('updateMessage', $update_message->id)}}" method="POST">
             @csrf   
                <label for="">Username</label>
                <div class="form-outline mb-4">
                    <input type="text" id="form1Example1" class="form-control" name="username" value="{{$update_message->username}}" />
                </div>
                @error('username')
                    <p class="text-danger">{{$message}}</p>
                @enderror
    
                <label for="">E-mail</label>
                <div class="form-outline mb-4">
                    <input type="email" id="form1Example1" class="form-control" name="email" value="{{$update_message->email}}" />
                </div>
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
              
               <label for="">Your message</label>
                <textarea name="message" id="" cols="30" rows="7" class="form-control">
                    {{$update_message->message}}
                </textarea>
                @error('message')
                <p class="text-danger">{{$message}}</p>
                @enderror
              
                
              
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block my-4">Save</button>
              </form>
        </div>
    </div>
</x-adminlayout>