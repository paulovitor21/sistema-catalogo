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
        <div class="row mt-4">
            <div class="col-6">
                <h1>Listagem de Produtos</h1>
            </div>
            <div class="col-6 text-end">
                <a href="index.php?c=produto&m=adicionar" class="btn btn-success">Adicionar Produto</a>
            </div>
        </div>
       
        <hr>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>Nome</th>
                    <th>Marca</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($produtos as $produto): ?>
                    <tr class="text-center">
                        <td><?php echo $produto->nome_produto ?></td>
                        <td><?php echo $produto->marca ?></td>
                        <td><?php echo $produto->preco ?></td>
                        <td><?php echo $produto->id_categoria ?></td>
                        <td>
                            <a href="index.php?c=produto&m=excluir&id=<?php echo $produto->id_produto ?>" class="btn btn-danger">Excluir</a>
                            <a href="index.php?c=produto&m=editar&id=<?php echo $produto->id_produto ?>" class="btn btn-primary">Atualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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