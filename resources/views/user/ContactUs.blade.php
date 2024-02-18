<x-pagelayout>
    <div class="container-fluid">
        <h1 class="mt-3">Contact Us</h1>
        <div class="row">
            <div class="col-md-6 mt-4">
                {{-- map --}}
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d488797.97857838165!2d95.85189378819689!3d16.839536846419197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2sYangon!5e0!3m2!1sen!2smm!4v1691219394503!5m2!1sen!2smm" 
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
                <div class="container mt-3">
                    <h3 class="text-center">Contact Us</h3>

                    @if (session("sent"))
                        <div class="alert alert-success">
                            {{session("sent")}}
                        </div>
                    @endif

                    <form action="{{route('post_contactus')}}" method="POST">
                     @csrf   
                        <label for="">Username</label>
                        <div class="form-outline mb-4">
                            <input type="text" id="form1Example1" class="form-control" name="username" />
                        </div>
                        @error('username')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
            
                        <label for="">E-mail</label>
                        <div class="form-outline mb-4">
                            <input type="email" id="form1Example1" class="form-control" name="email" />
                        </div>
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      
                       <label for="">Your message</label>
                        <textarea name="message" id="" cols="30" rows="7" class="form-control"></textarea>
                        @error('message')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      
                        
                      
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block my-4">Send</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-pagelayout>