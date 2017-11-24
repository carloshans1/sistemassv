<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI 
 * Data Criação: 07/06/2017
 * Data de Modificação: 24/07/2017
 * Cliente: SEDECT - Prefeitura de São Vicente
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Copyright 2017 Prefeitura de São Vicente.
 * Arquivo consulta_setor - php (salva no banco os dados inseridos no formulario)
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
    <title> Consultar Funcionarios</title>
    <!-- Aciona head padrão do sistema-->
    <?php include("../_php/head2.php") ?>
  </head>

  <body id="corfundo">
    <header>
      <!-- Aciona navbar padrão do sistema-->
      <?php 
        include("../_php/navbar2.php"); 
        include("../_php/dropdown_referencia.php"); 
        include("../_php/sql_funcoes.php");
        $sql = sqlquery("funcionario", 0, 0);
        $tb_completa = search($sql);  // echo '<pre>'; print_r($tb_completa); echo '</pre>';
      ?>
    </header>

    <!--define o formulario de cadastro-->
    <div class="container">
      <div class="page-header" style="margin-top: -30px;">
        <h3 id="sombraletrapreta" style="font-weight: bold;" >Consulta > Funcionario</h3>
      </div>

      <!-- Iniciar a tabela DataTable com acesso ao DataSouce -->
      <table id="exemplo" class="display table-bordered" width="100%" cellspacing="0" >  <!-- class="table table-bordered table-hover" --> 
          <thead>
            <tr id="sombraletrapreta">
              <!--nome, matricula, cargo, tipocontratacao, email, telefone, whatsapp, slack, trello, observacao, id_referencia-->
              <th >Funcionario</th>
              <th >Matricula</th>
              <th>Cargo</th>
              <th>Tipo de Contratação</th>
              <th>email</th>
              <th>Telefone</th>
              <th>Whatsapp</th>
              <th>Slack</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($tb_completa as $user): ?>
            <tr>
              <td>
                <?= $user['nome']; ?>
              </td>
              <td>
                <?= setvazio($user['matricula']); ?>
              </td>
              <td>
                <?= setvazio($user['cargo']); ?>
              </td>
              <td>
                <?= setvazio($user['tipocontratacao']);  ?>
              </td>
              <td>
                <?= setvazio($user['email']); ?>
              </td>
              <td>
                <?= setvazio($user['telefone']); ?>
              </td>
              <td>
                <?= setvazio($user['whtasapp']); ?>
              </td>     
              <td>
                <?= setvazio($user['slack']); ?>
              </td>
            </tr>
            <?php endforeach; ?>          
          </tbody>
      </table>      

      <!-- Configuração Padrão do Datatable -->
      <?php include("../_php/datatable_config.php") ?>
      
      <script>
        $(document).ready(function() {
          var table = $('#exemplo').DataTable(); // Passa o objeto tabela com seus dados para a variavel
          //Inicio código para seleção da linha no DATATABLE
          $('#exemplo tbody').on( 'click', 'tr', function () {
              if ( $(this).hasClass('selected') ) {
                  $(this).removeClass('selected');
              }
              else {
                  table.$('tr.selected').removeClass('selected');
                  $(this).addClass('selected');
              }
          } );
        } );
      </script>
    
    </div>
  </body>
</html>