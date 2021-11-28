<?php

    include("conexao.php"); 
    # Coleta de dados do usuário
    session_start();

    $email = $_SESSION["email"];

    $consulta = mysqli_query($conexao, "select * from usuario where email='$email'");

    $dados = mysqli_fetch_array($consulta);

# ====================================
    $buscaid = mysqli_query($conexao, "select max(id_doacao) from doacao");
    # A função mysqli_fetch_row consulta o banco de dados e retorna os IDs registrados nele, colocando num array
    $arrayid = mysqli_fetch_row($buscaid);

    # a posição 0 do array é o último ID digitado
    $id_doacao = $arrayid[0];

 
    # Já que o que desejamos é o ID dessa doação em específico e não da última doação registrada, somaremos +1 e obteremos o ID dessa doação, que ainda será gerado pelo banco 
    $nomeimg = $id_doacao + 1;
    $nome = $_FILES['imagem']['name'];
    $tmp = $_FILES['imagem']['tmp_name'];

    # Designando a extensão do arquivo
    $extensao = substr($nome,-3);

    if ($extensao == "jpg") {
        $extensao = "jpg";
    } elseif ($extensao == "peg") {
        $extensao = "jpeg";
    } elseif ($extensao == "png") {
        $extensao = "png";
    } else {
        echo "O arquivo que você inseriu não é uma imagem";
    }
    # A utilidade do ID da doação é para o nome da imagem, que carregará o ID da doação.
    $imagem = "$nomeimg.$extensao";

    move_uploaded_file($tmp,'imgdoacao/'.$imagem); 

    $quantidade = $_POST["quantidade"];
    $tamanho = $_POST["tamanho"];
    $faixa_etaria = $_POST["faixa_etaria"];
    $retirada = $_POST["retirada"];

    if ($retirada == 1) {
        $rua = "Tupinambás";
        $bairro = "Jardim Nova Belém";
        $cidade = "Francisco Morato";
        $numero = "572";
    } 
    else {
        $rua = $dados["rua"];
        $bairro = $dados["bairro"];
        $cidade = $dados["cidade"];
        $numero = $dados["numero"];
    }

    $escolha = $dados["opcao"];

    if (isset($_POST["descricao"])) {
        $descricao = $_POST["descricao"];
    }
    # Por padrão, começa como disponível
    $id_status = 1;

    $id_sexo = $_POST["sexo"];

    $id_tipo_roupa = $_POST["tipo"];

    $id_cor = $_POST["cor"];

    $id_usuario = $dados["id_usuario"];

    mysqli_query($conexao,"insert into doacao(imagem,quantidade,tamanho,faixa_etaria,retirada,escolha,descricao,id_status,id_sexo,id_tipo_roupa,id_cor,id_usuario,rua,bairro,numero,cidade) values('$imagem','$quantidade','$tamanho','$faixa_etaria','$retirada','$escolha','$descricao','$id_status','$id_sexo','$id_tipo_roupa','$id_cor','$id_usuario','$rua','$bairro','$numero','$cidade')");

    
?>