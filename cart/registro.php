<?php
//Se reciben los datos del formulario
require "BD/conexion.php";
extract ($_REQUEST);

$objConexion=Conectarse();

$imagen = $_FILES['imagen']['name'];
				  

				$consulta_iddb="SELECT * FROM products WHERE id_producto='$_REQUEST[codigo]'";
				$consulta_maildb="SELECT * FROM products WHERE img='$imagen'";
				
				$result_iddb=$objConexion->query($consulta_iddb);
                $compara_iddb=mysqli_num_rows($result_iddb);
         
                $result_maildb=$objConexion->query($consulta_maildb);
                $compara_maildb=mysqli_num_rows($result_maildb);

        

                $consulta_iddd="SELECT * FROM tipo_product WHERE id_producto='$_REQUEST[codigo]'";
				

				$result_iddd=$objConexion->query($consulta_iddd);
				$compara_iddd=mysqli_num_rows($result_iddd);
         
                

  if(isset($imagen) && $imagen != ""){
        $tipo = $_FILES['imagen']['type'];
        $temp  = $_FILES['imagen']['tmp_name'];

       if( !((strpos($tipo,'gif') || strpos($tipo,'jpeg') || strpos($tipo,'webp') || strpos($tipo,'png')))){
          $_SESSION['mensaje'] = 'solo se permite archivos jpeg, gif, webp, png';
          $_SESSION['tipo'] = 'danger';
          header('location:registro_car.php');
       }
                                                                                                                                                                                                                                                                                                                                                                           









				
			
				else if($compara_iddb > 0){
					echo '<script>
                            alert("Este id ya esta en uso, por favor digita otro");
                            window.history.go(-1);
                          </script>';
                    exit;
				}else if($compara_maildb > 0){
					echo '<script>
                            alert("Esta imagen ya esta en uso, por favor elija otro");
                            window.history.go(-1);
                          </script>';
                    exit;
				}elseif ($compara_iddd > 0) {
					echo '<script>
                            alert("Este id ya esta en uso, por favor digita otro");
                            window.history.go(-1);
                          </script>';
                    exit;
				} else{
					
					
                    $sql="INSERT INTO  products (id_producto, img, nombre_producto, estado_producto, fecha_registro, precio_producto,descripcion,unidades_dispo,IVA) VALUES 
                    ('$_REQUEST[codigo]','$imagen','$_REQUEST[nombreart]','$_REQUEST[estado]','$_REQUEST[fecha]','$_REQUEST[precioart]','$_REQUEST[describ]','$_REQUEST[dispo]','$_REQUEST[iva]')";
					
                    
                    $result_guardar = $objConexion->query($sql);
                    
                    $sql2="INSERT INTO  tipo_product (id_producto, tipo_producto) VALUES 
                    ('$_REQUEST[codigo]','$_REQUEST[tipoart]')";
					
                    
                    $resultado = $objConexion->query($sql2);
				

                    
                    
                    if($result_guardar){
              move_uploaded_file($temp,'imgs/'.$imagen);   
             echo '<script>
                            alert("Se ha registrado el artículo");
                            location.href = "gestion.php";
                          </script>';
                    exit;
             
         }else{
             $_SESSION['mensaje'] = 'ocurrio un error en el servidor';
             $_SESSION['tipo'] = 'danger';
         }
                    
                    
                    

					
                }

				
			
			}else{
				echo '<script>
                            alert("Digite todos los campos para continuar");
                            window.history.go(-1);
                          </script>';
                    exit;
			}
			?>