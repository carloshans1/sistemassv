<!--  
* Autor: Carlos Hans de Oliveira - Gestor de TI
* Apoio: Mauricio - Estagiario de programação
* Data Criação: 06/07/2017
* Data de Modificação: 06/07/2017
* Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
* Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
* Arquivo tb_setor - php (inserir no banco de dados)
-->

<?php
  //fetch()   Retorna a próxima linha do resultado.
  //fetchAll()  Retorna um array com todos os resultados.
  //fetchObject()   Retorna a próxima linha do resultado como objeto.
  //fetchColumn()   Retorna uma coluna da próxima linha do resultado.

  //Função para fornecer o query da tabela setor
  function sqlquery($tipo, $idref, $nivelacesso) {    
    $solicitacao = "SELECT so.`data` as `Data_Solicitacao`, (SELECT `status` from  tb_status WHERE id_status = so.`status`) as `Status`, so.`status_setor` as `Parado_Setor`, 
  fu.nome as Solicitante, seo.depto as Depto_Origem, seo.sigla as Sigla_Origem, so.descricao as Descricao_Solicitacao, 
  so.aprovadosolicitante as `Aprovado_Diretor_Sol`, so.data_aprovadosolicitante as `Data_Aprovacao_Sol`, 
  dirso.nome as `Diretor_Sol`, so.obsaprovadorsolicitante as Obs_Aprovador_Sol,
  sed.depto as Depto_Destino, sed.sigla as Sigla_Destino, so.aprovadodestino as `Aprovado_Diretor_Des`, 
  so.data_aprovadodestino as `Data_Aprovado_Destino`, dirdes.nome as `Diretor_Des`,
  so.obsaprovadordestino as Obs_Aprovador_Destino, exec.nome as Nome_Executante, 
  so.possivel_executar as Possivel_Executar, so.dtPrazo as Prazo_Execucao, so.obsexecutante as Obs_Executante, 
  so.obsfinal as Obs_Final, so.id_solicitacao as id_sol, so.`status` as `idstatus`
      FROM tb_solicitacao as so
      INNER JOIN tb_funcionario as fu ON so.id_solicitante = fu.id_funcionario
      INNER JOIN tb_setor as sed ON so.id_setordestino = sed.id_setor
      INNER JOIN tb_setor as seo ON fu.id_referencia = seo.id_setor
      LEFT JOIN tb_funcionario as dirso ON so.id_aprovadorsolicitante = dirso.id_funcionario
      LEFT JOIN tb_funcionario as dirdes ON so.id_aprovadordestino = dirdes.id_funcionario
      LEFT JOIN tb_funcionario as exec ON so.id_executante = exec.id_funcionario";

    $sql="";
    if ( $tipo == 'setor' ) {
      $sql = "SELECT depto, sigla, endereco, bairro, telefone, email, observacao, id_referencia, id_setor FROM tb_setor ORDER BY depto;";      
    }
    elseif ( $tipo == 'usuario' ) {
      $sql = "SELECT id, usuario, senha, email, nivel, ativo, dtcadastro, dtalteracao, dtacesso, id_funcionario FROM tb_usuarios ORDER BY usuario";      
    }
    elseif ( $tipo == 'funcionario' ) {
      $sql = "SELECT f.nome,f.matricula,f.cargo,f.tipocontratacao,f.email,f.telefone,f.whatsapp,f.observacao,f.slack,tb_setor.depto,tb_setor.sigla,f.id_funcionario,f.id_referencia FROM tb_funcionario as f INNER JOIN tb_setor ON f.id_referencia = tb_setor.id_setor ORDER BY nome";
    }
    elseif ( $tipo == 'solicitacao1' ) {
      $sql = $solicitacao;
      if ( $nivelacesso < 4 ) {
        $sql .= "  ##Filtrar somente as solicitações referente ao setor do funcionario nivel administrador
          WHERE (fu.id_referencia = $idref OR so.id_setordestino = $idref) AND (SELECT `status` from  tb_status WHERE id_status = so.`status`) <> 'Cancelado' AND 
            (SELECT `status` from  tb_status WHERE id_status = so.`status`) <> 'Concluido'";        
      } else {
        $sql .= "  ##Filtrar somente as solicitações referente ao setor do funcionario nivel comum
          WHERE (SELECT `status` from  tb_status WHERE id_status = so.`status`) <> 'Cancelado' AND 
          (SELECT `status` from  tb_status WHERE id_status = so.`status`) <> 'Concluido';";
      }
    } // CONCLUIDO
    elseif ( $tipo == 'solicitacao2' ) {
      $sql = $solicitacao;
      if ( $nivelacesso < 4 ) {
        $sql .= "  ##Filtrar somente as solicitações referente ao setor do funcionario nivel administrador   
        WHERE (fu.id_referencia = $idref OR so.id_setordestino = $idref) AND (SELECT `status` from  tb_status WHERE id_status = so.`status`) = 'Concluido';";        
      } else {
        $sql .= "  ##Filtrar somente as solicitações referente ao setor do funcionario nivel comum
          WHERE (SELECT `status` from  tb_status WHERE id_status = so.`status`) = 'Concluido';";
      }      
    } // CANCELADO
    elseif ( $tipo == 'solicitacao3' ) {
      $sql = $solicitacao;
      if ( $nivelacesso < 4 ) {
        $sql .= "  ##Filtrar somente as solicitações referente ao setor do funcionario nivel administrador
        WHERE (fu.id_referencia = $idref OR so.id_setordestino = $idref) AND (SELECT `status` from  tb_status WHERE id_status = so.`status`) = 'Cancelado';";        
      } else {
        $sql .= "  ##Filtrar somente as solicitações referente ao setor do funcionario nivel comum
          WHERE (SELECT `status` from  tb_status WHERE id_status = so.`status`) = 'Cancelado';";
      }      
    }
    elseif ( $tipo == 'solicitacao4' ) {
      $sql = $solicitacao;
      if ( $nivelacesso < 4 ) {
        $sql .= "  ##Filtrar somente as solicitações referente ao setor do funcionario nivel administrador
        WHERE (fu.id_referencia = $idref OR so.id_setordestino = $idref);";        
      } else {
        $sql .= "  ##Filtrar somente as solicitações referente ao setor do funcionario nivel comum;";
      }      
    }    
    return $sql;
  }


  try {
    function search($sql){

      require_once('db.php');

      //Conectar com banco de dados MySQL usando PDO extension.
      $objDb = new db();
      $pdo = $objDb->conecta_mysql();
      
      //Prepare the select statement.
      $stmt = $pdo->prepare($sql);
      
      //Execute the statement.
      $stmt->execute();
      
      //Retrieve the rows using fetchAll.
      return $retorno = $stmt->fetchAll();
    }
  }
  catch ( PDOException $e ) {
      echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();       
  }

  //Função para verificar se está vazio
  function setvazio($var){
    
    if ($var == '0'){
      return "--";
    } else{
      return $var;
    }
  }

  //Função para retornar a referencia
  function retornareferencia($var,$sql){

    if ($var == 0){
      return "--";
    } else{
      foreach(search($sql) as $user) {
        if ($var == $user['id_setor']){
          return $user['depto'];
        }
      } 
    }
  }

  function block($login,$link,$link2,$user_lv,$acc_lv){
    if($login == 1 && $user_lv >= $acc_lv){
      return $link;
    } else {
      return $link2;
    };
  }

?>



