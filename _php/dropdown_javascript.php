<!-- 	
 * Autor: Carlos Hans de Oliveira - Gestor de TI 
 * Data Criação: 21/06/2017
 * Data de Modificação: 21/06/2017
 * Cliente: SEDECT - Copyright 2017 Prefeitura de São Vicente.
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Arquivo navbar padrão - PHP
-->
  
		<!-- utilizar no navbar do sistema"-->
    <script>
			(function($){
				$(document).ready(function(){
					$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
						event.preventDefault(); 
						event.stopPropagation(); 
						$(this).parent().siblings().removeClass('open');
						$(this).parent().toggleClass('open');
					});
				});
			})(jQuery);
    </script>
