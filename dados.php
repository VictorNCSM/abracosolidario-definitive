<!DOCTYPE html>
<html>
    <head>
        <title>
            
        </title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, inicial-scale=1" />
        <link rel="stylesheet" type="text/css" href="CSS/dados.css" />
    </head>
    <body>
        <?php
            include("conexao.php");

            session_start();

            $email = $_SESSION['email'];
            $consulta = mysqli_query($conexao,"select * from usuario where email = '$email'");

            $dados = mysqli_fetch_array($consulta);
            $data = $dados["datanasc"];
            $data = str_split($data);

            $ano = $data[0] . $data[1] . $data[2] . $data[3];
            $mes = $data[5] . $data[6];
            $dia = $data[8] . $data[9];

            ?>

            <div id="topo">

            <center><h1><span class="fonte">Seus Dados</span><center><h1>
                
            </div>



            <div id="css"><center>

            <?php

           echo '<b><span class="fonte">ID: </span></b><span class="fonte2">', $dados["id_usuario"], '</span><br/><br/>


            <b><span class="fonte">Nome: </span></b><span class="fonte2">',$dados["nome"], '</span><br/><br/>


            <b><span class="fonte">Email: </span></b><span class="fonte2">', $dados["email"], '</span><br/><br/>

            <b><span class="fonte">Senha: </span></b><span class="fonte2">',$dados["senha"], '</span><br/><br/>


            <b><span class="fonte">Celular: </span></b><span class="fonte2">',$dados["celular"], '</span><br/><br/>

            <b><span class="fonte">Telefone Fixo:</span></b><span class="fonte2">',$dados["telefone_fixo"], '</span><br/><br/>



            <b><span class="fonte">CPF: </span></b><span class="fonte2">',$dados["cpf"], '</span><br/><br/>

            <b><span class="fonte">Dia de nascimento: </span></b><span class="fonte2">',$dia, '</span><br/><br/>

            <b><span class="fonte">Mês de Nascimento: </span></b><span class="fonte2">',$mes, '</span><br/><br/>

            <b> <span class="fonte">Ano de nascimento: </span></b><span class="fonte2">',$ano, '</span><br/><br/>

            <b> <span class="fonte">Rua: </span></b><span class="fonte2">',$dados["rua"], '</span><br/><br/>

            <b><span class="fonte">Bairro: </span></b><span class="fonte2">',$dados["bairro"], '</span><br/><br/>

            <b><span class="fonte">Número: </span></b><span class="fonte2">',$dados["numero"], '</span><br/><br/>

            <b><span class="fonte">Cidade: </span></b><span class="fonte2">',$dados["cidade"], '</span><br/><br/>
            
            <center>
            </div>


             <div id="baixo"><center>



            <a href="alterar.php">Alterar dados</a>';
        ?>

             </center></div>
    </body>
</html>

