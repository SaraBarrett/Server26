@extends('layouts.fo')

@section('content')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input value="{{ request()->email }}" name="email" required type="email" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

            @error('email')
                <p>email inválido ou inexistente</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input required name="password" type="password" class="form-control" id="exampleInputPassword1">
            @error('password')
                <p>password inválida ou inexistente</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input required name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1">
            @error('password')
                <p>password inválida ou inexistente</p>
            @enderror
        </div>
        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <button type="submit" class="btn btn-primary">Login</button>
        <p>Esqueceu-se da pass? clique <a href="{{ route('password.request') }}">aqui</a></p>
    </form>
@endsection
