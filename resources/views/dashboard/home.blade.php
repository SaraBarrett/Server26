@extends('layouts.fo')

@section('content')
    <h5>Páginas de Backoffice</h5>

    <h5>Olá {{ Auth::user()->name }}</h5>

    @if (Auth::user()->user_type == \App\Models\User::TYPE_ADMIN)
        <div class="alert alert-success">
            <h5>Tens super poderes</h5>
        </div>
    @endif
@endsection
