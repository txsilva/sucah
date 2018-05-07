<html>
<head>
<title<</title>
</head>
<body>
<?php

	echo "O texto enviado foi: " .$_GET['teste'];
	$get = $_GET['teste'];

?>
	<form action="testeform.php" method="get">
		<input type="text" name="teste" value="<?php echo $get ?>">
		<input type="submit" value="Enviar">
	</form>
</body>
</html>
