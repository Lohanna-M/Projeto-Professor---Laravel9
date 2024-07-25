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
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css">
    <link rel="stylesheet" href={{asset('css/responses.css')}}>
    <title>Corrigir atividade</title>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Respostas da Atividade</h1>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Alunos que Responderam</h5>
            </div>
            <div class="card-body">
                @if($activitties->isEmpty())
                    <p class="text-center">Não há respostas pendentes para esta atividade.</p>
                @else
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nome do Aluno</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activitties as $activity)
                                <tr>
                                    <td>{{ $activity->user->name ?? 'Nome não disponível' }}</td>
                                    <td>
                                        <a href="{{ route('VerRespostasShow', $activity->id) }}" class="btn btn-success btn-sm" data-mdb-ripple-init>
                                            Corrigir Atividade
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</body>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>


