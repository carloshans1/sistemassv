<!--  
 * Autor: Carlos Hans de Oliveira - Gestor de TI 
 * Data Criação: 27/06/2017
 * Data de Modificação: 27/06/2017
 * Cliente: SEDECT - Prefeitura de São Vicente
 * Sistema: Gerenciamento de solicitações internas de serviços da SEDECT
 * Copyright 2017 Prefeitura de São Vicente.
 * Arquivo datahora - php (Extrai a data e hora atual)
-->

<?php
	// exemplos:
	//$today = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm
	//$today = date("m.d.y");                         // 03.10.01
	//$today = date("j, n, Y");                       // 10, 3, 2001
	//$today = date("Ymd");                           // 20010310
	//$today = date('h-i-s, j-m-y, it is w Day');     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
	//$today = date('\i\t \i\s \t\h\e jS \d\a\y.');   // it is the 10th day.
	//$today = date("D M j G:i:s T Y");               // Sat Mar 10 17:16:18 MST 2001
	//$today = date('H:m:s \m \i\s\ \m\o\n\t\h');     // 17:03:18 m is month
	//$today = date("H:i:s");                         // 17:16:18
	$datahora_mysql = date("Y-m-d H:i:s");                  // 2001-03-10 17:16:18 (the MySQL DATETIME format)

	$datahora = date("d-m-Y H:i:s");                  // 2001-03-10 17:16:18 (the MySQL DATETIME format)
	$data = date("d-m-Y");                   					// 2001-03-10 (the MySQL DATETIME format)
	$hora = date("H:i:s");                   					// 17:16:18 (the MySQL DATETIME format)
?>
