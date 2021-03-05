<!DOCTYPE HTML>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	  <title>Painel</title>
	     </head>
	  <body>
	    <!-- script php -->
		<?php
		// Importando o validador de sessão 
		include_once("protecao_sessao.php");
		// Dando Boas vindas ao usuário 
		echo "Bem-vindo(a):".strtoupper($_SESSION['nome']);
		?>
		<!-- fim do scrip php -->
		
		<!-- Botão sair -->
		<button type="button" onClick="window.location.href='sair.php';">Sair</button>
		<!-- fim do botão sair -->
	      </body>
		    </html>