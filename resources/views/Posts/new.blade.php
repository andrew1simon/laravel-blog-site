<x-layout>
    <section class="container mt-5">
        <form class="card bg-light p-5" method="POST">
            @csrf
            @method('POST')
            <h1 class="text-center">Create new post</h1>
            <div class="form-outline mb-4">
                <label class="form-label" for="form4Example1">Title</label>
                @error('title')
                    <h6 class="error-text">{{$message}}</h6>
                @enderror
                <input type="text" name="title" class="form-control" value="{{old('title')}}"/>
            </div>
          
    
            <div class="form-outline mb-4">
                <label class="form-label" for="tags">Tags (Comma separated)</label>
                <input type="text" name="tags" class="form-control " value="{{old('tags')}}"/>
            </div>
          
    
            <div class="form-outline mb-4">
                <label class="form-label" for="content">Content</label>
                @error('content')
                    <h6 class="error-text">{{$message}}</h6>
                @enderror
                <textarea class="form-control" name="content" rows="4">{{old('content')}}</textarea>
              
            </div>
          
    
            <button type="submit" class="btn btn-warning btn-block mb-4">Add post</button>
          </form>
    </section>
    </x-layout>