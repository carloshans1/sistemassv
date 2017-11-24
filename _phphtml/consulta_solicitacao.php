<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI 
 * Data Criação: 07/06/2017
 * Data de Modificação: 24/07/2017
 * Cliente: SEDECT - Prefeitura de São Vicente
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Copyright 2017 Prefeitura de São Vicente.
 * Arquivo consulta_solicitacao - php (conexão com o banco de dados)
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

  <body id="corfundo">
    <header>
      <!-- Aciona navbar padrão do sistema-->
      <?php 
        include("../_php/navbar2.php"); 
        include("../_php/dropdown_referencia.php");
        $valor = 1;
        $nome = $_SESSION['user_nome'];
        $idfuncionario = $_SESSION['user_idfuncionario'];
        $sigla = $_SESSION['user_sigla'];
        $depto = $_SESSION['user_depto'];
        $idreferencia = $_SESSION['user_id_referencia'];
        $idsetor = $_SESSION['user_id_setor'];
        $nivelacesso = $_SESSION['user_nivel'];
        include("../_php/dropdown_status.php");  
        include("../_php/sql_funcoes.php");
        $sql = sqlquery("solicitacao", $idreferencia, $nivelacesso);
        $tb_completa = search($sql);  // echo '<pre>'; print_r($tb_completa); echo '</pre>';
      ?>
    </header>

      <!--define o formulario de cadastro-->
      <div class="container">
        <div class="page-header" style="margin-top: -30px;">
          <h3 id="sombraletrapreta" style="font-weight: bold;" >Consulta > Andamento-Solicitação</h3>
        </div>
  
        <!-- Iniciar a tabela DataTable com acesso ao DataSouce -->
        <table id="exemplo" class="display table-bordered" width="100%" cellspacing="0" >  <!-- class="table table-bordered table-hover" --> 
          <thead>
            <tr id="sombraletrapreta">               
              <th>ID</th>
              <th>Data_Solicitacao</th>
              <th>Status</th>
              <th>Parado_Setor</th>
              <th>Solicitante</th>
              <th>Depto_Origem</th>
              <th>Sigla_Origem</th>
              <th>Descricao_Solicitacao</th>
              <th>Aprovado_Diretor_Sol</th>
              <th>Data_Aprovacao_Sol</th>
              <th>Diretor_Sol</th>
              <th>Obs_Aprovador_Sol</th>
              <th>Depto_Destino</th>
              <th>Sigla_Destino</th>
              <th>Aprovado_Diretor_Des</th>
              <th>Data_Aprovado_Destino</th>
              <th>Diretor_Des</th>
              <th>Obs_Aprovador_Destino</th>
              <th>Nome_Executante</th>
              <th>Possivel_Executar</th>
              <th>Prazo_Execucao</th>
              <th>Obs_Executante</th>
              <th>Obs_Final</th>
              <th>idstatus</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($tb_completa as $user): ?>
            <tr>
              <td>
                <?= setvazio($user['id_sol']); ?>                     
              </td>
              <td>                                                  
                <?= date_format(date_create($user['Data_Solicitacao']), 'd-m-Y H:i:s'); ?>  
              </td>
              <td>
                <?= setvazio($user['Status']); ?>                     
              </td>
              <td>
                <?= setvazio($user['Parado_Setor']); ?>            
              </td>                
              <td>
                <?= setvazio($user['Solicitante']); ?>                
              </td>
              <td>
                <?= setvazio($user['Depto_Origem']);  ?>              
              </td>
              <td>
                <?= setvazio($user['Sigla_Origem']); ?>               
              </td>
              <td>
                <?= setvazio($user['Descricao_Solicitacao']); ?>      
              </td>
              <td>
                <?= setvazio($user['Aprovado_Diretor_Sol']); ?>       
              </td>     
              <td>
                <?= setvazio($user['Data_Aprovacao_Sol']); ?>         
              </td>
              <td>
                <?= setvazio($user['Diretor_Sol']); ?>                
              </td>
              <td>
                <?= setvazio($user['Obs_Aprovador_Sol']); ?>          
              </td>
              <td>
                <?= setvazio($user['Depto_Destino']); ?>              
              </td>
              <td>
                <?= setvazio($user['Sigla_Destino']); ?>              
              </td>
              <td>
                <?= setvazio($user['Aprovado_Diretor_Des']); ?>       
              </td>
              <td>
                <?= setvazio($user['Data_Aprovado_Destino']); ?>      
              </td>
              <td>
                <?= setvazio($user['Diretor_Des']); ?>                
              </td>
              <td>
                <?= setvazio($user['Obs_Aprovador_Destino']); ?>      
              </td>
              <td>
                <?= setvazio($user['Nome_Executante']); ?>            
              </td>
              <td>
                <?= setvazio($user['Possivel_Executar']); ?>          
              </td>
              <td>
                <?= setvazio($user['Prazo_Execucao']); ?>             
              </td>
              <td>
                <?= setvazio($user['Obs_Executante']); ?>             
              </td>
              <td>
                <?= setvazio($user['Obs_Final']); ?>                  
              </td>
              <td>
                <?= setvazio($user['idstatus']); ?>                  
              </td>
            </tr>
            <?php endforeach; ?>          
          </tbody>
        </table>      

      <!-- "dom": 'Bfrtip', "buttons": ['copyHtml5', 'excelHtml5','csvHtml5','pdfHtml5', 'print']
        l - Length changing
        f - Filtering input
        t - The Table!
        i - Information
        p - Pagination
        r - pRocessing
        < and > - div elements
        <"#id" and > - div with an id
        <"class" and > - div with a class
        <"#id.class" and > - div with an id and class
        "lengthMenu": "Registros  _MENU_  por página",         
      -->

      <!-- Configuração Padrão do Datatable -->
      <?php //include("../_php/datatable_config.php") ?>

      <script>
        $(document).ready(function(){
          $("#exemplo").dataTable({

            "scrollY":        '50vh',
            "scrollX": true,
            "scrollCollapse": 'true',
            "paging":         'false',
            "lengthMenu": [ [10, 25, 50, 75, 100, -1], [10, 25, 50, 75, 100, "All"] ],
            "dom": 'Blfrtip',
            "buttons": [ 'print', 'excelHtml5', 'pdfHtml5' ],


            "aoColumnDefs": [ {
              "aTargets": [2],
              "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                if ( sData == "Aprovado"  ) { 
                  $(nTd).css('color', 'green') 
                  $(nTd).css('font-weight', 'bold')                   
                }
                if ( sData == "Concluido" ) { 
                  $(nTd).css('color', 'blue') 
                  $(nTd).css('font-weight', 'bold')                   
                }
                if ( sData == "Cancelado" ) { 
                  $(nTd).css('color', 'red') 
                  $(nTd).css('font-weight', 'bold')                   
                }
                if ( sData == "Análise"   ) { 
                  $(nTd).css('color', 'orange') 
                  $(nTd).css('font-weight', 'bold')                   
                }   
              }
            } ],


            "language": {              
              "lengthMenu": "Registros  _MENU_  por página",
              "zeroRecords": "Nenhum registro encontrado",
              "info": "Página _PAGE_ de _PAGES_  (Registro(s) de _START_ até _END_)",
              "infoEmpty": "Nenhum registro disponível",
              "infoFiltered": "(filtrado de _MAX_ registros no total)",
              "infoPostFix": "",
              "decimal": ",",
              "infoThousands": ".",
              "emptyTable": "Nenhum registro encontrado",
              "loadingRecords": "Carregando...",
              "processing": "Processando...",
              "search": "Pesquisar",
              "paginate": {
                "next": "Próximo",
                "previous": "Anterior",
                "Last": "Último"
              },                            
            }

          });
        });

          $(document).ready(function() {
            $('#example').dataTable( {
            } );
          } );
        </script>


      <!-- Button trigger modal ( data-whatever=" " ) -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Atualiza Status</button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="idtitulo" > 
      <!-- aria-hidden="true" -->
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h5 id = "idtitulo" > Atualização do Status da Solicitação </h5> <!-- class="modal-title" -->
            </div>
            <div class="modal-body">
              <form method="post" action="../_php/tb_solicitacaostatus.php" id="formsetor" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Data Solicitação:</label>
                    <input name="campoa" type="text" readonly="true" class="form-control" id="recipient-name" id="campoa">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Status:</label>
                    <input name="campob" type="text" readonly="true" class="form-control" id="recipient-name" id="campob">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Solicitante:</label>
                    <input name="campoc" type="text" readonly="true" class="form-control" id="recipient-name" id="campoc">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Parado no Setor:</label>
                    <input name="campod" type="text" readonly="true" class="form-control" id="recipient-name" id="campod">
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-12">              
                    <div class="form-group">
                      <label for="recipient-name" class="form-control-label">Descrição da Solicitação:</label>
                      <input name="campoe" type="text" readonly="true" class="form-control" id="recipient-name" id="campoe">
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="form-control-label">Responsável pela atualização: <?php echo "$nome"; ?></label> </br>
                      <label for="siglasetor" >Depto/Secretaria: <?php echo "$sigla - $depto"; ?></label>
                    </div>
                    <div class="form-group">                      
                      <input type="hidden" name="idsolicitacao" class="form-control" id="recipient-name" />
                      <input type="hidden" name="idfun" class="form-control" id="recipient-name"  />
                      <input type="hidden" name="idreferencia" class="form-control" id="recipient-name" />
                      <input type="hidden" name="idsetor" class="form-control" id="recipient-name" />
                      <input type="hidden" name="siglausuario" class="form-control" id="recipient-name" />
                      <input type="hidden" name="siglaorigem" class="form-control" id="recipient-name" />
                      <input type="hidden" name="sigladestino" class="form-control" id="recipient-name" />
                      <input type="hidden" name="siglaparado" class="form-control" id="recipient-name" />
                      <input type="hidden" name="aprovadodestino" class="form-control" id="recipient-name" />
                      <input type="hidden" name="nivelac" class="form-control" id="recipient-name" />
                    </div>
                    <div class="form-group">
                      <label for="id_status" >Status</label>  <br/>
                      <select style="width:555px;height:35px;" name="idstatus" id="idstatus"> 
                        <?php foreach($tb_status as $status): ?>
                          <option value="<?= $status['id_status']; ?>"> <?= $status['status'];?> </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="form-control-label">Observação:</label>
                      <input type="text" name="obs" id="obs" class="form-control" id="recipient-name" placeholder="Comentário ou Observação">
                    </div>
                    <div class="modal-footer" class="form-group">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button> 
                      <!--class="btn btn-secondary"-->
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>                  
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <script>
        $(document).ready(function() {
          var table = $('#exemplo').DataTable(); // Passa o objeto tabela com seus dados para a variavel

          //Inicio do código do MODAL
          $('#exampleModal').on('show.bs.modal', function (event) {
            
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Titulo da janela do Modal ' + recipient)
            modal.find('.modal-body input').val(recipient)
          
            // Código para passar os dados da linha para os campos do MODAL
            var textoToarray = new String(table.row( '.selected' ).data());
            var verifcaract = ",";
            var stringToarray = textoToarray.split(verifcaract);
            $("input[type='text'][name='campoa']").val(stringToarray[1]);
            $("input[type='text'][name='campob']").val(stringToarray[2]);
            $("input[type='text'][name='campoc']").val(stringToarray[4]);
            $("input[type='text'][name='campod']").val(stringToarray[3]);
            $("input[type='text'][name='campoe']").val(stringToarray[7]);
            $("input[type='hidden'][name='idsolicitacao']").val(stringToarray[0]);
            $("input[type='hidden'][name='idfun']").val("<?php echo $idfuncionario; ?>");
            $("input[type='hidden'][name='idreferencia']").val("<?php echo $idreferencia; ?>");
            $("input[type='hidden'][name='idsetor']").val("<?php echo $idsetor; ?>");
            $("input[type='hidden'][name='siglausuario']").val("<?php echo $sigla; ?>");
            $("input[type='hidden'][name='siglaorigem']").val(stringToarray[6]);
            $("input[type='hidden'][name='sigladestino']").val(stringToarray[13]);
            $("input[type='hidden'][name='siglaparado']").val(stringToarray[3]);
            $("input[type='hidden'][name='aprovadodestino']").val(stringToarray[14]);
            $("input[type='hidden'][name='nivelac']").val("<?php echo $nivelacesso; ?>");

          } );

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