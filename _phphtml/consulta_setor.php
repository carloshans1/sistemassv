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
    <!-- Aciona head padrão do sistema-->
    <?php include("../_php/head2.php") ?>
    <title> Consultar Setores</title>
  </head>

  <body id="corfundo">
    <header>
      <!-- Aciona navbar padrão do sistema-->
      <?php 
        include("../_php/navbar2.php"); 
        include("../_php/dropdown_referencia.php"); 
        include("../_php/sql_funcoes.php");
        $sql = sqlquery("setor", 0, 0);
        $tb_completa = search($sql);  // echo '<pre>'; print_r($tb_completa); echo '</pre>';
      ?>
    </header>

      <!--define o formulario de cadastro-->
      <div class="container">
        <div class="page-header" style="margin-top: -30px;">
          <h3 id="sombraletrapreta" style="font-weight: bold;" > Consulta > Setor </h3>
        </div>
  
        <!-- Iniciar a tabela DataTable com acesso ao DataSouce -->
        <table id="exemplo" class="display table-bordered" width="100%" cellspacing="0" >  <!-- class="table table-bordered table-hover" --> 
            <thead>
              <tr id="sombraletrapreta">
                <th >Depto</th>
                <th >Sigla</th>
                <th>Endereco</th>
                <th>Bairro</th>
                <th>Telefone</th>
                <th>email</th>
                <th>Referencia</th>
                <th>Observacao</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($tb_completa as $user): ?>
              <tr>
                <td>
                  <?= $user['depto']; ?>
                </td>
                <td>
                  <?= setvazio($user['sigla']); ?>
                </td>
                <td>
                  <?= setvazio($user['endereco']); ?>
                </td>
                <td>
                  <?= setvazio($user['telefone']);  ?>
                </td>
                <td>
                  <?= setvazio($user['bairro']); ?>
                </td>
                <td>
                  <?= setvazio($user['email']); ?>
                </td>
                <td>
                  <?= retornareferencia($user['id_referencia'],$sql); ?>
                </td>     
                <td>
                  <?= setvazio($user['observacao']); ?>
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