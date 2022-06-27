<?php
    try{
        $HOST = "localhost";
        $PORT = "3306";
        $DBNAME = "bdados";
        $USER = "root";
        $PASS = "";

        try{
            $Conn = new PDO("mysql:host=".$HOST.";port=".$PORT.";dbname=".$DBNAME.";user=".$USER.";password=".$PASS);
            //echo "Conexão realizada com Sucesso.<br/>";
            /*if ($Conn){
                $Conn = null;
                echo "Banco de Dados Fechado com Sucesso.<br/>";
            }else {
                echo "Erro ao Fechar o Banco de Dados. Ele não estava aberto.<br/>";
            }*/
        }catch (PDOException $E){
            //echo "Erro ao conectar com DB. ".$E->getMessage()."<br/>";
        }
    
    }catch (Exception $e){
        //echo "Erro ao definir as variáveis: ".$e->getMessage()."<br/>";
    }
?>