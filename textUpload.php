<?php
	//var_dump($_POST);
	//var_dump($_FILES);
	$destino= "archivos/".$_FILES["archivo"]["name"];
	if(!file_exists("archivos/")){
		mkdir("archivos/");
		move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino);
	}
	else
		move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino);

	$arrayNombre=explode(".", $_FILES["archivo"]["name"]);
	var_dump($arrayNombre);
	$extension=array_pop($arrayNombre);
	var_dump($extension);
	$tipoDeArchivo= pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
	var_dump($tipoDeArchivo);
	//echo $destino;
?>