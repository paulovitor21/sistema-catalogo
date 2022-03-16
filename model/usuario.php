<?php

if(!defined("CONTROLADOR")) {
    die("Solicitção não atendida");
}
    include 'db/conexao.php';
    
    // validação do formulário
    function validarUsuario($nome, $nacionalidade, $login, $senha, $confirma_senha, $tipo) {
        $mensagem_erro = "";
        
        if (empty($nome)) {
            $mensagem_erro .= "O campo nome é obrigatório! <br>";
        }
        if (empty($nacionalidade)) {
            $mensagem_erro .= "O campo nacionalidade é obrigatório! <br>";
        }
        if (empty($login)) {
            $mensagem_erro .= "O campo login é obrigatório! <br>";
        }
        if (empty($senha)) {
            $mensagem_erro .= "O campo senha é obrigatório! <br>";
        }
        if (empty($confirma_senha)) {
            $mensagem_erro .= "O campo confirmar senha é obrigatório! <br>";
        }
        if ($senha != ($confirma_senha)) {
            $mensagem_erro .= "O campo senha deve ser igual ao campo confirmar senha! <br>";
        }
        if ($tipo == "salvar" && existeNomeUsuario($login)) {
            $mensagem_erro .= "O login deve ser único <br>";
        }
        return $mensagem_erro;
    }
    function existeNomeUsuario($login) {
        global $link;
        $comando = $link->prepare("SELECT * FROM usuario WHERE login = ?");
        $comando->bind_param("s",$login);
        $comando->execute();
        $resultado = $comando->get_result();
        return $resultado->num_rows > 0;
    }

    function inserirUsuario($nome, $nacionalidade, $login, $senha) {
        global $link;
        $comando = $link->prepare("INSERT INTO usuario (nome, nacionalidade, login, senha) VALUES (?,?,?,?)");
        $comando->bind_param("ssss", $nome, $nacionalidade, $login, md5($senha));
        return $comando->execute();
    }
    
    function atualizarUsuario($nome, $nacionalidade, $login, $senha, $id_usuario) {
        global $link;
        $comando = $link->prepare("UPDATE usuario SET `nome`=?, `nacionalidade`=?, `login`=?, `senha`=? WHERE `id_usuario`=?");
        $comando->bind_param("ssssi", $nome, $nacionalidade, $login, md5($senha), $id_usuario);
        return $comando->execute();
    }
    
    function excluirUsuario($id_usuario) {
        global $link;
        $comando = $link->prepare("DELETE FROM usuario WHERE id_usuario=?");
        $comando->bind_param("i", $id_usuario);
        return $comando->execute();
    }

    function selecionarUsuarioId($id_usuario) {
        global $link;
        $comando = $link->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
        $comando->bind_param("i", $id_usuario);
        $comando->execute();
        $resultado = $comando->get_result();
        //retorna o resultado como um objeto
        return $resultado->fetch_object();
    }

    function selecionarTodosUsuarios() {
        global $link;
        $comando = $link->prepare("SELECT * FROM usuario");
        $comando->execute();
        $resultado = $comando->get_result();
        // retorna cada um dos objetos da consulta
        while ($pesquisa = $resultado->fetch_object()) { // busca o objeto e armazena na variavel pesquisa
            $usuarios[] = $pesquisa;
        }
        return $usuarios; // retorna todos os usuarios
    }

    function selecionarUsuarioLoginSenha($login, $senha) {
        global $link;
        $comando = $link->prepare("SELECT * FROM usuario WHERE login = ? and senha = ?");
        $comando->bind_param("ss", $login, $senha);
        $comando->execute();
        $resultado = $comando->get_result();
        //retorna o resultado como um objeto
        return $resultado->fetch_object();
    }


