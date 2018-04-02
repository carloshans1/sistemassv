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
  <body  id="corfundogradleft">
    <header>
      <!-- Aciona navbar padrão do sistema-->
      <?php 
        include("../_php/navbar2.php"); 
        include("../_php/dropdown_funcionario.php"); 
      ?>
    </header>
    <!--define o formulario de cadastro-->
    <div class="container">
      <div class="page-header" style="margin-top: -30px;">
        <h3 id="sombraletrapreta" style="font-weight: bold;" >Cadastro > Usuario</h3>
      </div>
      <form method="post" action="../_php/tb_usuario.php" id="formsetor" autocomplete="off">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="usuario" id="sombraletrapreta">Nome do Usuario</label>
              <input type="text" class="form-control" name="usuario" id="usuario" required="required">
            </div>
            <div class="form-group">
              <label for="senha" id="sombraletrapreta">Senha</label>
              <input type="password" class="form-control" name="senha" id="senha" required="required">
            </div>
            <div class="form-group">
              <label for="email" id="sombraletrapreta">email</label>
              <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
              <label for="nivel" id="sombraletrapreta">Nível de Acesso</label> <br/>
              <select name="nivel" id="nivel" style="width:555px;height:35px;" required="required"> 
                <option value="1">Operador                </option>
                <option value="2">Chefe de Departamento   </option>
                <option value="3">Diretor de Departamento </option>
                <option value="4">Chefe Gabinete          </option>
                <option value="5">Secretario Adjunto      </option>
                <option value="6">Secretario              </option>
                <option value="7">Administrador do Sistema</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="ativo" id="sombraletrapreta">Ativo</label>
              <select name="ativo" id="ativo" style="width:555px;height:35px;" required="required"> 
                <option value="0">Pendente</option>
                <option value="1">Sim     </option>
                <option value="2">Não     </option>
              </select>
            </div>
            <div class="form-group">
              <label for="id_funcionario" id="sombraletrapreta">Funcionário</label>  <br/>
              <select style="width:555px;height:35px;" name="id_funcionario" id="id_funcionario"> 
                <?php foreach($tb_funcionario as $user): ?>
                  <option value="<?= $user['id_funcionario']; ?>"> <?= $user['nome'];?> </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <!--Botão Salvar - Guarda no banco de dados-->
              <button type="submit" class="btn btn-primary " style="margin-top: 22px;">Cadastrar</button>
            </div>
          </div>
        </div>
      </form>
    </div>    
  </body>
</html>

