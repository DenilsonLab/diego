
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Password</title>
</head>
<body>
	<form action="" method="post">
		<input type="text" name="passwordIngreso">
		<button type="submit">Crear Contraseña</button>
	</form>
</body>
</html>
<?php 

if (isset($_POST["passwordIngreso"])) {
	$encriptar = crypt($_POST["passwordIngreso"], '$6$rounds=5000$usesomesillystringforsalt$');
	echo $encriptar;

}

?>