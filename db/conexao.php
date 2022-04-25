<?php
   
   // A conexão é realizada criando um objeto da classe mysqli.

    $host = "localhost";
    $user = "root";
    $password = "prog1278";
    $database = "db_prog_web";

    $link = new mysqli($host, $user, $password, $database); // recebe como parâmetros o host que é a máquina onde está instalado o SGBD, o usuário, a senha e o banco de dados que desejamos conectar.
    

 

    // tratamento de erro ao realizar a conexão com o banco de dados.
    if ($link->connect_error) {
        // finaliza a conexao do sistema e informa o tipo de erro ocorrido.
        die($link->connect_error);
    }

