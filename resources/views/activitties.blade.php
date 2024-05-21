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
    <title>Activitties</title>
</head>
<body>
    </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="selectAll">
                            <label for="selectAll"></label>
                        </span>
                    </th>
                    <th>Aluno</th>
                    <th>Atividade</th>
                    <th>Disciplina</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="checkbox1" name="options[]" value="1">
                            <label for="checkbox1"></label>
                        </span>
                    </td>
                    <td>Thomas Hardy</td>
                    <td>Atividade</td>
                    <td>Português</td>
                    <td>10</td>

                    <td>
                        <a href="" button type="button" class="btn btn-primary btn-rounded" data-mdb-ripple-init>Ver Atividade</a>
                        <a href="" button type="button" class="btn btn-success   btn-rounded" data-mdb-ripple-init>Editar Atividade</a>
                        <a href="" button type="button" class="btn btn-danger  btn-rounded" data-mdb-ripple-init>Deletar Atividade</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
