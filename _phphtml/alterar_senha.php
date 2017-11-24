<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI
 * Colaboradores: Mauricio Mendes(estagiario nível superior).
 * Data Criação: 07/06/2017
 * Data de Modificação: 21/06/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Arquivo alterar_senha - php/HTML (Frontend html e backend php 'comunicação com banco de dados')
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
  <body  id="corfundo">
    <header>
      <!-- Aciona navbar padrão do sistema-->
      <?php 
        include("../_php/navbar2.php"); 
      ?>
    </header>
    <!--define o formulario de cadastro-->
    <div class="container">
      <div class="page-header" style="margin-top: -30px;">
        <h3 id="sombraletrapreta" style="font-weight: bold;" >Alterar > SENHA</h3>
      </div>
      <form method="post" action="../_php/tb_trocasenha.php" id="formsetor" autocomplete="off">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="senha" id="sombraletrapreta">Senha Atual</label>
              <input type="password" class="form-control" name="senha" id="senha" required="required">
            </div>
            <div class="form-group">
              <label for="novasenha" id="sombraletrapreta">Nova Senha</label>
              <input type="password" class="form-control" name="novasenha" id="novasenha" required="required">
            </div>
            <div class="form-group">
              <!--Botão Salvar - Guarda no banco de dados-->
              <button type="submit" class="btn btn-primary " style="margin-top: 22px;">Alterar</button>
            </div>
          </div>
        </div>
      </form>
    </div>    
  </body>
</html>

