<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title></title>

    <style type="text/css">
        @font-face {
            font-family: "Antapani";
            src: url("../fontes/Antapani-ExtraBold.otf");
        }

        #fonte {
            font-family: "Nunito";
        }

        #container {
            margin-left: 20px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div id="container">
        <span id="fonte">
            <?php
            include("conexao.php");
                session_start();

                if (isset($_POST["login"]) and isset($_POST["senha"])) {
                    $email = $_POST["login"];
                    $senha = $_POST["senha"];

                    # seleciona os dados do usuário no BD de acordo com o email que o usuário enviou no login
                    $consulta = mysqli_query($conexao, "select * from usuario where email = '$email'");


                    # Se o usuário estiver registrado no BD, ele será encontrado e a variável será verdadeira. Se não, o usuário não é autenticado.    
                    if ($consulta == false) {
                        echo 'Você ainda não está cadastrado. Por favor, vá à <a href="formcadastro.html">página de cadastro</a>.';
                    } else {

                        $dados_usuario = mysqli_fetch_array($consulta);
                        if ($dados_usuario["senha"] == $senha) {

                            $_SESSION["email"] = $dados_usuario["email"];
                            $_SESSION["senha"] = $dados_usuario["senha"];


                            echo 'Login autorizado com sucesso. <a href="../usuario.php">Vá para a página de usuário</a> ou para a <a href="../index.html">página inicial</a>.';
                        } else {
                            echo 'Seu login ou senha estão incorretos, por favor, insira novamente voltando à <a href="../login.html">página de login</a>.';
                        }
                    }
                }
            # Verifica se a variável de login e de senhas foram iniciadas. Se sim, ele salva os dados nas variáveis
            
            ?>

        </span>
    </div>
</body>

</html>