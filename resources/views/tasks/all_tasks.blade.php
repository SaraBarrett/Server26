@extends('layouts.fo')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}

        </div>
    @endif

    <h4>
        Aqui carregamos todos as tarefas</h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Status</th>
                <th scope="col">Prazo</th>
                <th scope="col">User</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        {{-- @if ($task->status == 1)
                            concluído
                        @else
                            em execução
                        @endif --}}

                        {{ $task->status == 1 ? 'concluído' : 'execução' }}
                    </td>
                    <td>{{ $task->due_at }}</td>
                    <td>{{ $task->username }}</td>
                    <td><a href="{{ route('tasks.view', $task->id) }}" class="btn btn-info">Ver / editar</a></td>
                    <td><a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Apagar</a></td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
