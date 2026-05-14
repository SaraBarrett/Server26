<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


         return view('users.all_users', compact('contactInfo', 'contacts'));
    }
}
