<?php

session_start();
  require("BD/conexion.php");

  if (isset($_POST['submit']) && $_POST ['apellido']!="" && $_POST ['email']!="" && $_POST ['img']!="" && $_POST ['telefono']!="" && $_POST['tipo_id']!="" && $_POST ['fecha']!="" && $_POST ['precio']!="") {

				  $codigo=$_POST['apellido'];
				  $nombreart=$_POST['email'];
				  $imgart=$_POST['img'];
				  $tel=$_POST['telefono'];
				  $tip=$_POST['tipo_id'];
				  $fechaentrega=$_POST['fecha'];
				  $precioart=$_POST['precio'];


				$consulta_art="SELECT * FROM pedidos WHERE id='$codigo'";


                $result_art=mysqli_query($conectar, $consulta_art);
                $compara_art=mysqli_num_rows($result_art);




				if($compara_art > 0){
					echo '<script>
                            alert("Este sujeto ya realizó un encargo");
                            window.history.go(-1);
                          </script>';"Este documento ya está en uso, por favor digita otro";                
                    
                    exit;



				}else{
					$consulta_guardar="INSERT INTO  pedidos (cc, nombre, apellido, telefono,tipo_id, fecha_entrega, total) VALUES ('$codigo','$nombreart','$imgart','$tel','$tip','$fechaentrega','$precioart') ";
					
					$result_guardar=mysqli_query($conectar,$consulta_guardar);
                      
                      echo "Encargo realizado";
					header("location: carro.php");
				
			
			}
			

			}else{
				echo "Digite todos los campos para continuar...";
                
			}

			?>