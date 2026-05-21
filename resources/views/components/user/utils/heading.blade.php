@props(['title', 'button' => false, 'post'=>'', 'text'=>''])

<section class="heading">
    <x-utils.deco modifier="user"/>
    <div class="wrapper wrapper--small">
        @if(str_contains($title, 'Votre annonce'))
            {{ Breadcrumbs::render('user.posts.show', $post) }}
        @elseif(str_contains($title, 'Modifier'))
            {{ Breadcrumbs::render('user.posts.edit', $post) }}
        @else
            {{ Breadcrumbs::render() }}
        @endif
        <h2 class="maintitle maintitle--blue heading__title">
            {!! $title !!}
        </h2>
        <p class="heading__text">
            {!! $text !!}
        </p>
        <div class="heading__actions">
            @if($button)
                <x-utils.link href="{!! route('user.posts.create') !!}"
                              classButton="button button--red" label="Ajouter une annonce"
                              title="Aller sur la page d'ajout d'une annonce" svg="add" name_parent="heading__actions"
                />
            @endif
        </div>
    </div>
</section>
