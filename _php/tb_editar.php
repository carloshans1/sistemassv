<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI
 * Data Criação: 07/06/2017
 * Data de Modificação: 21/06/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
-->

<?php
  require_once('db.php');
  $idreg = 0;
  $tipoacesso = $_POST['tipoacesso']; 
  //USUARIO
  if ($tipoacesso=='usuario') {
    $idreg = intval($_POST['idreg']);   

  	$value1 = isset( $_POST['usuario_editar'] ) ? $_POST['usuario_editar'] : ".";
    $value2 = isset( $_POST['senha_editar'] ) ? $_POST['senha_editar'] : ".";
    $value3 = isset( $_POST['email_editar'] ) ? $_POST['email_editar'] : ".";
    $value4 = intval($_POST['nivel_editar']);
    $value5 = intval($_POST['ativo_editar']);					
    //Faz a conversão para inteiro
    $value6 = intval($_POST['id_funcionario_editar']);
    $value2 = md5($value2);

    $datahora = date('Y-m-d H:i:s');      

  	$objDb = new db();
  	$PDO = $objDb->conecta_mysql();

    $sql = "UPDATE tb_usuarios SET tb_usuarios.usuario= '$value1', tb_usuarios.senha= '$value2', tb_usuarios.email='$value3', tb_usuarios.nivel=$value4, tb_usuarios.ativo=$value5, tb_usuarios.dtalteracao=NOW(), tb_usuarios.dtacesso=NOW(), tb_usuarios.id_funcionario=$value6  WHERE tb_usuarios.`id`=$idreg;";

    $result = 1;
  	$stmt = $PDO->prepare( $sql );
  	$result = $stmt->execute();

    if ( ! $result ) {
      $result = var_dump( $stmt->errorInfo() );
      echo "erro: ". $result ;
    } else {
      echo "sucesso";
    } 
  // SOLICITAÇÃO
  } elseif ($tipoacesso=='solicitacao') {
    $idreg = intval($_POST['idregeditar']);   

    $value1 = isset( $_POST['descricao_editar'] ) ? $_POST['descricao_editar'] : "";
    //echo '<pre>'; print_r($value1); echo '<br/>'; echo '</pre>';      
    $objDb = new db();
    $PDO = $objDb->conecta_mysql();

    $sql = "UPDATE tb_solicitacao SET tb_solicitacao.descricao= '$value1' WHERE tb_solicitacao.`id_solicitacao`=$idreg;";
    
    $result = 1;
    $stmt = $PDO->prepare( $sql );
              
    $result = $stmt->execute();

    if ( ! $result ) {
      $result = var_dump( $stmt->errorInfo() );
      echo "erro: ". $result ;
    } else {
      echo "sucesso";
    }       
  // FUNCIONARIO
  } elseif ($tipoacesso=='funcionario') {
    $idreg = intval($_POST['idreg_editar']);   

    $value1 = isset( $_POST['nome_editar'] ) ? $_POST['nome_editar'] : ".";
    $value2 = isset( $_POST['matricula_editar'] ) ? $_POST['matricula_editar'] : ".";
    $value3 = isset( $_POST['cargo_editar'] ) ? $_POST['cargo_editar'] : ".";
    $value4 = isset( $_POST['tipocontratacao_editar'] ) ? $_POST['tipocontratacao_editar'] : ".";
    $value5 = isset( $_POST['email_editar'] ) ? $_POST['email_editar'] : ".";
    $value6 = isset( $_POST['telefone_editar'] ) ? $_POST['telefone_editar'] : ".";
    $value7 = isset( $_POST['whatsapp_editar'] ) ? $_POST['whatsapp_editar'] : ".";
    $value8 = intval($_POST['id_referencia_editar']);
    $value9 = isset( $_POST['slack_editar'] ) ? $_POST['slack_editar'] : ".";
    $value10 = isset( $_POST['observacao_editar'] ) ? $_POST['observacao_editar'] : ".";

    $objDb = new db();
    $PDO = $objDb->conecta_mysql();

    $sql = "UPDATE tb_funcionario SET tb_funcionario.nome= '$value1', tb_funcionario.matricula= '$value2', tb_funcionario.cargo='$value3', tb_funcionario.tipocontratacao='$value4', tb_funcionario.email='$value5', tb_funcionario.telefone='$value6', tb_funcionario.whatsapp='$value7', tb_funcionario.id_referencia=$value8, tb_funcionario.slack='$value9', tb_funcionario.observacao='$value10'  WHERE tb_funcionario.id_funcionario=$idreg;";

    $result = 1;
    $stmt = $PDO->prepare( $sql );
    $result = $stmt->execute();

    if ( ! $result ) {
      $result = var_dump( $stmt->errorInfo() );
      echo "erro: ". $result ;
    } else {
      echo "sucesso";
    } 
  // SETOR
  } elseif ($tipoacesso=='setor') {
    $idreg = intval($_POST['idreg']);   

    $value1 = isset( $_POST['depto_editar'] ) ? $_POST['depto_editar'] : " ";
    $value2 = isset( $_POST['sigla_editar'] ) ? $_POST['sigla_editar'] : " ";
    $value3 = isset( $_POST['endereco_editar'] ) ? $_POST['endereco_editar'] : " ";
    $value4 = isset( $_POST['bairro_editar'] ) ? $_POST['bairro_editar'] : " ";
    $value5 = isset( $_POST['telefone_editar'] ) ? $_POST['telefone_editar'] : " ";         
    $value6 = isset( $_POST['email_editar'] ) ? $_POST['email_editar'] : " ";
    $value7 = isset( $_POST['observacao_editar'] ) ? $_POST['observacao_editar'] : " ";
    $value8 = intval( $_POST['id_referencia_editar'] );

    $objDb = new db();
    $PDO = $objDb->conecta_mysql();

    $sql = "UPDATE tb_setor SET tb_setor.depto= '$value1', tb_setor.sigla= '$value2', tb_setor.endereco='$value3', tb_setor.bairro='$value4', tb_setor.telefone='$value5', tb_setor.email='$value6', tb_setor.observacao='$value7', tb_setor.id_referencia=$value8 WHERE tb_setor.id_setor=$idreg;";

    $result = 1;
    $stmt = $PDO->prepare( $sql );
    $result = $stmt->execute();

    if ( ! $result ) {
      $result = var_dump( $stmt->errorInfo() );
      echo "erro: ". $result ;
    } else {
      echo "sucesso";
    } 
  }
?>
