<?php
//  ejemplo de acceso a bases de datos
//temta conectarse con la bse de datos
$mysqli= new mysqli("localhost","java","901021","musica");
if($mysqli=== false){
	die("ERROR: No s&eacute; establecio la conexi&oacute;n.".mysqli_connect_error());
}
//intenta ejecutar la consulta
//itera sobre coleccion de registros 
$sql="select * from artistas";
if($result  =  $mysqli->query($sql)){
	if($result->num_rows > 0 ){
		while($row= $result->fetch_array()){
			echo $row[0]." <strong>: </strong>".$row[1]."<br>";
		}
		$result->close();
	}else{
		echo "No se encontrarón registros que coincidan con la busqueda.";
	}
}else{
	echo "ERROR:  no es posible ejecutar $sql" . $mysqli->error;
	
}
//cierra conexion
$mysqli->close();
?>