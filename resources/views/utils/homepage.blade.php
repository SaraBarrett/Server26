<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <h4>Bem vindo à aplicação de Servidor!</h4>
    <img src="{{ asset('') }}" alt="">
    <ul>
        <li><a href="{{ route('welcome_routename') }}">Welcome</a></li>
        <li><a href="{{ route('testevariaveis') }}">Variáveis</a></li>
        <li><a href="{{ route('users.add') }}">Adicionar user</a></li>
    </ul>


</body>

</html>
