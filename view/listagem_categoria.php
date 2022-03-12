<?php include "./view/template_header.php" ?>
<?php include "./view/template_menu1.php" ?>
    
    <div class="container">
        <div class="row mt-4">
            <div class="col-6">
                <h1>Listagem de Categorias</h1>
            </div>
            <div class="col-6 text-end">
                <a href="index.php?c=categoria&m=adicionar" class="btn btn-success">Adicionar Categoria</a>
            </div>
        </div>
       
        <hr>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($categorias as $categoria): ?>
                    <tr class="text-center">
                        <td><?php echo $categoria->nome_categoria ?></td>
                        <td>
                            <a href="index.php?c=categoria&m=excluir&id=<?php echo $categoria->id_categoria ?>" class="btn btn-danger">Excluir</a>
                            <a href="index.php?c=categoria&m=editar&id=<?php echo $categoria->id_categoria ?>" class="btn btn-primary">Atualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php include "./view/template_rodape.php" ?>