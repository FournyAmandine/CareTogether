<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ modalOpen: false }"
      x-on:open-modal.window="modalOpen = true" x-on:close-modal.window="modalOpen = false"
      :class="modalOpen ?  'overflow-hidden' : ''"
>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Amandine Fourny">
    <meta name="description" content="Site de vente, achats, dons, locations de matériel médical. Si vous êtes en quête de matériel médical, c'est ici que ça se passe">
    <meta name="keywords" content="vente, achats, dons, locations, matériel, médical">
    <title>{{ $title . ' - CareTogether' }}</title>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    @vite(['resources/css/styles.css', 'resources/js/app.js'])
</head>
<body class="user {{$body_class ?? ''}}">
<livewire:user.partials.header/>
{{ $slot }}
{{--<livewire:widgets::modal />--}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
</body>
</html>
