<x-layout>
<section class="container mt-5">
    <div class="contaner bg-light p-5">
        <x-tags class="align-content-center justify-content-center mb-2" :tags="$post['tags']"/>
        <h1 class="fs-1 fw-bold mb-3 text-center">{{$post['title']}}</h1>
        <span class="d-flex align-content-center justify-content-center mb-5"><img src="{{asset('/img/no-img.png')}}" class="post-img mb-3"></span>
       
        <p class="text-center fs-6 lh-lg fw-normal">{{$post['content']}}</p>
    </div>
</section>
</x-layout>