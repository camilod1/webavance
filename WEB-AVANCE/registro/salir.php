<?php
/* este formulario destruye las variables sesion */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Error</title>
  <?php include 'css/css.html'; ?>
</head>

<!-- crea una pagina de salida y destruye las variables de session -->

<body>
    <div class="form">
          <h1>Gracias por su visita</h1>
              
          <p><?= 'su sesion ha finalizado'; ?></p>
          
          <a href="index.php"><button class="button button-block"/>Regresar</button></a>

    </div>
</body>
</html>
