<?php

class Template{

	private $id;
	private $titulo;
	private $descricao;
	private $data_cadastro;
	private $data_modificacao;
	private $status;
	
	//construtor
	public function __construct(){}

	//destruidor
	public function __destruct(){}


	//Get And Sets
	public function getId(){
		return $this->id;
	}

	public function setId($v){
		$this->id = $v;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($v){
		$this->titulo = $v;
	}
	
	public function getDataCadastro(){
		return $this->data_cadastro;
	}

	public function setDataCadastro($v){
		$this->data_cadastro = $v;
	}
	
	public function getDataModificacao(){
		return $this->data_modificacao;
	}

	public function setDataModificacao($v){
		$this->data_modificacao = $v;
	}
	
	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($v){
		$this->descricao = $v;
	}
	
	public function getStatus(){
		return $this->status;
	}

	public function setStatus($v){
		$this->status = $v;
	}	
}
?>