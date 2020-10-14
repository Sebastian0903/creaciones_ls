id = 0;

function validar_form_on_submit(form){
    if (form.mail.value == form.mail2.value)
    {
        alert ('Los mails son iguales');
        return true;
    }
    else
    {
        alert ('Los mails ingresados deben ser iguales');
        return false;
    }
}


 function cargar_variables(){
 
    producto_lista = new Array();
    producto_medida1 = new Array();
 
    divProductos = document.getElementById("Productos");
    divElegirProducto = document.getElementById("elegir_producto");    
    divElegirColor = document.getElementById("codigo_elegir");    
    divProductosComprados = document.getElementById("productos_comprados");
 }

function agregar_producto()
{
    document.getElementById("producto_select").selectedIndex=0;
}