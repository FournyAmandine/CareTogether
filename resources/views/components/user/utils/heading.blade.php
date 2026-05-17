@props(['title', 'button' => false])

<section class="heading">
    <x-utils.deco modifier="user"/>
    <div class="wrapper wrapper--small">
        {{ Breadcrumbs::render() }}
        <h2 class="maintitle maintitle--blue heading__title">
            {!! $title !!}
        </h2>
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
