<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href={{asset('css/activitties.css')}}>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css">
    <title>Editar Atividades</title>
</head>
<style>
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-group h5 {
        margin-bottom: 0.5rem;
    }
    .btn-primary {
        padding: 0.5rem 1.5rem;
        font-size: 1rem;
    }
    a {
       text-decoration: none;
       color: #ffffff;
   }
   a:hover{
       color: #ffffff;

   }
body {
    background-color: #e6fde6;
}
.container {
    max-width: 800px;
    margin-top: 50px;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}
.form-group label {
    font-weight: bold;
}
.btn-primary {
    margin-right: 10px;
}
.back-btn a {
    color: white;
    text-decoration: none;
}
</style>
<body>
    <nav class="navbar">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Conta
            </button>
            <ul class="dropdown-menu conta">
                <li><a class="dropdown-item" href="{{ route('DetalhesContaAluno', [Auth::user()->id]) }}">Ver Detalhes
                        da Conta</a></li>
                <li><a class="dropdown-item" href="{{ route('login') }}">Sair</a></li>
            </ul>
    </nav>
    </div>
        <div class="container">
            <h2 class="text-center mb-4">Editar Resposta</h2>
            <form action="{{ route('UpdateResponses', $activity->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="description"><h5>Descrição:{!! $activity->description !!}</h5></label>
                    <textarea class="form-control" name="description" id="editor" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="filepath"><h5>Arquivo Atual:</h5></label>
                    <p>{{ $activity->filepath }}</p>
                    <label for="filepath"><h5>Enviar Novo Arquivo:</h5></label>
                    <input type="file" class="form-control-file" id="filepath" name="filepath">
                </div>
                <button type="submit" class="btn btn-primary"><a href="{{ route('ActivittiesResponses') }}">Voltar</a></button>
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
</body>
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.0/"
        }
    }
</script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Paragraph,
        Bold,
        Italic,
        Font
    } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
            ]
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
