<?php
//Se reciben los datos del formulario
require "BD/conexion.php";
extract ($_REQUEST);

$objConexion=Conectarse();

$imagen = $_FILES['imagen']['name'];
$img_lat = $_FILES['img_lat']['name'];
$img_back = $_FILES['img_back']['name'];
				  
print_r($_REQUEST);

				$consulta_iddb="SELECT * FROM products WHERE id_producto='$_REQUEST[codigo]'";
				$consulta_imgdb="SELECT * FROM products WHERE img ='$imagen'";
        $consulta_img_latdb="SELECT * FROM products WHERE img_lat ='$img_lat'";
        $consulta_img_backdb="SELECT * FROM products WHERE img_back='$img_back'";

				$result_iddb=$objConexion->query($consulta_iddb);
        $compara_iddb=mysqli_num_rows($result_iddb);
         
        //imagen principal
        $result_imgdb=$objConexion->query($consulta_imgdb);
        $compara_imgdb=mysqli_num_rows($result_imgdb);

        //imagen lateral
        $result_imglatdb=$objConexion->query($consulta_img_latdb);
        $compara_imglatdb=mysqli_num_rows($result_imglatdb);

        //imagen trasera
        $result_img_backdb=$objConexion->query($consulta_img_backdb);
        $compara_img_backdb=mysqli_num_rows($result_img_backdb);
         
                

  if(isset($imagen) && $imagen != ""){
    print_r($_FILES);
        $tipo = $_FILES['imagen']['type'];
        $temp  = $_FILES['imagen']['tmp_name'];
        $temp2  = $_FILES['img_lat']['tmp_name'];
        $temp3  = $_FILES['img_back']['tmp_name'];

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
				}
        else if($compara_imgdb > 0 && $compara_imglatdb > 0 && $compara_img_backdb > 0){
					echo '<script>
                  alert("Esta imagen o nombre de imagen ya está en uso, por favor elija otro");
                  //window.history.go(-1);
                </script>';
          exit;
				}
        else if ($compara_iddd > 0) {
					echo '<script>
                  alert("Este id ya esta en uso, por favor digita otro");
                  window.history.go(-1);
                </script>';
          exit;
				} 
        else{
					
					
                    $sql="INSERT INTO  products (img, img_lat, img_back, nombre_producto, estado_producto, precio_producto, tipo_product, descripcion) VALUES 
                    ('$imagen','$img_lat','$img_back','$_REQUEST[nombreart]','$_REQUEST[estado]','$_REQUEST[precioart]','$_REQUEST[tipoart]','$_REQUEST[descripcion]')";
					
                    
                    $result_guardar = $objConexion->query($sql);
                    
                  //   $sql2="INSERT INTO  tipo_product (id_producto, tipo_producto) VALUES 
                  //   ('$_REQUEST[codigo]','$_REQUEST[tipoart]')";
					
                    
                  //   $resultado = $objConexion->query($sql2);
				

                    
                    
                    if($result_guardar){
              move_uploaded_file($temp,'imgs/'.$imagen);
              move_uploaded_file($temp2,'imgs_lat/'.$img_lat);
              move_uploaded_file($temp3,'imgs_back/'.$img_back);  

              print $temp;
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