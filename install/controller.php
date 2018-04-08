<?php

class Controller{
	
	public function create($sessao){
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
									\$template = new ".$sessao."();
									\$template->setNome(\$post['nome']);
									\$template->setDescricao(\$post['descricao']);								
									\$modulo".$sessao." = new Dao".$sessao."();
									
									if(\$modulo".$sessao."->incluir".$sessao."(\$template)){
										return \$this->telaCadastrar".$sessao."();  
									}       
									\$modulo".$sessao."->__destruct();
								} catch (Exception \$e) {
								}
							}		
		"
		
		$template .=  "
		
							public function alterar".$sessao."(\$post){
								try {
									\$template = new ".$sessao."();
									\$template->setId(\$post['id']);
									\$template->setNome(\$post['nome']);
									\$template->setDescricao(\$post['descricao']);

									
									\$modulo".$sessao." = new Dao".$sessao."();
									if(\$modulo".$sessao."->alterar".$sessao."(\$template)){
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