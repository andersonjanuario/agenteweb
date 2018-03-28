<?php

class ControladorMain {

	//construtor
	public function __construct(){}

	//destruidor
	public function __destruct(){}

		
	
	public function telaListaAnimalAniversariantesMes(){
		try {
			$viewMain = new ViewMain();
			return $viewMain->telaListaAnimalAniversariantesMes();
			$viewMain->__destruct();
		} catch (Exception $e) {
			return $e;
		}
	}
	
	
	
	
	

}
?>