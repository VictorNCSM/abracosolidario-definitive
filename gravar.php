<?php
include("backend/conexao.php");


# Coleta de dados
$id = $_POST["id"];

$consulta = mysqli_query($conexao, "select * from usuario where id_usuario = '$id'");
$dados = mysqli_fetch_array($consulta);

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$celular = $_POST["celular"];
$telefone = $_POST["telefone_fixo"];

$dia = $_POST["dia"];
$mes = $_POST["mes"];
$ano = $_POST["ano"];
$rua = $_POST["rua"];
$datanasc = $ano . '-' . $mes . '-' . $dia;

$bairro = $_POST["bairro"];
$numero = $_POST["numero"];
$cidade = $_POST["cidade"];
$cep = $_POST["cep"];

$ativo = $_POST["ativo"];


if (isset($_POST["cpf"])) {
    $cpf = $_POST["cpf"];
} else {
    $cpf = 0;
}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style>
        @font-face{
            font-family: "nunito";
            src: url("fontes/Nunito-Regular.ttf");
        }

        #fonte {
            font-family: "nunito";
        }

        #geral {
            width: 80%;
            margin-left: 4%;
            margin-top: 20px;  
        }
    </style>
</head>

<body>
    <span id="fonte">
        <div id="geral">
            <?php
            if (strlen($senha) < 8) {
                echo "Sua senha é muito curta, volte à <a href='formcadastro.html'>página de cadastro</a> e se cadastre.";
            } elseif (strpos($email, "@") == "") {
                echo "O E-mail inserido não é um e-mail válido. <a href='formcadastro.html'>Voltar ao formulário</a>.";
            } elseif (strpos($email, ".com") == "") {
                echo "O E-mail inserido não é um e-mail válido. <a href='formcadastro.html'>Voltar ao formulário</a>.";
            } elseif (isset($_POST["telefone"])) {
                # valida se o telefone tem mais de 10 caracteres, se tiver, o 
                if (strlen($_POST["telefone"]) < 8) {
                    echo "O número de telefone que você inseriu é muito curto. Por favor, <a href='formcadastro.html'>volte à página de cadastro</a>.";
                }
            } elseif (strlen($celular) < 9) {
                echo "O número de celular que você inseriu é muito curto. Por favor, <a href='formcadastro.html'>volte à página de cadastro</a>.";
            } else {


                $telefone = $_POST["telefone_fixo"];

                # Se o telefone não for igual ao valor inserido, ele salvará
                if(!($_POST["telefone_fixo"] == $dados["telefone_fixo"])) {
                    $telefone = $_POST["telefone_fixo"];
                    $telefone = "(11)".$telefone;  
                } else {
                    
                }


                if(!($celular == $dados["celular"])) {
                    $celular = "(11)$celular";
                }
                
                $consulta = mysqli_query($conexao, "select * from usuario where email = $email");

                if ($consulta == False) {
                    mysqli_query($conexao,"UPDATE usuario SET nome='$nome',email='$email',senha='$senha',celular='$celular',telefone_fixo='$telefone',cpf='$cpf',rua='$rua',bairro='$bairro',numero='$numero',cidade='$cidade',cep='$cep',datanasc='$datanasc',ativo='$ativo' WHERE id_usuario='$id'");

                    echo "Alteração de dados bem sucedida, prossiga para a <a href='usuario.php'>área de usuário</a> ou vá para a <a href='index.html'>página inicial</a>";

                } else {
                    echo "Um usuário já está cadastrado sob este mesmo email.";
                }
            }
            ?>
        </div>
    </span>
</body>
</html>
