<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver atividade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css">
    <link rel="stylesheet" href={{asset('css/responses.css')}}>
</head>
<body>
    <nav class="navbar">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Conta
                </button>
            <ul class="dropdown-menu conta">
                <li><a class="dropdown-item" href="#">Ver Detalhes da Conta</a></li>
                <li><a class="dropdown-item" href="#">Atualizar Detalhes da Conta</a></li>
                <li><a class="dropdown-item" href="#">Sair</a></li>
            </ul>
        </nav>
        <form action="{{ route('ResponsesStore') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="" id="responseModal{{ $activity->id }}" tabindex="-1" aria-labelledby="responseModalLabel{{ $activity->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="responseModalLabel{{ $activity->id }}">{{ $activity->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <button type="button">Download<img src= {{ $activity->filepath }}/></button>
                                @csrf
                                <h5>Descrição:</h5>
                                <p class="card-text" id="description">{!!$activity->description!!}</p>
                                <div class="form-group">
                                    <label for="response">Sua Resposta</label>
                                    <textarea name="description" id="editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="responseImage">Enviar Imagem</label>
                                    <input type="file" name="filepath" class="form-control-file" id="responseImage" accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-success">Enviar Resposta</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>

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
</body>
</html>


