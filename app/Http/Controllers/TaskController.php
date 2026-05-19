<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function allTasks(){

    //query que busca na base de dados
        $tasks = DB::table('tasks')
        ->join('users', 'tasks.user_id', 'users.id')
        ->select('tasks.name', 'tasks.description', 'tasks.due_at', 'tasks.status', 'tasks.id', 'users.name as username', 'tasks.user_id')
        ->get();

       //dd($tasks->name);

        //retorna a view com dados lá dentro
        return view('tasks.all_tasks', compact('tasks'));
    }
}
