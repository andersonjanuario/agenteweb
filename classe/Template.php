<?php

class Template{

	private $id;
	private $nome;
	private $sexo;	
	private $profissao;
	private $faixa_salarial;
	private $data_nascimento;
	private $cpf;	
    private $imagem;
    private $arquivo;	
	private $logradouro;
	private $numero;
	private $cep;
	private $estado;	
	private $telefone_residencial;
	private $email;
	private $data_cadastro;
	private $data_modificacao;	
	private $animal;
	private $status;	
	private $pais;
	private $deficiente;
	private $vegano;
	
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

	public function getNome(){
		return $this->nome;
	}

	public function setNome($v){
		$this->nome = $v;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($v){
		$this->sexo = $v;
	}	
	
	public function getProfissao(){
		return $this->profissao;
	}

	public function setProfissao($v){
		$this->profissao = $v;
	}	
	
	public function getFaixaSalarial(){
		return $this->faixa_salarial;
	}

	public function setFaixaSalarial($v){
		$this->faixa_salarial = $v;
	}
		
	public function getDataNascimento(){
		return $this->data_nascimento;
	}

	public function setDataNascimento($v){
		$this->data_nascimento = $v;
	}	
	
	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($v){
		$this->cpf = $v;
	}
		
	public function getImagem(){
		return $this->imagem;
	}

	public function setImagem($v){
		$this->imagem = $v;
	}	

	public function getArquivo(){
		return $this->arquivo;
	}

	public function setArquivo($v){
		$this->arquivo = $v;
	}        
        
	public function getLogradouro(){
		return $this->logradouro;
	}

	public function setLogradouro($v){
		$this->logradouro = $v;
	}	
	
	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($v){
		$this->numero = $v;
	}	
	
	public function getCep(){
		return $this->cep;
	}

	public function setCep($v){
		$this->cep = $v;
	}
	
	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($v){
		$this->estado = $v;
	}	
	
	public function getTelefoneResidencial(){
		return $this->telefone_residencial;
	}

	public function setTelefoneResidencial($v){
		$this->telefone_residencial = $v;
	}	
	
	public function getEmail(){
		return $this->email;
	}

	public function setEmail($v){
		$this->email = $v;
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
	
	public function getAnimal(){
		return $this->animal;
	}

	public function setAnimal($v){
		$this->animal = $v;
	}	

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($v){
		$this->status = $v;
	}	

	public function getPais(){
		return $this->pais;
	}

	public function setPais($v){
		$this->pais = $v;
	}	
	
	public function getVegano(){
		return $this->vegano;
	}
	
	public function setVegano($v){
		$this->vegano = $v;
	}	
	
	public function getDeficiente(){
		return $this->deficiente;
	}
	
	public function setDeficiente($v){
		$this->deficiente = $v;
	}
	
}
?>