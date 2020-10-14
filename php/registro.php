<?php
   session_start();
   require("conexion.php");

   if(isset($_POST['boton_registro']) && $_POST
   ['nombre']!="" && $_POST['apellido']!='' && 
   $_POST['identidad']!="" && $_POST['tipo']!="" && $_POST['correo']!=""
   && $_POST['usuario']!="" &&$_POST['contrasena']!=""){

      $nameUsr=$POST