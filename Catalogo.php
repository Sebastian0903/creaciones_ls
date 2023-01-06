<?php
require_once 'cart/conexion.php';
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/carrs.css">
    <link rel="stylesheet" href="css/estilos2.css">
	

	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/script.js"></script>




  <link rel="stylesheet" href="css/galeria.css" type="text/css" media="all">
<!-- <script src="js/jquery-1.10.2.min.js"></script> -->
<script language="javascript" src="js/imagen.js" type="text/javascript"></script>

  <meta name="viewport" content="width=device-width">

<link rel="stylesheet" type="text/css" href="content_slider_style.css" />
<script type="text/javascript" src="js/jquery.1.3.2.min.js" ></script>
<script type="text/javascript" src="js/jquery-ui.min.js" ></script>
    <title>Carrito</title>
</head>

<script type="text/javascript">
$(document).ready(function(){
        $("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
    });

  function goBack() {
  window.history.back();
}
</script>

<body>


<div class="wrap">
		<h1>Escoge un producto</h1>
		<div class="store-wrapper">
			<div class="category_list">
				<a href="#" class="category_item" category="all">Todo</a>
				<a href="#" class="category_item" category="Maletas">Maletas</a>
				<a href="#" class="category_item" category="chalecos">Chalecos</a>
				<a href="#" class="category_item" category="Chaquetas">Chaquetas</a>
				<a href="#" class="category_item" category="Gorras">Gorras</a>
				<a href="#" class="category_item" category="Bolsas">Bolsas</a>
				<a href="#" class="category_item" category="camisetas">Camisetas</a>
				<a href="#" class="category_item" category="camisas">Camisas</a>
				<a href="#" class="category_item" category="piernero">Piernero</a>
				<a href="#" class="category_item" category="maletin">Maletín</a>
				<a href="#" class="category_item" category="overoles">Overoles</a>
			</div>
			<section class="products-list">


<div class="container">

    
    <?php
$sql="SELECT * FROM products where estado_producto='Activo' ORDER BY nombre_producto ASC";
$resul= mysqli_query($conexion,$sql);

if(mysqli_num_rows($resul) > 0){
    while ($row=mysqli_fetch_array($resul)){
?>
    <div class="col-md-3 product-item" category="<?php echo $row['tipo_product'];?>">
        <form method="post" action="index.php?action=add&id=<?php echo $row['id_producto']; ?>">
            <?php

            ?>
            <div class="carro" align="center"category="<?php echo $row['tipo_product'];?>">
                <img src="cart/imgs/<?php echo $row['img'];?>" class="img-responsive" onclick="document.getElementById('<?php echo $row['id_producto']; ?>').style.display='block'" style="width:auto;"/><br />
                <h4 class="text-info"><?php echo $row['nombre_producto'];?></h4>
                <h4 class="text-danger">$<?php echo $row['precio_producto'];?></h4>
                
               
                
            </div>
            
            
        
    
        </form>
    </div>
       
       
       
       <div id="<?php echo $row['id_producto']; ?>" class="modales">
  
  <form class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('<?php echo $row['id_producto']; ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
      <div id="raro"><h4 class="descripcion"><?php echo $row['nombre_producto'];?></h4></div>
      <img src="cart/imgs/<?php echo $row['img'];?>" alt="Avatar" class="avatar">
      
    
    </div>
</form>
</div>
        
        <?php
    }
}
    ?>
    
    
    
              
     
     
     
    <div style="clear:both"></div>
    <br />
    
</div>





<script src="cart/js/jquery.min.js"></script>
<script src="cart/js/bootstrap.min.js"></script>
</body>
</html>


<style>

	
	
	
button:hover {
  opacity: 0.8;
}



/* Center the image and position the close button */
.imgcontainer {
  
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
}
.container {
  padding: 2px;
  display: contents;
}

    h4.descripcion{
        position: inherit;
        float: left;
    }

    #raro{
        width: 50%;
        height: auto;
        
        float: right;
        margin-right: 10%;
    }
    
    
    
/* The Modal (background) */
.modales {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  /* overflow: auto; */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  /* padding-top: 60px; */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
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

/* Add Zoom Animation */
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

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
	
	
	
	.products-list{
		display: flex;
		flex-wrap: wrap;
	}	
	
	
</style>

<script>
// Get the modal
var modal = document.getElementById('<?php echo $row['id_producto']; ?>');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>