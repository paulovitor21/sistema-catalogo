<!-- manipulação dos dados - validação e acesso ao banco de dados. -->
<?php

if(!defined("CONTROLADOR")) {
    die("Solicitção não atendida");
}
    
include 'db/conexao.php';
    
    function inserirCategoria($nome_categoria) {
        global $link;
        $comando = $link->prepare("INSERT INTO categoria (nome_categoria) VALUE (?)");
        $comando->bind_param("s", $nome_categoria);
        return $comando->execute();
    }
    
    function atualizarCategoria($nome_categoria, $id_categoria) {
        global $link;
        $comando = $link->prepare("UPDATE categoria SET `nome_categoria`=? WHERE `id_categoria`=?");
        $comando->bind_param("si", $nome_categoria, $id_categoria);
        return $comando->execute();
    }
    
    function excluirCategoria($id_categoria) {
        global $link;
        $comando = $link->prepare("DELETE FROM categoria WHERE id_categoria=?");
        $comando->bind_param("i", $id_categoria);
        return $comando->execute();
    }

    function selecionarCategoriaId($id_categoria) {
        global $link;
        $comando = $link->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
        $comando->bind_param("i", $id_categoria);
        $comando->execute();
        $resultado = $comando->get_result();
        //retorna o resultado como um objeto
        return $resultado->fetch_object();
    }

    function selecionarTodasCategorias() {
        global $link;
        $comando = $link->prepare("SELECT * FROM categoria");
        $comando->execute();
        $resultado = $comando->get_result();
        // retorna cada um dos objetos da consulta
        while ($pesquisa = $resultado->fetch_object()) { // busca o objeto e armazena na variavel pesquisa
            $categorias[] = $pesquisa;
        }
        return $categorias; // retorna todas as categorias
    }

