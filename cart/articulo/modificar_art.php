<?php
  session_start();
  require("../BD/conexion.php");


  $objConexion=Conectarse();
  if (($_SESSION['iniciar'])!="") {
 

?>

<!DOCTYPE html>

<html>

<head>

	<title>MODIFICACION</title>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minium-scale=1">
  	<link rel="stylesheet" type="text/css" href="../../css/estilopro.css">

</head>

<?php

}else{

  echo '<script>
          alert("Inicia sesion");
          location.href = "../php/form_inicio.php";
        </script>';
  exit;
}

?>

<body>
		<?php 

			$codigo=$_REQUEST['id_producto'];
			$sql="SELECT * FROM products WHERE id_producto='$codigo'";
			$result = $objConexion->query($sql);
            $compara_usr=mysqli_num_rows($result);
            $type=false;
      if($compara_usr != 1){
          echo '<script type="text/javascript">
                            alert("no esta registrado");
                           
                          </script>';
                    exit;
        }else{

     
     ?>
       <?php
  //vamos agregar cada fila de la tabla de acuerdo al número de empleados de forma dinamica<?php  echo $producto->id_producto?_>
  
  while ($producto = $result->fetch_object())
  {
	?>
		  <img onclick="goBack()" src="../../imgs/atras.png" align="left" width=80 height=80>

<div class="group">
<div class="logo" style="width: 15%; height:15% ; position: absolute; right:12px;">
    <img src="../../imgs/logo_kert.svg" alt="logo_kert" class="logo-img">
</div>
    <form autocomplete="off" action="actualizar_art.php?id_producto=<?php echo $producto->id_producto?>" method="POST" enctype="multipart/form-data">
        <h2><em>Modificar artículo</em></h2>
        <div class="form-img dp-flex" style="margin-bottom: 30px;">
            <div class="input-txt">
                <label for="email">Nombre 
                    </label>
                <input type="text" name="nombreart" class="form-input w10" value="<?php echo $producto->nombre_producto?>"/>
            </div>
            <div class="input-txt">
                <label for="email">precio
                <input autocomplete="off" onKeyPress="return soloNumeros(event)" type="text" name="precioart" class="form-input w10" value="<?php echo $producto->precio_producto?>"/>
                </label>
            </div>
            <div class="input-txt">
                
            </div>
        </div>
        <div class="form-img dp-flex">
          <div class="inp-img">
            <label for="apellido">Imagen principal</label>
                <input onchange="prueba(this)" class="w-i" name="imagen" type="file" />
            <img id="imagen" class='img-prev' src="../imgs/<?php  echo $producto->img  ?>">
          </div>
          <div class="inp-img">
            <label for="apellido">Imagen lateral</label>
                <input onchange="prueba(this)" class="w-i" name="img_lat" type="file" />
            <img id="img_lat" class='img-prev' src="../imgs_lat/<?php  echo $producto->img_lat ?>">
          </div>
          <div class="inp-img">
                <label for="apellido">Imagen trasera</label>
                    <input onchange="prueba(this)" class="w-i" name="img_back" type="file" />
                <img id="img_back" class='img-prev' src="../imgs_back/<?php  echo $producto->img_back ?>">
            </div>
          
        </div>
        <div class="form-img dp-flex">
            <div class="input-select">
                <label for="email">Tipo de producto
                <select name="tipo_product" class="button1 w10">
                <option id="tipo1" value="Maletas" <?php if($producto-> tipo_product == 'Maletas'){echo("selected");}?>>Maleta</option>
                <option id="tipo2" value="chalecos" <?php if($producto-> tipo_product == 'chalecos'){echo("selected");}?>>Chaleco</option>
                <option id="tipo1" value="Chaquetas" <?php if($producto-> tipo_product == 'Chaquetas'){echo("selected");}?>>Chaqueta</option>
                <option id="tipo2" value="Gorras" <?php if($producto-> tipo_product == 'Gorras'){echo("selected");}?>>Gorra</option>
                <option id="tipo1" value="Bolsas" <?php if($producto-> tipo_product == 'Bolsas'){echo("selected");}?>>Bolsa</option>
                <option id="tipo2" value="camisetas" <?php if($producto-> tipo_product == 'camisetas'){echo("selected");}?>>Camiseta</option>
                <option id="tipo1" value="camisas" <?php if($producto-> tipo_product == 'camisas'){echo("selected");}?>>Camisa</option>
                <option id="tipo1" value="overoles" <?php if($producto-> tipo_product == 'overoles'){echo("selected");}?>>Overol</option>
                <option id="tipo2" value="piernero" <?php if($producto-> tipo_product == 'piernero'){echo("selected");}?>>Piernero</option>
                <option id="tipo1" value="maletin" <?php if($producto-> tipo_product == 'maletin'){echo("selected");}?>>Maletín</option>
                </select>
            </div>
            <div class="input-select">
                <label for="email">Estado</label>
                <select name="estado_producto" class="button1 w10" required>
                  <option value="Activo" <?php if($producto-> estado_producto == 'Activo'){echo("selected");}?>>Activo</option>
                  <option value="Inactivo" <?php if($producto-> estado_producto == 'Inactivo'){echo("selected");}?>>Inactivo</option>
                </select>
            </div>
            <div class="input-select w4">
                <label for="descripcion">Descripción </label>
                <textarea name="descripcion" class="estilotextarea"><?php echo $producto->descripcion;?></textarea>
            </div>
        </div>
        <div class="dp-flex jf-c mrg-t2">
            <input class="form-btn" name="submit" type="submit" value="Guardar información" />
        </div>
    </form>
</div>
		  <?php  
        }
      
    ?>  	
		  

 
<?php  
        }
    
    ?>  	
	
</body>

</html>
<script type="text/javascript">
function goBack() {
    window.history.back();
}


const prueba = (file) => {
    const imgs = file.files
    const namImg = file.name

    $imagenPrevisualizacion = document.querySelector('#' + namImg);
    if (!imgs || !imgs.length) {
        $imagenPrevisualizacion.src = "";
        return;
    }

    const primerArchivo = imgs[0];
    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    $imagenPrevisualizacion.src = objectURL;
}
</script>
<style type="text/css">
  

 

    table{
        margin: 20px;
        margin-left: 10%;
        margin-right: 10%;
    }

.boton{
    background-color: blue;
    color: white;
    padding: 15px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;

}
td,th{background-color: #E8E8E8;}
</style>
<script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e){
  var key = window.Event ? e.which : e.keyCode
  return (key >= 48 && key <= 57)
}

 function goBack() {
  window.history.back();
}
</script>