@props(['title'])

<section class="heading">
    <x-utils.deco modifier="user"/>
    <div class="wrapper wrapper--small">
        {{ Breadcrumbs::render() }}
        <h2 class="maintitle maintitle--blue heading__title">
            {!! $title !!}
        </h2>
    </div>
</section>
