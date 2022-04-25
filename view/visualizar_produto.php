<?php include "./view/template_header.php" ?>
<?php include "./view/template_menu_categoria.php" ?>
    <div class="container">
        
       
        <hr>
        <h1><?php echo (isset($produto) ? $produto->nome_produto : "") ?></h1>
        
        <div class="row mt-5">
            <div class="col-md-7 col-sm-12 img-fluid">
                <img src="<?php echo $produto->foto ?>" class="w-75" alt="">
            </div>

            <div class="col-md-5 col-sm-12">
                <h5>Preço</h5>
                <h5>R$ <?php echo $produto->preco ?></h5>
                
                <h4>Marca</h4>
                <p><?php echo $produto->marca ?></p>
                
                <h4>Categoria</h4>
                <p><?php echo $produto->categoria ?></p>
            </div>
        </div>

        <h4>Informações do Produto</h4>
        <hr>
        <p><?php echo $produto->descricao ?></p>
    </div>

<?php include "./view/template_rodape.php" ?>