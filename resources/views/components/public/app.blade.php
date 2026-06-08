@props(['modifier' => '', 'post'])

<!doctype html>
<html lang="{!! app()->getLocale() !!}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Amandine Fourny">
    <meta name="description" content="Site de vente, achats, dons, locations de matériel médical. Si vous êtes en quête de matériel médical, c'est ici que ça se passe">
    <meta name="keywords" content="vente, achats, dons, locations, matériel, médical">
    <title>{!! $title_page !!} - CareTogether</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script defer src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script> AOS.init();</script>
    @vite(['resources/css/styles.css', 'resources/js/app.js'])
</head>
<body class="public @if($modifier) public--{!! $modifier !!} @endif @if($title_page == 'À propos') aboutBody @endif">
<x-public.partials.header :title="$title_page" :post="$post ?? ''"/>
{!! $slot !!}
<x-public.partials.footer :title="$title_page"/>
</body>
</html>
