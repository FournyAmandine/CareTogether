@props(['posts'])

<div class="posts__listing">
    @forelse($posts as $post)
        @php
            $image = $post->images()->first();
        @endphp
        <x-utils.card title="{!! $post->name !!}"
                             locality="{!! $post->locality !!}"
                             state="{!! $post->state !!}" delay="{{$loop->iteration}}"
                             price="{!! $post->price !!}"
                             imgSrc="{{ $image?->img_path
                                ? (Str::startsWith($image->img_path, 'assets')
                                    ? asset($image->img_path)
                                    : asset('storage/photos/posts/originals/' . $image->img_path))
                                : asset('assets/img/post-image.jpg') }}"
                             svg="{!! Str::slug($post->category->name, '_')!!}"
                             src="{!! route('public.posts.show', $post->id) !!}"
                             type="{!! $post->type !!}" :post="$post" :registered-post-ids="$registeredPostIds"
        />
    @empty
        <div class="empty--public">
            <p class="empty__text">Il n'y a pas d'annonce qui correspond à votre recherche</p>
        </div>
    @endforelse
</div>
