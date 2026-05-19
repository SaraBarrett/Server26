@extends('layouts.fo')

@section('content')
    <h6>A pessoa de contacto é {{ $contactInfo['name'] }} e o email é o {{ $contactInfo['email'] }} </h6>

    <h3>Aqui tens todos os users (simulação da base de dados)</h3>
    <ul>
        @foreach ($contacts as $user)
            <li> {{ $user['id'] }}: {{ $user['name'] }} - {{ $user['email'] }} </li>
        @endforeach
    </ul>



    <h3>Aqui tens todos os users (dados reais)</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Nif</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersFromDb as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nif }}</td>
                    <td><a href="{{ route('users.view', $user->id) }}" class="btn btn-info">Ver</a></td>
                    <td><a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Apagar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
