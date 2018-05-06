<?php
	require_once('/entidades/imostrable.php');
	require_once('/entidades/localidad.php');
	require_once('/entidades/persona.php');
	require_once('/entidades/direccion.php');
	require_once('/entidades/profesor.php');
	require_once('/entidades/alumno.php');

	$avellaneda = new Localidad(200, 'Avellaneda');
	$quilmes = new Localidad(100, 'Quilmes');
	$lanus = new Localidad(1000, 'Lanus');
	$direccion1 = new Direccion('Mitre', 750, $avellaneda);
	$direccion2 = new Direccion('Belgrano', 2000, $quilmes);
	$direccion3 = new Direccion('9 de julio', 750, $lanus);

	//$persona = new Persona('pepe', 'lopez', '1234', $direccion);
	//$persona->mostrarHtml();
	$materias1=array('Programación', 'Laboratorio');
	$dias1=array('lunes', 'martes');
	$materias2=array('Ingles', 'Matematica');
	$dias2=array('lunes', 'viernes');
	$materias3=array('Practica', 'Legislacion');
	$dias3=array('miercoles', 'jueves');
	$profesor1= new Profesor($materias1, $dias1, 'profe', 'Uno', '1', $direccion1);
	$profesor1->mostrarHtml();
	$alumno1 = new Alumno (102025, date("d-m-y"), 'alumno', 'Uno', '1234', $direccion1);
	$alumno1->mostrarHtml();
	$profesor2= new Profesor($materias2, $dias2, 'profe', 'Dos', '12', $direccion2);
	$profesor2->mostrarHtml();
	$alumno2 = new Alumno (1020, date("d-m-y"), 'alumno', 'Dos', '12345', $direccion2);
	$alumno2->mostrarHtml();
	$profesor3= new Profesor($materias3, $dias3, 'profe', 'Tres', '123', $direccion3);
	$profesor3->mostrarHtml();
	$alumno3 = new Alumno (10, date("d-m-y"), 'alumno', 'Tres', '123456', $direccion3);
	$alumno2->mostrarHtml();
	//agregar las personas a un array y mostrarlo con foreach en mostrarHTML
	//var_dump($profesor);
?>