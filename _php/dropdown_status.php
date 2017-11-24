<!--  
 * Autor: Mauricio Mendes(estagiario nível superior).
 * Colaboradores: Carlos Hans de Oliveira - Gestor de TI
 * Data Criação: 11/10/2017
 * Data de Modificação: 11/10/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Arquivo dropdown - php (lista de status)
-->

<?php
	//estabelece a conexão com banco de dados
	require_once('db.php');

	//Connect to our MySQL database using the PDO extension.
	$objDb = new db();
	$pdo = $objDb->conecta_mysql();
	 
	//Our select statement. This will retrieve the data that we want.
	$sql = "SELECT id_status, status FROM tb_status WHERE id_status > $valor";
	 
	//Prepare the select statement.
	$stmt = $pdo->prepare($sql);
	 
	//Execute the statement.
	$stmt->execute();
	 
	//Retrieve the rows using fetchAll.
	$tb_status = $stmt->fetchAll();
?>