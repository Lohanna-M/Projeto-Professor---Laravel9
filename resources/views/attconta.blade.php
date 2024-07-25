@extends('layouts.default')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href={{asset('css/activitties.css')}}>
<title>Ver Detalhes da Conta</title>
</head>
<style>
    a {
       text-decoration: none;
       color: #000000;
   }
   a:hover{
       color: #000000;

   }
</style>
<body>
    <form action="{{ route('UpdateConta', $user->id) }}" method="POST" class="form">
        @csrf
        @method('PUT')
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="conteiner"> <p class="title">Atualizar Conta</p>
        <label>
           Nome:
            <input class="input" name="name" type="name" placeholder="" required="name" value="{{$user->name}}">
        </label>
        <label>
            Email:
            <input class="input" name="email" type="email" placeholder="" required="email" value="{{$user->email}}">
        </label>
        <button class="submit">Atualizar</button>
        <button class="submit"><a href="{{ route('Activitties') }}">Voltar</a></button>
       </div>
    </form>
</body>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
