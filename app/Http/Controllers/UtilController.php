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

        $cesaeInfo = [
        'name'=>'Cesae',
        'address'=>'Rua Ciríaco Cardoso 186, 4150-212 Porto',
        'email'=>'cesae@cesae.pt'
        ];

        return view('utils.homepage', compact('class', 'students', 'cesaeInfo'));
    }





}
