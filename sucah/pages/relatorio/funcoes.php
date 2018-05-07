<?php



//Abre conexão com o banco de dados

function DBConnect(){

	$link = @mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die(mysqli_connect_error);

	mysqli_set_charset($link, DB_CHARSET) or die(mysqli_error($link));

	return $link;

}



//Fecha conexão com o banco de dados

function DBClose($link){

	@mysqli_close($link) or die(mysqli_error($link));

}



//Protege contra SQL Injection

function DBEscape($dados){

	$link = DBConnect();

	

	if(!is_array($dados))

		$dados = mysqli_real_escape_string($link, $dados);

	else{

		$arr = $dados;

		

		foreach($arr as $key => $value){

			$key = mysqli_real_escape_string($link, $key);

			$value = mysqli_real_escape_string($link, $value);

			

			$dados[$key] = $value;

		}

	}

	

	DBClose($link);

	return $dados;

}



//Executa querys

function DBExecute($query){

	$link = DBConnect();

	$result = @mysqli_query($link, $query) or die(mysqli_error());

	

	$DBClose($link);

	return $result;

}



#Inserção

function DEInsere(){

	$link = DBConnect();

	$sql_insercao = "INSERT INTO tabela SET nome='Nome'";

	$query_insercao = mysqli_query($link, $sql_insercao) or die(mysqli_error($link));

}

?>