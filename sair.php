<!DOCTYPE HTML>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	  <title>Saindo...</title>
	    </head>
	 <body>
	   <!-- script php responsável por destruir a sessão ativa -->
	    <?php
		 // Startando sessão 
		 session_start();
		 // Destruindo sessão 
		 session_destroy();
		 // Redirecionando 
		 echo "<script>window.location.href='login.php';</script>";
		?>
	   <!-- fim do script php -->
	    </body>
		   </html>