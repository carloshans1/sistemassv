<?php
	$valor="";
	if ($_SESSION['erroacesso']) {	$valor = $_SESSION['erroacesso']; }
  session_destroy(); // Destrói a sessão limpando todos os valores salvos
  session_start(); // Inicia a sessão
  $_SESSION['erroacesso'] = $valor;
	$_SESSION['verifylogin'] = false;
  header("Location: ../../index.php"); exit; // Redireciona o visitante
?>      