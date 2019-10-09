<?php
$miObjeto = new stdClass();
$miObjeto->nombre = $_GET['Nombre'];
$miObjeto->apellido = $_GET['Apellido'];
$Bandera=1;

$archivo = fopen('usuarios.txt', 'a');
fwrite($archivo, json_encode($miObjeto)."\n");
$Bandera=0;
if($Bandera==0)
	{	
		header("Location: Patente.php");
		exit();
	}
	else 
	{

		header("Location: NO.php");
		exit();
				 	
	}
fclose($archivo);
?>