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
    <title>Activitties</title>
</head>
<body>
<form action="{{ route('UpdateActivitties', $activity->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1"><h3>{{$activity->name}}</h3></label>
          <input type="name" class="form-control" name="name" id="name" placeholder="Nome da Atividade">
        </div>
        <label>
            <h3>Disciplina:</h3>
            <select name="disciplina" id="">
                @foreach ($diciplines as $dicipline )
                <option value="{{ $dicipline->id }}">{{ $dicipline->name }}</option>
                @endforeach
            </select>
        </label>
          <div class="form-group">
            <label for="exampleFormControlInput1"><h3>{{$activity->description}}</h3></label>
            <textarea class="form-control" id="description" name='description' placeholder="Descrição"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">{{$activity->filepath}}</label>
            <input type="file" class="form-control-file" id="filepath" name="filepath">
          </div>
          <button class="submit">Editar</button>
</form>



</body>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
