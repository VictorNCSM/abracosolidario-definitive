<?php
include("conexao.php");
echo $id = $_GET["id"];

mysqli_query($conexao, "UPDATE doacao SET id_status=3 WHERE id_doacao='$id'");
?>

<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        @font-face {
            font-family: "Nunito";
            src: url(../fontes/Nunito-Regular.ttf);
        }

        body {
            font-family: "Nunito";
        }

        #geral {
            margin: 10px 0px 0px 20px;
        }
    </style>
</head>

<body>
    <div id="geral">
        Sua doação foi apagada de nosso sistema. Volte à <a href="../usuario.php">área do usuário</a>.
    </div>
</body>
</html>