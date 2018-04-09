<?php

class Controller{
	
	public function atributos($sessao,$campos){
		$template = "";
		for($i=0;$i< count($campos);$i++){	
			$template .= "
									\$".strtolower($sessao)."->set".ucfirst(strtolower($campos[$i]->campo))."(\$post['".$campos[$i]->campo."']);			
			";
		}
		return $template;
	}
	
	public function create($sessao,$campos){
		echo "iniciando controller\n";
		$controle = fopen("../controle/controlador".$sessao.".php", "w") or die("Unable to open file!");
		
		$template =  "
						<?php

						class Controlador".$sessao." {

							//construtor
							public function __construct(){}

							//destruidor
							public function __destruct(){}


							public function listar".$sessao."(\$id = null){
								try {
									\$modulo".$sessao." = new Dao".$sessao."();
									
									return \$modulo".$sessao."->listar".$sessao."(\$id);
									\$modulo".$sessao."->__destruct();
								} catch (Exception \$e) {
									return \$e;
								}
							}
		";
		
		$template .=  "

							public function incluir".$sessao."(\$post){
								try {
									\$".strtolower($sessao)." = new ".$sessao."();
									".$this->atributos($sessao,$campos)."
									\$modulo".$sessao." = new Dao".$sessao."();
									
									if(\$modulo".$sessao."->incluir".$sessao."(\$".strtolower($sessao).")){
										return \$this->telaCadastrar".$sessao."();  
									}       
									\$modulo".$sessao."->__destruct();
								} catch (Exception \$e) {
								}
							}		
		";
		
		$template .=  "
		
							public function alterar".$sessao."(\$post){
								try {
									\$".strtolower($sessao)." = new ".$sessao."();
									\$".strtolower($sessao)."->setId(\$post['id']);
									".$this->atributos($sessao,$campos)."
									
									\$modulo".$sessao." = new Dao".$sessao."();
									if(\$modulo".$sessao."->alterar".$sessao."(\$".strtolower($sessao).")){
										return \$this->telaListar".$sessao."();
									}
									\$modulo".$sessao."->__destruct();
								} catch (Exception \$e) {
									return \$e;
								} 
							}

                        ";
		
		$template .= "							
		                    public function excluir".$sessao."(\$post){
								try {
									\$id = \$post['id'];
									\$modulo".$sessao." = new Dao".$sessao."();
									\$modulo".$sessao."->excluir".$sessao."(\$id);
									\$modulo".$sessao."->__destruct();
									return \$this->telaListar".$sessao."();
								} catch (Exception \$e) {
									return \$e;
								}
							}

							public function telaCadastrar".$sessao."(\$post = null){
								try {
									\$view".$sessao." = new View".$sessao."();
									return \$view".$sessao."->telaCadastrar".$sessao."(\$post);
									\$view".$sessao."->__destruct();
								} catch (Exception \$e) {
									return \$e;
								}
							}
							
							public function telaListar".$sessao."(\$post = null){
								try {
									\$view".$sessao." = new View".$sessao."();
									return \$view".$sessao."->telaListar".$sessao."(\$this->listar".$sessao."(null));
									\$view".$sessao."->__destruct();
								} catch (Exception \$e) {
									return \$e;
								}
							}
							
							public function telaAlterar".$sessao."(\$post = null){
								try {
									\$view".$sessao." = new View".$sessao."();
									return \$view".$sessao."->telaAlterar".$sessao."(\$this->listar".$sessao."(\$post['id']));
									\$view".$sessao."->__destruct();
								} catch (Exception \$e) {
									return \$e;
								}
							}
							
							
							public function telaVisualizar".$sessao."(\$post = null){
								try {
									\$view".$sessao." = new View".$sessao."();
									return \$view".$sessao."->telaVisualizar".$sessao."(\$this->listar".$sessao."(\$post['id']));
									\$view".$sessao."->__destruct();
								} catch (Exception \$e) {
									return \$e;
								}
							}
						}
						?>
			";
		
		fwrite($controle,$template);
		fclose($controle);
		echo "termino controller\n";		
		
		
	}
	
}


?>