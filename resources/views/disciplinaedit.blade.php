<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href={{asset('css/registers.css')}}>
    <title>Editar Disciplina</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background-color: #094701; /* Cor de fundo da página */
            }

            .container {
                max-width: 600px;
                padding: 20px;
                border: 1px solid #017214;
                border-radius: 8px;
                background-color: #017214; /* Cor de fundo do formulário */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .title {
                font-size: 24px;
                margin-bottom: 20px;
                text-align: center; /* Centraliza o texto do título */
                color: white;
            }

            .input {
                display: block;
                width: 100%;
                padding: 10px;
                margin-top: 10px;
                margin-bottom: 20px;
                border: 1px solid #ddd;
                border-radius: 5px;
            }

            .submit, .btn-secondary {
                background-color: #007bff;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                display: inline-block;
                margin-right: 10px;
                text-align: center;
                text-decoration: none;
            }

            .submit:hover, .btn-secondary:hover {
                background-color: #0056b3;
            }

            .btn-secondary {
                background-color: #6c757d;
            }

            .btn-secondary:hover {
                background-color: #5a6268;
            }

            a {
                text-decoration: none;
                color: #000000;
            }
            a:hover{
                color: #000000;

            }
        </style>
    </head>
    <body>
        <form action="{{ route('UpdateDisciplina', $dicipline->id) }}" method="POST" class="form">
            @csrf
            @method('PUT')
            <div class="container">
                <p class="title">Editar Disciplina</p>
                <label>
                    <input class="input" name="name" type="text" value="{{ $dicipline->name }}">
                </label>
                <button type="submit" class="botão">Editar</button>
            <button type="button" class="botão" onclick="window.location.href='{{ route('Disciplina') }}'">Cancelar</button>
            </div>
        </form>
    </body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
