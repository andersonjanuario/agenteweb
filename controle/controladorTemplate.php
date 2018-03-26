<?php

class ControladorTemplate {

	//construtor
	public function __construct(){}

	//destruidor
	public function __destruct(){}


	public function listarTemplate($id = null){
		try {
			$moduloTemplate = new DaoTemplate();			
			return $moduloTemplate->listarTemplate($id);
			$moduloTemplate->__destruct();
		} catch (Exception $e) {
			return $e;
		}
	}
	

	public function incluirTemplate($request){
		try {
			$moduloTemplate = new DaoTemplate();
			if($moduloTemplate->incluirTemplate($request)){
				return $this->telaGridTemplate();	
			}		
			$moduloTemplate->__destruct();
		} catch (Exception $e) {
		}
	}

	public function alterarTemplate($request){
		try {
			$moduloTemplate = new DaoTemplate();
			if($moduloTemplate->alterarTemplate($request)){
				return $this->telaGridTemplate();
			}
			$moduloTemplate->__destruct();
		} catch (Exception $e) {
			return $e;
		} 		
	}

	public function excluirTemplate($request){
		try {
			$moduloTemplate = new DaoTemplate();
			$moduloTemplate->excluirTemplate($request["id"]);
			$moduloTemplate->__destruct();
			return $this->telaGridTemplate();
		} catch (Exception $e) {
			return $e;
		}
	}
	
	public function telaTemplate($post = null){
		try {
			$viewTemplate = new ViewTemplate();
			return $viewTemplate->telaTemplate($this->listarTemplate(null));
			$viewTemplate->__destruct();
		} catch (Exception $e) {
			return $e;
		}
	}	

	public function telaGridTemplate($post = null){
		try {
			$viewTemplate = new ViewTemplate();
			return $viewTemplate->telaGridTemplate($this->listarTemplate(null));
			$viewTemplate->__destruct();
		} catch (Exception $e) {
			return $e;
		}
	}	
	
/*
	public function telaCadastrarTemplate($post = null){
		try {
			$viewTemplate = new ViewTemplate();
			return $viewTemplate->telaCadastrarTemplate($post);
			$viewTemplate->__destruct();
		} catch (Exception $e) {
			return $e;
		}
	}
	
	public function telaListarTemplate($post = null){
		try {
			$viewTemplate = new ViewTemplate();
			return $viewTemplate->telaListarTemplate($this->listarTemplate(null));
			$viewTemplate->__destruct();
		} catch (Exception $e) {
			return $e;
		}
	}
	
	public function telaAlterarTemplate($post = null){
		try {
			$viewTemplate = new ViewTemplate();
			return $viewTemplate->telaAlterarTemplate($this->listarTemplate($post["id"]));
			$viewTemplate->__destruct();
		} catch (Exception $e) {
			return $e;
		}
	}
	
	
	public function telaVisualizarTemplate($post = null){
		try {
			$viewTemplate = new ViewTemplate();
			return $viewTemplate->telaVisualizarTemplate($this->listarTemplate($post["id"]));
			$viewTemplate->__destruct();
		} catch (Exception $e) {
			return $e;
		}
	}
	
*/

}
?>