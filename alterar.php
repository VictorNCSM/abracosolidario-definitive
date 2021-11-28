    <?php

    include("backend/conexao.php");
    session_start();

    $email = $_SESSION["email"];

    $consulta = mysqli_query($conexao, "select * from usuario where email = '$email'");

    $dados = mysqli_fetch_array($consulta);
    $data = $dados["datanasc"];
    $data = str_split($data);

    $ano = $data[0].$data[1].$data[2].$data[3];
    $mes = $data[5].$data[6];
    $dia = $data[8].$data[9];

    $cidade = $dados["cidade"];

?>


 <!DOCTYPE html>
 <html>

 <head>
     <title></title>


     <style type="text/css">
         #cidade {
             width: 250px;
         }

         @font-face {
             font-family: "Antapani";
             src: url("fontes/Antapani-ExtraBold.otf");
         }

         @font-face {
             font-family: "Nunito";
             src: url("fontes/Nunito-Regular.ttf");
         }

        #fonte2 {
            font-family: "Nunito";
        }

         #fonte {
             font-family: "Antapani";

         }

        .largura {

            width: 300px;  
        }

        #geral {
            width: 80%;
            margin-left: 4%;
            margin-top: 20px;
        }

     </style>

     <script type="text/javascript">
         function myFunction() {
             var x = document.getElementById("senha");
             if (x.type === "password") {
                 x.type = "text";
             } else {
                 x.type = "password";
             }
         }
     </script>

    <meta charset="utf-8"/>
</head>
 <body>
     <span id="fonte">
        <div id="geral">
            <form method="POST" action="gravar.php">
                <?php
                    echo '
                    Id:<br>
                    <input type="text" class="largura" name="id" readonly value="' . $dados['id_usuario'] . '"><br><br>

                    Nome:<br>
                    <input type="text" class="largura" name="nome" value="' . $dados["nome"] . '"><br><br>

                    Email:<br>
                    <input type="text" class="largura" name="email" value="' . $dados["email"] . '"><br><br>

                    Senha:<br>
                    <input type="password"  class="largura" name="senha" id="senha" value="' . $dados["senha"] . '">
                    <span id="fonte2">
                    <input type="checkbox" onclick="myFunction()" >Mostrar a senha</input></span>
                    <br><br>

                    Celular:<br>
                    <input type="text" class="largura" name="celular" value="' . $dados["celular"] . '"> <br><br>

                    Telefone:<br>
                    <input type="text" class="largura" name="telefone_fixo" value="' . $dados["telefone_fixo"] . '"><br><br>

                    CPF:<br>
                    <input type="text" class="largura" name="cpf" value="' . $dados["cpf"] . '"><br><br>

                    Dia de nascimento:<br>
                    <select name="dia" required="required">
                    <option selected="selected" value="">Selecione</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>

                    </select><br><br>

                    Mês de nascimento:<br>
                    <select name="mes" id="mes" required>
                        <option selected value="">Selecione</option>
                        <option value=1>Janeiro</option>
                        <option value=2>Fevereiro</option>
                        <option value=3>Março</option>
                        <option value=4>Abril</option>
                        <option value=5>Maio</option>
                        <option value=6>Junho</option>
                        <option value=7>Julho</option>
                        <option value=8>Agosto</option>
                        <option value=9>Setembro</option>
                        <option value=10>Outubro</option>
                        <option value=11>Novembro</option>
                        <option value=12>Dezembro</option>
                    </select> 

                    <br/><br/>
                    
                    Ano de nascimento:<br>
                    <input type="text" class="largura" name="ano" value="' . $ano . '"><br><br>

                    Rua:<br>
                    <input type="text" class="largura" name="rua" width=200px value="' . $dados["rua"] . '"><br><br>

                    Bairro:<br>
                    <input type="text" class="largura" name="bairro" value="' . $dados["bairro"] . '"><br><br>

                    Número:<br>
                    <input type="text" class="largura" name="numero" value="' . $dados["numero"] . '"><br><br>

                    Cidade:<br>
                    <input name="cidade" class="largura" id="cidade" value="' . $cidade . '"><br><br>

                    CEP:<br>
                    <input type="text" class="largura" name="cep" value="' . $dados["cep"] . '"><br><br>

                    Ativo:<br>
                    <select name="ativo" id="ativo" required>
                        <option selected value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                    <br><br>

                    <input type="submit" value="Enviar">';
                    ?>
        </span>
        </form>
    </div>
 </body>
