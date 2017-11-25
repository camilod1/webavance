<?php 

// manejo de sessiones 
session_start();

//----------------------------------------creacion de la cookie----------------
if (isset($_COOKIE['contador'])){
  setcookie('contador', $_COOKIE['contador']+1, time() +365*24*60*30);
 // echo "Numero de visitas: ".$_COOKIE['contador'];
}

else
{
  setcookie('contador', 1, time() +365*24*60*30);
  //echo "Esta es su primera visita ";
}
//---------------------------------------------------------------------------

?>


<!DOCTYPE html>
<html>
<head>
	<title>formulario de registro</title>
	<meta charset="utf-8">

<!-- //------------------------------------inclusion de hojas de estilo-------------------------------//-->
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script type="text/javascript">


//se crea una funcion para enviar los parametros ajax a la cadena de conexion 
			$("#Enviar").click(function(){   // formulario de registro

				var nombre_usuario = $("#nombre").val();
				var apellido_usuario = $("#apellido").val();
				var email_usuario = $("#email").val();
				var pass_usuario = $("#pass").val();

// utilizacion de metodos ajax para la escritura en Base de datos 
			$.ajax({
				url:"registro.php",
				data:{nombre:nombre_usuario, apellido:apellido_usuario, email:email_usuario, pass:pass_usuario},
				type:"POST",
				success:function(datos){
					$("#resultado").html(datos);
					}
				})
			})


					$("#Login").click(function(){   //formulario de login 

				var email_usuario = $("#email2").val();
				var pass_usuario = $("#pass2").val();

			$.ajax({
				url:"login.php",
				data:{email:email_usuario, pass:pass_usuario},
				type:"POST",
				success:function(datos){
					$("#resultado").html(datos);
					}
				})
			})			

		})



	</script>

<!--en esta seccion se crea una lista la cual contiene 2 pestañas uyna para cada accion   -->
</head>
<body>
	<div class="form">
      
      <ul class="tab-group">
        <li class="tab"><a href="#registro">Registro</a></li>
        <li class="tab active"><a href="#ingreso">Ingreso</a></li>
      </ul>
      
      <div class="tab-content">

         <div id="ingreso">   
          	<h1>Bienvenido</h1>
          
        <form action="login.php" method="post" autocomplete="off" >
          
         	<div class="field-wrap">
            	<label>
            	  	Email Address<span class="req">*</span>
            	</label>
            	<input type="email" required autocomplete="off" id="email2" name="email"/>
          	</div>
          
         	<div class="field-wrap">
            	<label>
              		Password<span class="req">*</span>
            	</label>
            	<input type="password" required autocomplete="off" id ="pass2" name="pass"/>
          	</div>
          
          	<button type="submit" class="button button-block" name="login" id="Login"/>Ingresar</button>
          
        </form>

        </div>
          
        
        <div id="registro">   
          <h1>Registro de usuario</h1>
          
          <form action="registro.php" method="post" autocomplete="off">
          
          	<div class="top-row">

            	<div class="field-wrap">
              		<label>
                		Nombre<span class="req">*</span>
              		</label>
             		<input type="text" required autocomplete="off" id="nombre" name='nombre' />
            	</div>
        
            	<div class="field-wrap">
              		<label>
                		Apellido<span class="req">*</span>
              		</label>
              		<input type="text" required autocomplete="off" id="apellido" name='apellido' />
            	</div>
          	</div>

          		<div class="field-wrap">
            		<label>
              			Email<span class="req">*</span>
            		</label>
            		<input type="email" required autocomplete="off" id="email" name='email' />
          		</div>
	          
	          	<div class="field-wrap">
	            	<label>
	             		Password<span class="req">*</span>
	            	</label>
	            	<input type="password" required autocomplete="off" id ="pass" name='pass'/>
	          	</div>
          
          		<button type="submit" class="button button-block" name="enviar" id="Enviar"/>Enviar</button>
				  
          </form>

        </div>  
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->

	<script src="js/index.js"></script>	

</body>
</html>
