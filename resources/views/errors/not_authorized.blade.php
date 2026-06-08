<!doctype html>
<html lang="{!! app()->getLocale() !!}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Amandine Fourny">
    <meta name="description" content="Site de vente, achats, dons, locations de matériel médical. Si vous êtes en quête de matériel médical, c'est ici que ça se passe">
    <meta name="keywords" content="vente, achats, dons, locations, matériel, médical">
    <title>Accès non-autorisé - CareTogether</title>
    @vite(['resources/css/styles.css', 'resources/js/app.js'])
</head>
<body class="">
<main class="unauthorize">
    <p class="unauthorize__text">
        Vous n'avez pas l'accès à cette page !
    </p>
    <x-utils.link name_parent="unauthorize" label="Retourner vers la page d'accueil" classButton="button--red" href="{!! route('public.homepage') !!}" title="Aller vers la page d'accueil"/>
</main>
</body>
</html>
