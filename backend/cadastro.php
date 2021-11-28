<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, inicial-scale=1" />
    <title>Abraço Solidário </title>

    <style type="text/css">
        @font-face {
            font-family: "Antapani";
            src: url("../fontes/Antapani-ExtraBold.otf");
        }

        #geral {
            width: 100%;
            padding: 25px 0px 25px 25px;
            margin: -8px 0px 0px -8px;
        }

        #fonte{
            font-family: "Antapani";
        }
    </style>
</head>

<body>
    <div id="geral">
        <span id="fonte">
            <?php
            
                include("conexao.php");
                
                
                # Coleta de dados
                
                $nome = $_POST["nome"];
                
                $email = $_POST["email"];
                
                $senha = $_POST["senha"];
                
                $dia = $_POST["dia"];
                
                $mes = $_POST["mes"];
                
                $ano = $_POST["ano"];
                
                $datanasc = $ano . '-' . $mes . '-' . $dia;
                
                $rua = $_POST["rua"];
                
                $bairro = $_POST["bairro"];
                
                $numero = $_POST["numero"];
                
                $cidade = $_POST["cidade"];
                
                $cep = $_POST["cep"];
                
                
                if(isset($_POST["autorizacao"])) {
                    $autorizacao = "1";
                } else {
                    $autorizacao = "0";
                }

                
                if (isset($_POST["cpf"])) {
                    $cpf = $_POST["cpf"];
                } else {
                    $cpf = 0;
                }
                
                if (isset($_POST["telefone"])) {
                
                    if (strlen($_POST["telefone"]) < 8) {
                        echo "O número de telefone que você inseriu é muito curto. Por favor, <a href='../formcadastro.html'>volte à página de cadastro</a>.";
                    } else {
                        $telefone = $_POST["telefone"];
                        $telefone = "(11)$telefone";
                    }
                }
                
                
                $celular = $_POST["celular"];
                $celular = "(11)$celular";
                
                if (strlen($senha) < 8) {
                    echo "Sua senha é muito curta, volte à <a href='../formcadastro.html'>página de cadastro</a> e se cadastre.";
                } elseif (strpos($email, "@") == "") {
                    echo "O E-mail inserido não é um e-mail válido. <a href='../formcadastro.html'>Voltar ao formulário</a>.";
                } elseif (strpos($email, ".com") == "") {
                    echo "O E-mail inserido não é um e-mail válido. <a href='../formcadastro.html'>Voltar ao formulário</a>.";
                } elseif (strlen($celular) < 9) {
                    echo "O número de celular que você inseriu é muito curto. Por favor, <a href='../formcadastro.html'>volte à página de cadastro</a>.";
                } else {
                    $consulta = mysqli_query($conexao, "select * from usuario where email='$email'");
                
                    $dados = mysqli_fetch_array($consulta);
                
                    if ($dados["email"] == False) {
                        mysqli_query($conexao, "INSERT into usuario(nome,email,senha,celular,telefone_fixo,cpf,datanasc,rua,bairro,numero,cidade,cep,autorizacao,ativo) values('$nome','$email','$senha','$celular','$telefone','$cpf','$datanasc','$rua','$bairro','$numero','$cidade','$cep','$autorizacao','1')");
                
                        echo "O formulário foi enviado com sucesso. <a href='../index.html'>Voltar à página inicial</a> ou <a href='../login.html'>Ir à página de login</a>.";
                    }
                
                    if ($dados["email"] == True) {
                        echo "Você já está cadastrado em nosso site. Por favor, <a href='../login.html'>logue-se</a>.";
                    }
                }
            ?>
        </span>
    </div>
</body> 

</html>
