<?php
// variable de sesion 

session_start();

//-datos de conexion a la base de datos 


$conexion = mysqli_connect("localhost","root","","avance");

$email = $_POST["email"];
$password = $_POST["pass"];


//comparacion de los datos del formulario con los de la BD
$sel = "SELECT * FROM usuarios WHERE email='$email' AND password='$password'";

$ejecutar = mysqli_query ($conexion, $sel);


//en esta estructura de control se valida si xiste el usuario o no , si es asi  se añaden los atributos a la variable de sesion
//para poder crear el mensaje de bienvenida en el header del perfil

$verifica_email = mysqli_num_rows($ejecutar);

	if($verifica_email == 0){

			$_SESSION['message'] = "El usuario no existe";
		    header("location: error.php");
		}

	else{

		$user = $ejecutar->fetch_assoc();	

		$_SESSION['email'] = $user['email'];
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['apellido'] = $user['apellido'];
        $_SESSION['logged_in'] = true;

        header("location: perfil.php");

		}

?>




