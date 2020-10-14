<?php 
     session_start();
	 require("conexion.php");
?>	 

<!DOCTYPE html>
<html lang="es">
    
    <head>
	   <title> INICIO</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minium-scale=1">
	    <link rel="stylesheet" href="../css/registrarse.css" type="text/css" media="all">	
	</head>

    <body>
        
        <center><h2>Iniciar Sesión</h2></center>
      <center><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><img src="imgs/img_avatar2.png"/> </button>
      </center>
      <div id="id01" class="modal">
     
         
             
	<form action="inicio.php" method="POST" class="modal-content animate" onsubmit="return validarData();" >
			
       <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          <img src="imgs/img_ingresar.png" alt="Avatar" class="avatar">
       </div>
                
                <div class="container">

                
                
                <label for="ingreso5">Correo</label><br>    
				<input type="email" placeholder="Correo" id="mail" name="correo" class="ingreso5" ><br>
               
	            <label for="ingreso7">Contraseña</label><br>
                <input type="password" placeholder="Contraseña" id="pass" name="contrasena" class="ingreso7"><br>
                    
                <input type="submit"  name ="inicio" value="Registrate!!!" class="registerbtn">"<br>
            	
              <h3>Si no se encuentra registrado presione<a href="../formulario_registro.php"> aquí</a></h3>
		    </form>
             
	     	
	
		 </div>
  
        
        <script  src="validar_Inicio.js" type="text/javascript"></script> 



        <style type="text/css">
            

body{
        aling-content:30;
        background-image: url(imgs/fond_regi.jpg); 



        background-position: center center;

/* Para que la imagen de fondo no se repita */

background-repeat: no-repeat;

/* La imagen se fija en la ventana de visualización para que la altura de la imagen no supere a la del contenido */

background-attachment: fixed;

/* La imagen de fondo se reescala automáticamente con el cambio del ancho de ventana del navegador */

background-size: cover;

/* Se muestra un color de fondo mientras se está cargando la imagen

de fondo o si hay problemas para cargarla */

background-color: #66999;


    }

            
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}


button {
  background-color: #0000FF;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}


.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}


.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}


.modal {
  display: none; 
  position: fixed; 
  z-index: 1; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.4); 
  padding-top: 40px;
}


.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; 
  border: 1px solid #888;
  width: 65%; 
}


.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}


.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}


@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}




        </style>
        
</body>
</html>