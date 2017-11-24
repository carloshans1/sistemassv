<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI
 * Data Criação: 27/08/2017
 * Data de Modificação: 29/08/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Arquivo tb_solicitacaostatus - php (inserir no banco de dados)
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
    <title> Andamento-Solicitação</title>
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
 
      $value1 = $_POST['campoa']; //Data Solicitação:
      $value2 = $_POST['campob']; //Status: atual
      $value3 = $_POST['campoc']; //Solicitante:
      $value4 = $_POST['campod']; //Parado no Setor:
      $value5 = $_POST['campoe']; //Descrição da Solicitação:

      $nivel = $_POST['nivelac'];

      $value6 = $_POST['idsolicitacao']; 
      $value7 = $_POST['idstatus']; //Escolha de status
      $value8 = $_POST['obs'];
      $value9 = $_POST['idfun'];
      $value10 = $_POST['idreferencia'];
      $value11 = $_POST['idsetor'];
      $value12 = $_POST['siglausuario'];
      $value13 = $_POST['siglaorigem'];
      $value14 = $_POST['sigladestino'];
      $value15 = $_POST['siglaparado'];
      $value16 = $_POST['aprovadodestino'];
      
      /*echo '<pre>'; print_r(" 1 ".$value1." 2 ".$value2." 3 ".$value3." 4 ".$value4." 5 ".$value5);
      echo '</br>';
      print_r($nivel); 
      echo print_r(" 6".$value6." 7 ".$value7." 8 ".$value8." 9 ".$value9." 10 ".$value10." 11 ".$value11);
      echo '</br>';
      echo print_r(" 12 ".$value12." 13 ".$value13." 14 ".$value14." 15 ".$value15." 16 ".$value16);
      echo '</pre>';*/

      $objDb = new db();
      $PDO = $objDb->conecta_mysql();
      $sql = ''; $mensagem = '';

      //**** Solicitação Origem ****
      if ($value15 == $value13) {
        if ($value12 <> $value13) {
          $mensagem = "Usuario não autorizado, o setor do usuario é diferente do setor origem da solicitação.";
        } elseif ($value2 == 'Aprovado' and $value7 <> 5) {
          $mensagem = "Registro já foi aprovado não pode ser alterado.";
        } elseif ($value2 == 'Cancelado' and $value7 <> 6) {
          $mensagem = "Registro já foi cancelado não pode ser alterado.";          
        
        //Cancelado pelo diretor Origem
        } elseif ($value2 == 'Cancelado' and $value7 == 6 and $nivel > 2) {
          $sql = "UPDATE tb_solicitacao
          SET aprovadosolicitante = 'NÃO', data_aprovadosolicitante = NOW(),
          id_aprovadorsolicitante = $value9, obsaprovadorsolicitante = '$value8',
          `status` = $value7, status_setor = (SELECT sigla FROM tb_setor WHERE tb_setor.id_setor = tb_solicitacao.id_setordestino)
          WHERE id_solicitacao = $value6;";
          $mensagem = "O arquivo foi gravado com sucesso.";

        //Aprovado pelo diretor Origem
        } elseif ($value7 == 5 and $nivel > 2) {
          $sql = "UPDATE tb_solicitacao
          SET aprovadosolicitante = 'SIM', data_aprovadosolicitante = NOW(),
          id_aprovadorsolicitante = $value9, obsaprovadorsolicitante = '$value8',
          `status` = $value7, status_setor = (SELECT sigla FROM tb_setor WHERE tb_setor.id_setor = tb_solicitacao.id_setordestino)
          WHERE id_solicitacao = $value6;";
          $mensagem = "O arquivo foi gravado com sucesso.";
          
        //Não aprovado pelo diretor origem (processo em andamento)
        } elseif ($value2 <> 'Aprovado' and $value7 <> 5 and $nivel > 2) {
          $sql = "UPDATE tb_solicitacao
          SET aprovadosolicitante = 'NÃO', data_aprovadosolicitante = NOW(),
          id_aprovadorsolicitante = $value9, obsaprovadorsolicitante = '$value8',
          `status` = $value7
          WHERE id_solicitacao = $value6;";
          $mensagem = "O arquivo foi gravado com sucesso.";
        }             

      //**** Solicitação Destino ****
      } elseif ($value15 == $value14) {
        if ($value12 <> $value14) {
          $mensagem = "Usuario não autorizado, o setor do usuario é diferente do setor destino.";

        // Aprovado direto destino
        } elseif ($value2 == 'Aprovado' and $value7 == 5 and $nivel > 2) {
          $sql = "UPDATE tb_solicitacao
          SET aprovadodestino = 'SIM', data_aprovadodestino = NOW(),
          id_aprovadordestino = $value9, obsaprovadordestino = '$value8',
          `status` = $value7
          WHERE id_solicitacao = $value6;";
          $mensagem = "O arquivo foi gravado com sucesso.";

        // Em execução        
        } elseif ($value2 == 'Aprovado' and $value7 <> 5 and $value7 <> 2 and $value16 <> 'SIM' and $nivel > 2) {
          $sql = "UPDATE tb_solicitacao
          SET aprovadodestino = 'NÃO', data_aprovadodestino = NOW(),
          id_aprovadordestino = $value9, obsaprovadordestino = '$value8',
          `status` = $value7
          WHERE id_solicitacao = $value6;";
          $mensagem = "O arquivo foi gravado com sucesso.";

        // Analise do diretor destino    
        } elseif ($value7 <> 5 and $value7 <> 2 and $value7 <> 6 and $value16 <> 'SIM' and $nivel > 2) {
          $sql = "UPDATE tb_solicitacao
          SET aprovadodestino = 'NÃO', data_aprovadodestino = NOW(),
          id_aprovadordestino = $value9, obsaprovadordestino = '$value8',
          `status` = $value7
          WHERE id_solicitacao = $value6;";
          $mensagem = "O arquivo foi gravado com sucesso.";

        // Concluido
        } elseif ($value2 == 'Aprovado' and $value7 == 2 and $value16 == 'SIM') {
          $sql = "UPDATE tb_solicitacao
          SET `status` = $value7, id_executante = $value9, 
          possivel_executar = 'SIM', dtPrazo = NOW(), obsexecutante  = '$value8'
          WHERE id_solicitacao = $value6;";
          $mensagem = "O arquivo foi gravado com sucesso.";

        // Aprovado direto destino
        } elseif ($value2 <> 'Aprovado' and $value2 <> 'Concluido' and $value2 <> 'Cancelado' and $value7 == 5 and $nivel > 2) {
          $sql = "UPDATE tb_solicitacao
          SET aprovadodestino = 'SIM', data_aprovadodestino = NOW(),
          id_aprovadordestino = $value9, obsaprovadordestino = '$value8',
          `status` = $value7
          WHERE id_solicitacao = $value6;";
          $mensagem = "O arquivo foi gravado com sucesso.";
        
        // Concluido
        } elseif ($value2 == 'Concluido' and $value7 == 2 and $value16 == 'SIM') {
          $sql = "UPDATE tb_solicitacao
          SET `status` = $value7, id_executante = $value9, 
          possivel_executar = 'SIM', dtPrazo = NOW(), obsfinal  = '$value8'
          WHERE id_solicitacao = $value6;";
          $mensagem = "O arquivo foi gravado com sucesso.";

        //Cancelado pelo diretor destino
        } elseif ($value2 == 'Cancelado' and $value7 == 6 and $nivel > 2) {
          $sql = "UPDATE tb_solicitacao
          SET aprovadodestino = 'NÃO', data_aprovadodestino = NOW(),
          id_aprovadordestino = $value9, obsaprovadordestino = '$value8',
          `status` = $value7
          WHERE id_solicitacao = $value6;";
          $mensagem = "O arquivo foi gravado com sucesso.";

        //Cancelado pelo diretor destino
        } elseif ($value2 <> 'Aprovado' and $value2 <> 'Concluido' and $value7 == 6 and $nivel > 2) {
          $sql = "UPDATE tb_solicitacao
          SET aprovadodestino = 'NÃO', data_aprovadodestino = NOW(),
          id_aprovadordestino = $value9, obsaprovadordestino = '$value8',
          `status` = $value7
          WHERE id_solicitacao = $value6;";
          $mensagem = "O arquivo foi gravado com sucesso.";

        //Ja foi cancelado e não pode alterar status
        } elseif ($value2 == 'Cancelado' and $value7 <> 6) {
          $mensagem = "Registro já foi cancelado não pode ser alterado.";

        //Ja foi concluido e não pode alterar status
        } elseif ($value2 == 'Concluido' and $value7 <> 2  and $value16 == 'SIM') {
          $mensagem = "Registro já foi Concluido não pode ser alterado.";
        }        
      } else {
        $mensagem = "Falha no status do setor, favor contatar o administrador do sistema.";
      }                        

      $result = 1;
      
      if ($mensagem == 'O arquivo foi gravado com sucesso.') {
        $stmt = $PDO->prepare( $sql );
        //$stmt->bindParam( ':campo1', $value7 );
   
                  
        $result = $stmt->execute();

        if ( ! $result ) {
            $result = var_dump( $stmt->errorInfo() );
        } else {
          echo "<script type='text/javascript' language='javascript'>alert('$mensagem'); window.location.href='../_phphtml/consulta_solicitacao.php';</script>";
        }                     
      } else {
        if ($mensagem == '') { $mensagem = "Falha Staus: Não foi possivel atualizar a solicitação."; }

        echo "<script type='text/javascript' language='javascript'>alert('$mensagem'); window.location.href='../_phphtml/consulta_solicitacao.php';</script>";        
      }
    ?>
  </body>
</html>