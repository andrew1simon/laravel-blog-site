<x-layout>
    <section class="container mt-5">
        <form class="card bg-light p-5" method="POST">
            @csrf
            @method('POST')
            <h1 class="text-center">Register</h1>
            <div class="form-outline mb-4">
                <label class="form-label" for="name">Name</label>
                @error('name')
                    <h6 class="error-text">{{$message}}</h6>
                @enderror
                <input type="text" name="name" class="form-control" value="{{old('name')}}"/>
            </div>
            
            <div class="form-outline mb-4">
                <label class="form-label" for="Email">Email</label>
                @error('email')
                    <h6 class="error-text">{{$message}}</h6>
                @enderror
                <input type="email" name="email" class="form-control" value="{{old('email')}}"/>
            </div>
          
    
            <div class="form-outline mb-4">
                <label class="form-label" for="tags">Password</label>
                @error('password')
                <h6 class="error-text">{{$message}}</h6>
                @enderror
                <input type="password" name="password" class="form-control " value="{{old('password')}}"/>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="tags">Password confrmation</label>
                @error('password_confirmation')
                <h6 class="error-text">{{$message}}</h6>
                @enderror
                <input type="password" name="password_confirmation" class="form-control " value="{{old('password_confirmation')}}"/>
            </div>
    
            <button type="submit" class="btn btn-warning btn-block mb-4">Register</button>
          </form>
    </section>
    </x-layout>