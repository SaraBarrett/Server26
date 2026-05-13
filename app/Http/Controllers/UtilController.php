<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{

    public function welcomeFunction() {
        return view('welcome');
    }

    public function homepageFunction() {
           //consulta à base de dados
        $class = 'SD';

        //consulta à bd select * from students
        $students = ['Luís', 'Afonso', 'Eduarda', 'Joaquim'];

        return view('utils.homepage', compact('class', 'students'));
    }





}
