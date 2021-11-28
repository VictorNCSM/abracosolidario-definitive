<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="CSS/busca2.css" media="screen" />
</head>

<body>
    <div id="geral">
        <div class="titulo-box">
            Doações registradas em nosso site
        </div>
        <div class="box-pesquisa">

            <form id="form" method="POST" action="resultado.php">
                <label for="roupa"><strong><span class="fonte2">Qual a peça de roupa que você deseja? </span></strong></label>
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
        $consdoacao = mysqli_query($conexao, "select * from doacao where id_status=1");

        $i = 1;
        while (($doacao = mysqli_fetch_array($consdoacao)) and $i <=14) {

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

                        <button class="botao" onclick=window.location.href="pagedoacao.php?id=',$id_doacao,'">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                        width="30" height="30"
                        viewBox="0 0 172 172"
                        style=" fill:#000000;"><g transform=""><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><path d="" fill="none"></path><g fill="#ffffff"><path d="M86,162.71469l-2.20375,-1.8275c-4.17906,-3.49375 -9.83625,-7.28312 -16.39375,-11.66375c-25.54469,-17.10594 -60.5225,-40.51406 -60.5225,-80.42344c0,-24.65781 20.06219,-44.72 44.72,-44.72c13.39719,0 25.94781,5.96625 34.4,16.16531c8.45219,-10.19906 21.00281,-16.16531 34.4,-16.16531c24.65781,0 44.72,20.06219 44.72,44.72c0,39.90938 -34.97781,63.3175 -60.5225,80.42344c-6.5575,4.38063 -12.21469,8.17 -16.39375,11.66375z"></path></g></g></g></svg>
                        </button>
                    </div>

                    

                    <div class="cidade">
                        ', $criador["cidade"], ' - SP
                    </div>

                </div>';

            $i += 1;
        }
        ?>
    </div>
</body>

</html>