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
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title> Usuario-Solicitação</title>
    <!-- Aciona head padrão do sistema-->
    <?php include("../_php/head2.php") ?>
  </head>

  <body id="corfundogradleft">
    <header>
      <!-- Aciona navbar padrão do sistema-->
      <?php 
        include("../_php/navbar2.php"); 
        include("../_php/dropdown_funcionario.php"); 
        include("../_php/datahora.php");
        include("../_php/sql_funcoes.php");
        $valor = 1;
        $nome = $_SESSION['user_nome'];
        $idfuncionario = $_SESSION['user_idfuncionario'];
        $idreferencia = $_SESSION['user_id_referencia'];
        $nivelacesso = $_SESSION['user_nivel'];
        $sql = sqlquery("usuario", $idreferencia, $nivelacesso);
        $tb_completa = search($sql);  // echo '<pre>'; print_r($tb_completa); echo '</pre>';
      ?>
  
      <script type="text/javascript">
        function deletarPhpAjax() {
          $.ajax({
            url:'../_php/tb_delete.php', //caminho do arquivo a ser executado
            //dataType: 'html', //tipo do retorno
            type: "POST", //metodo de envio
            data: {'idreg' : $("#idreg").val(), 'tipoacesso' : $("#tipoacesso").val()}, //valores enviados
            //beforeSend: function(){
              //função chamada antes de realizar o ajax
            //},
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
              });
            },
            //success: function(data, textStatus){
                    //retorno dos dados
            //    },
            error: function(xhr,er){
              //tratamento de erro
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
          $.ajax({
            type: "POST",
            url:'../_php/tb_novo.php',
            data: {
              'usuario' : $("#usuario").val(),
              'senha' : $("#senha").val(),
              'email' : $("#email").val(),
              'nivel' : $("#nivel").val(),
              'ativo' : $("#ativo").val(),
              'id_funcionario' : $("#id_funcionario").val(),
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
              'usuario_editar'        : $("#usuario_editar").val(),
              'senha_editar'          : $("#senha_editar").val(),
              'email_editar'          : $("#email_editar").val(),
              'nivel_editar'          : $("#nivel_editar").val(),
              'ativo_editar'          : $("#ativo_editar").val(),
              'id_funcionario_editar' : $("#id_funcionario_editar").val(),
              'idreg'                 : $("#idreg").val(),
              'tipoacesso'            : $("#tipoacesso").val()
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
          <h3 id="sombraletrapreta" style="font-weight: bold;" >Operação > Usuario</h3>
        </div>
  
        <!-- Iniciar a tabela DataTable com acesso ao DataSouce -->
        <table id="exemplo" class="display table-bordered nowrap" width="100%" cellspacing="0" >  
          <!-- class="table table-bordered table-hover" --> 
          <thead>
            <tr id="sombraletrapreta">               
              <th>ID</th>
              <th>Usuario</th>
              <th>Senha</th>
              <th>e-mail</th>
              <th>Nivel</th>
              <th>Ativo</th>
              <th>Data Cadastro</th>
              <th>Data Aletração</th>
              <th>Data Acesso</th>
              <th>ID Funcionario</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($tb_completa as $user): ?>
            <tr>
              <td>
                <?= setvazio($user['id']); ?>                     
              </td>
              <td>
                <?= setvazio($user['usuario']); ?>                     
              </td>
              <td>
                <?= setvazio($user['senha']); ?>  
              </td>
              <td>
                <?= setvazio($user['email']); ?>                     
              </td>
              <td>
                <?= setvazio($user['nivel']); ?>                     
              </td>
              <td>
                <?= setvazio($user['ativo']); ?>
              </td>
              <td>                                                  
                <?= date_format(date_create($user['dtcadastro']), 'd-m-Y H:i:s'); ?>  
              </td>
              <td>                                                  
                <?= date_format(date_create($user['dtalteracao']), 'd-m-Y H:i:s'); ?>  
              </td>
              <td>                                                  
                <?= date_format(date_create($user['dtacesso']), 'd-m-Y H:i:s'); ?>  
              </td>
              <td>
                <?= setvazio($user['id_funcionario']); ?>
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

            "aoColumnDefs": [{
              "aTargets": [5],
              "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                if ( sData == 1  ) { 
                  $(nTd).css('color', 'green') 
                  $(nTd).css('font-weight', 'bold')                   
                }
                if ( sData == 0 ) { 
                  $(nTd).css('color', 'red') 
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
              <h3 id="sombraletrapreta" style="font-weight: bold;" >Novo Usuario</h3>
            </div>
            <div class="modal-body">
              <form name="novosusuario" method="post" action="../_php/tb_usuario.php" onsubmit="return novoPhpAjax()" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="data" id="sombraletrapreta">Data: <?php echo "$datahora"; ?></label>       
                    <input type="hidden" name="data" id="data" value="<?php echo $datahora_mysql; ?>" /> 
                  </div>
                  <div class="form-group col-md-6">
                    <label for="usuario" id="sombraletrapreta">Nome do Usuario</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" required="required">
                    <input type="hidden" name="tipoacesso" readonly="true" class="form-control" id="tipoacesso">                    
                  </div>
                  <div class="form-group col-md-6">
                    <label for="senha" id="sombraletrapreta">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senha" required="required">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email" id="sombraletrapreta">email</label>
                    <input type="email" class="form-control" name="email" id="email">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="nivel" id="sombraletrapreta">Nível de Acesso</label> <br/>
                    <select name="nivel" id="nivel" style="width:269px;height:35px;" required="required"> 
                      <option value="1">Operador                </option>
                      <option value="2">Chefe de Departamento   </option>
                      <option value="3">Diretor de Departamento </option>
                      <option value="4">Chefe Gabinete          </option>
                      <option value="5">Secretario Adjunto      </option>
                      <option value="6">Secretario              </option>
                      <option value="7">Administrador do Sistema</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="ativo" id="sombraletrapreta">Ativo</label>
                    <select name="ativo" id="ativo" style="width:269px;height:35px;" required="required"> 
                      <option value="0">Pendente</option>
                      <option value="1">Sim     </option>
                      <option value="2">Não     </option>
                    </select>                    
                  </div>
                  <div class="form-group col-md-6">
                    <label for="id_funcionario" id="sombraletrapreta">Funcionário</label>  <br/>
                    <select style="width:269px;height:35px;" name="id_funcionario" id="id_funcionario"> 
                      <?php foreach($tb_funcionario as $user): ?>
                        <option value="<?= $user['id_funcionario']; ?>"> <?= $user['nome'];?> </option>
                      <?php endforeach; ?>
                    </select> </br>
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
              <h3 id="sombraletrapreta" style="font-weight: bold;" >Apagar Usuario</h3>
            </div>
            <div class="modal-body">
              <form name="formusuario" method="post" action="../_php/delete_usuario.php" onsubmit="return deletarPhpAjax()" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="idreg" class="form-control-label" id="letradestaque">Número ID:</label> </br>
                    <input type="text" name="idreg" readonly="true" class="form-control" id="idreg"> </br>
                    <input type="hidden" name="tipoacesso" readonly="true" class="form-control" id="tipoacesso">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="datacadastrouser" class="form-control-label" id="letradestaque">Data de Cadastro:</label> </br>
                    <input name="datacadastrouser" type="text" readonly="true" class="form-control" id="datasolicitacao"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="usuario" class="form-control-label" id="letradestaque">Usuario:</label> </br>
                    <input name="usuario" type="text" readonly="true" class="form-control" id="usuario"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="emailuser" class="form-control-label" id="letradestaque">e-mail:</label> </br>
                    <input name="emailuser" type="text" readonly="true" class="form-control" id="emailuser"> </br>
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
              <h3 id="sombraletrapreta" style="font-weight: bold;" >Editar Usuario</h3>
            </div>
            <div class="modal-body">
              <form name="editarusuario" method="post" action="../_php/tb_editar.php" onsubmit="return editarPhpAjax()" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="data" id="sombraletrapreta">Data: <?php echo "$datahora"; ?></label>       
                    <input type="hidden" name="data_editar" id="data_editar" value="<?php echo $datahora_mysql; ?>" /> 
                    <input type="hidden" name="idreg" readonly="true" class="form-control" id="idreg">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="usuario" id="sombraletrapreta">Nome do Usuario</label>
                    <input type="text" class="form-control" name="usuario_editar" id="usuario_editar" required="required">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="senha" id="sombraletrapreta">Senha</label>
                    <input type="password" class="form-control" name="senha_editar" id="senha_editar" required="required">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email_editar" id="sombraletrapreta">email</label>
                    <input type="email" class="form-control" name="email_editar" id="email_editar">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="nivel_editar" id="sombraletrapreta">Nível de Acesso</label> <br/>
                    <select name="nivel_editar" id="nivel_editar" style="width:269px;height:35px;" required="required"> 
                      <option value="1">Operador                </option>
                      <option value="2">Chefe de Departamento   </option>
                      <option value="3">Diretor de Departamento </option>
                      <option value="4">Chefe Gabinete          </option>
                      <option value="5">Secretario Adjunto      </option>
                      <option value="6">Secretario              </option>
                      <option value="7">Administrador do Sistema</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="ativo" id="sombraletrapreta">Ativo</label>
                    <select name="ativo_editar" id="ativo_editar" style="width:269px;height:35px;" required="required"> 
                      <option value="0">Pendente</option>
                      <option value="1">Sim     </option>
                      <option value="2">Não     </option>
                    </select>                    
                  </div>
                  <div class="form-group col-md-6">
                    <label for="id_funcionario" id="sombraletrapreta">Funcionário</label>  <br/>
                    <select style="width:269px;height:35px;" name="id_funcionario_editar" id="id_funcionario_editar"> 
                      <?php foreach($tb_funcionario as $user): ?>
                        <option value="<?= $user['id_funcionario']; ?>"> <?= $user['nome'];?> </option>
                      <?php endforeach; ?>
                    </select> </br>
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
            $("input[type='hidden'][name='tipoacesso']").val('usuario');
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
            $("input[type='text'][name='datacadastrouser']").val(stringToarray[6]);
            $("input[type='text'][name='usuario']").val(stringToarray[1]);
            $("input[type='text'][name='emailuser']").val(stringToarray[3]);
            $("input[type='hidden'][name='tipoacesso']").val('usuario');
          } );

          //Inicio do código do MODAL EDITAR
          //**********************************
          $('#bt_editar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this)
            modal.find('.modal-title').text('Titulo da janela do Modal ' + recipient)
            modal.find('.modal-body input').val(recipient)          
            // Código para passar os dados da linha para os campos do MODAL
            var textoToarray = new String(table.row( '.selected' ).data());
            var verifcaract = ",";
            var stringToarray = textoToarray.split(verifcaract);
            $("input[type='text'][name='idreg']").val(stringToarray[0]);
            $("input[type='text'][name='datacadastrouser_editar']").val(stringToarray[6]);
            $("input[type='text'][name='usuario_editar']").val(stringToarray[1]);
            $("input[type='password'][name='senha_editar']").val();
            $("input[type='email'][name='email_editar']").val(stringToarray[3]);
            $("select[id='nivel_editar'][name='nivel_editar']").val(stringToarray[4]);
            $("select[id='ativo_editar'][name='ativo_editar']").val(stringToarray[5]);            
            $("select[id='id_funcionario_editar'][name='id_funcionario_editar']").val(stringToarray[9]);
            $("input[type='hidden'][name='tipoacesso']").val('usuario');
          } );
          
          //Inicio código para seleção da linha no DATATABLE
          $('#exemplo tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
              $(this).removeClass('selected');
            } else {
              table.$('tr.selected').removeClass('selected');
              $(this).addClass('selected');
            }
          } );
        } );
      </script>
    </div>
  </body>
</html>