<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/activitties.css">
    <title>Activitties</title>
</head>
<body>

        </head>
        <body>
            <nav class="navbar">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true">
                    Atividades
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href=>Criar Atividades</a>
                    </div>
                  </div>
              </nav>

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
</html>
