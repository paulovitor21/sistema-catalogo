<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        
    <a class="navbar-brand" href="#">Todos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            <?php foreach ($categorias as $categoria) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?c=catalogo&m=categoria&id=<?php echo $categoria->id_categoria ?>"><?php echo $categoria->nome_categoria ?></a>
                </li>
            <?php endforeach ?>

            <li class="nav-item">
                <a class="nav-link" href="index.php?c=login">Acesso Restrito</a>
            </li>
            
        </ul>
        <form class="d-flex" method="POST" action="index.php?c=catalogo&m=pesquisar">
            <input class="form-control me-2" type="search" placeholder="O que você procura" name="pesquisar" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
        </div>
    </div>
    </nav>