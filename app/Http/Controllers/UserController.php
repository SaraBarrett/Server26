<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function addUser(){
        return view('users.add_user');
    }

    public function allUsers(){

        //ir à base de dados buscar o responsável pela gestão
        $contactInfo = [
            'name'=>'Márcia',
            'email'=> 'Marcia@gmail.com'
        ];

        $contacts = [
            ['id'=>1, 'name'=>'Sara', 'email'=>'Sara@gmail.com'],
            ['id'=>2, 'name'=>'Bruno', 'email'=>'Bruno@gmail.com'],
            ['id'=>3, 'name'=>'Márcia', 'email'=>'Márcia@gmail.com'],
        ];

        //oficialmente dados da base de dados, yay

        //query usando o dbquery builder
        // $usersFromDb = DB::table('users')
        // ->whereNull('address')
        // ->get();

        //query usando o model
        $usersFromDb= User::get();

        //dd( $usersFromDb);

         return view('users.all_users', compact('contactInfo', 'contacts', 'usersFromDb'));
    }

    public function viewUser($id){

        $user = DB::table('users')->where('id', $id)->first();

        return view('users.view', compact('user'));

    }


    public function deleteUser($id){

       DB::table('tasks')->where('user_id', $id)->delete();

       DB::table('users')->where('id', $id)->delete();

        return back();

    }

    public function storeUser(Request $request){
        //dd($request->all());

        $request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'min:8|required'
        ]);

    }
}
