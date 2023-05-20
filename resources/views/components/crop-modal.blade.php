<div x-show="editopen" x-cloak x-transition:enter="animate__fadeIn" x-transition:leave="animate__fadeOut" class="w-100 h-100 z-index-100 position-fixed modal-upper-cont animate__animated animate__faster">
    <div x-show="editopen" x-cloak x-transition:enter="animate__zoomIn" x-transition:leave="animate__zoomOut" @click.outside = "editopen = false" class="w-75 h-85 bg-light d-flex flex-column align-content-center justify-content-center flex-wrap animate__animated animate__faster">
       <div style="max-height: 90%;">
             <img src="" id="croppr" class="crop-img"/>
       </div>
        

    </div>
</div>