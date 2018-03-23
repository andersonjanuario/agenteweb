<?php
require_once "dao/Dados.php";
/*
require_once "classe/Autoload.php";
require_once "classe/Acao.php";
require_once "classe/Classe.php";
require_once "classe/Login.php";
require_once "classe/Modulo.php";
require_once "classe/Pais.php";
require_once "classe/Usuario.php";

require_once "controle/controladorAcao.php";
require_once "controle/controladorClasse.php";
require_once "controle/controladorLogin.php";
require_once "controle/controladorMain.php";
require_once "controle/controladorPais.php";
require_once "controle/controladorUsuario.php";
require_once "controle/controladorModulo.php";

require_once "modulo/daoAcao.php";
require_once "modulo/daoClasse.php";
require_once "modulo/daoLogin.php";
require_once "modulo/daoPais.php";
require_once "modulo/daoUsuario.php";
require_once "modulo/daoModulo.php";

require_once "view/viewAcao.php";
require_once "view/viewClasse.php";
require_once "view/viewMain.php";
require_once "view/viewUsuario.php";
require_once "view/viewModulo.php";
require_once "lib.php";
*/

require_once "classe/Template.php";
require_once "view/viewTemplate.php";
require_once "controle/controladorTemplate.php";
require_once "dao/daoTemplate.php";

$c = new controlador();

class controlador{
	
	public $funcao;
	public $controlador;
	
	public function __construct() {		
		$funcao = $_POST["f"];
		$controlador = $_POST["c"];
		
		unset($_POST["f"]);
		unset($_POST["c"]);
		unset($_POST["r"]);
		unset($_POST["m"]);
		
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