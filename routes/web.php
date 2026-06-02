<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterPostController;
use App\Http\Middleware\isAdministrator;
use App\Http\Middleware\isUser;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('public.homepage');
Route::get('/about', function (){ return view('public.aboutpage'); })->name('public.aboutpage');
Route::get('/contact', function (){ return view('public.contactpage'); })->name('public.contactpage');
Route::post('/contact', [ContactController::class, 'store'])->name('public.contactpage.store');
Route::get('/posts', [PostController::class, 'index'])->name('public.posts.index');
Route::get('/posts{post}', [PostController::class, 'show'])->name('public.posts.show');
Route::post('/posts{post}/register', [RegisterPostController::class, 'store'])->name('public.posts.register')->middleware('auth');
Route::delete('/posts{post}/register', [RegisterPostController::class, 'destroy'])->name('public.posts.unregister')->middleware('auth');
Route::post('/posts{post}/contact', [ConversationController::class, 'store'])->name('public.posts.contact')->middleware('auth');
Route::get('/mentions', function (){ return view('public.mentionspage'); })->name('public.mentionspage');
Route::get('/policy', function (){ return view('public.policypage'); })->name('public.policypage');
Route::get('/conditions', function (){ return view('public.conditionspage'); })->name('public.conditionspage');

/*Route::livewire('/admin/dashboard', 'pages::dashboard')->name('admin.dashboard')->middleware('auth', IsAdministrator::class);*/
Route::livewire('/admin/messages', 'pages::admin.contact_messages.index')->name('admin.messages.index')->middleware('auth', IsAdministrator::class);

Route::livewire('/user/dashboard', 'pages::user.dashboard')->name('user.dashboard')->middleware('auth');
Route::livewire('/user/profil', 'pages::user.profil')->name('user.profil')->middleware('auth');
Route::livewire('/user/messages{conversation?}', 'pages::user.messages')->name('user.messages')->middleware('auth');

Route::livewire('/user/posts/create', 'pages::user.posts.create')->name('user.posts.create')->middleware('auth');
Route::livewire('/user/posts/{post}/edit', 'pages::user.posts.edit')->name('user.posts.edit')->middleware('auth');
Route::livewire('/user/posts/{post}', 'pages::user.posts.show')->name('user.posts.show')->middleware('auth');
Route::livewire('/user/posts', 'pages::user.posts.index')->name('user.posts.index')->middleware('auth');

Route::livewire('/user/registered', 'pages::user.registered.index')->name('user.registered.index')->middleware('auth');

Route::livewire('/user/sales', 'pages::user.sales.index')->name('user.sales.index')->middleware('auth');

Route::livewire('/user/rentals', 'pages::user.rentals.index')->name('user.rentals.index')->middleware('auth');
