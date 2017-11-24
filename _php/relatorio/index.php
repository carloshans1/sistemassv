<?php  

 // Require no script da classe reportCliente  
 require_once "relatclass.php"; 
 
 /*  
  * Verifica se é uma submissão, se for instância o objeto reportCliente  
  * passa os parâmetros para o construtor, chama o método para construção do PDF  
  * e manda exibi-lo no navegador.  
  */  
 if(isset($_GET['submit'])):  
   $report = new reportCliente("report.css", "Relatório de Clientes");  
   $report->BuildPDF();  
   $report->Exibir("Relatório de Clientes");  
 endif;  
 ?>

<div style="clear:both; margin-top:0em; margin-bottom:1em;"><a href="http://www.devwilliam.com.br/php/  gerar-pdf-com-php-e-a-biblioteca-mpdf" target="_blank" rel="nofollow" class="u5f7fcec6734ddedbd6e5954747d44e74"><!-- INLINE RELATED POSTS 3/3 //--><style> .u5f7fcec6734ddedbd6e5954747d44e74 , .u5f7fcec6734ddedbd6e5954747d44e74 .postImageUrl , .u5f7fcec6734ddedbd6e5954747d44e74 .centered-text-area { min-height: 80px; position: relative; } .u5f7fcec6734ddedbd6e5954747d44e74 , .u5f7fcec6734ddedbd6e5954747d44e74:hover , .u5f7fcec6734ddedbd6e5954747d44e74:visited , .u5f7fcec6734ddedbd6e5954747d44e74:active { border:0!important; } .u5f7fcec6734ddedbd6e5954747d44e74 .clearfix:after { content: ""; display: table; clear: both; } .u5f7fcec6734ddedbd6e5954747d44e74 { display: block; transition: background-color 250ms; webkit-transition: background-color 250ms; width: 100%; opacity: 1; transition: opacity 250ms; webkit-transition: opacity 250ms; background-color: #2980B9; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.17); -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.17); -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.17); -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.17); } .u5f7fcec6734ddedbd6e5954747d44e74:active , .u5f7fcec6734ddedbd6e5954747d44e74:hover { opacity: 1; transition: opacity 250ms; webkit-transition: opacity 250ms; background-color: #D35400; } .u5f7fcec6734ddedbd6e5954747d44e74 .centered-text-area { width: 100%; position: relative; } .u5f7fcec6734ddedbd6e5954747d44e74 .ctaText { border-bottom: 0 solid #fff; color: #ECF0F1; font-size: 16px; font-weight: bold; margin: 0; padding: 0; text-decoration: underline; } .u5f7fcec6734ddedbd6e5954747d44e74 .postTitle { color: #FFFFFF; font-size: 16px; font-weight: 600; margin: 0; padding: 0; width: 100%; } .u5f7fcec6734ddedbd6e5954747d44e74 .ctaButton { background-color: #3498DB!important; color: #ECF0F1; border: none; border-radius: 3px; box-shadow: none; font-size: 14px; font-weight: bold; line-height: 26px; moz-border-radius: 3px; text-align: center; text-decoration: none; text-shadow: none; width: 80px; min-height: 80px; background: url(http://www.devwilliam.com.br/wp-content/plugins/intelly-related-posts/assets/images/simple-arrow.png)no-repeat; position: absolute; right: 0; top: 0; } .u5f7fcec6734ddedbd6e5954747d44e74:hover .ctaButton { background-color: #E67E22!important; } .u5f7fcec6734ddedbd6e5954747d44e74 .centered-text { display: table; height: 80px; padding-left: 18px; top: 0; } .u5f7fcec6734ddedbd6e5954747d44e74 .u5f7fcec6734ddedbd6e5954747d44e74-content { display: table-cell; margin: 0; padding: 0; padding-right: 108px; position: relative; vertical-align: middle; width: 100%; } .u5f7fcec6734ddedbd6e5954747d44e74:after { content: ""; display: block; clear: both; } </style><div class="centered-text-area"><div class="centered-text" style="float: left;"><div class="u5f7fcec6734ddedbd6e5954747d44e74-content"><span class="ctaText">Post relacionado:</span>  <span class="postTitle">Gerar PDF com PHP e a biblioteca mPDF</span></div></div></div><div class="ctaButton"></div></a></div>

 <!DOCTYPE html>  
 <html>  
   <head>  
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">  
     <title>Testando relatório com mPDF</title>  
   </head>  
   <body>  
     <form action="" method="GET" target="_blank">  
       <input type="submit" value="Gerar relatório" name="submit"/>  
     </form>  
   </body>  
 </html>  