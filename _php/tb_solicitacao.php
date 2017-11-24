<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI
 * Data Criação: 27/08/2017
 * Data de Modificação: 29/08/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Arquivo tb_solicitacao - php (inserir no banco de dados)
-->

<?php
  session_start();
  //if (!empty($_SESSION['verifylogin']) && $_SESSION['verifylogin'] == false) {
  //  header("Location: ../_php/acesso/logout.php"); exit; // Redireciona o visitante
  //}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Cadastrar Setor</title>
    <!-- Aciona head padrão do sistema-->
    <?php include("../_php/head2.php") ?>
  </head>
  <!--Espaço do Nav Bar (menu principal)  style="background-color: #E6E8FA"-->
  <body  style="background-color: #D9D9F3;">
    <header>
      <!-- Aciona navbar padrão do sistema-->
      <?php include("../_php/navbar2.php"); ?>
    </header>
    <?php
    	require_once('db.php');

    	$value1 = $_POST['data'];
      $value2 = $_POST['id_solicitante'];
      $value3 = isset( $_POST['descricao'] ) ? $_POST['descricao'] : "";
      $value4 = $_POST['status'];      
      $value5 = $_POST['status_setor'];
      $value6 = $_POST['id_setordestino'];
      

    	$objDb = new db();
    	$PDO = $objDb->conecta_mysql();

    	$sql = "INSERT INTO tb_solicitacao(`data`, id_solicitante, descricao, status, status_setor, id_setordestino) 
      VALUES(:data, :id_solicitante, :descricao, :status, :status_setor, :id_setordestino)";

    	$result = 1;
    	$stmt = $PDO->prepare( $sql );
    	$stmt->bindParam( ':data', $value1 );
      $stmt->bindParam( ':id_solicitante', $value2 );
    	$stmt->bindParam( ':descricao', $value3 );
      $stmt->bindParam( ':status', $value4 );
      $stmt->bindParam( ':status_setor', $value5 );
      $stmt->bindParam( ':id_setordestino', $value6 ); 
                
    	$result = $stmt->execute();

    	if ( ! $result ) {
        	$result = var_dump( $stmt->errorInfo() );
    	} else {
        echo "<script type='text/javascript' language='javascript'>alert('O arquivo foi gravado com sucesso.'); window.location.href='../_phphtml/cadastro_solicitacao.php';</script>";
    	}			 	
    ?>
  </body>
</html>