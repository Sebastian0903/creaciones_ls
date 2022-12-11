<?php
session_start();
extract ($_REQUEST);
require "../cart/BD/conexion.php";
$objConexion=Conectarse();


	 	if (isset($_POST['inicio'])) {

	 		if ($_REQUEST[correo]!="" && $_REQUEST[contrasena]!="") {

	 			


	 			$sql="select * from usuario where correo = '$_REQUEST[correo]' and contrasena = '$_REQUEST[contrasena]'";

	 			$resultado_acceso=$objConexion->query($sql);

	 			$validar_acceso=mysqli_num_rows($resultado_acceso);
	 			
	 			$usr_data=mysqli_fetch_assoc($resultado_acceso);

	 			if ($validar_acceso == 1) {
	 				
	 				
                    
                    
                    if($usr_data['tipo_usr'] == '1'){

	 					$_SESSION['iniciar']= 'ingresar';

	 					header("location: ../Index.html");
	 						 				}
                    
                    
                    if($usr_data['tipo_usr'] == '2'){

	 					$_SESSION['iniciar']= 'ingresar';

	 					header("location: ../Principalalma.html");
	 						 				}

                    
                    
                    if($usr_data['tipo_usr'] == '3'){

	 					$_SESSION['iniciar']= 'ingresar';

	 					header("location: ../Principaltraba.html");
	 						 				}
                    
                    
                    
                    if($usr_data['tipo_usr'] == '4'){

	 					$_SESSION['iniciar']= 'ingresar';

	 					header("location: ../Principalclient.html");
	 						 				}
                    
                    
                    

	 			}else{
				echo '<script>
                            alert("Este usuario no está registrado");
                            window.history.go(-1);
                          </script>';              
                    
                    exit;
                header("location: form_inicio.php");
			}
                
                
               
                
                
                
	 		}
	 	}
			?>