<?php
require_once "base.php";

function limparInclude($sessao, $origem) {
	$fp = fopen ( $origem, "r" );
	$script = '';
	while ( $current_line = fgets ( $fp ) ) {
		if (strstr ( $current_line, $sessao ) == "") {
			$script .= $current_line;
		}
	}
	fclose ( $fp );
	
	$myfile = fopen ( $origem, "w" ) or die ( "Unable to open file!" );
	fwrite ( $myfile, $script );
	fclose ( $myfile );
}

function limparDiretoriosFiles($sessao) {
	$dir = '../arquivos/' . strtolower ( $sessao );
	if (file_exists ( $dir )) {
		$files = array_diff ( scandir ( $dir ), array (
				'.',
				'..' 
		) );
		foreach ( $files as $file ) {
			(is_dir ( "$dir/$file" )) ? delTree ( "$dir/$file" ) : unlink ( "$dir/$file" );
		}
		rmdir ( $dir );
	}
	$dir = '../imagens/' . strtolower ( $sessao );
	if (file_exists ( $dir )) {
		$files = array_diff ( scandir ( $dir ), array (
				'.',
				'..' 
		) );
		foreach ( $files as $file ) {
			(is_dir ( "$dir/$file" )) ? delTree ( "$dir/$file" ) : unlink ( "$dir/$file" );
		}
		rmdir ( $dir );
	}
	$file = "../controle/controlador" . $sessao . ".php";
	if (file_exists ( $file )) {
		unlink ( $file );
	}
	$file = "../dao/dao" . $sessao . ".php";
	if (file_exists ( $file )) {
		unlink ( $file );
	}
	$file = "../view/view" . $sessao . ".php";
	if (file_exists ( $file )) {
		unlink ( $file );
	}
	$file = "../classe/" . $sessao . ".php";
	if (file_exists ( $file )) {
		unlink ( $file );
	}
}

function limparBase($sessao) {
	$conexao = conectarBanco ();
	
	$sql = "DROP TABLE IF EXISTS `agenteweb`.`tb_agenteweb_" . strtolower ( $sessao ) . "`";
	mysqli_query ( $conexao, $sql ) or die ( 'Erro na execução exclusão da tabela!' );
	
	$sql = "SELECT `id`,`nome` FROM `tb_agenteweb_classe` WHERE LOWER(`nome`) = '" . strtolower ( $sessao ) . "'";
	$query = mysqli_query ( $conexao, $sql ) or die ( 'Erro na verificação da classe!' );
	
	while ( $obj = mysqli_fetch_object ( $query ) ) {
		$sql = "DELETE FROM `tb_agenteweb_acao_usuario` WHERE `tb_agenteweb_acao_usuario`.`id_classe` = " . $obj->id . "";
		mysqli_query ( $conexao, $sql ) or die ( 'Erro na exclusão da classe usuario!' );
		
		$sql = "DELETE FROM tb_agenteweb_classe WHERE `id` = " . $obj->id . "";
		mysqli_query ( $conexao, $sql ) or die ( 'Erro na exclusão da classe!' );
	}
	fecharBanco ( $conexao );
}

$data = json_decode ( file_get_contents ( "php://input" ) );
$sessao = $data->sessao;

if ($data != null && $data->sessao != null && $data->sessao != "") {
	limparBase ( $sessao );
	limparDiretoriosFiles ( $sessao );
	limparInclude ( $sessao, "../include.php" );
	echo "<script type='text/javascript'>alert('Classe " . $data->sessao . " Removida!');</script>";
} else {
	echo "<script type='text/javascript'>alert('Parametros Invalidos!');</script>";
}

?>