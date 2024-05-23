<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/registers.css">
    <title>Registrar Atividades</title>
</head>
<body>
    <form action="{{ route('StoreActivitties') }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
       <div class="conteiner"> <p class="title">Registrar Atividade</p>
        <label>
            <input class="input" type="text" placeholder="" name="name" required="name">
            <span>Atividade:</span>
        </label>
        <label>
            <select name="disciplina" id="">
                @foreach ($diciplines as $dicipline )
                <option value="{{ $dicipline->id }}">{{ $dicipline->name }}</option>
                @endforeach
            </select>
        </label>
        <input type="file"name="filepath">

        <label>Descrição da Atividade:</label>
        <textarea placeholder="Escreva aqui"></textarea>
        <button class="submit">Registrar</button>
       </div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
