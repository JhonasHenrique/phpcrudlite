<!DOCTYPE HTML>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
     <title>Logando...</title>
	   </head>
	 <body>
	 <!-- script php responsável pelo login -->
	 <?php 
	  // Importando conexão com a base de dados 
	  include_once("conexao.php");
	  // Validando entrada na página
	  if(!isset($_REQUEST['usuario']) and !isset($_REQUEST['senha'])){
		  echo "<script>window.location.href='login.php'</script>";
		  exit();
	  }
	  
	  // Pegando dados passados pelo form
	  $usuario = ADDSLASHES($_REQUEST['usuario']);
	  $senha = ADDSLASHES($_REQUEST['senha']);
	  
	  // Verificando se o usuário Passado existe -> Caso exista Passa para etapa de verificação de senha
	  $select = $pdo->query("SELECT nome FROM usuarios WHERE nome = '$usuario'");
	  $resultado  = $select->fetch(PDO::FETCH_ASSOC);
	  // Passando condição -> Para Verificar o retorno da contagem na base
	  if(empty($resultado)){
		  // Caso usuário informado não existir na base de dados
		  echo "<script>alert('Usuário ou senha incorretos!');</script>";
		  echo "<scripr>window.location.href='login.php';</script>";
	  }else{
		 // Caso ele existir -> Buscar a senha do mesmo e verificar se está de acordo! -> Se estiver Cria sessão para o mesmo.
		 $verifica_senha = $pdo->query("SELECT senha FROM usuarios WHERE nome = '$usuario'");
		 $resultado_senha = $verifica_senha->fetch(PDO::FETCH_ASSOC);
		 // Iterando array para extrair a senha do mesmo!
		 foreach($resultado_senha AS $senha_extraida){
			// Verificando a senha 
            if(password_verify($senha, $senha_extraida)){
              // Caso as senhas se corresponderem -> Efetua login -> Startar sessão
			   session_start();
			   $_SESSION['nome'] = $usuario;
			   $_SESSION['senha'] = $senha;
			   // Redirecionando o mesmo para o painel 
			   echo "<script>window.location.href='painel.php';</script>";
			   exit();
			}else{
               // Caso a senha estiver incorreta -> Avisar o usuário e redirecionar o mesmo!
			   echo "<script>alert('Usuário ou senha incorretos!');</script>";
			   echo "<script>window.location.href='login.php';</script>";
			}				
		 }
	  }
	 ?>
	 <!-- fim do script php responsável pelo login -->
	     </body>
		   </html>