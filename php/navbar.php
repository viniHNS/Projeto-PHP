<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Ferramentas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Consultar
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cnpj">CNPJ</a></li>
                            <li><a class="dropdown-item" href="?page=cep">CEP</a></li>
                            <li><a class="dropdown-item" href="?page=feriado">Feriados</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=ajuda">Ajuda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>