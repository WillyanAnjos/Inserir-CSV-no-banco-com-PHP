<?php

    //Conexão
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "base_dados";

    //variável de conexão para entrarmos no banco
    $conectar = mysqli_connect($host,$user,$pass,$db);
    mysqli_set_charset($conectar,"utf-8");

    //Espera todo o arquivo ser carregado
    ini_set('max_execution_time',0);

    //Local do arquivo
    $arquivo = "C:/xampp/htdocs/site/Clientese.csv";
    
    //Verifica se arquivo existe
    if(file_exists($arquivo)){
        /*
            FIELDS TERMINATED BY ';' -> Ele vai entender que o final da linha
            LINES  TERMINATED BY '\n' -> Ele vai pular para a próxima linha
            IGNORE 1 ROWS" -> Ele vai ignorar a linha contendo os nomes das colunas
        */
        if(mysqli_query($conectar, "LOAD DATA INFILE '$arquivo' INTO TABLE tb_clientes
            FIELDS TERMINATED BY ';'
            LINES  TERMINATED BY '\n'
            IGNORE 1 ROWS")){
                echo 'Inserido';//Verifica se os dados dentro do arquivo foram inseridos
            }else{
                echo 'Não carreguei';//Mostra um erro caso não
            }

    }else{
        echo 'Arquivo não existe';//Se arquivo não existir, ele acusa um erro
    }

?>