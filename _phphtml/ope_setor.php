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
    <title> Operação Setores</title>
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
        $sql = sqlquery("setor", $idreferencia, $nivelacesso);
        $tb_completa = search($sql);          
      ?>
      <script type="text/javascript">
        function deletarPhpAjax() {
          $.ajax({
            url:'../_php/tb_delete.php', //caminho do arquivo a ser executado
            //dataType: 'html', //tipo do retorno
            type: "POST", //metodo de envio
            data: {'idreg' : $("#idreg_deletar").val(), 'tipoacesso' : 'setor'}, //valores enviados
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
              'depto_novo' : $("#depto_novo").val(),
              'sigla_novo' : $("#sigla_novo").val(),
              'endereco_novo' : $("#endereco_novo").val(),
              'bairro_novo' : $("#bairro_novo").val(),
              'telefone_novo' : $("#telefone_novo").val(),
              'id_referencia_novo' : $("#id_referencia_novo").val(),
              'email_novo' : $("#email_novo").val(),
              'observacao_novo' : $("#observacao_novo").val(),
              'tipoacesso' : 'setor'
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
              'idreg' : $("#idreg_editar").val(),
              'depto_editar' : $("#depto_editar").val(),
              'sigla_editar' : $("#sigla_editar").val(),
              'endereco_editar' : $("#endereco_editar").val(),
              'bairro_editar' : $("#bairro_editar").val(),
              'telefone_editar' : $("#telefone_editar").val(),
              'id_referencia_editar' : $("#id_referencia_editar").val(),
              'email_editar' : $("#email_editar").val(),
              'observacao_editar' : $("#observacao_editar").val(),
              'tipoacesso' : 'setor'
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
          <h3 id="sombraletrapreta" style="font-weight: bold;" > Consulta > Setor </h3>
        </div>
  
        <!-- Iniciar a tabela DataTable com acesso ao DataSouce -->
        <table id="exemplo" class="display table-bordered nowrap" width="100%" cellspacing="0" >  
          <!-- class="table table-bordered table-hover" --> 
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
              <th>idS</th>
              <th>idR</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($tb_completa as $user): ?>
            <tr>
              <td> <?= $user['depto']; ?> </td>
              <td> <?= setvazio($user['sigla']); ?> </td>
              <td> <?= setvazio($user['endereco']); ?> </td>
              <td> <?= setvazio($user['bairro']); ?> </td>
              <td> <?= setvazio($user['telefone']);  ?> </td>
              <td> <?= setvazio($user['email']); ?> </td>
              <td> <?= retornareferencia($user['id_referencia'],$sql); ?> </td>     
              <td> <?= setvazio($user['observacao']); ?> </td>
              <td> <?= setvazio($user['id_setor']); ?> </td>
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
              <h3 id="sombraletrapreta" style="font-weight: bold;" >Novo Setor</h3>
            </div>
            <div class="modal-body">
              <form name="novosusuario" method="post" action="../_php/tb_usuario.php" onsubmit="return novoPhpAjax()" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-6 ">
                    <label for="nome" class="form-control-label" id="sombraletrapreta">Nome do Setor</label>
                    <input type="text" class="form-control" name="depto_novo" id="depto_novo" required="required">
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="sigla" class="form-control-label" id="sombraletrapreta">Sigla</label>
                    <input type="text" class="form-control" name="sigla_novo" id="sigla_novo" >
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="endereco" class="form-control-label" id="sombraletrapreta">Endereço</label>
                    <input type="text" class="form-control" name="endereco_novo" id="endereco_novo" >
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="bairro" class="form-control-label" id="sombraletrapreta">Bairro</label>
                    <input type="text" class="form-control" name="bairro_novo" id="bairro_novo">
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="telefone" class="form-control-label" id="sombraletrapreta">Telefone</label>
                    <input type="text" class="form-control" onkeyup="mascara( this, mtel );" name="telefone_novo" id="telefone_novo" maxlength="15">
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="id_referencia" class="form-control-label" id="sombraletrapreta">Referência</label>  <br/>
                    <select style="width:269px;height:35px;" name="id_referencia_novo" id="id_referencia_novo"> 
                      <?php foreach($tb_setor as $user): ?>
                        <option value="<?= $user['id_setor']; ?>"> <?= $user['depto'];?> </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12 ">
                    <label for="email" class="form-control-label" id="sombraletrapreta">e-mail</label>
                    <input type="email" class="form-control" name="email_novo" id="email_novo">
                  </div>
                  <div class="form-group col-md-12 ">
                    <label for="observacao" class="form-control-label" id="sombraletrapreta">Observação</label>
                    <textarea type="text" class="form-control" style="height:100px;border-radius:20px;resize: none;" maxlength="255" rows="5" name="observacao_novo" id="observacao_novo">  </textarea>
                  </div>
                  <div class="modal-footer form-group">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button> 
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
              <h3 id="sombraletrapreta" style="font-weight: bold;" >Apagar Setor</h3>
            </div>
            <div class="modal-body">
              <form name="formusuario" method="post" action="../_php/delete_usuario.php" onsubmit="return deletarPhpAjax()" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="setor" class="form-control-label" id="sombraletrapreta">Nome do Setor:</label>
                    <input type="text" class="form-control" name="depto_deletar" id="depto_deletar" readonly="true" required="required">
                    <input type="hidden" name="idreg_deletar" class="form-control" id="idreg_deletar"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="sigla" class="form-control-label" id="letradestaque">Sigla:</label> </br>
                    <input name="sigla_deletar" type="text" readonly="true" class="form-control" id="sigla_deletar"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="endereco" class="form-control-label" id="letradestaque">Endereço:</label> </br>
                    <input name="endereco_deletar" type="text" readonly="true" class="form-control" id="endereco_deletar"> </br>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="telefone" class="form-control-label" id="letradestaque">Telefone:</label> </br>
                    <input name="telefone_deletar" type="text" readonly="true" class="form-control" id="telefone_deletar"> </br>
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
              <form name="editar" method="post" action="../_php/tb_editar.php" onsubmit="return editarPhpAjax()" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-6 ">
                    <label for="setor" id="sombraletrapreta">Nome do Setor</label>
                    <input type="text" class="form-control" name="depto_editar" id="depto_editar" required="required">
                    <input type="hidden" name="idreg_editar" class="form-control" id="idreg_editar">
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="sigla" id="sombraletrapreta">Sigla</label>
                    <input type="text" class="form-control" name="sigla_editar" id="sigla_editar" >
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="endereco" id="sombraletrapreta">Endereço</label>
                    <input type="text" class="form-control" name="endereco_editar" id="endereco_editar" >
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="bairro" id="sombraletrapreta">Bairro</label>
                    <input type="text" class="form-control" name="bairro_editar" id="bairro_editar">
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="telefone" id="sombraletrapreta">Telefone</label>
                    <input type="text" class="form-control" onkeyup="mascara( this, mtel );" name="telefone_editar" id="telefone_editar" maxlength="15">
                  </div>
                  <div class="form-group col-md-6 ">
                    <label for="id_referencia" id="sombraletrapreta">Referência</label>  <br/>
                    <select style="width:269px;height:35px;" name="id_referencia_editar" id="id_referencia_editar"> 
                      <?php foreach($tb_setor as $user): ?>
                        <option value="<?= $user['id_setor']; ?>"> <?= $user['depto'];?> </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12 ">
                    <label for="email" id="sombraletrapreta">e-mail</label>
                    <input type="email" class="form-control" name="email_editar" id="email_editar">
                  </div>
                  <div class="form-group col-md-12 ">
                    <label for="observacao" id="sombraletrapreta">Observação</label>
                    <textarea type="text" class="form-control" style="height:100px;border-radius:20px;resize: none;" maxlength="255" rows="5" name="observacao_editar" id="observacao_editar">  </textarea>
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
            $("input[type='hidden'][name='idreg_deletar']").val(stringToarray[8]);
            $("input[type='text'][name='depto_deletar']").val(stringToarray[0]);
            $("input[type='text'][name='sigla_deletar']").val(stringToarray[1]);
            $("input[type='text'][name='endereco_deletar']").val(stringToarray[2]);
            $("input[type='text'][name='telefone_deletar']").val(stringToarray[4]);
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
            $("input[type='text'][name='depto_editar']").val(stringToarray[0]);
            $("input[type='text'][name='sigla_editar']").val(stringToarray[1]);
            $("input[type='text'][name='endereco_editar']").val(stringToarray[2]);
            $("input[type='text'][name='bairro_editar']").val(stringToarray[3]);
            $("input[type='text'][name='telefone_editar']").val(stringToarray[4]);
            $("input[type='email'][name='email_editar']").val(stringToarray[5]);
            $("input[type='text'][name='id_referencia_editar']").val(stringToarray[6]);
            $("textarea[type='text'][name='observacao_editar']").val(stringToarray[7]);
            $("input[type='hidden'][name='idreg_editar']").val(stringToarray[8]);
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