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
    <nav class="navbar">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Conta
        </button>
    <ul class="dropdown-menu conta">
        <li><a class="dropdown-item" href="{{ route('DetalhesContaAluno', [Auth::user()->id]) }}">Ver Detalhes da Conta</a></li>
        <li><a class="dropdown-item" href="{{ route('login')}}">Sair</a></li>
    </ul>
</nav>
</div>
    <div class="conteiner">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nome da Atividade</th>
                    <th>Disciplina</th>
                </tr>
            </thead>
            <div class="container">
                @if(Session::has('success'))
            <div class="alert alert-success">
            {{Session::get('success')}}
            </div>
                @elseif(Session::has('fail'))
            <div class="alert alert-danger">
            {{Session::get('fail')}}
            </div>
            @endif
        <tbody>
            @foreach ($activitties as $activity)

            <tr>
                <td>{{ $activity->name }}</td>
                <td>{{ $activity->disciplina_name
                }}</td>
                <td>
                    <a href="{{ route('ResponsesShows', $activity->id) }}" button type="button" class="btn btn-success btn-rounded" data-mdb-ripple-init>Responder atividade</a>
                    <a href="{{ route('VerResponsesShows', $activity->id) }}" button type="button" class="btn btn-primary btn-rounded" data-mdb-ripple-init>Ver atividade</a>
                    @if ($activity->completed)
                    <span class="badge bg-success">Completada</span>
                @else
                    <span class="badge bg-danger">Não Completada</span>
                @endif
                    @csrf
                </tr>
            @endforeach
    </form>
    </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>


