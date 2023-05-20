@props(['count'])
<div x-show="editopen" x-cloak x-transition:enter="animate__fadeIn" x-transition:leave="animate__fadeOut" class="w-100 h-100 z-index-100 position-fixed modal-upper-cont animate__animated animate__faster">
    <div x-show="editopen" x-cloak x-transition:enter="animate__zoomIn" x-transition:leave="animate__zoomOut" @click.outside = "editopen = false" class="w-50 h-85 bg-light d-flex flex-column align-content-center justify-content-center flex-wrap animate__animated animate__faster">
        <form id="edit-post-{{$count}}"class="w-75" method="POST">
            @csrf
            @method('POST')
            <h1 class="text-center">Edit post</h1>
            <div class="form-outline mb-4">
                <label class="form-label" for="form4Example1">Title</label>
                @error('title')
                    <h6 class="error-text">{{$message}}</h6>
                @enderror
                <input type="text" name="title" class="form-control" id="edit-title-{{$count}}" value="{{old('title')}}"/>
            </div>
          
    
            <div class="form-outline mb-4">
                <label class="form-label" for="tags">Tags (Comma separated)</label>
                <input type="text" name="tags" class="form-control " id="edit-tags-{{$count}}" value="{{old('tags')}}"/>
            </div>
          
    
            <div class="form-outline mb-4">
                <label class="form-label" for="content">Content</label>
                @error('content')
                    <h6 class="error-text">{{$message}}</h6>
                @enderror
                <textarea class="form-control" id="edit-content-{{$count}}" name="content" rows="4">{{old('content')}}</textarea>
              
            </div>
          
    
            <button type="submit" class="btn btn-warning btn-block mb-4">Edit post</button>
          </form>
    </div>
</div>