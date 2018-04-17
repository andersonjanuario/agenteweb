<?php 
if($_GET["op"] === "1"){
	function debug($valor){
		echo "<pre>";
		var_dump($valor);
		die();
	}
	
	function limparInclude($sessao,$origem){
		$fp = fopen($origem, "r");
		$script = '';
		while ( $current_line = fgets($fp) ) {
			if(strstr($current_line, $sessao) == ""){
				$script .= $current_line;
			}
		}
		fclose($fp);
		
		$myfile = fopen($origem, "w") or die("Unable to open file!");
		fwrite($myfile, $script);
		fclose($myfile);
	}
	
	function limparDiretoriosFiles($sessao){
		$dir = '../arquivos/'.strtolower($sessao);
		if (file_exists($dir)) {
			$files = array_diff(scandir($dir), array('.','..')); 
			foreach ($files as $file) { 
			  (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
			} 	
			rmdir($dir);
		}
		$dir = '../imagens/'.strtolower($sessao);
		if (file_exists($dir)) {
			$files = array_diff(scandir($dir), array('.','..')); 
			foreach ($files as $file) { 
			  (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
			} 				
			rmdir($dir);			
		}		
		$file = "../controle/controlador".$sessao.".php";
		if(file_exists($file)){
			unlink($file);			
		}
		$file = "../dao/dao".$sessao.".php";
		if(file_exists($file)){
			unlink($file);			
		}
		$file = "../view/view".$sessao.".php";
		if(file_exists($file)){
			unlink($file);			
		}
		$file = "../classe/".$sessao.".php";
		if(file_exists($file)){
			unlink($file);			
		}			
	}
	
	function conectarBanco(){
		$local = "localhost";
		$usuario = "root";
		$senha  = "";
		$banco = "agenteweb";
		
		$conexao = mysqli_connect($local,$usuario,$senha) or die( "nao foi possivel conectar" );
		mysqli_set_charset($conexao,"utf8");

		mysqli_select_db($conexao,$banco) or die ("Nao foi possivel selecionar o banco de dados");
		return $conexao;		
	}
	
	function fecharBanco($conexao){
		mysqli_close($conexao);
	}	
	
    function limparBase($sessao){
		$conexao = conectarBanco();
	
		$sql = "DROP TABLE IF EXISTS `agenteweb`.`tb_agenteweb_".$sessao."`";
		mysqli_query($conexao,$sql) or die ('Erro na execução exclusão da tabela!');		
		
		$sql = "SELECT `id`,`nome` FROM `tb_agenteweb_classe` WHERE LOWER(`nome`) = '".strtolower($sessao)."'";
		$query = mysqli_query($conexao,$sql) or die ('Erro na verificação da classe!');
		
		while($obj = mysqli_fetch_object($query)){
			$sql = "DELETE FROM `tb_agenteweb_acao_usuario` WHERE `tb_agenteweb_acao_usuario`.`id_classe` = " . $obj->id . "";
			mysqli_query($conexao,$sql) or die ('Erro na exclusão da classe usuario!');
			$sql = "DELETE FROM tb_agenteweb_classe WHERE `id` = " . $obj->id . "";			
			mysqli_query($conexao,$sql) or die ('Erro na exclusão da classe!');
		}		
		fecharBanco($conexao);
	}
	
    $data = json_decode(file_get_contents("php://input"));
    $sessao = $data->sessao;
	
	if($data != null && $data->sessao != null && $data->sessao != "" ){
		limparBase($sessao);
		limparDiretoriosFiles($sessao);
		limparInclude($sessao,"../include.php");
		echo "<script type='text/javascript'>alert('Classe Removida!');</script>";
	}else{
		echo "<script type='text/javascript'>alert('Parametros Invalidos!');</script>";
	}
}
	
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Form Samples - Vali Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body class="app sidebar-mini rtl">
		<div id="retorno" style="display:none;"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Remover Sessão Existente&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-primary" onClick="envio();" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Remover</button>
                    </h3>
                    <div class="tile-body">
                        <form class="row" id="form-install">
                            <div class="form-group col-md-6">
                                <label class="control-label">Nome da Sessão</label>
                                <input class="form-control" type="text" name="sessao" id="sessao" onkeyup="this.value=this.value.capitalize();">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Essential javascripts for application to work-->
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="../js/plugins/pace.min.js"></script>
        <script>
			String.prototype.capitalize = function() {
				return this.charAt(0).toUpperCase() + this.slice(1).toLowerCase();
			}
		
            function envio(){
                $.ajax({
                    url: 'remove.php?op=1',
                    type: 'POST',
                    data: JSON.stringify({ 
                        'sessao': $("#sessao").val()                        
                    }),
                    success: function(result) {
                        $('#retorno').html(result);
                    },
                    beforeSend: function() {},
                    complete: function() {}
                });
            }
        </script>
    </body>

    </html>

