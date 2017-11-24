<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI
 * Colaboradores: Mauricio Mendes(estagiario nível superior).
 * Data Criação: 07/06/2017
 * Data de Modificação: 21/06/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Arquivo cadastro_setor - php/HTML (Frontend html e backend php 'comunicação com banco de dados')
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
        include("../_php/dropdown_referencia.php"); 
      ?>
    </header>
    <!--define o formulario de cadastro-->
    <div class="container">
      <div class="page-header" style="margin-top: -30px;">
        <h3 id="sombraletrapreta" style="font-weight: bold;" >Cadastro > Setor</h3>
      </div>
      <form method="post" action="../_php/tb_setor.php" id="formsetor" autocomplete="off">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nome" id="sombraletrapreta">Nome do Setor</label>
              <input type="text" class="form-control" name="depto" id="depto" required="required">
            </div>
            <div class="form-group">
              <label for="sigla" id="sombraletrapreta">Sigla</label>
              <input type="text" class="form-control" name="sigla" id="sigla" >
            </div>
            <div class="form-group">
              <label for="endereco" id="sombraletrapreta">Endereço</label>
              <input type="text" class="form-control" name="endereco" id="endereco" >
            </div>
            <div class="form-group">
              <label for="bairro" id="sombraletrapreta">Bairro</label>
              <input type="text" class="form-control" name="bairro" id="bairro">
            </div>
            <div class="form-group">
              <label for="telefone" id="sombraletrapreta">Telefone</label>
              <input type="text" class="form-control" onkeyup="mascara( this, mtel );" name="telefone" id="telefone" maxlength="15">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email" id="sombraletrapreta">e-mail</label>
              <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
              <label for="id_referencia" id="sombraletrapreta">Referência</label>  <br/>
              <select style="width:555px;height:35px;" name="id_referencia" id="id_referencia"> 
                <?php foreach($tb_setor as $user): ?>
                  <option value="<?= $user['id_setor']; ?>"> <?= $user['depto'];?> </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="observacao" id="sombraletrapreta">Observação</label>
              <textarea type="text" class="form-control" style="height:186px;border-radius:20px;resize: none;" maxlength="255" rows="5" name="observacao" id="observacao">  </textarea>
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

