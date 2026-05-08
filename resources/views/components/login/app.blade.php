@props(['title_page'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Amandine Fourny">
    <meta name="description" content="Site de vente, achats, dons, locations de matériel médical. Si vous êtes en quête de matériel médical, c'est ici que ça se passe">
    <meta name="keywords" content="vente, achats, dons, locations, matériel, médical">
    <title>{!! $title_page !!} - CareTogether</title>
    @vite(['resources/css/styles.css', 'resources/js/app.js'])
</head>
<body class="auth">
<header>
    <h1 class="sro">Header</h1>
</header>
{{ $slot }}
<footer>
    <h2 class="sro">Footer</h2>
</footer>
</body>
</html>
