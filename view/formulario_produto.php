<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sistema de Catalogo</title>
  </head>
  
  <body>

    <header style="background-color: #000">
        <div class="container text-white pb-2">
            <h1 class="pt-4">Sistema de Catálogos</h1>
            <p>Aqui você encontra tudo que precisa</p>
        </div>
    </header>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Produtos</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="#">Categorias</a>
            </li>
            
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
    
    <div class="container">
        <h1 class="mt-4">Cadastro de Produtos</h1>
        <hr>
        <form  method="post" action="index.php?c=produto&m=salvar" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?php echo isset($produto) ? $produto->nome_produto : "" ?>">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control"><?php echo isset($produto) ? $produto->descricao : "" ?></textarea>
            </div>

            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control" value="<?php echo isset($produto) ? $produto->marca : "" ?>">
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" step="any" name="preco" id="preco" class="form-control" value="<?php echo isset($produto) ? $produto->preco : "" ?>">
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
                <input type="hidden" name="name_foto" value="<?php echo isset($produto) ? $produto->foto : "" ?>">
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" id="categoria" class="form-select">
                    <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?php echo $categoria->id_categoria ?>" <?php echo (isset($produto) && $produto->id_categoria == $categoria->id_categoria) ? "selected" : "" ?>>
                        <?php echo $categoria->nome_categoria ?>

                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="hidden" name="id_produto" value="<?php echo isset($produto) ? $produto->id_produto : "" ?>">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <hr>
    <footer style="background-color: #000">
        <div class="container text-white text-center p-3">
            <h4>Sistema de Catálogos</h4>
            <p>Todos os direitos reservados</p>
        </div>
    </footer>
   

   

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>