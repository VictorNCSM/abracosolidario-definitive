<?php
    include("conexao.php");
    session_start();
    $_SESSION["email"];
    $email = $_SESSION["email"];
    $consulta = mysqli_query($conexao, "select * from usuario where email='$email'");
    $usuario = mysqli_fetch_array($consulta);
    $idusuario = $usuario["id_usuario"];

    $idchat = $_POST["id_chat"];

    $mensagem = $_POST["mensagem"];
    
    $mensagem = $_POST["mensagem"];
    mysqli_query($conexao, "insert into mensagem(id_chat,id_usuario,mensagem) values('$idusuario','$mensagem')");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            
        </title>
    </head>
    <body>
        
    </body>
</html>