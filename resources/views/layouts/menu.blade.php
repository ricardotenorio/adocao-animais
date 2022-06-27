<nav class="navbar 
            navbar-expand-lg 
            navbar-light 
            bg-warning 
            w-50 
            mx-auto 
            my-3 
            rounded 
            border
            border-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-around" id="navbarNavDropdown">
        <ul class="navbar-nav h4">
            
            <li class="nav-item px-3">
                <a class="nav-link" href="/animais">Inicio</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="/animais/create">Cadastrar Animal</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="/adocoes">Lista de Adoção</a>
            </li>

            @if(auth()->check())
                <li class="nav-item px-3">
                    <a class="nav-link" href="/perfil/{{ auth()->id() }}">Perfil</a>
                </li>
            @endif

        </ul>
    </div>
</nav>