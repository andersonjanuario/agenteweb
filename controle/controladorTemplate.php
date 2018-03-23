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
	

	public function incluirTemplate($post){
		try {
			$template = new Template();
			$template->setTitulo($post["titulo"]);
			$template->setDescricao($post["descricao"]);			
			$template->setStatus('1');
			$moduloTemplate = new DaoTemplate();
			
			if($moduloTemplate->incluirTemplate($template)){
				return $this->telaCadastrarTemplate();	
			}		
			$moduloTemplate->__destruct();
		} catch (Exception $e) {
		}
	}

	public function alterarTemplate($post){
		try {
			$template = new Template();
			$template->setId($post["id"]);
			$template->setNome($post["nome"]);
			$template->setTitulo($post["titulo"]);
			$template->setDescricao($post["descricao"]);			
			$template->setStatus('1');		
			
			$moduloTemplate = new DaoTemplate();
			if($moduloTemplate->alterarTemplate($template)){
				return $this->telaListarTemplate();
			}
			$moduloTemplate->__destruct();
		} catch (Exception $e) {
			return $e;
		} 
		
		
	}

	public function excluirTemplate($post){
		try {
			$id = $post["id"];
			$moduloTemplate = new DaoTemplate();
			$moduloTemplate->excluirTemplate($id);
			$moduloTemplate->__destruct();
			return $this->telaListarTemplate();
		} catch (Exception $e) {
			return $e;
		}
	}
	
	public function telaTemplate($post = null){
		try {
			$viewTemplate = new ViewTemplate();
			return $viewTemplate->telaTemplate($post);
			$viewTemplate->__destruct();
		} catch (Exception $e) {
			return $e;
		}
	}	

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
	


}
?>