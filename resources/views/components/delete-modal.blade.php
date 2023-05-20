<div x-show="deleteOpen" x-cloak x-transition:enter="animate__fadeIn" x-transition:leave="animate__fadeOut" class="w-100 h-100 z-index-100 position-fixed modal-upper-cont animate__animated animate__faster">
    <div x-show="deleteOpen" x-cloak x-transition:enter="animate__bounceIn" x-transition:leave="animate__bounceOut" @click.outside = "deleteOpen = false" class="w-50 h-50 bg-light d-flex flex-column align-content-center justify-content-center flex-wrap animate__animated animate__faster">
        <h3 class="text-center mb-5"><i class="fa-solid fa-circle-exclamation delete-war "></i></h3>
        <h3 class="text-center mb-5">Are you sure you want to delete post ?</h3>
        <form action="/user/post/delete" method="Post" class="w-75">
            @csrf
            <input type="hidden" id="delete-input" value="" name="delete-id">
            <div class="d-flex w-100 justify-content-center align-content-center">
            <div class="w-50 d-flex">
                <span class="w-100 me-3"><button  type="button" @click="deleteOpen = false" class="btn btn-outline-dark me-2 btn-md btn-block w-100">Cancel</button></span>
                <span class="w-100"><button type="submit" class="btn btn-warning btn-md btn-block w-100">Delete</button></span>
            </div>
            </div>
        </form>
    </div>
</div>