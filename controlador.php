<?php
require_once 'include.php';

$c = new controlador();

class controlador{
	
	public $funcao;
	public $controlador;
	
	public function __construct() {		
		$funcao = $_POST["f1"];
		$controlador = $_POST["c2"];
		
		unset($_POST["f1"]);
		unset($_POST["c2"]);
		unset($_POST["r3"]);
		unset($_POST["m4"]);
		
		$this->chamarControle($_POST,$funcao,$controlador);		
	} 
	
		
	private function chamarControle($post,$funcao,$controlador){
		try {
			$class = new $controlador();
			echo $class->$funcao($post);
		} catch (Exception $e) {
			echo $e;
		}
	} 	
	
	
	
}
?>