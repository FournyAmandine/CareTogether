<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('public.homepage');
Route::get('/about', function (){ return view('public.aboutpage'); })->name('public.aboutpage');
Route::get('/contact', function (){ return view('public.contactpage'); })->name('public.contactpage');
/*Route::post('/contact', [ContactController::class, 'store'] function (){ return view('public.contactpage.store'); })->name('public.contactpage.store');*/
Route::get('/posts', [PostController::class, 'index'])->name('public.posts.index');
Route::get('/posts{post}', [PostController::class, 'show'])->name('public.posts.show');
Route::get('/mentions', function (){ return view('public.mentionspage'); })->name('public.mentionspage');
Route::get('/policy', function (){ return view('public.policypage'); })->name('public.policypage');
Route::get('/conditions', function (){ return view('public.conditionspage'); })->name('public.conditionspage');

/*Route::livewire('/admin/dashboard', 'pages::dashboard')->name('admin.dashboard')->middleware('auth', IsAdministrator::class);*/
/*Route::livewire('/admin/profil', 'pages::profil')->name('profil')->middleware('auth', IsAdministrator::class);*/

/*Route::livewire('/user/dashboard', 'pages::user.dashboard')->name('user.dashboard')->middleware('auth', IsUser::class);
Route::livewire('/user/profil', 'pages::user.profil')->name('user.profil')->middleware('auth', IsUser::class);
Route::livewire('/user/messages', 'pages::user.messages')->name('user.messages')->middleware('auth', IsUser::class);*/


/*Route::livewire('/user/posts/create', 'pages::user.posts.create')->name('user.posts.create')->middleware('auth', IsUser::class);
Route::livewire('/user/posts/{volunteer}/edit', 'pages::user.posts.edit')->name('user.posts.edit')->middleware('auth', IsUser::class);
Route::livewire('/user/posts/{volunteer}', 'pages::user.posts.show')->name('user.posts.show')->middleware('auth', IsUser::class);
Route::livewire('/user/posts', 'pages::user.posts.index')->name('user.posts.index')->middleware('auth', IsUser::class);*/

/*Route::livewire('/user/registered', 'pages::user.registered.index')->name('user.registered.index')->middleware('auth', IsUser::class);
Route::livewire('/user/registered', 'pages::user.registered.show')->name('user.registered.show')->middleware('auth', IsUser::class);*/

/*Route::livewire('/user/purchases', 'pages::user.purchases.index')->name('user.purchases.index')->middleware('auth', IsUser::class);
Route::livewire('/user/purchases', 'pages::user.purchases.show')->name('user.purchases.show')->middleware('auth', IsUser::class);*/

/*Route::livewire('/user/rentals', 'pages::user.rentals.index')->name('user.rentals.index')->middleware('auth', IsUser::class);
Route::livewire('/user/rentals', 'pages::user.rentals.show')->name('user.rentals.show')->middleware('auth', IsUser::class);*/
