<?php
   session_start();
   require("php/conexion.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/estilodreg.css" type="text/css" media="all">
<title>INGRESAR</title>
<meta charset="utf-8"/>
</head>
<body>

<center><h2>INGRESAR</h2></center>

<center><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><img src="imgs/img_avatar2.png"/> </button>
</center>
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="imgs/img_ingresar.png" alt="Avatar" class="avatar">
    </div>

    







<form action="php/registrar.php" method="POST" class="fomulario_reg" onsubmit="return validarData();">
  <div id="body">
        
        
        
        
      <div id="subir">
    
    
  <div class="container">
      
    
    <center><h1 class="mejor"><font face="godofwar">REGISTRARSE</font></h1></center>
    
    <hr>

    <label for="name"><b>Nombre</b></label>
    <input type="text" placeholder="Digite su nombre" id="Nombre" name="Nombre" >

  <label for="name"><b>Apellido</b></label>
    <input type="text" placeholder="Digite su apellido" id="apellido" name="apellido" >

  

   <b>Tipo de usuario</b>
   <br>

   <select id="tipo_usr" name="tipo_usr">
     <option value="value1">Contador</option> 
     <option value="value2" selected>Director ejecutivo</option>
     <option value="value3">Almacenista</option>
     <option value="value4">Empleado</option>
     <option value="value5">Cliente</option>
     <option value="value6">Proveedor</option>
   </select>
<br>
<br>
    <label for="psw"><b>Correo</b></label>
    <input type="email" placeholder="Digite su correo" id="correo" name="correo" >
<br>
    <label for="psw"><b>usuario</b></label>
    <input type="text" placeholder="Digite su usuario" id="usuario" name="usuario" >

    <label for="psw"><b>Contraseña</b></label>
    <input type="password" placeholder="Digite su contraseña" id="contrasena" name="contrasena" >

    <label for="ingreso3"><b>Documento de Identidad</b></label>
    <input type="number" placeholder="Documento De Identidad" id="CC_usuario" name="identidad" class="ingreso3" min="1000000000" max="9999999999" >
  
      
    <hr>

    <input type="submit"  name ="enviar" value="Registrate!!!"><font face="godofwar">
  </div>
 <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
      <span class="psw">olvidó su <a href="#">contraseña?</a></span>
    </div>
  </form>
</div>
  <div class="container signin">
    <center><p><a href="Principal.html" ><img src="imgs/boton.png" width=80 height=80></a></p></center>
  </div>
            </div>
        </div>
    </div>
</form>
      
        </div>
    </div>
    <br>

    </form>















    

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
		
    }
	

}
</script>
<center><p><a href="Principal.html" ><img src="imgs/boton.png" width=80 height=80></a></p></center>
</body>
</html>
