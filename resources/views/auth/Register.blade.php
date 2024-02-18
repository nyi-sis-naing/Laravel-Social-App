<x-authlayout>

    <div class="container">
        <div class="col-md-4 offset-4 mt-5">
            <!-- Default form register -->
<form class="text-center border border-light p-5" action="{{route('post_register')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <p class="h4 mb-4 text-primary">Sign up</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Username" name="username">
            @error('username')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
       
    </div>

    <!-- E-mail -->
    <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">
    @error('email')
         <p class="text-danger">{{$message}}</p>
    @enderror

    <!-- Password -->
    <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="password">
    @error('password')
        <p class="text-danger">{{$message}}</p>
    @enderror
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4" >
        At least 8 characters
    </small>

    {{-- image --}}
    <input type="file" id="defaultRegisterFormPassword" class="form-control mt-3" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="image">
    @error('image')
        <p class="text-danger">{{$message}}</p>
    @enderror
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        Select your profile picture
    </small>

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Register</button>

    <p>
        <a href="{{route("login")}}">Already a member?</a>
    </p>

    
</form>
<!-- Default form register -->
        </div>
    </div>
</x-authlayout>
    
