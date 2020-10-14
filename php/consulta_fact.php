<?php 

    $conexion=mysqli_connect('localhost','root','','programacion');

 ?>








<!DOCTYPE html>
<html>
<head>
    <title>Buscar factura</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="js/Consulta_fact.js"></script>
    <link rel="stylesheet" href="../css/Consulta_fact.css" type="text/css" media="all">
    <script language="javascript">
        function doSearch()
        {
            const tableReg = document.getElementById('datos');
            const searchText = document.getElementById('searchTerm').value.toLowerCase();
            let total = 0;
 
            // Recorremos todas las filas con contenido de la tabla
            for (let i = 1; i < tableReg.rows.length; i++) {
                // Si el td tiene la clase "noSearch" no se busca en su cntenido
                if (tableReg.rows[i].classList.contains("noSearch")) {
                    continue;
                }
 
                let found = false;
                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                // Recorremos todas las celdas
                for (let j = 0; j < cellsOfRow.length && !found; j++) {
                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    // Buscamos el texto en el contenido de la celda
                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                        found = true;
                        total++;
                    }
                }
                if (found) {
                    tableReg.rows[i].style.display = '';
                } else {
                    // si no ha encontrado ninguna coincidencia, esconde la
                    // fila de la tabla
                    tableReg.rows[i].style.display = 'none';
                }
            }
 
            // mostramos las coincidencias
            const lastTR=tableReg.rows[tableReg.rows.length-1];
            const td=lastTR.querySelector("td");
            lastTR.classList.remove("hide", "red");
            if (searchText == "") {
                lastTR.classList.add("hide");
            } else if (total) {
                td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");
            } else {
                lastTR.classList.add("red");
                td.innerHTML="No se han encontrado coincidencias";
            }
        }


        function goBack() {
  window.history.back();
}
    </script>
 
   
<body>
<center>
    <div id="calendario">
	<div id="busca">
    <form>
	<img onclick="goBack()" src="../imgs/atras.png" align="left" width=80 height=80>
        <strong><h2>¿Qué busca?</h3></strong> 
        
    </form>
	</div>
	

		
		<div id="busca">
    <form action="#" name="buscar">
      <p>Buscar ... MES
	  <input id="searchTerm" placeholder="maletas,gorras,etc.." type="text" onkeyup="doSearch()" /></h2>
        <select name="buscames">
          <option value="0">Compra</option>
          <option value="1">Venta</option>
          
        </select>
      ... AÑO ...
        <input type="button" value="BUSCAR" onclick="mifecha()" />
      ... 

      </p>
    </form>
  </div>
	</div>	
</center>
		
		
		<center>
    <p>


        <table id="datos" align="center" border="1" >
        <tr>
            <td class="arrib"><center>cc</center></td>
            <td class="arrib"><center>Nombre</center></td>
            <td class="arrib"><center>apellido</center></td>
            <td class="arrib"><center>telefono</center></td>
            <td class="arrib"><center>fecha</center></td>  
            <td class="arrib"><center>Metodo de pago</center></td>  
            <td class="arrib"><center>total</center></td> 
        </tr>

        <?php 
        $sql="SELECT * from pedidos";
        $result=mysqli_query($conexion,$sql);

        while($mostrar=mysqli_fetch_array($result)){
         ?>

        <tr>
            <td class="ident"> <strong> <center><?php echo $mostrar['cc'] ?></strong></center></td>


            <td><center> <strong> <?php echo $mostrar['nombre'] ?></strong></center></td>


            <td><center> <strong> <?php echo $mostrar['apellido'] ?></strong></center></td>



            <td><center> <strong> <?php echo $mostrar['telefono'] ?></strong></center></td>


            <td><center> <strong> <?php echo $mostrar['fecha_entrega'] ?></strong></center></td>


            <td><center> <strong> <?php echo $mostrar['tipo_id'] ?></strong></center></td>


            <td><center> <strong> <?php echo $mostrar['total'] ?></strong></center></td>


            <tr class='noSearch hide'>
                <td colspan="5"></td>
            </tr>


            
            
        </tr>
    <?php 
    }
     ?>
        
   </center>
    </p>
</body>
</html>

