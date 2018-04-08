<?php 
require_once "classe.php";
require_once "controller.php";
require_once "dao.php";
require_once "view.php";

	function debug($valor){
		echo "<pre>";
		var_dump($valor);
		die();
	}
	
	function criarTabela($sessao,$campos){
		try {
			
			$local = "localhost";
			$usuario = "root";
			$senha  = "";
			$banco = "agenteweb";
			
			$conexao = mysqli_connect($local,$usuario,$senha) or die( "nao foi possivel conectar" );
			mysqli_set_charset($conexao,"utf8");

			mysqli_select_db($conexao,$banco) or die ("Nao foi possivel selecionar o banco de dados");
			
			$sql = "CREATE TABLE tb_agenteweb_".$sessao." 
					(
					  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,	";
			
			for($i=0;$i< count($campos);$i++){	
				
				$sql .= " ".$campos[$i]->campo." ";
				
				if($campos[$i]->tipo === "text"){
					$sql .= " VARCHAR(".$campos[$i]->tamanho.") ";
				}else if($campos[$i]->tipo === "number"){
					$sql .= " INT(11) ";
				}else if($campos[$i]->tipo === "textarea"){
					$sql .= " TEXT ";
				}else if($campos[$i]->tipo === "imagem"){
					$sql .= " VARCHAR(50) ";
				}else if($campos[$i]->tipo === "arquivo"){
					$sql .= " VARCHAR(50) ";
				}else if($campos[$i]->tipo === "data"){
					$sql .= " datetime ";
				}else if($campos[$i]->tipo === "radio-button"){
					$sql .= " VARCHAR(1) ";
				}else if($campos[$i]->tipo === "check-box"){
					$sql .= " VARCHAR(1) ";
				}else if($campos[$i]->tipo === "select"){
					$sql .= " VARCHAR(".$campos[$i]->tamanho.") ";
				}
				if($campos[$i]->obrigatorio === "1"){
					$sql .= " NOT NULL, ";
				}else if($campos[$i]->obrigatorio === "0"){
					$sql .= " NULL, ";
				}

			}
			$sql .= " status INT(1) NULL DEFAULT '1'
					)";				
				
			$retorno = mysqli_query($conexao,$sql) or die ('Erro na execução de criar tabela!');
			
			
			$sql = "INSERT INTO `tb_agenteweb_classe` ( `id`, 
														`nome`, 
														`id_perfil`, 
														`controlador`, 
														`funcao`, 
														`secao`, 
														`id_modulo`, 
														`status`
														) VALUES (
														NULL, 
														'".$sessao."', 
														'2', 
														'Controlador".$sessao."', 
														'telaListar".$sessao."', 
														'".$sessao."', 
														(SELECT id FROM tb_agenteweb_modulo WHERE nome = 'SITE'), 
														'1')";
			$retorno = mysqli_query($conexao,$sql) or die ('Erro na execução erro na execução de update class!');
			
			mysqli_close($conexao);
			return $retorno;
		} catch (Exception $e) {
			return $e;
		}
	}	

    
    $data = json_decode(file_get_contents("php://input"));
    $sessao = $data->sessao;
	$campos = $data->campos;
	
	$classe = new Classe();
	$controller = new Controller();
	$dao = new Dao();
	$view = new View();
	if($data != null && $data->sessao != null && $data->sessao != "" && $data->campos != null && count($data->campos) > 0 ){
		//criarTabela($sessao,$campos);
		$classe->create($sessao,$campos);
		$controller->create($sessao,$campos);
		$dao->create($sessao);
		$view->create($sessao);
		echo "<script type='text/javascript'>alert('Classes Criadas!');</script>";
	}else{
		echo "<script type='text/javascript'>alert('Parametros Invalidos!');</script>";
	}
?>
