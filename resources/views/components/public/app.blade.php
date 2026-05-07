<!doctype html>
<html lang="{!! app()->getLocale() !!}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Amandine Fourny">
    <meta name="description" content="Site de vente, achats, dons, locations de matériel médical. Si vous êtes en quête de matériel médical, c'est ici que ça se passe">
    <meta name="keywords" content="vente, achats, dons, locations, matériel, médical">
    <title>{!! $title_page !!} - CareTogether</title>
    @vite(['resources/css/styles.css', 'resources/js/app.js'])
</head>
<body class="@if($title_page == 'À propos') aboutBody @endif">
<x-public.partials.header :title="$title_page" :post="$post ?? ''"/>
{!! $slot !!}
<x-public.partials.footer :title="$title_page"/>
</body>
</html>
