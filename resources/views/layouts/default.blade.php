<body>
    <nav class="navbar">
      <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Atividades
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('Activitties') }}">Ver Atividades</a></li>
                <li><a class="dropdown-item" href="{{ route('RegisterActivitties') }}">Registrar Atividade</a></li>
            </ul>
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Disciplinas
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('Disciplina') }}">Ver Disciplinas</a></li>
                <li><a class="dropdown-item" href="{{ route('RegisterDisciplina') }}">Registrar Disciplina</a></li>
            </ul>
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Alunos
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('Aluno') }}">Ver Alunos</a></li>
                <li><a class="dropdown-item" href="{{ route('RegisterAluno')}}">Registrar Aluno</a></li>
            </ul>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Conta
            </button>
            <ul class="dropdown-menu conta">
                <li><a class="dropdown-item" href="#">Ver Detalhes da Conta</a></li>
                <li><a class="dropdown-item" href="#">Atualizar Detalhes da Conta</a></li>
                <li><a class="dropdown-item" href="#">Sair</a></li>
            </ul>
        </div>
    </nav>
    @yield('content')
</body>
</html>
