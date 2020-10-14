function validar form(){

    var nombre = document.getElementById('name').value;
    var apellidos = document.getElementById('last_name').value;
    var usuario = document.getElementById('usr').value;
    var contraseña = document.getElementById('pass').value;
    var correo = document.getElementById('mail').value;
    var id = document.getElementById('id_usr').value;
    
    var tipo_usr = document.querySelectorAll('select.tipo_user');

    var expresion1 = /\w+@\w+\.+[a-z]/;

    if (usuario === "" ||  contrasena === "" || correo === ""){


         alert("todos los campos son obligatorios!!");
         return false;

    

    }else if(nombre.length > 30) {

         alert("el nombre es muy largo, maximo 30 caracteres!!");
         return false;
        




    }else if(apellidos.length > 30) {

         alert("el apellido es muy largo, maximo 30 caracteres!!");
         return false;
    

    }else if(usuario.length > 20) {

         alert("el usuario es muy largo, maximo 20 caracteres!!");
         return false;

    }else if(correo.length > 100){


         alert("el correo es muy largo, maximo 100 caracteres!!");
         return false;

    }else if(!expresion1.test(correo)){

         alert("el correo valido es valido");
         return false;
         


    }

}