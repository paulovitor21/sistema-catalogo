<?php

    function upload($nome_input) {
        $arquivo = $_FILES[$nome_input];
        $origem = $arquivo["tmp_name"];
        $destino = "fotos/". time(). $arquivo["name"];
        if ($arquivo["type"] == "image/jpeg" && $arquivo["error"] == 0) {
            if (move_uploaded_file($origem, $destino)) {
                return $destino;
            }
        }
        return false;    
    }
