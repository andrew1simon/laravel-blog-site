@props(['post'])
@php 
$wordsCount = str_word_count($post['content']);
$dis = '';
if ($wordsCount > 10){
        $dis = implode(' ', array_slice(explode(' ', $post['content']), 0, 10)) . "....";
    }else{ 
        $dis = $post['content'];
    }

@endphp
<div class="col">
<div class="p-4 bg-light m-3 single-post-card">
    <a href="/post/{{$post['id']}}"><img src="{{asset('/img/no-img.png')}}" class="sing-post-img mb-3"></a>
    <x-tags class="mb-3" :tags="$post['tags']" />
    <a href="/post/{{$post['id']}}"><h2 class="fs-4">{{$post['title']}}</h2></a>
    <p>{{$dis}}</p>
</div>
</div>
