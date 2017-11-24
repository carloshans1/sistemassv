<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI.
 * Data Criação: 30/07/2017
 * Data de Modificação: 30/07/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Arquivo dropdown - php (lista de funcionários da tabela tb_funcionario)
-->

<?php
	//estabelece a conexão com banco de dados
	require_once('db.php');

	//Conecta com o Banco de Dados MySQL usando extensão PDO.
	$objDb = new db();
	$pdo = $objDb->conecta_mysql();
	 
	//Our select statement. This will retrieve the data that we want.
	$sql = "SELECT id_funcionario, nome FROM tb_funcionario ORDER BY nome";
	 
	//Prepare the select statement.
	$stmt = $pdo->prepare($sql);
	 
	//Execute the statement.
	$stmt->execute();
	 
	//Retrieve the rows using fetchAll.
	$tb_funcionario = $stmt->fetchAll();
?>