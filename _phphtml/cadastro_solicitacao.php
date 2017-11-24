<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI 
 * Data Criação: 29/07/2017
 * Data de Modificação: 30/07/2017
 * Cliente: SEDECT - Prefeitura de São Vicente
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Copyright 2017 Prefeitura de São Vicente.
 * Arquivo cadastro_solicitacao - php (salva no banco os dados inseridos no formulario)
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
    <title>Cadastrar solicitações</title>
    <!-- Aciona head padrão do sistema-->
    <?php include("../_php/head2.php") ?>
  </head>
  <body id="corfundo">
    <header>
      <!-- Aciona navbar padrão do sistema-->
      <?php 
        include("../_php/navbar2.php"); 
        include("../_php/dropdown_referencia.php"); 
        include("../_php/datahora.php");
        $nome = $_SESSION['user_nome'];
        $id_solicitante = $_SESSION['user_idfuncionario'];
        $sigla = $_SESSION['user_sigla'];
        $depto = $_SESSION['user_depto'];
      ?>
    </header>
    <!--define o formulario de cadastro-->
    <div class="container">
      <div class="page-header" style="margin-top: -30px;">
        <h3 id="sombraletrapreta" style="font-weight: bold;" >Cadastro > Solicitações</h3>
      </div>
      <form method="post" action="../_php/tb_solicitacao.php" id="formsolicitacao" autocomplete="off">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="data" id="sombraletrapreta">Data: <?php echo "$datahora"; ?></label>          
              <input type="hidden" name="data" id="data" value="<?php echo $datahora_mysql; ?>" /> 
            </div>
            <div class="form-group">
              <label for="solicitante" id="sombraletrapreta">Solicitante: <?php echo "$nome"; ?></label>
              <!--<input type="hidden" name="solicitante" id="solicitante" value="<?php echo $nome; ?>" /> -->
              <br/>
              <label for="siglasetor" id="sombraletrapreta">Depto/Secretaria: <?php echo "$sigla - $depto"; ?></label>
              <input type="hidden" name="id_solicitante" id="id_solicitante" value="<?php echo $id_solicitante; ?>" />
              <input type="hidden" name="status" id="status" value="Solicitado" />
              <input type="hidden" name="status_setor" id="status_setor" value="<?php echo "$sigla"; ?>" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="id_setordestino" id="sombraletrapreta">Setor Destino</label> <br/>           
              <select style="width:555px;height:35px;" name="id_setordestino" id="id_setordestino"> 
                <?php foreach($tb_setor as $user): ?>
                  <option value="<?= $user['id_setor']; ?>"> <?= $user['depto'];?> </option>
                <?php endforeach; ?>
              </select>
            </div>            
          </div>
          <div class="col-md-12"> 
            <div class="form-group">
              <label for="descricao" id="sombraletrapreta">Descrição: </label>
              <textarea type="text" class="form-control" style="height:108px;border-radius:20px;resize: none;" maxlength="500" rows="4" name="descricao" id="descricao" placeholder="Tamanho máximo 500 caracteres."></textarea>
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


<!-- 

data                      - data da solicitação

id_solicitante            - funcionário que solicitou\nObs. O setor solicitante será extraido da tb_funcionario 

descricao                 - descrição da solicitaçao

id_setordestino           - setor destino da solicitação

aprovadosolicitante       - indica se o diretor aprovou a solicitação TRUE e FALSE

data_aprovadosolicitante  - data em que foi aprovado ou nao a solicitaçao

id_aprovadorsolicitantel  - nome do aprovador solicitante

obsaprovadorsolicitante   - observação do aprovador solicitante

aprovadodestino           - (sim/Nao) <indica se o diretor do setor destinado aprovou a solicitação>

data_aprovadodestino      - data em que foi aprovado ou nao a solicitaçao

id_aprovadordestino       - nome do aprovador solicitante

obsaprovadordestino       - observação do aprovador destino

id_executante             - caso a solicitação tenha sido aprovado pelo diretor destino, o funcionário responsável irá executar a tarefa.

possivel_executar         - (sim / Nao) <verifica se o funcionario vai conseguir executar>\nCaso o funcionário executante encontre problemas que não seja possivel resolver para executar poderá cancelar a solicitação. Fazendo as justificativas.

dtPrazo                   - (se opcao sim) <Determina uma data de prazo para execuçao da solicitação

Obsexecutante             - Observação do executante

status                    - <solicitado> (<aprovado solicitante> ou <não aprovado solicitante>) (<aprovado setor destino> ou <não aprovado setor destino>)

obsfinal                  - Observação final da solicitação


-->
</html>

