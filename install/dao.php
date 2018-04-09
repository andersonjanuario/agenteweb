<?php

class Dao{
	
	public function atributos($campos){
		$template = "";
		for($i=0;$i< count($campos);$i++){	
		$template .= "
													".strtolower($campos[$i]->campo).",
		";
		}
		return $template;
	}

	public function updatesParameter($sessao,$campos){
		$template = "";
		for($i=0;$i< count($campos);$i++){	
		$template .= "
																		       ".strtolower($campos[$i]->campo)." = '\" . \$".strtolower($sessao)."->get".ucfirst(strtolower($campos[$i]->campo))."() . \"',
		";
		}
		return $template;
	}
	
	public function insertParameter($sessao,$campos){
		$template = "";
		for($i=0;$i< count($campos);$i++){	
		$template .= "
																								'\" . \$".strtolower($sessao)."->get".ucfirst(strtolower($campos[$i]->campo))."() . \"', 
		";
		}
		return $template;
	}
	
	public function selectParameter($sessao,$campos){
		$template = "";
		for($i=0;$i< count($campos);$i++){	
		$template .= "
										\$".strtolower($sessao)."->set".ucfirst(strtolower($campos[$i]->campo))."(\$objeto".$sessao."->".strtolower($campos[$i]->campo).");
		";
		}
		return $template;
	}
	
	
	
		
	public function create($sessao,$campos){
		echo "iniciando dao\n";
		$dao = fopen("../dao/dao".$sessao.".php", "w") or die("Unable to open file!");	
		
		$template = "	<?php

						class Dao".$sessao." extends Dados {

							//construtor
							public function __construct() {
								
							}

							//destruidor
							public function __destruct() {
								
							}

		";
			
		$template .= "
		
							public function listar".$sessao."(\$id = null) {
								try {
									\$retorno = array();
									\$conexao = \$this->conectarBanco();
									\$sql = \"SELECT id,
													 ".$this->atributos($campos)."
													 status		
													 FROM tb_agenteweb_".strtolower($sessao)."
											WHERE status = '1'\";
									\$sql .= (\$id != null) ? \" AND id = \" . \$id : \"\";
									\$query = mysqli_query(\$conexao,\$sql) or die('Erro na execução do listar!');
									while (\$objeto".$sessao." = mysqli_fetch_object(\$query)) {

										\$".strtolower($sessao)." = new ".$sessao."();

										\$".strtolower($sessao)."->setId(\$objeto".$sessao."->id);
										".$this->selectParameter($sessao,$campos)."

										\$retorno[] = \$".strtolower($sessao).";
									}
									\$this->FecharBanco(\$conexao);
									return \$retorno;
								} catch (Exception \$e) {
									return \$e;
								}
							}		
		
		";	
		$template .= "
		
							public function incluir".$sessao."(\$".strtolower($sessao).") {
								try {
									\$conexao = \$this->conectarBanco();
									
									\$sql = \"INSERT INTO tb_agenteweb_".strtolower($sessao)." (  id,
																								  ".$this->atributos($campos)."
																								  status	
																								)VALUES(
																								NULL,
																								".$this->insertParameter($sessao,$campos)."
																								'1')\";

									\$retorno = mysqli_query(\$conexao,\$sql) or die('Erro na execução do insert!');
									\$this->FecharBanco(\$conexao);
									return \$retorno;
								} catch (Exception \$e) {
									return \$e;
								}
							}		
		
		";
        $template .= "
		
							public function alterar".$sessao."(\$".strtolower($sessao).") {
								try {

									\$conexao = \$this->conectarBanco();
									\$sql = \"UPDATE tb_agenteweb_".strtolower($sessao)." SET
																		       ".$this->updatesParameter($sessao,$campos)."
																			   status = '1' 
																			   WHERE id = \" . \$".strtolower($sessao)."->getId() . \"\";

									
									\$retorno = mysqli_query(\$conexao,\$sql) or die('Erro na execução do update!');
									\$this->FecharBanco(\$conexao);
									return \$retorno;
								} catch (Exception \$e) {
									return \$e;
								}
							}		
		
		";			
		$template .= "
							public function excluir".$sessao."(\$id) {
								try {
									\$conexao = \$this->conectarBanco();

									\$sql = \"UPDATE tb_agenteweb_".strtolower($sessao)." SET status = '0' WHERE id = \" . \$id . \"\";            
									\$retorno = mysqli_query(\$conexao,\$sql) or die('Erro na execução do delet!');

									\$this->FecharBanco(\$conexao);
									return \$retorno;
								} catch (Exception \$e) {
									return \$e;
								}
							}

						}

					?>		
		";			
		
		fwrite($dao,$template);
		fclose($dao);
		echo "termino dao\n";			
		
	}
	
}


?>