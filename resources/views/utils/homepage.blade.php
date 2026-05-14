@extends('layouts.fo')

@section('content')



    <h4>Bem vindo à aplicação de Servidor!</h4>
    <h6>Para mais informações contacte o {{ $cesaeInfo['name'] }} e o contacto é {{ $cesaeInfo['email'] }}. Morada:  {{ $cesaeInfo['address'] }}</h6>

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
