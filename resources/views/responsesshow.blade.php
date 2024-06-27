@extends('layouts.default')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver atividade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/responses.css">
</head>
<body>
    <nav class="navbar">
    <div class="dropdown">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="pb-3">
                    <h2>{{ $activity->name }}</h2>
                </div>
                <div class="mb-3">
                    <p>{{ $activity->description }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('public/'.$activity->filepath) }}" alt="{{ $activity->name }}" class="img-fluid">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
@endsection

