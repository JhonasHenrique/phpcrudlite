<!DOCTYPE HTML>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	  <title>Cadastrando...</title>
	    </head>
	  <body>
	   <!-- script php que efetua o cadastro -->
	    <?php
		//  Importando a conexão
		include_once("conexao.php");
	    // Validando entrada na página 
		if(!isset($_REQUEST['usuario']) and !isset($_REQUEST['senha'])){
		   echo "<script>window.location.href='cadastro.php';</script>";
		   exit();
		}
	    
		// Pegando Dados passados no form cadastro
		$usuario = ADDSLASHES($_REQUEST['usuario']);
		$senha = ADDSLASHES(password_hash($_REQUEST['senha'], PASSWORD_DEFAULT));
		// Gerando id único para o usuário na base
		$id = uniqid();
		// Verificando se esse usuário já possui cadastro na base 
		$select = $pdo->query("SELECT nome FROM usuarios WHERE nome = '$usuario'");
		$resultado = $select->fetch(PDO::FETCH_ASSOC);
		
		// Passando Condição 
		if(empty($resultado)){
			// Caso usuário não possuir cadastro -> Cadastrar o mesmo
			try{
				$pdo->query("INSERT INTO usuarios(id, nome, senha) VALUES('$id','$usuario','$senha')");
			}
			// Caso houver algum erro ao cadastrar usuário -> Avisar o mesmo
			catch(PDOException $e){
				echo "<script>alert('Ocorreu um erro ao cadastrar usuário');</script>";
				echo "<script>window.location.href='cadastro.php';</script>";
				exit();
			}finally{
				echo "<script>window.location.href='login.php';</script>";
			}
		}else{
			// Caso o mesmo possui cadastro -> Não cadastrar o mesmo
			    echo "<script>alert('O usuário $usuario Já possui cadastro!');</script>";
				echo "<script>window.location.href='cadastro.php';</script>";
				exit();
		}
		?>
	   <!-- fim do script php que efetua o cadastro -->
	     </body>
		    </html>