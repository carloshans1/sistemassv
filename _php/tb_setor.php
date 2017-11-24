<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI
 * Data Criação: 07/06/2017
 * Data de Modificação: 21/06/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Arquivo tb_setor - php (inserir no banco de dados)
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
    	
    	$value1 = isset( $_POST['depto'] ) ? $_POST['depto'] : " ";
      $value2 = isset( $_POST['sigla'] ) ? $_POST['sigla'] : " ";
      $value3 = isset( $_POST['endereco'] ) ? $_POST['endereco'] : " ";
      $value4 = isset( $_POST['bairro'] ) ? $_POST['bairro'] : " ";
      $value5 = isset( $_POST['email'] ) ? $_POST['email'] : " ";					
    	$value6 = isset( $_POST['telefone'] ) ? $_POST['telefone'] : " ";
    	$value7 = isset( $_POST['observacao'] ) ? $_POST['observacao'] : " ";
      //Faz a conversão para inteiro
      $value8 = (int) $_POST['id_referencia'];

    	$objDb = new db();
    	$PDO = $objDb->conecta_mysql();

    	$sql = "INSERT INTO tb_setor(depto, sigla, endereco, bairro, telefone, email, observacao, id_referencia) 
    	VALUES(:depto, :sigla, :endereco, :bairro, :telefone, :email, :observacao, :id_referencia)";
    	$result = 1;
    	$stmt = $PDO->prepare( $sql );
    	$stmt->bindParam( ':depto', $value1 );
      $stmt->bindParam( ':sigla', $value2 );
    	$stmt->bindParam( ':endereco', $value3 );
      $stmt->bindParam( ':bairro', $value4 );          
      $stmt->bindParam( ':email', $value5 );    
    	$stmt->bindParam( ':telefone', $value6 );
    	$stmt->bindParam( ':observacao', $value7 );
    	$stmt->bindParam( ':id_referencia', $value8 );
    	$result = $stmt->execute();

    	if ( ! $result ) {
        	$result = var_dump( $stmt->errorInfo() );
    	} else {
        echo "<script type='text/javascript' language='javascript'>alert('O arquivo foi gravado com sucesso.'); window.location.href='../_phphtml/cadastro_setor.php';</script>";
    	}			 	
    ?>
  </body>
</html>