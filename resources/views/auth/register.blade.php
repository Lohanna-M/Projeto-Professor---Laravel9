<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <title>Registre-se</title>
</head>
<body>
    <section class="intro" action="{{ route('register') }}">
        <div class="mask d-flex">
          <div class="container">
            <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card" style="border-radius: 1rem;">
                  <div class="card-body p-5 text-center">

                    <div class="my-md-5 pb-5">

                      <h1>Bem-vindo</h1>

                      <i class="fas fa-user-astronaut fa-3x my-5"></i>

                      <div class="form-outline mb-4">
                          <label class="form-label" for="typeEmail">Nome:</label>
                        <input type="email" id="typeEmail" class="form-control form-control-lg" />
                        @error('email')
                        <div class="text-red-400 text-sm">{{ $message }}</div>
                    @enderror
                      </div>

                      <div class="form-outline mb-4">
                          <label class="form-label" for="typeEmail">Email:</label>
                        <input type="email" id="typeEmail" class="form-control form-control-lg" />
                        @error('email')
                        <div class="text-red-400 text-sm">{{ $message }}</div>
                    @enderror
                      </div>
                      <div class="form-outline mb-5">
                          <label class="form-label" for="typePassword">Senha:</label>
                        <input type="password" id="typePassword" class="form-control form-control-lg" />
                        @error('password')
                        <div class="text-red-400 text-sm">{{ $message }}</div>
                    @enderror
                      </div>
                    <button type="submit">Registre-se</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>
