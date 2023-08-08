<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/estilopro.css">
    <title>Registro de Trabajador de Máquinas de Coser</title>
</head>

<body>
<div class="group">
	<div class="logo" style="width: 15%; height:15% ; position: absolute; right:12px;">
        <img src="../imgs/logo_kert.svg" alt="logo_kert" class="logo-img">
    </div>
	<form action="registroSqlCliente.php" method="post" enctype="multipart/form-data">
		<h2><em>Solicitud de Trabajador</em></h2>

		<div class="w8 mrg-b15">
			<label for="nombre">Nombre:</label>
			<input type="text" name="nombre" class="form-input w10" required><br>
		</div>
		<div class="w10 mrg-b15 dp-flex">
			<div class="w48">
				<label for="identificacion">Identificación:</label>
				<input type="text" name="identificacion" class="form-input w10" required>
			</div>
			<div class="w48">
				<label for="tipo_documento">Tipo de Documento:</label>
				<select name="tipo_documento" class="w10" required>
					<option value="CC">Cédula de Ciudadanía</option>
					<option value="TI">Tarjeta de Identidad</option>
					<option value="CE">Cédula de Extranjería</option>
				</select><br>
			</div>
		</div>
		<div class="dp-flex mrg-b15">
			<div class="w48">
				<label for="hoja_vida">Hoja de Vida en PDF:</label>
				<input type="file" name="hoja_vida_pdf" accept="application/pdf" required><br>
			</div>
			<div class="w48">
				<label for="celular">Número de Celular:</label>
				<input type="text" name="numero_celular" class="form-input w10" required><br>
			</div>
		</div>
		<div class="w10 mrg-b15 dp-flex">
			<div class="w48">
				<label for="maquinas">Máquinas con las que ha trabajado:</label>
				<input type="checkbox" name="maquinas[]" value="Collarín">Collarín<br>
				<input type="checkbox" name="maquinas[]" value="Fileteadora">Fileteadora<br>
				<input type="checkbox" name="maquinas[]" value="Plana">Plana<br>
				<input type="checkbox" name="maquinas[]" value="Ribeteadora">Ribeteadora<br>
			</div>
			<div class="w48">
				<label for="direccion">Dirección:</label>
				<textarea name="direccion" class="estilotextarea" required></textarea><br>
			</div>
		</div>
		<div class="dp-flex jf-c mrg-t2">
			<input class="form-btn" name="submit" type="submit" value="Enviar">
		</div>
	</form>
</div>
</body>
</html>