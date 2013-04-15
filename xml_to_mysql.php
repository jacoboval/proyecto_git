<?php
include ('conexion.php'); 
//$sql="INSERT INTO  items (sku, nombre, precio) VALUES ('".addslashes($item['sku']). "','" . addslashes($item->nombre) . "','" .addslashes($item->precio) . "');<br>";

//cargar xml
$xml=simplexml_load_file("inventario.xml") or die ("No fue posible cargar XML");

//ecorre los elementos item
//accede a nodos secundarios e interpola con declaraciones sql
foreach($xml as $item){
	//intenta conectarse con la BD
$mysqli = new mysqli("localhost","java","901021","inventario");
if($mysqli === false){
	die ("ERROR: No se establecio la coneción.". mysqli_connect_error());
}
//intenta ejecutar la consulta
//añade un nuevo registro
$sql="INSERT INTO  items (sku, nombre, precio) VALUES ('".addslashes($item['sku']). "','" . addslashes($item->nombre) . "','" .addslashes($item->precio) . "')";
if($mysqli->query($sql)=== true){
	echo "Nuevo artista con id : ". $mysqli->insert_id. " ha sido añadido.<br>";
}else{
	echo "ERROR: No fue posible ejecutar $sql". $mysqli->error."<br>";
}
//cierra conexion:
$mysqli->close();
}
?>