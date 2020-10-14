<?php 
     session_start();
     require("conexion.php");
?>   

<!DOCTYPE html>
<html lang="es">
    
    <head>
	    <title>REGISTRO DE USUARIO</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minium-scale=1">
	    	
	</head>

    <body>
        
        <div class="contenedor">
      
     
         <section>
             
		    <form action="formulario_registro.php" method="POST" class="fomulario_reg" onsubmit="return validarData();" >
			
                <h2>Formulario De Registro</h2><br>
                
                <label for="ingreso1">Nombre</label>
                <input type="text" paceholder="Nombre" id="name" name="nombre" class="ingreso1" required><br>
                
                <label for="ingreso2">Apellidos</label>
                <input type="text" placeholder="Apellidos" id="last_name" name="apellido" class="ingreso2" required><br>
                
                <label for="ingreso3">Documento de Identidad</label>
                <input type="text" placeholder="Documento De Identidad" id="id_usr" name="identidad" class="ingreso3" required><br>
                    
                <label for="tipo_user">Tipo de Usuario</label>
                <select name="tipo_usr" class="tipo_user" required>
                    <option id="tipo1" value="primary">Director</option>
                    <option id="tipo2" value="secundary">Contador</option>
                    <option id="tipo1" value="primary">Almacenista</option>
                    <option id="tipo1" value="primary">Empleado</option>
                    <option id="tipo1" value="primary">bibliotecario</option>
                </select>
                
                <label for="ingreso5">Correo</label>    
				<input type="email" placeholder="Correo" id="mail" name="correo" class="ingreso5" required><br>
                    
                <label for="ingreso6">Nombre de Usuario</label>
	            <input type="text" placeholder="Nombre usuario" id="usr" name="usuario" class="ingreso6" required><br>
				
	            <label for="ingreso7">Contraseña</label>
                <input type="password" placeholder="Contraseña" id="pass" name="contrasena" class="ingreso7" required><br>
                    
                <input type="submit"  name ="boton_registro" value="Registrate!!!">"<br>
				
		    </form>
             
	     </section>		
	
		 
  </div>
        
        <script  src="validar_form.js" type="text/javascript"></script> 
        
</body>
</html>
	