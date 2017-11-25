<?php

$conexion = mysqli_connect("localhost","root","","usuarios_avance");

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$password = $_POST["pass"];
$mensaje = $_POST["mensaje"];

$sel = "SELECT * FROM avance WHERE email='$email'";

$ejecutar = mysqli_query ($conexion, $sel);

//validacion de parametro vacio


	if(empty($_POST['nombre'])){
	echo "<h2>Digite el nombre</h2>";
	exit();
	}

		if(empty($_POST['email'])){
	echo "<h2>Se requiere un email</h2>";
	exit();
	}

		if(empty($_POST['pass'])){
	echo "<h2>Asigne una contraseña</h2>";
	exit();
	}

	if(empty($_POST['mensaje'])){
		echo "<h2>Escriba un mensaje</h2>";
		exit();
		}



$verifica_email = mysqli_num_rows($ejecutar);

	if($verifica_email == 1){

		echo "<h2>Este email ya se encuentra registrado</h2>";
		exit();
	}


	else{

		$insertar= "INSERT INTO avance (nombre, email, pass, mensaje) VALUES ('$nombre','$email', '$password', '$mensaje')";
		$ejecutar = mysqli_query($conexion, $insertar);

		if ($ejecutar){
			 echo "<h2>Usuario registrado con exito!</h2>";
			 this.reset();

		}
	}

?>