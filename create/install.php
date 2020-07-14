<?php
require_once "base.php";
require_once "classe.php";
require_once "controller.php";
require_once "dao.php";
require_once "view.php";

function updateInclude($sessao, $origem) {
	$fp = fopen ( $origem, "r" );
	$script = '';
	while ( $current_line = fgets ( $fp ) ) {
		if ($current_line === '?>') {
			$script .= "require_once \"controle/controlador" . $sessao . ".php\";";
			$script .= "\n";
			$script .= "require_once \"dao/dao" . $sessao . ".php\";";
			$script .= "\n";
			$script .= "require_once \"view/view" . $sessao . ".php\";";
			$script .= "\n";
			$script .= "require_once \"classe/" . $sessao . ".php\";";
			$script .= "\n";
			$script .= "\n";
		}
		$script .= $current_line;
	}
	fclose ( $fp );
	
	$myfile = fopen ( $origem, "w" ) or die ( "Unable to open file!" );
	fwrite ( $myfile, $script );
	fclose ( $myfile );
	
	if (! file_exists ( '../arquivos/' . strtolower ( $sessao ) )) {
		mkdir ( '../arquivos/' . strtolower ( $sessao ), 0777, true );
	}
	if (! file_exists ( '../imagens/' . strtolower ( $sessao ) )) {
		mkdir ( '../imagens/' . strtolower ( $sessao ), 0777, true );
	}
}

function criarTabela($sessao, $campos) {
	try {
		
		$conexao = conectarBanco ();
		
		$sql = "DROP TABLE IF EXISTS `agenteweb`.`tb_agenteweb_" . strtolower ( $sessao ) . "`";
		mysqli_query ( $conexao, $sql ) or die ( 'Erro na execução exclusão da tabela!' );
		
		$sql = "CREATE TABLE tb_agenteweb_" . strtolower ( $sessao ) . " 
					(
					  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,	";
		
		for($i = 0; $i < count ( $campos ); $i ++) {
			
			$sql .= " " . $campos [$i]->campo . " ";
			$tamanho = ($campos [$i]->tamanho != '' && $campos [$i]->tamanho != null) ? '50' : $campos [$i]->tamanho;
			
			if ($campos [$i]->tipo === "text") {
				$sql .= " VARCHAR(" . $tamanho . ") ";
			} else if ($campos [$i]->tipo === "number") {
				$sql .= " INT(11) ";
			} else if ($campos [$i]->tipo === "textarea") {
				$sql .= " TEXT ";
			} else if ($campos [$i]->tipo === "imagem") {
				$sql .= " VARCHAR(50) ";
			} else if ($campos [$i]->tipo === "arquivo") {
				$sql .= " VARCHAR(50) ";
			} else if ($campos [$i]->tipo === "data") {
				$sql .= " datetime ";
			} else if ($campos [$i]->tipo === "radio-button") {
				$sql .= " VARCHAR(2) ";
			} else if ($campos [$i]->tipo === "check-box") {
				$sql .= " VARCHAR(2) ";
			} else if ($campos [$i]->tipo === "select") {
				$sql .= " VARCHAR(" . $tamanho . ") ";
			}
			if ($campos [$i]->obrigatorio === "1") {
				$sql .= " NOT NULL, ";
			} else if ($campos [$i]->obrigatorio === "0") {
				$sql .= " NULL, ";
			}
		}
		$sql .= " status INT(1) NULL DEFAULT '1'
					)";
		
		mysqli_query ( $conexao, $sql ) or die ( 'Erro na execução de criar tabela!' );
		fecharBanco ( $conexao );
	} catch ( Exception $e ) {
		return $e;
	}
}

function montarClasse($sessao) {
	$conexao = conectarBanco ();
	
	$sql = "SELECT `id`,`nome` FROM `tb_agenteweb_classe` WHERE LOWER(`nome`) = '" . strtolower ( $sessao ) . "'";
	$query = mysqli_query ( $conexao, $sql ) or die ( 'Erro na verificação da classe!' );
	while ( $obj = mysqli_fetch_object ( $query ) ) {
		$sql = "DELETE FROM `tb_agenteweb_acao_usuario` WHERE `tb_agenteweb_acao_usuario`.`id_classe` = " . $obj->id . "";
		mysqli_query ( $conexao, $sql ) or die ( 'Erro na exclusão da classe usuario!' );
		$sql = "DELETE FROM tb_agenteweb_classe WHERE `id` = " . $obj->id . "";
		mysqli_query ( $conexao, $sql ) or die ( 'Erro na exclusão da classe!' );
	}
	
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
													'" . $sessao . "', 
													'2', 
													'Controlador" . $sessao . "', 
													'telaListar" . $sessao . "', 
													'" . $sessao . "', 
													(SELECT id FROM tb_agenteweb_modulo WHERE nome = 'SITE'), 
													'1')";
	
	mysqli_query ( $conexao, $sql ) or die ( 'Erro na execução erro na execução de update classe!' );
	fecharBanco ( $conexao );
}

$data = json_decode ( file_get_contents ( "php://input" ) );
$sessao = $data->sessao;
$campos = $data->campos;

$classe = new Classe ();
$controller = new Controller ();
$dao = new Dao ();
$view = new View ();
if ($data != null && $data->sessao != null && $data->sessao != "" && $data->campos != null && count ( $data->campos ) > 0) {
	criarTabela ( $sessao, $campos );
	montarClasse ( $sessao );
	updateInclude ( $sessao, "../include.php" );
	$classe->create ( $sessao, $campos );
	$controller->create ( $sessao, $campos );
	$dao->create ( $sessao, $campos );
	$view->create ( $sessao, $campos );
	echo "<script type='text/javascript'>alert('Classe " . $sessao . " Criadas!');</script>";
} else {
	echo "<script type='text/javascript'>alert('Parametros Invalidos!');</script>";
}
?>
