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
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title> Operação Funcionarios</title>
    <!-- Aciona head padrão do sistema-->
    <?php include("../_php/head2.php") ?>
  </head>

  <body id="corfundogradleft">
    <header>
      <!-- Aciona navbar padrão do sistema-->
      <?php 
        include("../_php/navbar2.php"); 
        include("../_php/dropdown_referencia.php"); 
        include("../_php/dropdown_funcionario.php"); 
        include("../_php/datahora.php");
        include("../_php/sql_funcoes.php");
        $valor = 1;
        $nome = $_SESSION['user_nome'];
        $idfuncionario = $_SESSION['user_idfuncionario'];
        $idreferencia = $_SESSION['user_id_referencia'];
        $nivelacesso = $_SESSION['user_nivel'];
        $idsetor = $_SESSION['user_id_setor'];
        $sql = sqlquery("funcionario", $idreferencia, $nivelacesso);
        $tb_completa = search($sql);  
        // echo '<pre>'; print_r($tb_completa); echo '</pre>';
      ?>

      <script type="text/javascript">
        function deletarPhpAjax() {
          $.ajax({
            url:'../_php/tb_delete.php', //caminho do arquivo a ser executado
            //dataType: 'html', //tipo do retorno
            type: "POST", //metodo de envio
            data: {'idreg' : $("#idreg").val(), 'tipoacesso' : 'funcionario'}, //valores enviados
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
              'nome' : $("#nome").val(),
              'matricula' : $("#matricula").val(),
              'cargo' : $("#cargo").val(),
              'tipocontratacao' : $("#tipocontratacao").val(),
              'id_referencia' : $("#id_referencia").val(),
              'email' : $("#email").val(),
              'telefone' : $("#telefone").val(),
              'whatsapp' : $("#whatsapp").val(),
              'observacao' : $("#observacao").val(),
              'slack' : $("#slack").val(),
              'tipoacesso' : 'funcionario'
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
              'idreg_editar' : $("#idreg_editar").val(),
              'nome_editar' : $("#nome_editar").val(),
              'matricula_editar' : $("#matricula_editar").val(),
              'cargo_editar' : $("#cargo_editar").val(),
              'tipocontratacao_editar' : $("#tipocontratacao_editar").val(),
              'email_editar' : $("#email_editar").val(),
              'telefone_editar' : $("#telefone_editar").val(),
              'whatsapp_editar' : $("#whatsapp_editar").val(),
              'id_referencia_editar' : $("#id_referencia_editar").val(),
              'slack_editar' : $("#slack_editar").val(),
              'observacao_editar' : $("#observacao_editar").val(),
              'tipoacesso' : 'funcionario'
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
        <h3 id="sombraletrapreta" style="font-weight: bold;" >Consulta > Funcionario</h3>
      </div>
      <!-- Iniciar a tabela DataTable com acesso ao DataSouce -->
      <!-- class="table table-bordered table-hover" --> 
      <table id="exemplo" class="display table-bordered nowrap" width="100%" cellspacing="0" >  
          <thead>
            <tr id="sombraletrapreta">
              <th>Nome</th>
              <th>Matricula</th>
              <th>Cargo</th>
              <th>Tipo_Contratacao</th>
              <th>e-mail</th>
              <th>Telefone</th>
              <th>Whatsapp</th>
              <th>Slack</th>
              <th>Observação</th>
              <th>Depto</th>
              <th>Sigla</th>
              <th>idF</th>
              <th>idR</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($tb_completa as $user): ?>
            <tr>
              <td> <?= setvazio($user['nome']); ?> </td>
              <td> <?= setvazio($user['matricula']); ?> </td>
              <td> <?= setvazio($user['cargo']); ?> </td>
              <td> <?= setvazio($user['tipocontratacao']); ?> </td>
              <td> <?= setvazio($user['email']); ?> </td>
              <td> <?= setvazio($user['telefone']); ?> </td>
              <td> <?= setvazio($user['whatsapp']); ?> </td>     
              <td> <?= setvazio($user['slack']); ?> </td>
              <td> <?= setvazio($user['observacao']); ?> </td>
              <td> <?= setvazio($user['depto']); ?> </td>
              <td> <?= setvazio($user['sigla']); ?> </td>
              <td> <?= setvazio($user['id_funcionario']); ?> </td>
              <td> <?= setvazio($user['id_referencia']); ?> </td>
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
              <h3 id="sombraletrapreta" style="font-weight: bold;" >Novo Funcionario</h3>
            </div>
            <div class="modal-body">
              <form name="novosusuario" method="post" action="../_php/tb_novo.php" onsubmit="return novoPhpAjax()" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-6 ">
                    <label for="nome" id="sombraletrapreta">Nome</label>
                    <input type="text" class="form-control" name="nome_novo" id="nome" required="required">
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="matricula" id="sombraletrapreta">Matricula</label>
                    <input type="text" class="form-control" name="matricula_novo" id="matricula" >
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="cargo" id="sombraletrapreta">Cargo</label>
                    <input type="text" class="form-control" name="cargo_novo" id="cargo" >
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="tipocontratacao" id="sombraletrapreta">Tipo Contratação</label> <br/>
                    <select name="tipocontratacao_novo" id="tipocontratacao" style="width:269px;height:35px;"> 
                      <option>Estatutário</option>
                      <option>Estagiário</option>
                      <option>Comissionado</option>
                      <option>Tercerizado</option>
                      <option>CODESAVI</option>
                      <option>Voluntário</option>
                      <option>Patrulheiro</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="email" id="sombraletrapreta">e-mail</label>
                    <input type="email" class="form-control" name="email" id="email">
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="telefone" id="sombraletrapreta">Telefone</label>
                    <input type="text" class="form-control" onkeyup="mascara( this, mtel );" name="telefone" id="telefone" maxlength="15">
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="whatsapp" id="sombraletrapreta">Whatsapp</label>
                    <input type="text" class="form-control" name="whatsapp" id="whatsapp">
                  </div></br>
                  <div class="form-group col-md-6 ">
                    <label for="id_referencia" id="sombraletrapreta">Referência</label>  <br/>
                    <select style="width:269px;height:35px;" name="id_referencia" id="id_referencia"> 
                        <?php foreach($tb_setor as $user): ?>
                            <option value="<?= $user['id_setor']; ?>"> <?= $user['depto'];?> </option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12 ">
                    <label for="slack" id="sombraletrapreta">Slack (sistema de comunicação interna)</label>
                    <input type="text" class="form-control" name="slack" id="slack">
                  </div>                  
                  <div class="form-group col-md-12 ">
                    <label for="observacao" id="sombraletrapreta">Observação</label>
                    <textarea type="text" class="form-control" style="height:50px;border-radius:20px;resize: none;" maxlength="255" rows="4" name="observacao" id="observacao">  </textarea>
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
              <h3 id="sombraletrapreta" style="font-weight: bold;" >Apagar Funcionario</h3>
            </div>
            <div class="modal-body">
              <form name="formusuario" method="post" action="../_php/tb_delete.php" onsubmit="return deletarPhpAjax()" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="idreg" class="form-control-label" id="letradestaque">Número ID:</label> </br>
                    <input type="text" name="idreg" readonly="true" class="form-control" id="idreg"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="matricula" class="form-control-label" id="letradestaque">Matricula:</label> </br>
                    <input type="text" name="matricula_apagar" id="matricula_apagar" readonly="true" class="form-control"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="funcionario" class="form-control-label" id="letradestaque">Funcionario:</label> </br>
                    <input type="text" name="funcionario_apagar" id="funcionario_apagar" readonly="true" class="form-control"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="cargo" class="form-control-label" id="letradestaque">Cargo:</label> </br>
                    <input name="cargo_apagar" type="text" readonly="true" class="form-control" id="cargo_apagar"> </br>
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
              <h3 id="sombraletrapreta" style="font-weight: bold;" >Editar Funcionario</h3>
            </div>
            <div class="modal-body">
              <form name="editarusuario" method="post" action="../_php/tb_editar.php" onsubmit="return editarPhpAjax()" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-6 ">
                    <label for="nome" id="sombraletrapreta">Nome</label>
                    <input type="text" class="form-control" name="nome_editar" id="nome_editar" required="required">
                    <input type="hidden" name="idreg_editar" readonly="true" class="form-control" id="idreg_editar">
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="matricula" id="sombraletrapreta">Matricula</label>
                    <input type="text" class="form-control" name="matricula_editar" id="matricula_editar" >
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="cargo" id="sombraletrapreta">Cargo</label>
                    <input type="text" class="form-control" name="cargo_editar" id="cargo_editar" >
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="tipocontratacao" id="sombraletrapreta">Tipo Contratação</label> <br/>
                    <select name="tipocontratacao_editar" id="tipocontratacao_editar" style="width:269px;height:35px;"> 
                      <option>Estatutário</option>
                      <option>Estagiário</option>
                      <option>Comissionado</option>
                      <option>Tercerizado</option>
                      <option>CODESAVI</option>
                      <option>Voluntário</option>
                      <option>Patrulheiro</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="email" id="sombraletrapreta">e-mail</label>
                    <input type="email" class="form-control" name="email_editar" id="email_editar">
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="telefone" id="sombraletrapreta">Telefone</label>
                    <input type="text" class="form-control" onkeyup="mascara( this, mtel );" name="telefone_editar" id="telefone_editar" maxlength="15">
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="whatsapp" id="sombraletrapreta">Whatsapp</label>
                    <input type="text" class="form-control" name="whatsapp_editar" id="whatsapp_editar">
                  </div></br>
                  <div class="form-group col-md-6 ">
                    <label for="id_referencia" id="sombraletrapreta">Referência</label> <br/>
                    <select style="width:269px;height:35px;" name="id_referencia_editar" id="id_referencia_editar"> 
                      <?php foreach($tb_setor as $user): ?>
                          <option value="<?= $user['id_setor']; ?>"> <?= $user['depto'];?> </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12 ">
                    <label for="slack" id="sombraletrapreta">Slack (sistema de comunicação interna)</label>
                    <input type="text" class="form-control" name="slack_editar" id="slack_editar">
                  </div>                  
                  <div class="form-group col-md-12 ">
                    <label for="observacao" id="sombraletrapreta">Observação</label>
                    <textarea type="text" class="form-control" style="height:50px;border-radius:20px;resize: none;" maxlength="255" rows="4" name="observacao_editar" id="observacao_editar">  </textarea>
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
            //$("input[type='hidden'][name='tipoacesso_novo']").val('funcionario');
          } );

          //Inicio do código do MODAL DELETE
          //**********************************
          $('#bt_deletar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this)
            modal.find('.modal-title').text('Titulo da janela do Modal ' + recipient)
            modal.find('.modal-body input').val(recipient)          
            // Código para passar os dados da linha para os campos do MODAL
            var textoToarray = new String(table.row( '.selected' ).data());
            var verifcaract = ",";
            var stringToarray = textoToarray.split(verifcaract);
            $("input[type='text'][name='idreg']").val(stringToarray[11]);
            $("input[type='text'][name='matricula_apagar']").val(stringToarray[1]);
            $("input[type='text'][name='funcionario_apagar']").val(stringToarray[0]);
            $("input[type='text'][name='cargo_apagar']").val(stringToarray[2]);
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
            $("input[type='hidden'][name='idreg_editar']").val(stringToarray[11]);
            $("input[type='text'][name='nome_editar']").val(stringToarray[0]);
            $("input[type='text'][name='matricula_editar']").val(stringToarray[1]);
            $("input[type='text'][name='cargo_editar']").val(stringToarray[2]);
            $("select[id='tipocontratacao'][name='tipocontratacao_editar']").val(stringToarray[3]);
            $("input[type='email'][name='email_editar']").val(stringToarray[4]);
            $("input[type='text'][name='telefone_editar']").val(stringToarray[5]);
            $("input[type='text'][name='whatsapp_editar']").val(stringToarray[6]);
            $("select[id='id_referencia_editar'][name='id_referencia_editar']").val(stringToarray[12]);
            $("input[type='text'][name='slack_editar']").val(stringToarray[7]);
            $("textarea[type='text'][name='observacao_editar']").val(stringToarray[8]);
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