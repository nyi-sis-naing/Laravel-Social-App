<x-adminlayout>
    <h3 class="mt-3">Update users</h3>
    @if (session('update'))
        <div class="alert-success">
            {{session('update')}}
        </div>
    @endif
    <form action="{{route('admin.update_user', $editUser->id)}}" method="POST" class="mt-3">
        @csrf   
           <label for="">Username</label>
           <div class="form-outline mb-4">
               <input type="text" id="form1Example1" class="form-control" name="username" value="{{$editUser->name}}" />
           </div>
           @error('username')
               <p class="text-danger">{{$message}}</p>
           @enderror

           <label for="">E-mail</label>
           <div class="form-outline mb-4">
               <input type="email" id="form1Example1" class="form-control" name="email" value="{{$editUser->email}}" />
           </div>
           @error('email')
           <p class="text-danger">{{$message}}</p>
           @enderror
           
          <label for="">Is Admin?</label>
          <select name="isAdmin" id="" class="form-control">
            <option value="1" {{$editUser->isAdmin=='1' ? "selected" : ""}}>TRUE</option>
            <option value="0" {{$editUser->isAdmin=='0' ? "selected" : ""}}>FALSE</option>
          </select>

          <label for="">Is Premium User?</label>
          <select name="isPremium" id="" class="form-control">
            <option value="1" {{$editUser->isPremium=='1' ? "selected" : ""}}>TRUE</option>
            <option value="0" {{$editUser->isPremium=='0' ? "selected" : ""}}>FALSE</option>
          </select>
         
           
         
           <!-- Submit a -->
           <button type="submit" class="btn btn-primary btn-block my-4">Update</button>
         </form>

</x-adminlayout>    