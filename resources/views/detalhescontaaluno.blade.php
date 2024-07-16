
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href={{asset('css/activitties.css')}}>
<title>Ver Detalhes da Conta</title>
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
            <li><a class="dropdown-item" href="#">Sair</a></li>
        </ul>
    </nav>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Detalhes da Conta</h3>
            </div>
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('ActivittiesResponses') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</body>
</html>
