<?php
/* aqui se muestra la informacion del usuario y las paginas propias de su perrfil */
session_start();

// valida si el usuario esta logueado
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "debe loguearse para ingresar a este sitio";
  header("location: error.php");    
}
else {
    
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $email = $_SESSION['email'];
  }
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">

 <!--aqui se utilizan las variables de session para personalizar la pagina   --> 
  <title>Bienvenido <?= $nombre.' '.$apellido ?></title>
  <?php include 'css/css.html'; ?>
</head>

<body>
  <div class="form">

          <h1>Bienvenido</h1>
          
          <p>
          <?php 
     
        
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              unset( $_SESSION['message'] );
          }
          
          ?>
          </p>
          
          <h2><?php echo $nombre.' '.$apellido; ?></h2>
          <p><?= $email ?></p>
          
          <a href="salir.php"><button class="button button-block" name="salir"/>Salir</button></a>

    </div>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
