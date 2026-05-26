<?php

use App\Models\Post;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('public.homepage', function (BreadcrumbTrail $trail) {
    $trail->push('Accueil', route('public.homepage'));
});

Breadcrumbs::for('public.contactpage', function (BreadcrumbTrail $trail) {
    $trail->parent('public.homepage');
    $trail->push('Contact', route('public.contactpage'));
});

Breadcrumbs::for('public.posts.index', function (BreadcrumbTrail $trail) {
    $trail->parent('public.homepage');
    $trail->push('Annonces', route('public.posts.index'));
});

Breadcrumbs::for('public.aboutpage', function (BreadcrumbTrail $trail) {
    $trail->parent('public.homepage');
    $trail->push('À propos', route('public.aboutpage'));
});

Breadcrumbs::for('public.posts.show', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('public.posts.index');
    $trail->push($post->category->name);
    $trail->push($post->name, route('public.posts.show', $post->id));
});

Breadcrumbs::for('user.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Compte', route('user.dashboard'));
});

Breadcrumbs::for('user.rentals.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user.dashboard');
    $trail->push('Vos locations et prêts', route('user.rentals.index'));
});

Breadcrumbs::for('user.sales.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user.dashboard');
    $trail->push('Vos achats et dons', route('user.sales.index'));
});

Breadcrumbs::for('user.registered.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user.dashboard');
    $trail->push('Vos annonces enregistrées', route('user.registered.index'));
});

Breadcrumbs::for('user.posts.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user.dashboard');
    $trail->push('Vos annonces', route('user.posts.index'));
});

Breadcrumbs::for('user.posts.show', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('user.dashboard');
    $trail->push('Vos annonces');
    $trail->push($post->name, route('user.posts.show', $post->id));
});

Breadcrumbs::for('user.posts.create', function (BreadcrumbTrail $trail) {
    $trail->parent('user.dashboard');
    $trail->push('Ajouter une annonce', route('user.posts.create'));
});

Breadcrumbs::for('user.posts.edit', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('user.dashboard');
    $trail->push('Modifier une annonce', route('user.posts.edit', $post->id));
});

Breadcrumbs::for('user.profil', function (BreadcrumbTrail $trail) {
    $trail->parent('user.dashboard');
    $trail->push('Profil', route('user.profil'));
});

Breadcrumbs::for('default-livewire.update', function ($trail) {
    $trail->push('Ajouter une annonce');
});

