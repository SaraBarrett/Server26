<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//hello world: primeira rota
Route::get('/hello', function () {
    return "<h1>Olá mundo</h1>";
});


/* Rota com variáveis */
Route::get('/testevariaveis', function () {

    //ir à base de dados buscar o login com select * from users where name='Sara';
    $name ='Sara';

    //reatribuir valores à variável name
    $name = 'Margarida';

    return "<h5>Variáveis $name </h5>";
});


/* Rota com parametros */
Route::get('/parametros/{name}', function ($name) {


    return "<h1>Olá $name </h1>";
});


//Route de erro
Route::fallback(function(){
     return "<h3>Desculpe, esta rota não existe</h3>";
});
