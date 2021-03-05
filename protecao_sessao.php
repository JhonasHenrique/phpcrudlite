<?php
	     // Validando sessão ativa -> Uma proteção extra para alguns tipos de ataques 
         session_start();
         // Verificando se o usuário tem uma sessão ativa 
         if(!isset($_SESSION['nome']) and !isset($_SESSION['senha'])){
			 // Caso não existir uma sessão ativa -> Redirecione o usuário para login
            echo "<script>window.location.href='login.php';</script>";
			exit();
		 }		
		 // Incluindo conexão 
		 include_once("conexao.php");
         // Caso possuir uma sessão ativa -> Verificar se a sessão realmente pertence há um usuário cadastrado 
         $verifica_usuario = ADDSLASHES($_SESSION['nome']);
         $verifica_senha = ADDSLASHES($_SESSION['senha']);		
         // Efetuando consulta para validar sessão ativa 
         $consulta_usuario = $pdo->query("SELECT nome FROM usuarios WHERE nome = '$verifica_usuario'");
         $resultado_consulta1 = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
         // Passando condição 
         if(empty($resultado_consulta1)){
            // Caso seja uma sessão falsa -> Redirecione o usuário para login 
			echo "<script>window.location.href='login.php';</script>";
			exit();
		 }else{
            // Verificando a senha desse usuário com sessão ativa para evitar enganos/conflitos ou ataques
			$consulta_senha = $pdo->query("SELECT senha FROM usuarios WHERE nome = '$verifica_usuario'");
			$resultado_consulta2 = $consulta_senha->fetch(PDO::FETCH_ASSOC);
			// Iterando array com retorno da senha 
			foreach($resultado_consulta2 as $retorno_senha){
				// Efetuando verificação 
				if(!password_verify($verifica_senha, $retorno_senha)){
					echo "<script>window.location.href='login.php';</script>";
			        exit();
				}
			}
		 }			 
		?>