/*CODIGO DE JAVASCRIPT*/

function validarForm() {
    var nombre, apellidos, correo, usuario, clave, telefono, id, expresion;
    nombre = document.getElementById('nombre').value;
    apellidos = document.getElementById('apellidos').value;
    correo = document.getElementById('correo').value;
    usuario = document.getElementById('usuario').value;
    clave = document.getElementById('clave').value;
    telefono = document.getElementById('telefono').value;
    id = document.getElementById('id_usr').value;
    
    var tipo_usr = document.querySelectorAll('select.tipo_user');
    
    var expresion = /\w+@\w+\.+[a-z]/;
    
    if(nombre === "" || apellidos === "" || correo === "" || usuario === "" || tipo_usr === "" || clave === "" || telefono === "" || id_usr === "") {
       
        alert("todos los campos son obligatorios!!!");
        return false;
       
    }else if(nombre.length > 60) {
            
            alert("el nombre es muy largo, maximo 60 caracteres!!!");
            return false;
        
    }else if(apellidos.length > 30) {
            
            alert("el apellido es muy largo, maximo 30 caracteres!!!");
            return false;
    }else if(correo.length > 100) {
        
            alert("el correo es muy largo, maximo 100 caracteres!!!");
            return false;

    
    
    }else if(!expresion.test(correo)){
        
            alert("el correo no es valido!!!");
            return false;

    }else if(usuario.length > 20) {
            
            alert("el nombre de usuario es muy largo, maximo 20 caracteres!!!");
            return false;
    
    }else if(clave.length > 20) {
             
             alert("la contraseña es muy largo, maximo 20 caracteres!!!");
             return false;
             
   }else if(telefono.length > 20) {
             
             alert("el telefono es muy largo, maximo 20 caracteres!!!");
             return false;
             
    }else if(isNaN(telefono)) {
             
             alert("El telefono ingresado no es un numero");
             return false;
             
   
        
    }
}