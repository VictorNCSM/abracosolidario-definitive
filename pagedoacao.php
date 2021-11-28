<?php
include("backend/conexao.php");
session_start();

$id = $_GET["id"];

$consulta = mysqli_query($conexao, "select * from doacao where id_doacao='$id'");
$doacao = mysqli_fetch_array($consulta);

# Criador da doação
$id_vendedor = $doacao["id_usuario"];
$consultavendedor = mysqli_query($conexao, "select * from usuario where id_usuario='$id_vendedor'");
$vendedor = mysqli_fetch_array($consultavendedor);

if ($doacao["quantidade"] > 1) {

    if ($doacao["id_tipo_roupa"] == 1) {
        $tipo = "camisetas";
    } elseif ($doacao["id_tipo_roupa"] == 2) {
        $tipo = "shorts";
    } elseif ($doacao["id_tipo_roupa"] == 3) {
        $tipo = "calças moletom";
    } elseif ($doacao["id_tipo_roupa"] == 4) {
        $tipo = "calças jeans";
    } elseif ($doacao["id_tipo_roupa"] == 5) {
        $tipo = "camisetas manga longa";
    } elseif ($doacao["id_tipo_roupa"] == 6) {
        $tipo = "blusas de moletom";
    } else {
        $tipo = "jacos";
    }
} else {
    if ($doacao["id_tipo_roupa"] == 1) {
        $tipo = "camiseta";
    } elseif ($doacao["id_tipo_roupa"] == 2) {
        $tipo = "short";
    } elseif ($doacao["id_tipo_roupa"] == 3) {
        $tipo = "calça  moletom";
    } elseif ($doacao["id_tipo_roupa"] == 4) {
        $tipo = "calça jeans";
    } elseif ($doacao["id_tipo_roupa"] == 5) {
        $tipo = "camiseta manga longa";
    } elseif ($doacao["id_tipo_roupa"] == 6) {
        $tipo = "blusa de moletom";
    } else {
        $tipo = "jaco";
    }
}

if ($doacao["faixa_etaria"] == 0) {
    $faixa = "Infantil";
} else {
    $faixa = "Adulto";
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, inicial-scale=1" />
    <style type="text/css">
        @font-face {
            font-family: "Antapani";
            src: url("fontes/Antapani-ExtraBold");
        }

        @font-face {
            font-family: "Nunito";
            src: url("fontes/Nunito-Regular.ttf");
        }
    

        #geral{
            width: 101%;
            margin-left: 0px;
            top: 0px;
            padding-bottom: 50px;
        }   

        #imagem-box {
            background-color: black;
            opacity: 0.7;
            height: 375px;
        }

        #imagem {
            text-align: center;
        }

        #doacao {
            font-family: "Antapani";
            margin-left: 30px;
            margin-bottom: 35px;
        }

        .botao {
            margin-left: 1100px;
            margin-top: -80px;
            float: left;
            height: 65px;
            width: 65px;
            background-color: red;
            border: none;
            border-radius: 7.5px;
        }

        .box {
            border-style: solid;
            border-color: #2b3fb1;
            margin-top: 15px;
            margin-left: 30px;
            width: 70%;
            border-radius: 7px;
            padding-top: 12px;
            padding-left: 15px;
            padding-bottom: 12px;
        }

        #box1 {
            border-style: solid;
            border-color: #2b3fb1;
            margin-top: 55px;
            margin-left: 30px;
            width: 70%;
            border-radius: 7px;
            padding-top: 12px;
            padding-left: 15px;
            padding-bottom: 12px;
        }

        .titulo-box {
            font-family: "Antapani";
            font-size: 17pt;
            margin-bottom: 15px;
        }

        .info {
            font-family: "Antapani";
            font-size: 14pt;
            margin-bottom: 2px;
        }

        .texto-padrao {
            font-family: "Nunito";
        }

        .texto-ausente {
            font-family: "Nunito";
            color: #696969;
        }

        #box-usuario {
            margin-top: 15px;
            border-style: solid;
            border-color: black;
            margin-left: 30px;
            width: 90%;
            border-radius: 7px;
            padding-top: 12px;
            padding-left: 15px;
            padding-bottom: 12px;
        }
    </style>
    <meta charset="utf-8"/>
    <title>Abraço Solidário</title>
