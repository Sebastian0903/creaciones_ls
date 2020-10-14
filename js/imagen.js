// JavaScript Document
	
	imagenes = new Array();
//Agrega tantas imágenes como necesites en el array
	imagenes[0] = "imgs/1.jpg";
	imagenes[1] = "imgs/2.jpg";
	imagenes[2] = "imgs/3.png";
    imagenes[3] = "imgs/4.jpg";
    imagenes[4] = "imgs/5.jpg";
    imagenes[5] = "imgs/6.jpg";
    imagenes[6] = "imgs/7.jpg";
    imagenes[7] = "imgs/8.jpg";
    imagenes[8] = "imgs/9.jpg";
    imagenes[9] = "imgs/10.jpg";
    imagenes[10] = "imgs/11.jpg";
    imagenes[11] = "imgs/12.jpg";
    imagenes[12] = "imgs/13.jpg";
    
	siguiente = 0;
	 
	function CambiaImagen()
	{
	dimensiones = $("#panel-imagen").width();
	$("#marco img").css({left: -dimensiones+"px"}).attr("src", imagenes[siguiente]);
	$("#panel-imagen img").animate({left: "+="+dimensiones});
	$("#panel-imagen a").attr("href", imagenes[siguiente]);
	 
	siguiente = siguiente+1;
	
	
	if (siguiente >= imagenes.length)
	{
	siguiente = 0;
	}
	//Aquí puedes colocar el tiempo para cada transición de imagen
	transicion = 1500;
	setTimeout("CambiaImagen()", transicion);
	}
	 
	$(function(){
		CambiaImagen();
	});