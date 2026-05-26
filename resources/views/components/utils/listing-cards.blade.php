@props(['posts'])

<div class="posts__listing">
    @foreach($posts as $post)
        @php
            $image = $post->images()->first();
        @endphp
        <x-utils.card title="{!! $post->name !!}"
                             locality="{!! $post->locality !!}"
                             state="{!! $post->state !!}"
                             price="{!! $post->price !!}"
                             imgSrc="{!! asset($image ? $image->img_path : 'assets/img/post-image.jpg') !!}"
                             svg="{!! Str::slug($post->category->name, '_')!!}"
                             src="{!! route('public.posts.show', $post->id) !!}"
                             type="{!! $post->type !!}"
        />
    @endforeach
</div>
