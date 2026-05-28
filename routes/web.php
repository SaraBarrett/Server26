<?php

use App\Http\Controllers\TaskController;
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


//rota com parametros que carrega a ficha de cada user
Route::get('/view_user/{id}', [UserController::class, 'viewUser'])->name('users.view');

//rota que recebe os dados do formulário e os insere na base de dados
Route::post('/store_user', [UserController::class, 'storeUser'])->name('users.store');

//rota que recebe os dados do user
Route::put('/update-user', [UserController::class, 'updateUser'])->name('users.update');

Route::get('/delete_user/{id}', [UserController::class, 'deleteUser'])->name('users.delete');


//tasks
Route::get('/all_tasks', [TaskController::class, 'allTasks'])->name('tasks.all')->middleware('auth');

//rota que carrega visualmente o formulário
Route::get('/add_task', [TaskController::class, 'addTask'])->name('tasks.add');

Route::post('/store_task', [TaskController::class, 'storeTask'])->name('tasks.store');

Route::put('/update_task', [TaskController::class, 'updateTask'])->name('tasks.update');

//rota com parametros que carrega a ficha de cada tarefa
Route::get('/view_task/{id}', [TaskController::class, 'viewTask'])->name('tasks.view');
Route::get('/delete_task/{id}', [TaskController::class, 'deleteTask'])->name('tasks.delete');

//Route de erro
Route::fallback(function(){
     return view('utils.fallback');
});
