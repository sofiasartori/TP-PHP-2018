<?php 

interface IApiUsable{ 
	
   	public function TraerTodos($request, $response, $args); 
   	public function CargarUno($request, $response, $args);
	//public function BorrarUno($request, $response, $args);
}