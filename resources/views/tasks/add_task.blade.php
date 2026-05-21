@extends('layouts.fo')

@section('content')
    <h4>Aqui vai ter um formuário para adicionar Tarefas</h4>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome da Tarefa</label>
            <input name="name" required type="text" class="form-control" id="idname" aria-describedby="emailHelp">
            @error('name')
                <p>nome inválido ou inexistente</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">User</label>

            <label for="pet-select">Escolhe um utilizador:</label>

            <select name="user_id" id="pet-select">
                <option value="">--Please choose an option--</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach


            </select>


            @error('user_id')
                <p>user inválido ou inexistente</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Registar</button>
    </form>
@endsection
