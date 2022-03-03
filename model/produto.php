<?php

    include '../db/conexao.php';
    
    function inserirProduto($nome, $descricao, $marca, $preco, $foto, $categoria) {
        global $link;
        $comando = $link->prepare("INSERT INTO produto (nome_produto, descricao, marca, preco, foto, id_categoria) VALUES (?,?,?,?,?,?)");
        
        $comando->bind_param("sssdsi", $nome, $descricao, $marca, $preco, $foto, $categoria);
        
        return $comando->execute();
    }
    
    function atualizarProduto($nome, $descricao, $marca, $preco, $foto, $categoria, $id_produto) {
        global $link;
        
        $comando = $link->prepare("UPDATE produto SET `nome_produto`=?, `descricao`=?, `marca`=?, `preco`=?, `foto`=?, `id_categoria`=? WHERE `id_produto`=?");
        
        $comando->bind_param("sssdsii", $nome, $descricao, $marca, $preco, $foto, $categoria, $id_produto);
        
        return $comando->execute();
    }
    
    function excluirProduto($id_produto) {
        global $link;
        
        $comando = $link->prepare("DELETE FROM produto WHERE id_produto=?");
        
        $comando->bind_param("i", $id_produto);
        
        return $comando->execute();
    }
    
    
    
    
    /*
    function excluirProduto($id_produto) {
        global $link;
        
        $comando = $link->prepare("DELETE FROM produto WHERE id_produto = ?");
        
        $comando->bind_param("i", id_produto);
        
        return $comando->execute;
    }
    */
    var_dump(excluirProduto(1));

