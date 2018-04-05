<?php
require_once "classe/Autoload.php";

//Classes
require_once "classe/Acao.php";
require_once "classe/Classe.php";
require_once "classe/Dados.php";

require_once "classe/Login.php";
require_once "classe/Modulo.php";
require_once "classe/Pais.php";
require_once "classe/Template.php";
require_once "classe/Usuario.php";

//Controllers
require_once "controle/controladorAcao.php";
require_once "controle/controladorClasse.php";

require_once "controle/controladorLogin.php";
require_once "controle/controladorMain.php";
require_once "controle/controladorPais.php";
require_once "controle/controladorUsuario.php";
require_once "controle/controladorModulo.php";
require_once "controle/controladorTemplate.php";

//Dados
require_once "dao/daoAcao.php";
require_once "dao/daoClasse.php";

require_once "dao/daoLogin.php";
require_once "dao/daoPais.php";
require_once "dao/daoUsuario.php";
require_once "dao/daoModulo.php";
require_once "dao/daoTemplate.php";

require_once "view/viewAcao.php";
require_once "view/viewClasse.php";

require_once "view/viewMain.php";
require_once "view/viewUsuario.php";
require_once "view/viewModulo.php";
require_once "view/viewTemplate.php";

//Exemplo de Novos Modulos
require_once "controle/controladorCasa.php";
require_once "dao/daoCasa.php";
require_once "view/viewCasa.php";
require_once "classe/Casa.php";

//Utils
require_once "library.php";

?>