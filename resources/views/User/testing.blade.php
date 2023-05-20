<x-layout>
    <div x-data="{editopen:false}">
        <button @click="editopen = !editopen">toggle</button>
        <input type="file" accept="image/jpeg, image/png, image/jpg" onchange="cropImg(event)">

        <x-crop-modal />
    </div>
   <script>
    let file = ""
    const input = document.querySelector("input")
    var cropBoxData;
    var canvasData;
    var cropper;

        function cropImg(event) {
            let image = document.getElementById('croppr');
            image.src = URL.createObjectURL(event.target.files[0]);
            var croppr = new Croppr('#croppr', {
                // options
                autoCropArea: 0.5,
                 ready: function () {
                //Should set crop box data first here
                croppr.setCropBoxData(cropBoxData).setCanvasData(canvasData);
          }
            });
        };
        
    </script>
</x-layout>