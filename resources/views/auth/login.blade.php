<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <title>Login</title>
</head>
<body>
<form class="form" action="{{ route('login.action') }}" method="POST">
    @csrf
    <div class="conteiner"> <p class="title">Login</p>
<label>
    <input class="input" type="email" name="email" required="email">
    <span>Email:</span>
    @error('email')
    <span>{{ $message }}</span>
    @enderror
</label>
<label>
    <input class="input" type="password" name="password" required="password">
    <span>Senha:</span>
    @error('password')
    <span>{{ $message }}</span>
    @enderror
</label>
<a href="{{ route('Activitties') }}"><button class="submit">Login</button></a>
<p class="mb-0">Não possui uma conta?<a href="{{ route('register') }}" class="register_button">Registre-se</a></p>
</div>
</form>
</body>
</html>
