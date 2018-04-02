<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI
 * Data Criação: 07/06/2017
 * Data de Modificação: 21/06/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
-->

<?php
  require_once('db.php');
  $tipoacesso = $_POST['tipoacesso']; 
  //USUARIO
  if ($tipoacesso=='usuario') {
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
      echo "erro: ". $result ;
    } else {
      echo "sucesso";
    } 
  // SOLICITAÇÃO
  } elseif ($tipoacesso=='solicitacao') {
    $value1 = $_POST['data'];
    $value2 = $_POST['id_solicitante'];
    $value3 = isset( $_POST['descricao'] ) ? $_POST['descricao'] : "";
    $value4 = $_POST['status'];
    $value5 = $_POST['status_setor'];
    $value6 = $_POST['id_setordestino'];
    //echo '<pre>'; print_r($value1); echo '<br/>'; echo '</pre>';      
    $objDb = new db();
    $PDO = $objDb->conecta_mysql();

    $sql = "INSERT INTO tb_solicitacao(`data`, id_solicitante, descricao, `status`, status_setor, id_setordestino) 
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
      echo "erro: ". $result ;
    } else {
      echo "sucesso";
    }       
  // FUNCIONARIO
  } elseif ($tipoacesso=='funcionario') {
    $value1 = isset( $_POST['nome'] ) ? $_POST['nome'] : " ";
    $value2 = intval($_POST['matricula']);
    $value3 = isset( $_POST['cargo'] ) ? $_POST['cargo'] : " ";
    $value4 = isset( $_POST['tipocontratacao'] ) ? $_POST['tipocontratacao'] : " ";
    $value5 = isset( $_POST['email'] ) ? $_POST['email'] : " ";         
    $value6 = isset( $_POST['telefone'] ) ? $_POST['telefone'] : " ";
    $value7 = isset( $_POST['whatsapp'] ) ? $_POST['whatsapp'] : " ";
    $value8 = isset( $_POST['observacao'] ) ? $_POST['observacao'] : " ";
    //Faz a conversão para inteiro
    $value9 = (int) $_POST['id_referencia'];
    $value10 = isset( $_POST['slack'] ) ? $_POST['slack'] : " ";

    $objDb = new db();
    $PDO = $objDb->conecta_mysql();

    $sql = "INSERT INTO tb_funcionario(nome, matricula, cargo, tipocontratacao, email, telefone, whatsapp, observacao, slack, id_referencia) VALUES(:nome, :matricula, :cargo, :tipocontratacao, :email, :telefone, :whatsapp, :observacao, :slack, :id_referencia)";

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
              
    $result = $stmt->execute();

    if ( ! $result ) {
      $result = var_dump( $stmt->errorInfo() );
      echo "erro: ". $result ;
    } else {
      echo "sucesso";
    }       
  // SETOR
  } elseif ($tipoacesso=='setor') {
    $value1 = isset( $_POST['depto_novo'] ) ? $_POST['depto_novo'] : " ";
    $value2 = isset( $_POST['sigla_novo'] ) ? $_POST['sigla_novo'] : " ";
    $value3 = isset( $_POST['endereco_novo'] ) ? $_POST['endereco_novo'] : " ";
    $value4 = isset( $_POST['bairro_novo'] ) ? $_POST['bairro_novo'] : " ";
    $value5 = isset( $_POST['telefone_novo'] ) ? $_POST['telefone_novo'] : " ";         
    $value6 = isset( $_POST['email_novo'] ) ? $_POST['email_novo'] : " ";
    $value7 = isset( $_POST['observacao_novo'] ) ? $_POST['observacao_novo'] : " ";
    $value8 = intval( $_POST['id_referencia_novo'] );

    $objDb = new db();
    $PDO = $objDb->conecta_mysql();

    $sql = "INSERT INTO tb_setor(depto, sigla, endereco, bairro, telefone, email, observacao, id_referencia) VALUES(:depto, :sigla, :endereco, :bairro, :telefone, :email, :observacao, :id_referencia)";

    $result = 1;
    $stmt = $PDO->prepare( $sql );
    $stmt->bindParam( ':depto', $value1 );
    $stmt->bindParam( ':sigla', $value2 );
    $stmt->bindParam( ':endereco', $value3 );
    $stmt->bindParam( ':bairro', $value4 );          
    $stmt->bindParam( ':telefone', $value5 );
    $stmt->bindParam( ':email', $value6 );    
    $stmt->bindParam( ':observacao', $value7 );
    $stmt->bindParam( ':id_referencia', $value8 );
              
    $result = $stmt->execute();

    if ( ! $result ) {
      $result = var_dump( $stmt->errorInfo() );
      echo "erro: ". $result ;
    } else {
      echo "sucesso";
    }       
  }
?>
