@php($postNum = 0)
<x-layout>
    <section class="container pt-5">
        <h1 class="text-center">All Posts</h1>
        <x-search />
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-xs-1">
            @if(count($posts) == 0)
                <p>No postes found...</p>

            @else
            @foreach ($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
            @endif
            </div>
        </div>
    </section>
</x-layout>