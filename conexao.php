<?php
// Tente efetuar uma conexão a base de dados
try{
$pdo = new PDO("sqlite:banco.sqlite");
}
// Caso ocorra algum erro exiba a mensagem com as supostas informações
catch(PDOException $e){
	echo $e->getMessage;
}

// Criando estrutura do banco de dados -> Entidades e colunas
//$pdo->exec("create table if not exists usuarios(id int auto_increment, nome varchar(30) not null, senha varchar(30) not null, primary key(id));");

?>