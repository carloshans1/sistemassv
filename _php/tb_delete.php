<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI
 * Data Criação: 12/03/2018
 * Data de Modificação: 29/08/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
-->

<?php
  require_once('db.php');
  $tipoacesso = $_POST['tipoacesso']; 
  // USUARIO
  if ($tipoacesso=='usuario') {
    $idreg = $_POST['idreg']; 
    $tabela = "tb_usuarios"; 
    $idtabela = "id"; 
    // remove do banco
    try {
      $objDb = new db();
      $PDO = $objDb->conecta_mysql();
      $sql = "DELETE FROM $tabela WHERE $idtabela = :id";
      $stmt = $PDO->prepare($sql);
      $stmt->bindParam(':id', $idreg, PDO::PARAM_INT);
      $result = 1;
      $result = $stmt->execute();
      echo $stmt->rowCount(); 
      if ( ! $result) {
        echo "Registro removido com sucesso!";
      } else  {
        echo "Erro ao remover " . $stmt->errorInfo();
        print_r();
      }   
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }  
  // SOLICITACAO
  } elseif ($tipoacesso=='solicitacao') {
    $idreg = $_POST['idreg']; 
    $tbsolicitacao = "tb_solicitacao"; 
    $idcolicitacao = "id_solicitacao"; 
    // remove do banco
    try {
      $objDb = new db();
      $PDO = $objDb->conecta_mysql();
      $sql = "DELETE FROM $tbsolicitacao WHERE $idcolicitacao = :id";
      $stmt = $PDO->prepare($sql);
      $stmt->bindParam(':id', $idreg, PDO::PARAM_INT);
      $result = 1;
      $result = $stmt->execute();
      echo $stmt->rowCount(); 
       
      if ( ! $result) {
        echo "Registro removido com sucesso!";
      } else  {
        echo "Erro ao remover " . $stmt->errorInfo();
        print_r();
      }   
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }
  // FUNCIONARIO
  } elseif ($tipoacesso=='funcionario') {
    $idreg = $_POST['idreg']; 
    try {
      $objDb = new db();
      $PDO = $objDb->conecta_mysql();
      $sql = "DELETE FROM tb_funcionario WHERE tb_funcionario.id_funcionario = :id";
      $stmt = $PDO->prepare($sql);
      $stmt->bindParam(':id', $idreg, PDO::PARAM_INT);
      $result = 1;
      $result = $stmt->execute();
      echo $stmt->rowCount(); 
       
      if ( ! $result) {
        echo "Registro removido com sucesso!";
      } else  {
        echo "Erro ao remover " . $stmt->errorInfo();
        print_r();
      }   
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }
  // SETOR
  } elseif ($tipoacesso=='setor') {
    $idreg = $_POST['idreg']; 
    try {
      $objDb = new db();
      $PDO = $objDb->conecta_mysql();
      $sql = "DELETE FROM tb_setor WHERE tb_setor.id_setor = :id";
      $stmt = $PDO->prepare($sql);
      $stmt->bindParam(':id', $idreg, PDO::PARAM_INT);
      $result = 1;
      $result = $stmt->execute();
      echo $stmt->rowCount(); 
       
      if ( ! $result) {
        echo "Registro removido com sucesso!";
      } else  {
        echo "Erro ao remover " . $stmt->errorInfo();
        print_r();
      }   
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }
  } 
?>
