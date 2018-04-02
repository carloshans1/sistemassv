<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI 
 * Data Criação: 07/06/2017
 * Data de Modificação: 24/07/2017
 * Cliente: SEDECT - Prefeitura de São Vicente
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Copyright 2017 Prefeitura de São Vicente.
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

  <body id="corfundogradleft">
    <header>
      <!-- Aciona navbar padrão do sistema-->
      <?php 
        include("../_php/navbar2.php"); 
        include("../_php/dropdown_referencia.php");
        include("../_php/datahora.php");
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
        $sql = sqlquery("solicitacao1", $idreferencia, $nivelacesso);
        $tb_completa = search($sql);  // echo '<pre>'; print_r($tb_completa); echo '</pre>';
        $solicitacao = "solicitacao1";
      ?>
  
      <script type="text/javascript">
        function deletarPhpAjax() {
          //alert($("#idreg").val());
          $.ajax({
            type: "POST",
            url:'../_php/tb_delete.php',
            data: {'idreg' : $("#idreg").val(), 'tipoacesso' : $("#tipoacesso").val()}, //valores enviados
            complete: function (resposta) {
              //Mensagens personalizadas
              swal({
                type: 'success',
                title: "Excluido!",
                titleText: "",
                text: "OK para continuar.",
                customClass: 'swal-wide',
                width: 300
              }).then((result) => {
                if (result.value) {
                  location.reload();
                }
              });               },
            error: function () {
              //Mensagens personalizadas
              swal({
                type: 'error',
                title: "Erro na Exclusão!",
                titleText: "",
                text: "OK para continuar.",
                customClass: 'swal-wide',
                width: 300
              });   
            }
          });
          return false 
        };

        function novoPhpAjax() {
          //alert($("#idreg").val());
          $.ajax({
            type: "POST",
            url:'../_php/tb_novo.php',
            data: {
              'id_setordestino' : $("#id_setordestino").val(),
              'descricao' : $("#descricao").val(),
              'data' : $("#data").val(), 
              'status' : $("#status").val(), 
              'status_setor' : $("#status_setor").val(), 
              'id_solicitante' : $("#id_solicitante").val(),
              'tipoacesso' : $("#tipoacesso").val()
            },            

            complete: function (resposta) {
              //Mensagens personalizadas
              swal({
                type: 'success',
                title: "GRAVADO!",
                titleText: "",
                text: "OK para continuar.",
                customClass: 'swal-wide',
                width: 300
                //closeOnConfirm: false // ou mesmo sem isto
              }).then((result) => {
                if (result.value) {
                  location.reload();
                }
              });   
            },
            error: function () {
              //Mensagens personalizadas
              swal({
                type: 'error',
                title: "Erro na Exclusão!",
                titleText: "",
                text: "OK para continuar.",
                customClass: 'swal-wide',
                width: 300
              });   
            }
          });
          return false 
        };

        function editarPhpAjax() {
          $.ajax({
            type: "POST",
            url:'../_php/tb_editar.php',
            data: {
              'idregeditar' : $("#idregeditar").val(),
              'descricao_editar' : $("#descricao_editar").val(),
              'tipoacesso' : $("#tipoacesso").val()
            },            

            complete: function (resposta) {
              //Mensagens personalizadas
              swal({
                type: 'success',
                title: "GRAVADO!",
                titleText: "",
                text: "OK para continuar.",
                customClass: 'swal-wide',
                width: 300
                //closeOnConfirm: false // ou mesmo sem isto
              }).then((result) => {
                if (result.value) {
                  location.reload();
                }
              });   
            },
            error: function () {
              //Mensagens personalizadas
              swal({
                type: 'error',
                title: "Erro na Exclusão!",
                titleText: "",
                text: "OK para continuar.",
                customClass: 'swal-wide',
                width: 300
              });   
            }
          });
          return false 
        };
      </script>
    </header>

      <!--define o formulario de cadastro-->
      <div class="container">
        <div class="page-header" style="margin-top: -30px;">
          <h3 id="sombraletrapreta" style="font-weight: bold;" >Operação: Cadastro/Consulta > Solicitação</h3>
        </div>
  
        <!-- Iniciar a tabela DataTable com acesso ao DataSouce -->
        <table id="exemplo" class="display table-bordered nowrap" width="100%" cellspacing="0" >  <!-- class="table table-bordered table-hover" --> 
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

            "aoColumnDefs": [
              {"aTargets": [23], "visible": false, "searchable": false},
              {
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
                  $(nTd).css('color', '#D2691E') 
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
      </script>


      <!-- Button trigger modal ( data-whatever=" " ) -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bt_novo" >Novo</button>
      <?php if ($_SESSION['user_nivel'] == 7): ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bt_editar">Editar</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bt_deletar" >Deletar</button>
      <?php else: ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bt_editar" disabled >Editar</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bt_deletar" disabled>Deletar</button>
      <?php endif; ?>

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bt_atualiza" >Atualiza Status</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bt_detalhe" >Detalhe</button>

      <!-- Modal Atualiza Status 
      ########################## -->
      <div class="modal fade" id="bt_atualiza" tabindex="-1" role="dialog" aria-labelledby="idtitulo" > 
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
                      <input type="hidden" name="solicitacaoservico" class="form-control" id="recipient-name" />
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
                      <button type="submit" class="btn btn-primary" accesskey="enter">Salvar</button>
                    </div>                  
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Detalhe 
      ########################## -->
      <div class="modal fade" id="bt_detalhe" tabindex="-1" role="dialog" aria-labelledby="idtitulo" > 
      <!-- aria-hidden="true" -->
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h3 id="sombraletrapreta" style="font-weight: bold;" >Detalhe da Solicitação</h3>
            </div>
            <div class="modal-body">
              <form method="post" action="#" id="formsetor" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label" id="letradestaque">Número Solicitação:</label> </br>
                    <input name="campo0" type="text" readonly="true" class="form-control" id="recipient-name" id="campo0"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label" id="letradestaque">Data de Solicitação:</label> </br>
                    <input name="campo1" type="text" readonly="true" class="form-control" id="recipient-name" id="campo1"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label" id="letradestaque">Status:</label> </br>
                    <input name="campo2" type="text" readonly="true" class="form-control" id="recipient-name" id="campo2"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label" id="letradestaque">Parado no Setor:</label> </br>
                    <input name="campo3" type="text" readonly="true" class="form-control" id="recipient-name" id="campo3"> </br>
                  </div>
                  <div class="col-md-12"> <label id="separador"></label> </div>                  
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Solicitante:</label> </br>
                    <input name="campo4" type="text" readonly="true" class="form-control" id="recipient-name" id="campo4"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Departamento de Origem:</label> </br>
                    <input name="campo5" type="text" readonly="true" class="form-control" id="recipient-name" id="campo5"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Sigla Origem:</label> </br>
                    <input name="campo6" type="text" readonly="true" class="form-control" id="recipient-name" id="campo6"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Descrição da Solicitação:</label> </br>
                    <textarea name="campo7" type="text" readonly="true" class="form-control" id="recipient-name" id="campo7"> </textarea></br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Aprovado pelo Diretor Solicitante:</label> </br>
                    <input name="campo8" type="text" readonly="true" class="form-control" id="recipient-name" id="campo8"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Data da Aprovação do Solicitante:</label> </br>
                    <input name="campo9" type="text" readonly="true" class="form-control" id="recipient-name" id="campo9"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Diretor Solicitante:</label> </br>
                    <input name="campo10" type="text" readonly="true" class="form-control" id="recipient-name" id="campo10"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Obs. Diretor Solicitante:</label> </br>
                    <input name="campo11" type="text" readonly="true" class="form-control" id="recipient-name" id="campo11"> </br>
                  </div>
                  <div class="col-md-12"> <label id="separador"></label> </div>                  
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Departamento Destino:</label> </br>
                    <input name="campo12" type="text" readonly="true" class="form-control" id="recipient-name" id="campo12"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Sigla Destino:</label> </br>
                    <input name="campo13" type="text" readonly="true" class="form-control" id="recipient-name" id="campo13"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Aprovado pelo Diretor Destino:</label> </br>
                    <input name="campo14" type="text" readonly="true" class="form-control" id="recipient-name" id="campo14"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Data da Aprovação do Destino:</label> </br>
                    <input name="campo15" type="text" readonly="true" class="form-control" id="recipient-name" id="campo15"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Diretor Destino:</label> </br>
                    <input name="campo16" type="text" readonly="true" class="form-control" id="recipient-name" id="campo16"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Obs. Diretor Destino:</label> </br>
                    <input name="campo17" type="text" readonly="true" class="form-control" id="recipient-name" id="campo17"> </br>
                  </div>
                  <div class="col-md-12"> <label id="separador"></label> </div>                  
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Nome do Executante:</label> </br>
                    <input name="campo18" type="text" readonly="true" class="form-control" id="recipient-name" id="campo18"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">É Possivel Executar:</label> </br>
                    <input name="campo19" type="text" readonly="true" class="form-control" id="recipient-name" id="campo19"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Data Entrega da Execução:</label> </br>
                    <input name="campo20" type="text" readonly="true" class="form-control" id="recipient-name" id="campo20"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Observação do Executante:</label> </br>
                    <input name="campo21" type="text" readonly="true" class="form-control" id="recipient-name" id="campo21"> </br>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="recipient-name" class="form-control-label">Observação Final:</label> </br>
                    <input name="campo22" type="text" readonly="true" class="form-control" id="recipient-name" id="campo22"> </br>
                  </div>
                  <div class="modal-footer" class="form-group">
                    <button type="button" class="btn btn-primary" accesskey="enter" data-dismiss="modal">Fechar</button> 
                    <!-- class="btn btn-secondary"
                    <button type="submit" class="btn btn-primary">ok</button> -->
                  </div>                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- Modal NOVO
      ########################## -->
      <div class="modal fade" id="bt_novo" tabindex="-1" role="dialog" aria-labelledby="idtitulo" > 
      <!-- aria-hidden="true" -->
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h3 id="sombraletrapreta" style="font-weight: bold;" >Nova Solicitação</h3>
            </div>
            <div class="modal-body">
              <form name="novosolicitacao" method="post" action="../_php/tb_novo.php" onsubmit="return novoPhpAjax()" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="data" id="sombraletrapreta">Data: <?php echo "$datahora"; ?></label>       
                    <input type="hidden" name="data" id="data" value="<?php echo $datahora_mysql; ?>" /> 
                    <input type="hidden" name="tipoacesso" readonly="true" class="form-control" id="tipoacesso">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="solicitante" id="sombraletrapreta">Solicitante: <?php echo "$nome"; ?></label> <br/>
                    <input type="hidden" name="id_solicitante" id="id_solicitante" value="<?php echo $idfuncionario; ?>" />                  
                  </div>
                  <div class="form-group col-md-12">
                    <label for="siglasetor" id="sombraletrapreta">Depto/Secretaria: <?php echo "$sigla - $depto"; ?></label> <br/>
                    <input type="hidden" name="status" id="status" value=1 />
                    <input type="hidden" name="status_setor" id="status_setor" value="<?php echo "$sigla"; ?>" />
                  </div>
                  <div class="form-group col-md-12">
                    <label for="id_setordestino" id="sombraletrapreta">Setor Destino</label> <br/>         
                    <select style="width:555px;height:35px;" name="id_setordestino" id="id_setordestino"> 
                      <?php foreach($tb_setor as $user): ?>
                        <option value="<?= $user['id_setor']; ?>"> <?= $user['depto'];?> </option>
                      <?php endforeach; ?>
                    </select> <br/>
                  </div>
                  <div class="form-group col-md-12"> 
                    <label for="descricao" id="sombraletrapreta">Descrição: </label>
                    <textarea type="text" class="form-control" style="height:108px;border-radius:20px;resize: none;" maxlength="500" rows="4" name="descricao" id="descricao" placeholder="Tamanho máximo 500 caracteres."></textarea> <br/>
                  </div>
                  <div class="modal-footer form-group">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button> 
                    <!--class="btn btn-secondary"-->
                    <button type="submit" class="btn btn-primary" accesskey="enter">Salvar</button>
                  </div>                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal DELETE
      ########################## -->
      <div class="modal fade" id="bt_deletar" tabindex="-1" role="dialog" aria-labelledby="idtitulo" > 
      <!-- aria-hidden="true" -->
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h3 id="sombraletrapreta" style="font-weight: bold;" >Apagar Solicitação</h3>
            </div>
            <div class="modal-body">
              <form name="formsolicitacao" method="post" action="../_php/tb_delete.php" onsubmit="return deletarPhpAjax()" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label" id="letradestaque">Número Solicitação:</label> </br>
                    <input name="idreg" type="text" readonly="true" class="form-control" id="idreg"> </br>
                    <input type="hidden" name="tipoacesso" readonly="true" class="form-control" id="tipoacesso">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label" id="letradestaque">Data de Solicitação:</label> </br>
                    <input name="datasolicitacao" type="text" readonly="true" class="form-control" id="datasolicitacao"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label" id="letradestaque">Status:</label> </br>
                    <input name="status" type="text" readonly="true" class="form-control" id="status"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="paradosetor" class="form-control-label" id="letradestaque">Parado no Setor:</label> </br>
                    <input name="paradosetor" type="text" readonly="true" class="form-control" id="paradosetor"> </br>
                  </div>
                  <div class="modal-footer" class="form-group"> <!--class="btn btn-secondary"-->
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>  
                    <button type="button" class="btn btn-primary" accesskey="enter" onclick="deletarPhpAjax()">Deletar</button>
                  </div>                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal EDITAR
      ########################## -->
      <div class="modal fade" id="bt_editar" tabindex="-1" role="dialog" aria-labelledby="idtitulo" > 
      <!-- aria-hidden="true" -->
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h3 id="sombraletrapreta" style="font-weight: bold;" >Editar Solicitação</h3>
            </div>
            <div class="modal-body">
              <form name="editarsolicitacao" method="post" action="../_php/tb_editar.php" onsubmit="return editarPhpAjax()" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="data" id="sombraletrapreta">Data: <?php echo "$datahora"; ?></label>       
                    <input type="hidden" name="data_editar" id="data_editar" value="<?php echo $datahora_mysql; ?>" /> 
                    <input type="hidden" name="tipoacesso" readonly="true" class="form-control" id="tipoacesso">
                    <input type="hidden" name="idregeditar" readonly="true" class="form-control" id="idregeditar">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="solicitante_editar" id="sombraletrapreta">Solicitante: <?php echo "$nome"; ?></label> <br/>
                    <input type="hidden" name="id_solicitante_editar" id="id_solicitante_editar" value="<?php echo $idfuncionario; ?>" />                  
                  </div>
                  <div class="form-group col-md-12">
                    <label for="siglasetor" id="sombraletrapreta">Depto/Secretaria: <?php echo "$sigla - $depto"; ?></label> <br/>
                    <input type="hidden" name="status_editar" id="status_editar" value=1 />
                    <input type="hidden" name="status_setor_editar" id="status_setor_editar" value="<?php echo "$sigla"; ?>" />
                  </div>
                  <div class="form-group col-md-12">
                    <label for="id_setordestino" id="sombraletrapreta">Parado no setor</label> <br/> 
                    <input name="setorparado_editar" type="text" readonly="true" class="form-control" id="setorparado_editar"><br/>
                  </div>
                  <div class="form-group col-md-12"> 
                    <label for="descricao" id="sombraletrapreta">Descrição: </label>
                    <textarea type="text" class="form-control" style="height:108px;border-radius:20px;resize: none;" maxlength="500" rows="4" name="descricao_editar" id="descricao_editar" placeholder="Tamanho máximo 500 caracteres."></textarea> <br/>
                  </div>
                  <div class="modal-footer form-group">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button> 
                    <!--class="btn btn-secondary"-->
                    <button type="submit" class="btn btn-primary" accesskey="enter">Salvar</button>
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

          //Inicio do código do MODAL atualiza
          //**********************************
          $('#bt_atualiza').on('show.bs.modal', function (event) {
            
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
            $("input[type='hidden'][name='solicitacaoservico']").val("<?php echo $solicitacao; ?>");            
          } );

          //Inicio do código do MODAL Detalhe
          //**********************************
          $('#bt_detalhe').on('show.bs.modal', function (event) {
            
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
            $("input[type='text'][name='campo0']").val(stringToarray[0]);
            $("input[type='text'][name='campo1']").val(stringToarray[1]);
            $("input[type='text'][name='campo2']").val(stringToarray[2]);
            $("input[type='text'][name='campo3']").val(stringToarray[3]);
            $("input[type='text'][name='campo4']").val(stringToarray[4]);
            $("input[type='text'][name='campo5']").val(stringToarray[5]);
            $("input[type='text'][name='campo6']").val(stringToarray[6]);
            $("textarea[type='text'][name='campo7']").val(stringToarray[7]);
            $("input[type='text'][name='campo8']").val(stringToarray[8]);
            $("input[type='text'][name='campo9']").val(stringToarray[9]);
            $("input[type='text'][name='campo10']").val(stringToarray[10]);
            $("input[type='text'][name='campo11']").val(stringToarray[11]);
            $("input[type='text'][name='campo12']").val(stringToarray[12]);
            $("input[type='text'][name='campo13']").val(stringToarray[13]);
            $("input[type='text'][name='campo14']").val(stringToarray[14]);
            $("input[type='text'][name='campo15']").val(stringToarray[15]);
            $("input[type='text'][name='campo16']").val(stringToarray[16]);
            $("input[type='text'][name='campo17']").val(stringToarray[17]);
            $("input[type='text'][name='campo18']").val(stringToarray[18]);
            $("input[type='text'][name='campo19']").val(stringToarray[19]);
            $("input[type='text'][name='campo20']").val(stringToarray[20]);
            $("input[type='text'][name='campo21']").val(stringToarray[21]);
            $("input[type='text'][name='campo22']").val(stringToarray[22]);
            $("input[type='text'][name='campo23']").val(stringToarray[23]);
          } );

          //Inicio do código do MODAL NOVO
          //**********************************
          $('#bt_novo').on('show.bs.modal', function (event) {            
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this)
            modal.find('.modal-title').text('Titulo da janela do Modal ' + recipient)
            modal.find('.modal-body input').val(recipient)          
            // Código para passar os dados da linha para os campos do MODAL
            var textoToarray = new String(table.row( '.selected' ).data());
            var verifcaract = ",";
            var stringToarray = textoToarray.split(verifcaract);
            $("input[name='data']").val("<?php echo $datahora_mysql; ?>");
            $("input[name='status']").val("<?php echo 1; ?>");
            $("input[name='status_setor']").val("<?php echo $sigla; ?>");
            $("input[name='id_solicitante']").val("<?php echo $idfuncionario; ?>");
            $("input[type='hidden'][name='tipoacesso']").val('solicitacao');
          } );

          //Inicio do código do MODAL DELETE
          //**********************************
          $('#bt_deletar').on('show.bs.modal', function (event) {
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
            $("input[type='text'][name='idreg']").val(stringToarray[0]);
            $("input[type='text'][name='datasolicitacao']").val(stringToarray[1]);
            $("input[type='text'][name='status']").val(stringToarray[2]);
            $("input[type='text'][name='paradosetor']").val(stringToarray[3]);
            $("input[type='text'][name='tipotabela']").val("tb_solicitacao");
            $("input[type='hidden'][name='tipoacesso']").val('solicitacao');
          } );

          //Inicio do código do MODAL EDITAR
          //**********************************
          $('#bt_editar').on('show.bs.modal', function (event) {
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
            $("input[id='setorparado_editar'][name='setorparado_editar']").val(stringToarray[12]);
            $("textarea[id='descricao_editar'][name='descricao_editar']").val(stringToarray[7]);
            $("input[type='hidden'][name='idregeditar']").val(stringToarray[0]);
            $("input[type='hidden'][name='tipoacesso']").val('solicitacao');
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