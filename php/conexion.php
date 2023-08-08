<?php
    $BD_host="localhost";
    $BD_usr="id21123214_kert";
    $BD_pass="Sebas1003*";
    $BD_database="id21123214_programacion1";
    
    $conectar=mysqli_connect($BD_host,$BD_usr,$BD_pass);
    
    
    if(mysqli_connect_errno()){
         echo"no se ha logrado conectar a la base de datos";
    }
    
    mysqli_set_charset($conectar,"UTF8");
    
    mysqli_select_db($conectar,$BD_database) or die("error al conectar con la base de datos");
    
?>