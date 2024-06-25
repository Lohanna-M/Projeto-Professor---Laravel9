@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @elseif(Session::has('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif

    <h2>Atividade: {{ $activity->name }}</h2>
    <p>Disciplina: {{ $activity->diciplines->name }}</p>

    <!-- Formulário para enviar resposta -->
    <form action="{{ route('StoreResponse', $activity->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="description">Descrição da Resposta</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="note">Nota</label>
            <input type="text" name="note" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="check">Check</label>
            <input type="number" name="check" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="filepath">Arquivo (opcional)</label>
            <input type="file" name="filepath" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Enviar Resposta</button>
    </form>

    <hr>

    <!-- Exibição das respostas existentes -->
    <h3>Respostas Enviadas:</h3>
    @if ($responses->count() > 0)
        <ul>
            @foreach ($responses as $response)
                <li>
                    <p><strong>Usuário:</strong> {{ $response->user->name }}</p>
                    <p><strong>Descrição:</strong> {{ $response->description }}</p>
                    <p><strong>Nota:</strong> {{ $response->note }}</p>
                    <p><strong>Check:</strong> {{ $response->check }}</p>
                    @if ($response->filepath)
                        <p><strong>Arquivo:</strong> <a href="{{ asset($response->filepath) }}" target="_blank">Ver Arquivo</a></p>
                    @endif
                    <hr>
                </li>
            @endforeach
        </ul>
    @else
        <p>Nenhuma resposta enviada ainda.</p>
    @endif
</div>
@endsection

@endsection

