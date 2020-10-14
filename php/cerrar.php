<?php
	session_start();
	session_unset();
	session_destroy();
	echo '<script>
                            alert("Has cerrado sesion");
                            location.href = "form_inicio.php";
                          </script>';
                    exit;



?>