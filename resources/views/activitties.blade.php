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
    <link rel="stylesheet" href="css/activitties.css">
    <title>Atividades</title>
</head>
<body>
    <div class="conteiner">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nome da Atividade</th>
                    <th>Disciplina</th>
                    <th>Descrição</th>
                </tr>
            </thead>
        <tbody>
            @foreach ($activitties as $activity)
            <tr>
                <td>{{ $activity->name }}</td>
                <td>{{ $activity->diciplines->name}}</td>
                <td>
                    <a href="{{ route('ShowActivitties', $activity->id) }}" button type="button" class="btn btn-success btn-rounded" data-mdb-ripple-init>Ver Atividade</a>
                    <a href="{{ route('EditActivitties', $activity->id) }}" button type="button" class="btn btn-primary btn-rounded" data-mdb-ripple-init>Editar Atividade</a>
                    <form class="form" action="{{ route('DeleteActivitties', $activity->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-rounded">Deletar Atividade</button>
            </tr>
            @endforeach
    </form>
    </div>
    </body>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
