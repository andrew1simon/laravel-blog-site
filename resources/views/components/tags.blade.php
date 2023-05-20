<!-- Very little is needed to make a happy life. - Marcus Aurelius -->
@props(['class' , 'tags'])
@php($tagsArr = explode("," , $tags))
<div {{ $attributes->merge([ 'class' => 'd-flex' . " ".  $class]) }}>
    @foreach($tagsArr as $tag)
    <a href="/all-posts/?tag={{trim($tag)}}"><span class="bg-dark text-light fs-6 p-1 rounded me-1">{{$tag}}</span></a>
    @endforeach
</div>
