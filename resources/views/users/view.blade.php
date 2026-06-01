@extends('layouts.fo')

@section('content')
    <h5>Info / edição do User</h5>


    <form method="POST" action="{{ route('users.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input value="{{ $user->name }}" name="name" required type="text" class="form-control" id="idname"
                aria-describedby="emailHelp">
            @error('name')
                <p>nome inválido ou inexistente</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input disabled value="{{ $user->email }}" name="email" type="email" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Morada</label>
            <input value="{{ $user->address }}" name="address" type="text" class="form-control" id="idname"
                aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nif</label>
            <input value="{{ $user->nif }}" name="nif" type="text" class="form-control" id="idname"
                aria-describedby="emailHelp">

        </div>
        <div>
            <label for="exampleInputEmail1" class="form-label">Photo</label>
            <input type="file" name="photo" accept="image/*">
            @error('photo')
                <p>ficheiro inválido</p>
            @enderror

        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
