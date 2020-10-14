function validarForm() {
    

    var contrasena = document.getElementById('pass').value;
    var correo = document.getElementById('mail').value;
    
    var expresion1 = /\w+@\w+\.+[a-z]/;
    
    if(contrasena === "" || correo === "") {
       
        alert("todos los campos son obligatorios!!!");
        return false;
       
    }else if(contrasena.length > 20) {
             
             alert("la contraseña es muy largo, maximo 20 caracteres!!!");
             return false;
             
    }else if(correo.length > 100) {
        
            alert("el correo es muy largo, maximo 100 caracteres!!!");
            return false;
    
    }else if(!expresion1.test(correo)){
        
            alert("el correo no es valido!!!");
            return false;
        
    }
}