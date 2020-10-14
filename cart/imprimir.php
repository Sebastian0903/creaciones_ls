 <?php
session_start();
if (($_SESSION['iniciar'])!="") {

require_once 'conexion.php';
if(isset($_POST['agregar']))
{
    if(isset($_SESSION['add_carro']))
    {
        $item_array_id_cart = array_column($_SESSION['add_carro'],'item_id');
        if(!in_array($_GET['id'],$item_array_id_cart))
        {

            $count= count($_SESSION['add_carro']);
            $item_array = array(
                'item_id'        => $_GET['id'],
                'item_nombre'    => $_POST['hidden_nombre'],
                'item_precio'    => $_POST['hidden_precio'],
                'item_cantidad'  => $_POST['cantidad'],
            );

            $_SESSION['add_carro'][$count]=$item_array;
        }
        else
            {
              echo '<script>alert("El Producto ya existe!");</script>';
            }
    }
    else
        {
            $item_array = array(
                'item_id'        => $_GET['id'],
                'item_nombre'    => $_POST['hidden_nombre'],
                'item_precio'    => $_POST['hidden_precio'],
                'item_cantidad'  => $_POST['cantidad'],
            );

            $_SESSION['add_carro'][0] = $item_array;
        }
}
if(isset($_GET['action']))
{
    if($_GET['action']=='delete')
    {
        foreach ($_SESSION['add_carro'] AS $key => $value)
        {
            if($value['item_id'] == $_GET['id'])
            {
                unset($_SESSION['add_carro'][$key]);
                echo '<script>alert("El Producto Fue Eliminado!");</script>';
                echo '<script>window.location="imprimir.php";</script>';
            }

        }

    }

}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="css/estilopro.css">
    <link rel="stylesheet" href="css/carrs.css">
    <title>Detalle de la Orden</title>
</head>

<script type="text/javascript">
  function goBack(1) {
  window.history.back();
}



html2canvas(document.body, {
  onrendered (canvas) {
    var link = document.getElementById('download');;
    var image = canvas.toDataURL();
    link.href = image;
    link.download = 'screenshot.png';
  }
 });
</script>

<body>
<a href="carro.php"> <img onclick="goBack()" src="../imgs/atras.png"  width=80 height=80></a>

 <div style="clear:both"></div>
 <div id="log"><p><img class="aa2" src="imgs/new_log.png" width="140" height="130" /></p></div>
        
        <center><h1>Detalle de la Orden</h1></center>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="40%">Item Nombre</th>
                <th width="10%">Cantidad</th>
                <th width="20%">Precio</th>
                <th width="15%">Total</th>
                <th width="5%">Acción</th>
            </tr>
            <?php
            if(!empty($_SESSION["add_carro"]))
            {
                $total = 0;
                foreach($_SESSION["add_carro"] as $keys => $values)
                {
                    ?>
                    <tr>
                        <td><?php echo $values["item_nombre"]; ?></td>
                        <td><?php echo $values["item_cantidad"]; ?></td>
                        <td>$ <?php echo $values["item_precio"]; ?></td>
                        <td>$ <?php echo number_format($values["item_cantidad"] * $values["item_precio"], 2);?></td>
                        <td></td>
                    </tr>
                    <?php
                    $total = $total + ($values["item_cantidad"] * $values["item_precio"]);
                }
                ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">$ <?php echo number_format($total, 2); ?></td>
                    <td><a id="download">Descargar pedido</a></td>
                    
                </tr>
                <?php
            }else{
                ?>
                <tr>
                    <td colspan="4" style="color: red" align="center"><strong>No hay Producto Agregado!</strong></td>
                </tr>
                <?php
            }
            ?>
        </table>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    </div>
</div>

<br>
<br>
<br>




<script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e){
  var key = window.Event ? e.which : e.keyCode
  return (key >= 48 && key <= 57)
}
</script>

<div class="group">
  <form action="registrar_compra.php" method="POST">
  <h2><em>Llene formulario para hacer encargo</em></h2>
  
     
        
      
      <label for="apellido">C.C <span><em>(requerido)</em></span></label>
      <input type="text" name="apellido" class="form-input" onKeyPress="return soloNumeros(event)" maxlength="10" minlength="8" required/>             
      
      <label for="email">Nombre <span><em>(requerido)</em></span></label>
      <input type="text" name="email" class="form-input" required/>

      <label for="apellido">Apellido <span><em>(requerido)</em></span></label>
      <input type="text" name="img" class="form-input" required/>             
      
       <label for="apellido">Teléfono<span><em>(requerido)</em></span></label>
      <input type="text" name="telefono" class="form-input" onKeyPress="return soloNumeros(event)" maxlength="10" minlength="7"  required/>             

<b>Seleccione forma de pago</b><br>
<div id="caja" class="caja">
  


      
    <select class="sel" id="tipo_id" name="tipo_id">
    <option value="#" selected>Forma de pago</option> 
     <option value="Tarjeta de crédito">Tarjeta de crédito</option> 
     <option value="Efectivo">Efectivo</option>
     <option value="Cheque">Cheque</option>
</select>
     </div> 
      <label for="email">Fecha de entrega <span><em>(requerido)</em></span></label>
      <input type="date" name="fecha" class="form-input" required/>


      <label for="email">Total <span><em>(requerido)</em></span></label>
      <input type="text" name="precio" class="form-input" value="$ <?php echo number_format($total, 2); ?>" >


     <center> <input class="form-btn" name="submit" type="submit" value="Encargar" /></center>
    </p>
  </form>
</div>










  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</body>
</html>


<script type="text/javascript">
    
html2canvas(document.body, {
  onrendered (canvas) {
    var link = document.getElementById('download');;
    var image = canvas.toDataURL();
    link.href = image;
    link.download = 'screenshot.png';
  }
 });
    
</script>








</body>
</html>


<?php

}else{

  echo '<script>
                            alert("Inicia sesion");
                            location.href = "form_inicio.html";
                          </script>';
                    exit;
}

?>


<style type="text/css">
  
 body {

/* Ubicación de la imagen */

background-image: url(../imgs/fn.jpg);

/* Para dejar la imagen de fondo centrada, vertical y

horizontalmente */

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


   #text{ 
    
    float:center;
    margin-top:50px;
  width:300px;
  height:40px;
  align-content: center;
    font-size:30px;
    border: 2px solid white;
    }
    
   table{border-collapse: collapse;}
    
    #log{
        border: 10px solid transparent;
       
float: right;
  width:180;
  height:200px;
  
    }
    
  th {     font-size: 18px;          padding: 8px;     background: blue;
        border: black 5px solid; color: white; }

td {    padding: 8px;     background: #EDEFF5; 
    color: black; border: gray 5px solid;   }

    tr{border: 2  black;}
    
.aaa{width: 100px; height: 30px;}


.caja {
   margin:10px auto 10px 0px;  
   border:1px solid #d9d9d9;
   height:30px;
   overflow: hidden;
   width: 230px;
   position:relative;
}
select {
   background: #FF9;
   border: none;
   font-size: 14px;
   height: 30px;
   padding: 5px;
   width: 250px;
   float: left;
   align-items: left;

}
select:focus{ outline: none;}

.caja::after{
  content:"\025be";
  display:table-cell;
  padding-top:7px;
  text-align:center;
  width:30px;
  height:30px;
  background-color:#d9d9d9;
  position:absolute;
  top:0;
  right:0px;  
  pointer-events: none;
}
      </style>

