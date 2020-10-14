<?php
    $BD_host="localhost";
    $BD_usr="root";
    $BD_pass="";
    $BD_database="programacion";
    
    $conectar=mysqli_connect($BD_host,$BD_usr,$BD_pass);
    
    
    if(mysqli_connect_errno()){
         echo"no se ha logrado conectar a la base de datos";
    }
    
    mysqli_set_charset($conectar,"UTF8");
    
    mysqli_select_db($conectar,$BD_database) or die("error al conectar con la base de datos");
    
?>