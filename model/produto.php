<?php

    include 'db/conexao.php';
    
    function inserirProduto($nome, $descricao, $marca, $preco, $foto, $categoria) {
        global $link;
        $comando = $link->prepare("INSERT INTO produto (nome_produto, descricao, marca, preco, foto, id_categoria) VALUES (?,?,?,?,?,?)");
        
        $comando->bind_param("sssdsi", $nome, $descricao, $marca, $preco, $foto, $categoria);
        
        return $comando->execute();
    }
    
    function atualizarProduto($nome_produto, $descricao, $marca, $preco, $foto, $id_categoria, $id_produto) {
        global $link;
        $comando = $link->prepare("UPDATE produto SET `nome_produto`=?, `descricao`=?, `marca`=?, `preco`=?, `foto`=?, `id_categoria`=? WHERE `id_produto`=?");
        $comando->bind_param("sssdsii", $nome_produto, $descricao, $marca, $preco, $foto, $id_categoria, $id_produto);
        return $comando->execute();
    }
    
    function excluirProduto($id_produto) {
        global $link;
        
        $comando = $link->prepare("DELETE FROM produto WHERE id_produto=?");
        
        $comando->bind_param("i", $id_produto);
        
        return $comando->execute();
    }

    function selecionarProdutoId($id_produto) {
        global $link;
        $comando = $link->prepare("SELECT * FROM produto WHERE id_produto = ?");
        $comando->bind_param("i", $id_produto);
        $comando->execute();
        $resultado = $comando->get_result();
        //retorna o resultado como um objeto
        return $resultado->fetch_object();
    }

    function selecionarTodosProdutos() {
        global $link;
        $comando = $link->prepare("SELECT produto.*, categoria.nome_categoria as categoria FROM produto inner join categoria on produto.id_categoria = categoria.id_categoria");
        $comando->execute();
        $resultado = $comando->get_result();
        // retorna cada um dos objetos da consulta
        while ($pesquisa = $resultado->fetch_object()) { // busca o objeto e armazena na variavel pesquisa
            $produtos[] = $pesquisa;
        }
        return $produtos; // retorna todos os produtos
    }

