<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/activitties.css">
    <title>Disciplinas</title>
</head>
    <body>
        @extends('layouts.default')
        @section('content')
        <div class="conteiner">
            @if(Session::has('success'))
        <div class="alert alert-success">
        {{Session::get('success')}}
        </div>
            @elseif(Session::has('fail'))
        <div class="alert alert-danger">
        {{Session::get('fail')}}
        </div>
        @endif
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>Disciplinas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($disciplines as $dicipline)
                    <tr>
                        <td>{{ $dicipline->name }}</td>
                        <td>
                            <form class="form" action="{{ route('DeleteDisciplina', $dicipline->id) }}" method="POST">
                            <a href="{{ route('EditDisciplina', $dicipline->id) }}" button type="button" class="btn btn-primary btn-rounded" data-mdb-ripple-init>Editar Atividade</a>
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-rounded">Deletar Atividade</button>
                        </td>
                    </tr>
                    @endforeach
                </form>
            </table>
           </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @endsection
</html>
