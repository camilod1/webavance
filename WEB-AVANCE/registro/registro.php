<?php

$conexion = mysqli_connect("localhost","root","","avance");

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$password = $_POST["pass"];

$sel = "SELECT * FROM usuarios WHERE email='$email'";

$ejecutar = mysqli_query ($conexion, $sel);


//estructura de control con la cual se verificara que no hayan registros duplicados de email en la BD

$verifica_email = mysqli_num_rows($ejecutar);

	if($verifica_email > 0){  //si el email existe despliega mensaje de error 

		    $_SESSION['message'] = 'El email ya existe';
    		header("location: error.php");
	}


	else{ // de lo contrario seprosede a insertar el registro en la BD

		$insertar= "INSERT INTO usuarios (nombre, apellido, email, password) VALUES ('$nombre', '$apellido', '$email', '$password')";
		$ejecutar = mysqli_query($conexion, $insertar);

		if ($ejecutar){

			 $_SESSION['message'] = ' usuario registrado con exito!';
			header("location: perfil.php"); 
		}
	}

?>