<?php include "./view/template_header.php" ?>
<?php include "./view/template_menu1.php" ?>
    <div class="container">
        <div class="row mt-4">
            <div class="col-6">
                <h1>Listagem de Usuários</h1>
            </div>
            <div class="col-6 text-end">
                <a href="index.php?c=usuario&m=adicionar" class="btn btn-success">Adicionar Usuário</a>
            </div>
        </div>
       
        <hr>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>Nome</th>
                    <th>Nacionalidade</th>
                    <th>Login</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($usuarios as $usuario): ?>
                    <tr class="text-center">
                        <td><?php echo $usuario->nome ?></td>
                        <td><?php echo $usuario->nacionalidade ?></td>
                        <td><?php echo $usuario->login ?></td>
                        <td>
                            <a href="index.php?c=usuario&m=excluir&id=<?php echo $usuario->id_usuario ?>" class="btn btn-danger">Excluir</a>
                            <a href="index.php?c=usuario&m=editar&id=<?php echo $usuario->id_usuario ?>" class="btn btn-primary">Atualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php include "./view/template_rodape.php" ?>