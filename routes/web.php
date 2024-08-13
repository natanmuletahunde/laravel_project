<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});




    Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('/admin/register', [AdminController::class, 'registerPost'])->name('admin.registerPost');
    Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'loginPost'])->name('admin.loginPost');


    Route::get('/admin/logout', [App\Http\Controllers\IsAdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/user/logout', [App\Http\Controllers\UserController::class, 'UserLogout'])->name('user.logout');

    Route::get('/admin/dashboard', [App\Http\Controllers\IsAdminController::class, 'Admindashboard'])->name('admin.dashboard');
    Route::get('/user/userdashboard', [App\Http\Controllers\UserController::class, 'Userdashboard'])->name('user.userdashboard');


    Route::get('/admin/post', [App\Http\Controllers\PostController::class, 'Post'])->name('admin.post');
    Route::get('/admin/createpost', [App\Http\Controllers\PostController::class, 'Create'])->name('admin.createpost');
    Route::post('/admin/createpost', [App\Http\Controllers\PostController::class, 'Store'])->name('admin.createpost-post');
    Route::get('/admin/post/{post_id}', [App\Http\Controllers\PostController::class, 'Edit'])->name('admin.edit');
    Route::put('/admin/updatePost/{post_id}', [App\Http\Controllers\PostController::class, 'Update']);
    Route::get('admin/deletePost/{post_id}', [App\Http\Controllers\PostController::class, 'Destroy']);
    Route::get('/posts', [App\Http\Controllers\PostController::class, 'All']);
    Route::get('/posts/{post_id}', [App\Http\Controllers\PostController::class, 'Show']);


    Route::get('/admin/news', [App\Http\Controllers\NewsController::class, 'News'])->name('admin.news');
    Route::get('/admin/createnews', [App\Http\Controllers\NewsController::class, 'Create'])->name('admin.createnews');
    Route::post('/admin/createnews', [App\Http\Controllers\NewsController::class, 'Store'])->name('admin.createnews-post');
    Route::get('/admin/news/{news_id}', [App\Http\Controllers\NewsController::class, 'Edit'])->name('admin.editnews');
    Route::put('/admin/updatenews/{news_id}', [App\Http\Controllers\NewsController::class, 'Update']);
    Route::get('admin/deletenews/{news_id}', [App\Http\Controllers\NewsController::class, 'Destroy']);
    Route::get('/news', [App\Http\Controllers\NewsController::class, 'All']);
    Route::get('/news/{news_id}', [App\Http\Controllers\NewsController::class, 'Show']);




    Route::get('/admin/events', [App\Http\Controllers\EventsController::class, 'Events'])->name('admin.events');
    Route::get('/admin/createevents', [App\Http\Controllers\EventsController::class, 'Create'])->name('admin.createevents');
    Route::post('/admin/createevents', [App\Http\Controllers\EventsController::class, 'Store'])->name('admin.createevents-post');
    Route::get('/admin/events/{events_id}', [App\Http\Controllers\EventsController::class, 'Edit'])->name('admin.editevents');
    Route::put('/admin/updateevents/{events_id}', [App\Http\Controllers\EventsController::class, 'Update']);
    Route::get('admin/deleteevents/{events_id}', [App\Http\Controllers\EventsController::class, 'Destroy']);
    Route::get('/admin/registeredusers', [App\Http\Controllers\RegUserController::class, 'Users'])->name('admin.registeredusers');
    Route::get('/admin/registeredusers/{user_id}', [App\Http\Controllers\RegUserController::class, 'EditUser'])->name('admin.edituser'); 
    Route::put('/admin/updateuser/{user_id}', [App\Http\Controllers\RegUserController::class, 'Update']);
    
    
   


