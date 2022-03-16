<?php
    if(!defined("CONTROLADOR")) {
        die("Solicitção não atendida");
    }
?>

<?php include "./view/template_header.php" ?>
<?php include "./view/template_menu1.php" ?>
    
    <div class="container">
        <h1 class="mt-4">Cadastro de Categorias</h1>
        <hr>
        <form  method="post" action="index.php?c=categoria&m=salvar">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?php echo isset($categoria) ? $categoria->nome_categoria : "" ?>">
            </div>

            <input type="hidden" name="id_categoria" value="<?php echo isset($categoria) ? $categoria->id_categoria : "" ?>">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

<?php include "./view/template_rodape.php" ?>