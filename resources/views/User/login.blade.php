<x-layout>
    <section class="container mt-5">
        <form class="card bg-light p-5" method="POST">
            @csrf
            @method('POST')
            <h1 class="text-center">Login</h1>
            @error('email')
                    <h6 class="error-text">{{$message}}</h6>
                @enderror
            <div class="form-outline mb-4">
                <label class="form-label" for="Email">Email</label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}"/>
            </div>
    
            <div class="form-outline mb-4">
                <label class="form-label" for="tags">Password</label>
                <input type="password" name="password" class="form-control " value="{{old('password')}}"/>
            </div>
    
            <button type="submit" class="btn btn-warning btn-block mb-4">Login</button>
          </form>
    </section>
    </x-layout>