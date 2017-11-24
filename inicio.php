<!-- 	
 * Autor: Carlos Hans de Oliveira - Gestor de TI 
 * Data Criação: 06/06/2017
 * Data de Modificação: 21/06/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Arquivo menu principal - HTML/PHP
-->

<?php session_start(); // inicia session ?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
	  <!-- Aciona head padrão do sistema-->
    <?php include("_php/head.php") ?>
	</head>
	<body  id="corfundoinicial"> 
		<header>
			<!-- Aciona navbar padrão do sistema -->
			<?php include("_php/navbar.php") ?>
		</header>
		<!--Inicia seção com cor de fundo e imagem-->		
		<section>
			<div align="middle">
				<!--<img src="_img/sedect.png" alt="Logo SEDECT" height="100" width="100">
				<h2 id="sombraletra"> Solicitação </h2> -->
				<img src="_img/sedect.png" alt="Logo SEDECT" height="300" width="350">
			</div>
		</section>		
	</body>
</html>