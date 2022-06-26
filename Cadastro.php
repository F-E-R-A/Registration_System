<?php
    include('ConexaoDB.php');
    //Realizando o Cadastro de usuários:
    try{
        $User = $_POST['N_user'];
        $Key = $_POST['N_key'];
        $Email = $_POST['N_email'];
        $Img = $_FILES['Findfile']['tmp_name'];
        $Tamanho_IMG = $_FILES['Findfile']['size'];
        $Tipo_IMG = $_FILES['Findfile']['type'];
        $Name_IMG = $_FILES['Findfile']['name'];

        CadastrarUsers($User, $Key, $Email, $Img);

        //Criptografando a senha:
        /*$KEY_DEFAULT = password_hash($Key, PASSWORD_DEFAULT);

        if ($Img != 'none'){
            $fp = fopen($Img,  "rb");
            $Imagem = fread($fp, $Tamanho_IMG);
            $Imagem = addslashes($Imagem);
            fclose($fp);
        }else{
            $Img = NULL;
        }*/
    }catch (Exception $err){
        echo "Error: ".$err->getMessage();
    }
    

    function CadastrarUsers($user, $key, $email, $img){
        include("ConexaoDB.php");
        try{
            $Instruct1 = $Conn->prepare("INSERT INTO usuarios VALUES (NULL, ?, ?, ?, ?)");
            $Instruct1->execute(array($user, $key, $email, $img));
            //echo "Dados enviados com sucesso.";
            ?>        
            <html>
                <head>
                    <style>
                        #div1{
                            position: absolute;
                            background-color: rgba(0,0,0,0.7);
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            padding: 80px;
                            border-radius: 15px;
                        }
                        body{
                            background-image: linear-gradient(45deg, lightblue, darkblue);
                        }
                        #msg{
                            color: white;
                        }
                        #Img{
                            position: absolute;
                            left: 50%;
                            transform: translate(-50%, 0%);
                        }
                        #bt2{
                            position: relative;
                            left: 36%;
                            top: 70px;
                            height: 30px;
                            width: 100px;
                            border-radius: 14px;
                            background-color: cyan;
                            font-size: 15px;
                        }
                    </style>
                </head>
                <body>
                    <div id="div1">
                        <h2 id="msg">Usuário cadastrado com sucesso.</h2>
                        <img id="Img" src="Images/verificado.png" height="50px" width="50px" alt="Imagem Indisponível.">
                        <form method="POST" action="Login.html">
                            <button id="bt2" type="submit">Voltar</button>
                        </form>
                    </div>
                    
                </body>
            </html>
           
    <?php
        }catch (Exception $e){
            //echo "Não foi possível enviar os dados. ".$e->getMessage();
            ?>
            <html>
                <head>
                    <style>
                        #body_err{
                            background-image: linear-gradient(45deg, lightblue, darkblue);
                        }
                        #div3{
                            position: absolute;
                            justify-content: center;
                            background-color: rgba(0,0,0,0.7);
                            padding: 80px;
                            color: white;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            border-radius: 15px;
                        }
                        h4{
                            display: flex;
                            justify-content: center;
                        }
                        #img2{
                            position: absolute;
                            left: 50%;
                            transform: translate(-50%);
                        }
                        #bt3{
                            position: absolute;
                            top: 260px;
                            left: 50%;
                            transform: translate(-50%);
                            height: 30px;
                            width: 100px;
                            font-size: 15px;
                            background-color: cyan;
                            border-radius: 14px;
                        }
                    </style>
                </head>
                <body id='body_err'>
                    <div id="div3">
                        <h2>Erro ao cadastrar o Usuário.</h2>
                        <h4>Tente novamente mais Tarde.</h4>
                        <img id="img2" src="Images/xNao.png" height="50px" width="50px" alt="Imagem Indisponível."><br/><br/>
                        <form method="POST" action="Login.html">
                            <button id="bt3" type="submit">Voltar</button>
                        </form>
                    </div>
                </body>
            </html>  
<?php   
       }
    }   
?>
        