<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alunos</title>
</head>
<body>
    @extends('layouts.default')
    @section('content')
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
            </tr>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox2" name="options[]" value="1">
                        <label for="checkbox2"></label>
                    </span>

                </td>
                <td>Dominique Perrier</td>
                <td>Atividade</td>
                <td>Matemática</td>
                <td>9</td>
            </tr>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox3" name="options[]" value="1">
                        <label for="checkbox3"></label>
                    </span>
                </td>
                <td>Maria Anders</td>
                <td>Atividade</td>
                <td>Biologia</td>
                <td>8.5</td>
            </tr>
        </tbody>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
</html>
