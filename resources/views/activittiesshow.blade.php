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
    <link rel="stylesheet" href={{asset('css/show.css')}}>
    <title>Ver atividade</title>
</head>
<body>
    <input type="hidden" name="activity_id" value="{{ $activity->id }}">
    <div class="" id="responseModal{{ $activity->id }}" tabindex="-1" aria-labelledby="responseModalLabel{{ $activity->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="responseModalLabel{{ $activity->id }}">{{ $activity->name }}</h5>
                    <a href="{{ route('Activitties')}}" class="btn-close" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <a href="{{ asset( 'public/'.$activity->filepath )}}" download="{{ asset('public/'.$activity->filepath) }}" style="text-decoration: none;">
                    <button type="button" style="border: solid 2px; background: none; padding: 5x;">Download</button>
                    </a>
                    <h5>Descrição:</h5>
                    <p class="card-text" id="description">{!!$activity->description!!}</p>
</div>
</body>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
