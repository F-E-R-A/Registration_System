<?php
    try{
        //Recebendo dados do Formulário HTML Login:
        $User = $_POST['f_nome'];
        $Key = $_POST['f_senha'];
       
        Verificador($User, $Key);
        
    }catch (Exception $Err){
        echo "Error: ".$Err->getMessage()."<br/>";
    }

    function Verificador($user, $key){
        //Conexão com o BD:
        include('ConexaoDB.php');

        //Verificando Usuário:
        $Instruct_2 = "SELECT usuario, passwords FROM usuarios";
        $Result = $Conn->query($Instruct_2);

        while($row = $Result->fetch()){
            if ($row['usuario'] == $user and $row['passwords'] == $key){
                include("HomeP.html");
            }else{
                echo "";
            }
        }
    }
    
    
?>


