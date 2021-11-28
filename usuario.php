<!DOCTYPE html>
<html lang="pt-br">
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, inicial-scale=1" />
	<link rel="stylesheet" type="text/css" href="css/usuario.css" media="screen">
	<title>Abraço - Usuário</title>
</head>


<style type="text/css">
	@font-face {
		font-family: "Antapani";
		src: url("fontes/Antapani-ExtraBold.otf");
	}

	@font-face {
		font-family: "Nunito";
		src: url("fontes/Nunito-Regular.ttf");
	}

	#titulo {

		color: #003889;
		font-size: 3em
	}


	#main {

		margin-left: 20px;
		display: flex;

	}

	#doacao {

		width: 25%;
		background-color: #003889;
		color: white;
		border-radius: 13px;
		font-size: 20px;
		font-family: sans-serif;
		border-color: white;





	}

	#dados {

		width: 25%;
		background-color: #003889;
		color: white;
		border-radius: 13px;
		font-size: 20px;
		font-family: sans-serif;
		border-color: white;



	}

	#interesse {

		width: 25%;
		background-color: #003889;
		color: white;
		border-radius: 13px;
		font-size: 20px;
		font-family: sans-serif;

		border-color: white;



	}

	#mensagem {

		width: 25%;
		background-color: #ff0000;
		color: white;
		border-radius: 13px;
		font-size: 20px;
		font-family: sans-serif;
		border-color: white;


	}

	#texto {


		display: flex;

	}

	h1 {

		font-family: "Antapani";
		width: 25%;
	}

	img {
		height: 128px;
	}

	.fonte2 {
		font-family: "Nunito";
	}
</style>


<body style="background-image: url('imagens/banner.png');background-size:100%;background-repeat: no-repeat;">

	<center>
		<h1 id="titulo">Página do Usuário</h1>
	</center>


	<div id="main">


		<?php

		session_start();
		if (empty($_SESSION["email"])) {
			echo '<span class="fonte2">Você não está logado. <a href="login.html">Logue-se primeiro</a>.</span>';
		} else {
			echo '<button id="doacao" onclick="window.location.href=\'formdoacao.html\';"><img src="imagens/moletom-com-capuz.png"></button>

            <button id="dados" onclick="window.location.href=\'dados.php\';"><img src="imagens/pesquisando-dados-no-banco-de-dados.png"></button>

            <button id="interesse" onclick="window.location.href=\'doacao-user.php\';"><img src="imagens/interativo.png"></button>

            <button id="mensagem" onclick="window.location.href=\'backend/sair.php\';"><img src="imagens/macbook.png"></button>';
		}
		?>

		</A>

	</div>
</body>

</html>