@extends('layouts.fo')

@section('content')
    <h6>A pessoa de contacto é {{ $contactInfo['name'] }} e o email é o {{ $contactInfo['email'] }} </h6>

    <h3>Aqui tens todos os users (simulação da base de dados)</h3>
    <ul>
        @foreach ($contacts as $user)
            <li> {{ $user['id'] }}: {{ $user['name'] }} - {{ $user['email'] }} </li>
        @endforeach
    </ul>
@endsection
