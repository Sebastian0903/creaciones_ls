<?php
//Se reciben los datos del formulario
require "../cart/BD/conexion.php";
extract ($_REQUEST);

$objConexion=Conectarse();


				  

				$consulta_iddb="SELECT * FROM usuario WHERE id_empleado='$_REQUEST[identidad]'";
				$consulta_maildb="SELECT * FROM usuario WHERE correo='$_REQUEST[correo]'";
				
				$result_iddb=$objConexion->query($consulta_iddb);
                $compara_iddb=mysqli_num_rows($result_iddb);
         
                $result_maildb=$objConexion->query($consulta_maildb);
                $compara_maildb=mysqli_num_rows($result_maildb);

        


        

				
			
				if($compara_iddb > 0){
					echo '<script>
                            alert("Este id ya esta en uso, por favor digita otro");
                            window.history.go(-1);
                          </script>';
                    exit;
				}else if($compara_maildb > 0){
					echo '<script>
                            alert("Esta correo ya esta en uso, por favor elija otro");
                            window.history.go(-1);
                          </script>';
                    exit;
				} else{
					
					
					$sql="INSERT INTO  cliente
                    (id_cliente,nombre_cliente,telefono_cliente,email_cliente,direccion_cliente,estado_cliente,fecha_registro) VALUES 
                    ('$_REQUEST[identidad]','$_REQUEST[nombre]','$_REQUEST[telefono]','$_REQUEST[correo]','$_REQUEST[direccion]','$_REQUEST[estado]','$_REQUEST[fecha_ingreso]')";
					 
                    
    

                    $resultado = $objConexion->query($sql);
                    
				
                    
                    
                    if($resultado){

             echo '<script>
                            alert("Se ha registrado el usuario");
                            location.href = "form_inicio.php";
                          </script>';
                    exit;
             
         }else{
				echo '<script>
                            alert("Digite todos los campos para continuar");
                            window.history.go(-1);
                          </script>';
                    exit;
			}

                }
			
			
			?>