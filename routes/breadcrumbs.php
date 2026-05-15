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
    $trail->push($post->category);
    $trail->push($post->name, route('public.posts.show', $post->id));
});

Breadcrumbs::for('user.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Compte', route('user.dashboard'));
});

Breadcrumbs::for('user.rentals.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user.dashboard');
    $trail->push('Vos locations et prêts', route('user.rentals.index'));
});