</head>

<body>
    <div id="geral">

        <div id="imagem-box">

            <div id="imagem">
                <?php
                echo '<img id="imagem" src="imgdoacao/' . $doacao["imagem"] . '" height=375px>';
                ?>
            </div>

        </div>

        <div id="doacao">
            <?php
            echo '<h1><span class="fonte">Doação de ' . $doacao["quantidade"] . ' de  ' . $tipo . '</span></h1>';
            ?>
        </div>


        <div id="box1">
            <div class="titulo-box">Informações</div>

            <div class="info">
                Quantidade:
                <?php
                echo '<span class="texto-padrao">' . $doacao["quantidade"] . '</span>';
                ?>
            </div>

            <div class="info">
                Tamanho da roupa:
                <?php
                echo '<span class="texto-padrao">' . $doacao["tamanho"] . '</span>';
                ?>
            </div>

            <div class="info">
                Faixa etária:
                <?php
                echo '<span class="texto-padrao">' . $faixa . '</span>';
                ?>
            </div>

            <div class="info">
                Endereço:
                <?php
                    if($doacao["rua"] == "Tupinambás"){
                        echo '<span class="texto-padrao"> Rua Tupinambás, 572 - Jardim Nova Belém (Francisco Morato-SP)';
                    } else {
                        
                        if ($vendedor["autorizacao"] == 1) {
                            echo '<span class="texto-padrao">Rua ' . $vendedor["rua"] . ', ' . $vendedor["numero"] . ' - ' . $vendedor["bairro"] . ' (', $vendedor["cidade"], '-SP)</span>';
                        } else {
                            echo '<span class="texto-ausente">O usuário optou por não revelar seu endereço</span>';
                        }
                    }
                    
                ?>
            </div>

            <div class="info">
                Descrição:
                <?php
                echo '<span class="texto-padrao">' . $doacao["descricao"] . '</span>';
                ?>
            </div>

        </div>

        <div class="box">
            <div class="titulo-box">Dados do usuário</div>

            <div class="info">
                Nome:
                <?php
                echo '<span class="texto-padrao">' . $vendedor["nome"] . '</span>';
                ?>
            </div>

            <div class="info">
                Email:
                <?php
                echo '<span class="texto-padrao">' . $vendedor["email"] . '</span>';
                ?>
            </div>

            <div class="info">
                Telefone:
                <?php
                    if($vendedor["telefone_fixo"] == ""){
                        echo '<span class="texto-ausente"> O usuário não cadastrou um número de telefone fixo</span>';
                    }else {
                        if(isset($vendedor["telefone_fixo"])){
                            echo '<span class="texto-padrao">' . $vendedor["telefone_fixo"] . '</span>';
                        }
                    }
                    
                ?>
            </div>

            <div class="info">
                Celular:
                <?php
                echo '<span class="texto-padrao">' . $vendedor["celular"] . '</span>';
                ?>
            </div>

            <div class="info">
                Cidade:
                <?php
                if ($vendedor["autorizacao"] == "0") {
                    echo '<span class="texto-ausente">O usuário optou por não exibir seus dados.</span>';
                } else {
                    echo '<span class="texto-padrao">' . $vendedor["cidade"] . '</span>';
                }
                ?>
            </div>

            <div class="info">
                Bairro:
                <?php
                if ($vendedor["autorizacao"] == "0") {
                    echo '<span class="texto-ausente">O usuário optou por não exibir seus dados.</span>';
                } else {
                    echo '<span class="texto-padrao">' . $vendedor["bairro"] . '</span>';
                }
                ?>
            </div>

            <div class="info">
                Rua:
                <?php
                if ($vendedor["autorizacao"] == "0") {
                    echo '<span class="texto-ausente">O usuário optou por não exibir seus dados.</span>';
                } else {
                    echo '<span class="texto-padrao">' . $vendedor["rua"] . ', ' . $vendedor["numero"] . '</span>';
                }
                ?>
            </div>


        </div>
    </div>
</body>

</html>