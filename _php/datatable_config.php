<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI 
 * Data Criação: 06/07/2017
 * Data de Modificação: 30/07/2017
 * Cliente: SEDECT - Prefeitura de São Vicente
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Copyright 2017 Prefeitura de São Vicente.
 * Arquivo datatable_config - php (configura e padroniza o formato da tabela)
-->

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

		<!-- Configuração do DATATABLE-->
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
