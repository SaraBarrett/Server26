@extends('layouts.fo')

@section('content')
    @php
        //consulta à base de dados
        $class = 'SD';

        //consulta à bd select * from students
        $students = ['Luís', 'Afonso', 'Eduarda', 'Joaquim'];
    @endphp


    <h4>Bem vindo à aplicação de Servidor!</h4>

    @if ($class)
        <h3>Olá turma {{ $class }}</h3>
        <ul>
            @foreach ($students as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    @endif

    <img src="{{ asset('images/what-is-software-CA-Capterra-Header.png') }}" alt="">

    <ul>
        <li><a href="{{ route('welcome_routename') }}">Welcome</a></li>
        <li><a href="{{ route('testevariaveis') }}">Variáveis</a></li>
        <li><a href="{{ route('users.add') }}">Adicionar user</a></li>
    </ul>
@endsection
