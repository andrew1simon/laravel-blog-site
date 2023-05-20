@php
    $count = 0;
@endphp
<x-layout>
    <section class="container mt-5">
        <div class="container p-5 bg-light">
        @foreach ($posts as $post)
        @php 
        $wordsCount = str_word_count($post['content']);
        $dis = '';
        if ($wordsCount > 10){
                $dis = implode(' ', array_slice(explode(' ', $post['content']), 0, 10)) . "....";
            }else{ 
                $dis = $post['content'];
            }
        @endphp
        <div class="card mb-4 d-flex align-content-center flex-row p-4" x-data="{editopen:false, deleteOpen:false}">
            <x-edit-modal :count="$count"/>
            <x-delete-modal :count="$count"/>
            <img src="{{asset('/img/no-img.png')}}" class="img-edit-card me-4">
            <div class="d-flex flex-column justify-content-center me-lg-auto me-md-auto me-sm-3 me-xs-2">
                <h4 class="fs-5 me-auto h-fit">{{$post['title']}}</h4>
            </div>
            <div class="d-flex flex-column align-content-center justify-content-center">
                <div class="w-100">
                    <button @click="editPost({{$post['id']}} , {{$count}}); editopen=!editopen;" class="btn btn-outline-dark me-2 btn-md btn-block w-100 mb-3"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                <button class="btn btn-warning btn-md btn-block w-100" @click="deletePost({{$post['id']}}); deleteOpen=!deleteOpen;"><i class="fa-solid fa-trash-can"></i> Delete</button>
                </div>
            </div>
            
        </div>
     @php
        $count = $count+1;
    @endphp
    @endforeach
    </section>
<script>
    function deletePost(id) {
        let deleteIdForm = document.getElementById('delete-input');
        console.log(deleteIdForm)
        deleteIdForm.value = id;
        
    }
    async function editPost(id , count) {
    let res = await fetch(`/user/post/edit/${id}`)
    let data = await res.json()

    let titleForm = document.getElementById(`edit-title-${count}`);
    let tagsForm = document.getElementById(`edit-tags-${count}`);
    let contentForm = document.getElementById(`edit-content-${count}`);
    let form = document.getElementById(`edit-post-${count}`)
    form.action = `/user/post/edit/${id}`;
    titleForm.value = data[0].title;
    tagsForm.value = data[0].tags;
    contentForm.value = data[0].content;
    
    }

</script>
</x-layout>