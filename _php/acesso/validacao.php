<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI
 * Apoio: Mauricio - Estagiario de programação 
 * Data Criação: 29/07/2017
 * Data de Modificação: 29/07/2017
 * Cliente: SEDECT - Prefeitura de São Vicente
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Copyright 2017 Prefeitura de São Vicente.
 * Arquivo index - php (controle de acesso ao sistema (login))
-->

<?php
  session_start();

  //Abre conexao com o banco de dados (Mysql)
  require_once('../db.php');
  
  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
      $_SESSION['erroacesso'] = "Campos não preenchidos! Por favor, preencha os campos corretamente.";
      header("Location: ../../index.php");
      exit;
  }

  $value1 = $_POST['usuario'];
  $value2 = md5($_POST['senha']);

  $objDb = new db();
  $PDO = $objDb->conecta_mysql();

  $sql = "SELECT u.id, u.usuario, u.senha, u.email, u.ativo, u.nivel, u.dtcadastro, u.dtalteracao, 
    u.dtacesso, f.nome, s.sigla, ss.depto, f.id_funcionario, f.id_referencia, ss.id_setor
    FROM tb_usuarios as u
    LEFT JOIN tb_funcionario as f  ON u.id_funcionario = f.id_funcionario
    LEFT JOIN tb_setor as s        ON f.id_referencia = s.id_setor
    LEFT JOIN tb_setor as ss       ON s.id_referencia = ss.id_setor
    WHERE (u.usuario = '$value1') AND (u.senha = '$value2') AND (u.ativo = 1) LIMIT 1;";

  //echo '<pre>'; print_r($value1." ".$value2."     ".$sql); echo '</pre>';

  $stmt = $PDO->prepare( $sql );

  $stmt->execute();

  $tb_query = $stmt->fetchAll();
  //echo '<pre>'; print_r($tb_query); echo '</pre>';

  //Verifica se o usuario existe
  if (empty($tb_query)) {
    $_SESSION['verifylogin'] = false;
    $_SESSION['erroacesso'] = "Usuário ou senha inválidos! Por favor, preencha os campos corretamente.";
    header("Location: ../../index.php");
    exit;
  }
  else {
    // Salva os dados encontrados na sessão
    $_SESSION['user_id'] = $tb_query[0]['id'];
    $_SESSION['user_usuario'] = $tb_query[0]['usuario'];
    $_SESSION['user_email'] = $tb_query[0]['email'];
    $_SESSION['user_nivel'] = $tb_query[0]['nivel'];
    $_SESSION['user_nome'] = $tb_query[0]['nome'];
    $_SESSION['user_sigla'] = $tb_query[0]['sigla'];
    $_SESSION['user_depto'] = $tb_query[0]['depto'];
    $_SESSION['erroacesso'] = "";
    $_SESSION['verifylogin'] = true;
    $_SESSION['user_idfuncionario'] = $tb_query[0]['id_funcionario'];
    $_SESSION['user_id_referencia'] = $tb_query[0]['id_referencia'];
    $_SESSION['user_id_setor'] = $tb_query[0]['id_setor'];

    //Atualiza Acesso
    $datahora = date('Y-m-d H:i:s'); 
    $id_usuario = $_SESSION['user_id'];
    $sql = "UPDATE `tb_usuarios` SET `dtacesso`='$datahora' WHERE (`id`='$id_usuario')";
    $result = 1;
    $stmt = $PDO->prepare( $sql );
    $result = $stmt->execute();

    // Redireciona o visitante
    header("Location: ../../inicio.php"); 
    exit;
  }

  /*
  Funções para Sessão

  * session_cache_expire — Retorna o prazo do cache atual
  * session_cache_limiter — Obtém e/ou define o limitador do cache atual
  * session_commit — Sinônimo de session_write_close
  * session_decode — Decifra dado de sessão de uma string
  * session_destroy — Destrói todos os dados registrados em uma sessão
  * session_encode — Codifica os dados da sessão atual como uma string
  * session_get_cookie_params — Obtém os parâmetros do cookie da sessão
  * session_id — Obtém e/ou define o id de sessão atual
  * session_is_registered — Descobre se uma variável global está registrada numa sessão
  * session_module_name — Obtém e/ou define o módulo da sessão atual
  * session_name — Obtém e/ou define o nome da sessão atual
  * session_regenerate_id — Atualiza o id da sessão atual com um novo gerado
  * session_register — Registrar uma ou mais variáveis globais na sessão atual
  * session_save_path — Obtém e/ou define o save path da sessão atual
  * session_set_cookie_params — Define os parâmetros do cookie de sessão
  * session_set_save_handler — Define a sequência de funções de armazenamento
  * session_start — Inicia dados de sessão
  * session_unregister — Desregistra uma variável global da sessão atual
  * session_unset — Libera todas as variáveis de sessão
  * session_write_close — Escreve dados de sessão e termina a sessão
  */
?>