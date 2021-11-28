<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="CSS/busca2.css" media="screen" />
</head>

<body>
    <div id="geral">
        <div class="titulo-box">
            Doações feitas por você
        </div>
        <div class="box-pesquisa">

            <form id="form" method="POST" action="resultado2.php">
                <label for="roupa"><strong><span class="fonte2">Qual a peça de roupa que você deseja procurar?:</span></strong></label>
                <select name="roupa" required="required">
                    <option selected="selected" value="">Selecione</option>
                    <option value=1>Camisetas</option>
                    <option value=2>Bermudas</option>
                    <option value=3>Calças de moletom</option>
                    <option value=4>Calças jeans</option>
                    <option value=5>Camisetas de manga longa</option>
                    <option value=6>Blusas de moletom</option>
                    <option value=7>Jacos</option>
                </select>

                <input type="submit" value="Enviar">
            </form>
        </div>


        <?php
        include("backend/conexao.php");
        session_start();

        $email = $_SESSION["email"];

        $consusuario = mysqli_query($conexao,"select * from usuario where email='$email'");

        $usuario = mysqli_fetch_array($consusuario);

        $id = $usuario["id_usuario"];


        $consdoacao = mysqli_query($conexao,"select * from doacao where id_usuario='$id'");
        $doacao = mysqli_fetch_array($consdoacao);
        if($doacao["id_doacao"] == false){

            echo "Você não tem doações registradas ainda";

        } else {


            while ($doacao = mysqli_fetch_array($consdoacao)) {

                # Coletando os dados do usuário criador da doação
                $idcriador = $doacao["id_usuario"];
                $consultacriador = mysqli_query($conexao, "select * from usuario where id_usuario='$idcriador'");
                $criador = mysqli_fetch_array($consultacriador);
    
                # Coletando dados da doação
                $id_doacao = $doacao["id_doacao"];
                $idtipo = $doacao["id_tipo_roupa"];
                $quantidade = $doacao["quantidade"];
    
                if ($quantidade = 1) {
    
                    if ($idtipo == 1) {
                        $tipo = "camiseta";
                    } elseif ($idtipo == 2) {
                        $tipo = "short";
                    } elseif ($idtipo == 3) {
                        $tipo = "calça moletom";
                    } elseif ($idtipo == 4) {
                        $tipo = "calça jeans";
                    } elseif ($idtipo == 5) {
                        $tipo = "camiseta manga longa";
                    } elseif ($idtipo == 6) {
                        $tipo = "blusa moletom";
                    } else {
                        $tipo = "jaco";
                    }
                } else {
    
                    if ($id == 1) {
                        $tipo = "camisetas";
                    } elseif ($id == 2) {
                        $tipo = "shorts";
                    } elseif ($id == 3) {
                        $tipo = "calças moletom";
                    } elseif ($id == 4) {
                        $tipo = "calças jeans";
                    } elseif ($id == 5) {
                        $tipo = "camisetas manga longa";
                    } elseif ($id == 6) {
                        $tipo = "blusas moletom";
                    } else {
                        $tipo = "jacos";
                    }
                }
    
                echo '
                    <div class="box">
    
                        <div class="titulo">
                            Doação de ', $quantidade, ' ', $tipo, '
    
                            <button class="botao" onclick=window.location.href="backend/excluir-doacao.php?id=',$id_doacao, '">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            width="24" height="24"
                            viewBox="0 0 172 172"
                            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M71.66667,14.33333l-7.16667,7.16667h-28.66667c-3.956,0 -7.16667,3.21067 -7.16667,7.16667c0,3.956 3.21067,7.16667 7.16667,7.16667h14.33333h71.66667h14.33333c3.956,0 7.16667,-3.21067 7.16667,-7.16667c0,-3.956 -3.21067,-7.16667 -7.16667,-7.16667h-28.66667l-7.16667,-7.16667zM35.83333,50.16667v93.16667c0,7.91917 6.41417,14.33333 14.33333,14.33333h71.66667c7.91917,0 14.33333,-6.41417 14.33333,-14.33333v-93.16667z"></path></g></g></svg>
                            </button>
                        </div>
    
    
                    </div>';
            }
        }
        ?>
    </div>
</body>

</html>