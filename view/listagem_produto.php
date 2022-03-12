<?php include "./view/template_header.php" ?>
<?php include "./view/template_menu1.php" ?>
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
                        <td><?php echo $produto->categoria ?></td>
                        <td>
                            <a href="index.php?c=produto&m=excluir&id=<?php echo $produto->id_produto ?>" class="btn btn-danger">Excluir</a>
                            <a href="index.php?c=produto&m=editar&id=<?php echo $produto->id_produto ?>" class="btn btn-primary">Atualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php include "./view/template_rodape.php" ?>