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
    <link rel="stylesheet" href={{asset('css/show.css')}}>
    <title>Ver atividade</title>
</head>
<body>
<div class="conteiner d-flex justify-content-center">
    <table>
    @if($activity->filepath)
    <div class="card" style="width: 40rem; margin: 10rem;">
        <img src="{{asset('public/'.$activity->filepath)}}" alt="{{ $activity->name }}" class="img-fluid">
        <div class="card-body">
          <h3 class="card-title">{{$activity->name}}</h3>
          <h5>Descrição:</h5>
          <p class="card-text">{!!$activity->description!!}</p>
        </div>
      </div>
    @endif
</div>
</body>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
