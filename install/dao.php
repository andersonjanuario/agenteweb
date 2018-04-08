<?php

class Dao{
	
	
		
	public function create($sessao){
		echo "iniciando dao\n";
		$dao = fopen("../dao/dao".$sessao.".php", "w") or die("Unable to open file!");	
		fwrite($dao, "
						<?php

						class Dao".$sessao." extends Dados {

							//construtor
							public function __construct() {
								
							}

							//destruidor
							public function __destruct() {
								
							}

							public function listar".$sessao."(\$id = null) {
								try {
									\$retorno = array();
									\$conexao = \$this->conectarBanco();
									\$sql = \"SELECT id,
													 nome,
													 descricao,
													 status		
													 FROM tb_agenteweb_".strtolower($sessao)."
											WHERE status = '1'\";
									\$sql .= (\$id != null) ? \" AND id = \" . \$id : \"\";
									\$query = mysqli_query(\$conexao,\$sql) or die('Erro na execução do listar!');
									while (\$objeto".$sessao." = mysqli_fetch_object(\$query)) {

										\$template = new ".$sessao."();

										\$template->setId(\$objeto".$sessao."->id);
										\$template->setNome(\$objeto".$sessao."->nome);
										\$template->setDescricao(\$objeto".$sessao."->descricao);

										\$retorno[] = \$template;
									}
									\$this->FecharBanco(\$conexao);
									return \$retorno;
								} catch (Exception \$e) {
									return \$e;
								}
							}

							public function incluir".$sessao."(\$template) {
								try {
									\$conexao = \$this->conectarBanco();
									
									\$sql = \"INSERT INTO tb_agenteweb_".strtolower($sessao)." (  id,
																								  nome,
																								  descricao,
																								  status	
																								)VALUES(
																								NULL,
																								'\" . \$template->getNome() . \"', 
																								'\" . \$template->getDescricao() . \"',
																								'1')\";

									\$retorno = mysqli_query(\$conexao,\$sql) or die('Erro na execução do insert!');
									\$this->FecharBanco(\$conexao);
									return \$retorno;
								} catch (Exception \$e) {
									return \$e;
								}
							}

							public function alterar".$sessao."(\$template) {
								try {

									\$conexao = \$this->conectarBanco();
									\$sql = \"UPDATE tb_agenteweb_".strtolower($sessao)." 
																		   SET nome = '\" . \$template->getNome() . \"',
																			   descricao = '\" . \$template->getDescricao() . \"',
																			   status = '1' 
																			   WHERE id = \" . \$template->getId() . \"\";

									
									\$retorno = mysqli_query(\$conexao,\$sql) or die('Erro na execução do update!');
									\$this->FecharBanco(\$conexao);
									return \$retorno;
								} catch (Exception \$e) {
									return \$e;
								}
							}

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
			");
		fclose($dao);
		echo "termino dao\n";			
		
	}
	
}


?>