<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI
 * Data Criação: 07/06/2017
 * Data de Modificação: 21/06/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Arquivo tb_usuario - php (inserir no banco de dados)
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
    <title>Cadastrar Usuario</title>
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

    	$value1 = isset( $_POST['usuario'] ) ? $_POST['usuario'] : ".";
      $value2 = isset( $_POST['senha'] ) ? $_POST['senha'] : ".";
      $value3 = isset( $_POST['email'] ) ? $_POST['email'] : ".";
      $value4 = isset( $_POST['nivel'] ) ? $_POST['nivel'] : ".";
      $value5 = isset( $_POST['ativo'] ) ? $_POST['ativo'] : ".";					
      //Faz a conversão para inteiro
      $value6 = $_POST['id_funcionario'];
      $value2 = md5($value2);

      $datahora = date('Y-m-d H:i:s');      

    	$objDb = new db();
    	$PDO = $objDb->conecta_mysql();

    	$sql = "INSERT INTO `tb_usuarios` (`usuario`, `senha`, `email`,  `nivel`, `ativo`, `dtcadastro`, `dtalteracao`, `dtacesso`, `id_funcionario`) 
    	VALUES(:usuario, :senha, :email, :nivel, :ativo, :dtcadastro, :dtalteracao, :dtacesso, :id_funcionario)";

      $result = 1;
    	$stmt = $PDO->prepare( $sql );
    	$stmt->bindParam( ':usuario', $value1 );
      $stmt->bindParam( ':senha', $value2 );
    	$stmt->bindParam( ':email', $value3 );
      $stmt->bindParam( ':nivel', $value4 );          
      $stmt->bindParam( ':ativo', $value5 );    
    	$stmt->bindParam( ':id_funcionario', $value6 );
      $stmt->bindParam( ':dtcadastro', $datahora );
      $stmt->bindParam( ':dtalteracao', $datahora );
      $stmt->bindParam( ':dtacesso', $datahora );
    	$result = $stmt->execute();

    	if ( ! $result ) {
        	$result = var_dump( $stmt->errorInfo() );
    	} else {
        echo "<script type='text/javascript' language='javascript'>alert('O arquivo foi gravado com sucesso.'); window.location.href='../_phphtml/cadastro_usuario.php';</script>";    	
      }			 	
    ?>
  </body>
</html>