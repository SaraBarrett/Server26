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

    public function storeTask(Request $request){
       //dd($request->all());

       $request->validate([
            'name'=>'required|string|max:50',
            'user_id'=> 'required|exists:users,id'
       ]);

       DB::table('tasks')->insert([
            'name' => $request->name,
            'user_id'=>$request->user_id
       ]);

       return redirect()->route('tasks.all')->with('message', 'Tarefa actualizada com sucesso!');


    }

    public function addTask(){
        $users = db::table('users')
        ->select('users.name', 'users.id')
        ->get();

        return view('tasks.add_task', compact('users'));
    }



      public function deleteTask($id){


       DB::table('tasks')->where('id', $id)->delete();

        return back();

    }

    public function viewTask($id){

        $task = DB::table('tasks')
        ->where('tasks.id', $id)
          ->join('users', 'tasks.user_id', 'users.id')
        ->select('tasks.name', 'tasks.description', 'tasks.due_at', 'tasks.status', 'tasks.id', 'users.name as username', 'tasks.user_id')
        ->first();

        return view('tasks.view', compact('task'));

    }


}
