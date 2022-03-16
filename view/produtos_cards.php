<?php include "./view/template_header.php" ?>
<?php include "./view/template_menu_categoria.php" ?>
    <div class="container">
        
       
        <hr>
            
        <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4">
                <?php foreach($produtos as $produto): ?>
                    <div class="col">
                        <div class="card">
                            <img src="<?php echo $produto->foto ?>" class="card-img-top" alt="<?php echo $produto->preco ?>">
                            <div class="card-body">
                                <p class="card-text"><?php echo $produto->nome_produto ?></p>
                                <h5 class="card-title">R$ <?php echo $produto->preco ?></h5>
                                <a href="index.php?c=catalogo&m=visualizarProduto&id=<?php echo $produto->id_produto ?>" class="btn btn-success">Visualizar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
    </div>

<?php include "./view/template_rodape.php" ?>