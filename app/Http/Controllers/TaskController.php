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

        $users = DB::table('users')->select('users.name', 'users.id')->get();


        $task = DB::table('tasks')
        ->where('tasks.id', $id)
          ->join('users', 'tasks.user_id', 'users.id')
        ->select('tasks.name', 'tasks.description', 'tasks.due_at', 'tasks.status', 'tasks.id', 'users.name as username', 'tasks.user_id')
        ->first();

        return view('tasks.view', compact('task', 'users'));

    }

    public function updateTask(Request $request){


    $request->validate([
        'name' => 'String|required|max:50',
        'user_id' => 'required|exists:users,id'
    ]);

    db::table('tasks')
    ->where('id', $request->id) // aqui estamos a dizer que queremos atualizar a task com o id que é igual ao id que recebemos por parametro, e o where é para dizer que queremos ir buscar a task com o id que é igual ao id que recebemos por parametro
    ->update([
        'name' => $request->name,
        'user_id' => $request->user_id ,
        'description' => $request->description,
           'due_at' => $request->due_at,
            'status' => $request->status,
    ]);

    return redirect()->route('tasks.all')->with('message', 'Task atualizada com sucesso!');     // aqui estamos a dizer que queremos carregar a view tasks.view, e o compact é para dizer que queremos passar a variável task para a view, ou seja, queremos passar os dados da task que obtivemos da base de dados para a view
    }


}

