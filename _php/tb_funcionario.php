<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI
 * Data Criação: 07/06/2017
 * Data de Modificação: 21/06/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Arquivo tb_setor - php (inserir no banco de dados)
-->

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
    	
    	$value1 = isset( $_POST['nome'] ) ? $_POST['nome'] : " ";
      $value2 = isset( $_POST['matricula'] ) ? $_POST['matricula'] : " ";
      $value3 = isset( $_POST['cargo'] ) ? $_POST['cargo'] : " ";
      $value4 = isset( $_POST['tipocontratacao'] ) ? $_POST['tipocontratacao'] : " ";
      $value5 = isset( $_POST['email'] ) ? $_POST['email'] : " ";					
    	$value6 = isset( $_POST['telefone'] ) ? $_POST['telefone'] : " ";
      $value7 = isset( $_POST['whatsapp'] ) ? $_POST['whatsapp'] : " ";
    	$value8 = isset( $_POST['observacao'] ) ? $_POST['observacao'] : " ";
      //Faz a conversão para inteiro
      $value9 = (int) $_POST['id_referencia'];
      $value10 = isset( $_POST['slack'] ) ? $_POST['slack'] : " ";
      $value11 = isset( $_POST['trello'] ) ? $_POST['trello'] : " ";

    	$objDb = new db();
    	$PDO = $objDb->conecta_mysql();

    	$sql = "INSERT INTO tb_funcionario(nome, matricula, cargo, tipocontratacao, email, telefone, whatsapp, observacao, slack, trello, id_referencia) 
    	VALUES(:nome, :matricula, :cargo, :tipocontratacao, :email, :telefone, :whatsapp, :observacao, :slack, :trello, :id_referencia)";
    	$result = 1;
    	$stmt = $PDO->prepare( $sql );
    	$stmt->bindParam( ':nome', $value1 );
      $stmt->bindParam( ':matricula', $value2 );
    	$stmt->bindParam( ':cargo', $value3 );
      $stmt->bindParam( ':tipocontratacao', $value4 );          
      $stmt->bindParam( ':email', $value5 );    
    	$stmt->bindParam( ':telefone', $value6 );
    	$stmt->bindParam( ':whatsapp', $value7 );
      $stmt->bindParam( ':observacao', $value8 );
      $stmt->bindParam( ':id_referencia', $value9 );
      $stmt->bindParam( ':slack', $value10 );
      $stmt->bindParam( ':trello', $value11 );
    	$result = $stmt->execute();

    	if ( ! $result ) {
        	$result = var_dump( $stmt->errorInfo() );
    	} else {
        echo "<script type='text/javascript' language='javascript'>alert('O arquivo foi gravado com sucesso.'); window.location.href='../_html-php/cadastro_funcionario.php';</script>";
    	}			 	
    ?>
  </body>
</html>