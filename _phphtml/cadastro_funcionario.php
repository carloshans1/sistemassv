<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI 
 * Data Criação: 07/06/2017
 * Data de Modificação: 08/06/2017
 * Cliente: SEDECT - Prefeitura de São Vicente
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Copyright 2017 Prefeitura de São Vicente.
 * Arquivo cadastro_setor - php (salva no banco os dados inseridos no formulario)
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
    <title>Cadastrar funcionário</title>
    <!-- Aciona head padrão do sistema-->
    <?php include("../_php/head2.php") ?>
  </head>
  <body  id="corfundo">
    <header>
      <!-- Aciona navbar padrão do sistema-->
      <?php 
        include("../_php/navbar2.php"); 
        include("../_php/dropdown_referencia.php"); 
      ?>
    </header>
    <!--define o formulario de cadastro-->
    <div class="container">
      <div class="page-header" style="margin-top: -30px;">
        <h3 id="sombraletrapreta" style="font-weight: bold;" >Cadastro > Funcionario</h3>
      </div>
      <form method="post" action="../_php/tb_funcionario.php" id="formsetor" autocomplete="off">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nome" id="sombraletrapreta">Nome</label>
              <input type="text" class="form-control" name="nome" id="nome" required="required">
            </div>
            <div class="form-group">
              <label for="matricula" id="sombraletrapreta">Matricula</label>
              <input type="text" class="form-control" name="matricula" id="matricula" >
            </div>
            <div class="form-group">
              <label for="cargo" id="sombraletrapreta">Cargo</label>
              <input type="text" class="form-control" name="cargo" id="cargo" >
            </div>
            <div class="form-group">
              <label for="tipocontratacao" id="sombraletrapreta">Tipo Contratação</label> <br/>
              <select name="tipocontratacao" id="tipocontratacao" style="width:555px;height:35px;"> 
                <option>Estatutário</option>
                <option>Estagiário</option>
                <option>Comissionado</option>
                <option>Tercerizado</option>
                <option>CODESAVI</option>
                <option>Voluntário</option>
                <option>Patrulheiro</option>
              </select>
            </div>
            <div class="form-group">
              <label for="email" id="sombraletrapreta">e-mail</label>
              <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
              <label for="telefone" id="sombraletrapreta">Telefone</label>
              <input type="text" class="form-control" onkeyup="mascara( this, mtel );" name="telefone" id="telefone" maxlength="15">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="id_referencia" id="sombraletrapreta">Referência</label>  <br/>
              <select style="width:555px;height:35px;" name="id_referencia" id="id_referencia"> 
                  <?php foreach($tb_setor as $user): ?>
                      <option value="<?= $user['id_setor']; ?>"> <?= $user['depto'];?> </option>
                  <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="whatsapp" id="sombraletrapreta">Whatsapp</label>
              <input type="text" class="form-control" name="whatsapp" id="whatsapp">
            </div>
            <div class="form-group">
              <label for="observacao" id="sombraletrapreta">Observação</label>
              <textarea type="text" class="form-control" style="height:108px;border-radius:20px;resize: none;" maxlength="255" rows="4" name="observacao" id="observacao">  </textarea>
            </div>
            <div class="form-group">
              <label for="slack" id="sombraletrapreta">Slack</label>
              <input type="text" class="form-control" name="slack" id="slack">
            </div>
            <div class="form-group">
              <label for="trello" id="sombraletrapreta">Trello</label>
              <input type="text" class="form-control" name="trello" id="trello">
            </div>
            <div class="form-group">
              <!--Botão Salvar - Guarda no banco de dados-->
              <button type="submit" class="btn btn-primary ">Cadastrar</button>
            </div>
          </div>
        </div>
      </form>
    </div>    
  </body>
</html>