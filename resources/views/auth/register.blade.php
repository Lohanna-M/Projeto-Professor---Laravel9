<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <form action="{{ route('register.save') }}" method="POST" class="user">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Email:</label>
          <input value="{{ old('email') }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
          @error('email')
          <div class="text-red-400 text-sm">{{ $message }}</div>
      @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Senha:</label>
          <input value="{{ old('password') }}" type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
          @error('password')
          <div class="text-red-400 text-sm">{{ $message }}</div>
      @enderror
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Lembre-me</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <button type="submit" class="btn btn-primary">Registre-se</button>
      </form>
</body>
</html>
