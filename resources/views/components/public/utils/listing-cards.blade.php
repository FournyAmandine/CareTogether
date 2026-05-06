@props(['posts'])

<div class="posts__listing">
    @foreach($posts as $post)
        <x-public.utils.card title="{!! $post->name !!}"
                             locality="{!! $post->locality !!}"
                             state="{!! $post->state !!}"
                             price="{!! $post->price !!}"
                             imgSrc="{!! $post->img_path !!}"
                             svg="{!! Str::slug($post->category, '_')!!}"
                             src="{!! route('public.posts.show', $post->id) !!}"
        />
    @endforeach
</div>
