<!--recebe as requisições do usuário e determinar qual view deve ser exibida, ou como os dados deve ser manipulados. -->

<?php
    
    if(!defined("CONTROLADOR")) {
        die("Solicitção não atendida");
    }
    
    require_once 'model/produto.php';
    require_once 'model/categoria.php';
    

    function index() {
        $produtos = selecionarTodosProdutos();
        $categorias = selecionarTodasCategorias();
        include 'view/produtos_cards.php';
    }

    function categoria() {
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            $produtos = selecionarTodosProdutosCategoria($id);
            $categorias = selecionarTodasCategorias();
            include 'view/produtos_cards.php';
        }
    }

    function pesquisar() {
        $dados = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (isset($dados["pesquisar"])) {
            $produtos = selecionarPorNome($dados["pesquisar"]);
            $categorias = selecionarTodasCategorias();
            include 'view/produtos_cards.php';
        }
    }

    function visualizarProduto() {
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            $produto = selecionarProdutoId($id);
            $categorias = selecionarTodasCategorias();
            include 'view/visualizar_produto.php';
        }
    }
    