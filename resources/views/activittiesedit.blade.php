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
</style>
<body>
    <form action="{{ route('UpdateActivitties', $activity->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">
                <h5>Nome da Atividade</h5>
            </label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $activity->name }}" placeholder="Nome da Atividade">
        </div>
        <div class="form-group">
            <label for="disciplina">
                <h5>Disciplina</h5>
            </label>
            <select class="form-control" name="disciplina" id="disciplina">
                @foreach ($diciplines as $dicipline)
                    <option value="{{ $dicipline->id }}">{{ $dicipline->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label type=filepath id="description"><h5>Descrição:{!!$activity->description!!}</h5></label>
            <textarea name="description" id="editor"></textarea>
        <div class="form-group">
            <label for="filepath">
                <h5>Arquivo Atual</h5>
            </label>
            <p>{{ $activity->filepath }}</p>
            <label for="filepath">
                <h5>Enviar Novo Arquivo</h5>
            </label>
            <input type="file" class="form-control-file" id="filepath" name="filepath">
        </div>
        <a href="{{ route('Activitties') }}" class="btn btn-primary">Voltar</a>
        <button type="submit" class="btn btn-primary">Editar</button>

    </form>

</body>
@endsection
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
