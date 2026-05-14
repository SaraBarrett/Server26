<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', [UtilController::class, 'welcomeFunction'])->name('welcome_routename');

//hello world: primeira rota
Route::get('/hello', function () {
    return "<h1>Olá mundo</h1>";
});

/*primeira view */
Route::get('/home', [UtilController::class, 'homepageFunction'])->name('homepage');

/* Rota com variáveis */
Route::get('/testevariaveis', function () {

    //ir à base de dados buscar o login com select * from users where name='Sara';
    $name ='Sara';

    //reatribuir valores à variável name
    $name = 'Margarida';

    return "<h5>Variáveis $name </h5>";
})->name('testevariaveis');


/* Rota com parametros */
Route::get('/parametros/{name}', function ($name) {


    return "<h1>Olá $name </h1>";
});


//users
Route::get('/add_user', [UserController::class, 'addUser'])->name('users.add');

Route::get('/all_users', [UserController::class, 'allUsers'])->name('users.all');

//Route de erro
Route::fallback(function(){
     return view('utils.fallback');
});
