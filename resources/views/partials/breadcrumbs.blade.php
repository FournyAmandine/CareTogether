@unless ($breadcrumbs->isEmpty())
    <nav aria-labelledby="ariane">
        <h2 id="ariane" class="sro">Fil d'ariane</h2>
        <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
            @foreach ($breadcrumbs as $breadcrumb)

                @if (!is_null($breadcrumb->url) && !$loop->last)
                    <li itemprop="itemListElement" class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                @else
                    <li itemprop="itemListElement" class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                @endif

            @endforeach
        </ol>
    </nav>
@endunless
