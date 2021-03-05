<!DOCTYPE HTML>
<html lang="pt-br">
  <head>
     <meta charset="utf-8">
	  <title>Fazer Login</title>
	     </head>
	  <body>
	  <!-- Informação ao usuário -->
	   <hr>
	  <center><h1><p>Fazer login</p></h1></center>
	     <hr>
	  <!-- fim da informação ao usuário -->
	    <br>
	  <!-- formulário de login -->
	  <center><form name="login" action="logando.php" method="POST" onSubmit="return valida()">
	    <input type="text" name="usuario" id="usuario" placeholder="Digite seu usuário"/>
		<input type="password" name="senha" id="senha" placeholder="Digite sua senha"/>
		<input type="submit" VALUE="Login"/>
	    </form></center>
	  <!-- fim do formulário de login -->
	  
	  <!-- script que para validar o formulário -->
	  <script type="text/javascript">
	   function valida(){
		   // Pegando campos
		   var usuario = document.getElementById('usuario').value;
		   var senha = document.getElementById('senha').value;
		   // Passando condição
		   if(usuario == "" || senha == ""){
			   // Caso estiver vazio
			   alert('Preencha todos os campos!');
			   return false;
		   }else{
			   // Caso estiver preenchido 
			   return true;
		   }
	   }
	    </script>
	  <!-- fim do script de validação -->
	     </body>
		   </html>