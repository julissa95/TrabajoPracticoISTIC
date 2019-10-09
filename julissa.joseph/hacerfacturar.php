<?php
$miObjeto = new stdClass();
$miObjeto->Factura = $_GET['Factura'];
$miObjeto->precioPorHora=100;
date_default_timezone_set('America/Argentina/Buenos_Aires');
$hora = mktime(); 
$Bandera=1;


$archivo = fopen('listadopatente.txt','r');

while(!feof($archivo)) 
	{
		$objeto = json_decode(fgets($archivo));
    echo $objeto->Patente;
		if ($objeto->Patente ==$miObjeto->Factura) {
      $horasEstacionados=($horaSalida-$objeto->fechaIngreso);
      $debe=($objeto->precioPorHora*$horasEstacionados);
      $miObjeto->debe=$debe;
      $arch = fopen('facturas.txt', 'a');
           fwrite($arch, json_encode($miObjeto)."\n");
           fclose($arch);

      header("Location: mifactura.php?debe=".$debe);
      exit();
    }
//     if($Bandera==1){
// 	header("Location: no.php");
// 	exit();
// }
	}	

fclose($archivo);
?>
