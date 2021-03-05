<!DOCTYPE HTML>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	  <title>Cadastro</title>
	    </head>
      <body>
	  <!-- Informando usuário -->
	   <hr>
	    <center><h1><p>Cadastrar usuário</p></h1></center>
		  <hr>
	  <!-- fim da informação -->
	     <br>
		   <!-- Formulário de cadastro -->
		   <center><form name="cadastro" action="cadastrando.php" method="POST" onSubmit="return valida()">
		     <input type="text" name="usuario" id="usuario" placeholder="Digite um usuário"/>
			 <input type="password" name="senha" id="senha" placeholder="Digite sua senha"/>
			 <input type="submit" VALUE="Cadastrar"/>
		     </form></center>
		   <!-- fim do formulário de cadastro -->
		   
		   <!-- script que válida o formulário -->
		    <script type="text/javascript">
			 function valida(){
			   // Pegando campo usuário 
			   var  usuario = document.getElementById('usuario').value;
			   // Pegando senha 
			   var senha = document.getElementById('senha').value;
			   // Criando condição 
			   if(usuario == "" || senha == ""){
				   // Caso os campos estiverem vazios
				   alert('Preencha todos os campos');
				   return false;
			   }else{
				   // Caso os campos estiverem preenchidos 
				   return true;
			   }
			 }
			  </script>
		   <!-- fim do formulário de cadastro -->
	      </body>
		    </html>