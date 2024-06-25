<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href={{asset('css/activitties.css')}}>
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
                        <th>Alunos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                    <td>
                        <a href="{{ route('EditAluno', $user->id) }}" button type="button" class="btn btn-primary btn-rounded" data-mdb-ripple-init>Editar Aluno</a>
                        @if ($user->userRole->role_id == 3)

                        <form action="{{ route('DesativarAluno', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" onchange=this.form.submit();>
                                <label class="form-check-label" for="flexSwitchCheckDefault">Desativar</label>
                              </div>
                        </form>
                        @else
                        <form action="{{ route('AtivarAluno', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" onchange=this.form.submit();>
                                <label class="form-check-label" for="flexSwitchCheckDefault">Ativar</label>
                              </div>
                        </form>
                        @endif
                    </td>
                </tr>
                    @endforeach
            </table>
           </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @endsection
</html>
