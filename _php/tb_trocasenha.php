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
    <title>Alterar Senha</title>
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

    	$value1 = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : 0;
      $value2 = isset( $_POST['senha'] ) ? $_POST['senha'] : "";
      $value3 = isset( $_POST['novasenha'] ) ? $_POST['novasenha'] : "";
      $value2 = md5($value2);
      $value3 = md5($value3);

      if ( empty($value3) || empty($value2)) {
        echo "<script type='text/javascript' language='javascript'>alert('Favor digitar a nova senha.'); window.location.href='../_phphtml/alterar_senha.php';</script>";             
      }

    	$objDb = new db();
    	$PDO = $objDb->conecta_mysql();

      $sql = "SELECT `id`, `usuario`, `senha` FROM `tb_usuarios` WHERE (`id`='$value1')";
      $stmt = $PDO->prepare( $sql );
      $stmt->execute();
      $tb_query = $stmt->fetchAll();

      if ( ! empty( $tb_query ) && ($value2 == $tb_query[0]['senha']) ) {

      	$sql = "UPDATE `tb_usuarios` SET `senha`='$value3' WHERE (`id`='$value1')";

        $result = 1;
      	$stmt = $PDO->prepare( $sql );
      	$result = $stmt->execute();

      	if ( ! $result ) {
          	$result = var_dump( $stmt->errorInfo() );
      	} else {
          echo "<script type='text/javascript' language='javascript'>alert('Senha alterada com sucesso.'); window.location.href='../inicio.php';</script>";    	
        }			 	
      } else {
          echo "<script type='text/javascript' language='javascript'>alert('Senha atual incorreta, favor digitar novamente.'); window.location.href='../_phphtml/alterar_senha.php';</script>";             
      }
    ?>
  </body>
</html>