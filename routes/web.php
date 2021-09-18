<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view("welcome");
// })->name('home.index');

Route::view('/', 'home.index')
    ->name('home.index');

Route::view('/contact', 'home.contact')
    ->name('home.contact');

$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel',
        'is_new' => true,
        'has_comments' => true,
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new' => false,
        'has_comments' => false,
    ],
    3 => [
        'title' => 'Intro to Golang',
        'content' => 'This is a short intro to Golang',
        'is_new' => true,
        'has_comments' => false,
    ]
];

Route::get('/posts', function () use ($posts) {
    // compact($posts) === ['posts'] => $posts
    return view('posts.index', ['posts'=> $posts]);
});
    
Route::get('posts/{id}', function ($id)  use ($posts) {
    abort_if(!isset($posts[$id]), 404);

    return view('posts.show', ['post' => $posts[$id]]);
    # accept only number with [0-9]+ regex 
})->name('posts.show');

Route::get('/recent-posts/{days_ago?}', function ($daysAgo = 20) {
    return 'Post from ' . $daysAgo . ' days ago.';
})->name('posts.recent.index');