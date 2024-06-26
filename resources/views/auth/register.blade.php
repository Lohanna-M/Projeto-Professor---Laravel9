<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <title>Registre-se</title>
</head>
<body>
    <form class="form" action="{{ route('register.save') }}" method="POST">
        @csrf
        <div class="conteiner"> <p class="title">Registre-se</p>
        <label>
            <input class="input" type="text" name="name" required="name">
            <span>Nome:</span>
            @error('name')
            <span>{{ $message }}</span>
            @enderror
        </label>
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
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="admin" name="admin">
            <label class="form-check-label" for="admin">
              Admin
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="2" id="professor" name="professor">
            <label class="form-check-label" for="professor">
              Professor
            </label>
         </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="3" id="aluno" name="aluno">
            <label class="form-check-label" for="aluno">
             Aluno
            </label>
          </div>
        <a href="{{ route('login') }}"><button class="submit">Registre-se</button></a>
        </div>
    </form>
</body>

</html>
