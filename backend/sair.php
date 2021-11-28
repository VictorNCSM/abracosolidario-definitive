<?php
session_start();
session_destroy();

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
            margin: 20px 0px 0px 20px;
        }
    </style>
</head>

<body>
    <div id="geral">
        Você saiu da sua conta. Vá à <a href="../login.html">página de login</a>, ou vá à <a href="../index.html">página inicial</a>.
    </div>
</body>

</html>