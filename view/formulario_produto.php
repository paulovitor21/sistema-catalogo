<!-- exibição dos dados (visão - interface gráfica) - páginas HTML. -->

<?php
    if(!defined("CONTROLADOR")) {
        die("Solicitção não atendida");
    }
?>

<?php include "./view/template_header.php" ?>
<?php include "./view/template_menu1.php" ?>
    
    <div class="container">
        <h1 class="mt-4">Cadastro de Produtos</h1>
        <hr>
        <form  method="post" action="index.php?c=produto&m=salvar" enctype="multipart/form-data" onsubmit="salvar()">

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
                <input type="hidden" name="name_foto" value="<?php echo isset($produto) ? $produto->foto : "semfoto.jpeg" ?>">
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" id="categoria" class="form-select">
                    <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?php echo $categoria->id_categoria ?>" <?php echo (isset($produto) && $produto->id_categoria == $categoria->id_categoria) ? "selected" : "" ?>>
                        <?php echo $categoria->nome_categoria ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="hidden" name="id_produto" value="<?php echo isset($produto) ? $produto->id_produto : "" ?>">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

<?php include "./view/template_rodape.php" ?>

<script>
    // Erro genérico de callback para transações de banco de dados
    var errCallback = function() {
            alert("Há um erro de banco de dados!");
        }

        // Abrir / inicializar o banco de dados - não compatível com navegadores firefox e internet exlorer
        var db = openDatabase("catalago", "1.0", "Sistema de Catalato",32678);

        // Criar a tabela de cadastro
        db.transaction(function(criar) {
            criar.executeSql("CREATE TABLE IF NOT EXISTS cadastroProduto (" + "id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT," + "nome TEXT NOT NULL, descricao TEXT NOT NULL, marca text not null, categoria text not null);");
        });

        // Função Salvar
        function salvar() {
            var nome = document.getElementById('nome').value;
            var descricao = document.getElementById('descricao').value;
            var marca = document.getElementById('marca').value;
            var categoria = document.getElementById('categoria').value;

            db.transaction(function(armazenar) {
                armazenar.executeSql(("INSERT INTO cadastroProduto (nome, descricao, marca, categoria) VALUES (?, ?, ?, ?);"), 
				[nome, descricao, marca, categoria]);
            })
        }
        var salvarcadastro = function(nome, descricao, marca, categoria, successCallback){
			db.transaction(function(transaction){
				transaction.executeSql(("INSERT INTO cadastroProduto (nome, descricao, marca, categoria) VALUES (?, ?, ?, ?);"), 
				[nome, descricao, marca, categoria], function(transaction, results){successCallback(results);}, errCallback);
			});
		};
</script>