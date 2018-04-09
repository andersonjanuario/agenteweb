<?php

class View{
	
	public function telaCadastrar($sessao,$campos){
		$script = "
							public function telaCadastrar".$sessao."(\$post) {
								?>

								<script type=\"text/javascript\" >
								<?php
								echo (\$post) ? \"\$.growlUI2('\" . \$post . \"', '&nbsp;');\" : \"\";
								?>
								</script>
								  <div class=\"app-title\">
									<div>
									  <h1><i class=\"fa fa-file-text-o\"></i> ".$sessao." </h1>              
									</div>
									<ul class=\"app-breadcrumb breadcrumb\">
									  <li class=\"breadcrumb-item\"><i class=\"fa fa-home fa-lg\"></i></li>
									  <li class=\"breadcrumb-item\">Cadastros</li>
									  <li class=\"breadcrumb-item\"><a href=\"#\">".$sessao." </a></li>
									  <li class=\"breadcrumb-item active\"><a href=\"#\">Cadastrar </a></li>
									</ul>
								  </div>

								  <div class=\"row\">
									<div class=\"col-md-12\">
									  <div class=\"tile\">
										<h3 class=\"tile-title\">Formulário</h3>
										<div class=\"tile-body\">
						 
										<form action=\"#\" method=\"post\" id=\"formCadastro\" class=\"\">
											<input type=\"hidden\" name=\"retorno\" id=\"retorno\" value=\"div_central\"/>
											<input type=\"hidden\" name=\"controlador\" id=\"controlador\" value=\"Controlador".$sessao."\"/>
											<input type=\"hidden\" name=\"funcao\" id=\"funcao\" value=\"incluir".$sessao."\"/>
											<input type=\"hidden\" name=\"mensagem\" id=\"mensagem\" value=\"1\"/>
											<div class=\"form-group\">
											  <label class=\"control-label\">Nome *</label>
											  <input class=\"form-control mgs_alerta\" id=\"nome\" name=\"nome\" type=\"text\" onkeyup=\"this.value=this.value.toUpperCase();\" >
											</div>
											<div class=\"form-group\">
												<label class=\"control-label\">Descrição</label>
												<textarea  id=\"descricao\" name=\"descricao\" rows=\"4\" value=\"\" class=\"form-control\" ></textarea>
											</div>
										  </form>
										</div>
										<div class=\"tile-footer\">
										  <button class=\"btn btn-primary \" onClick=\"fncFormCadastro(this)\" type=\"button\"><i class=\"fa fa-fw fa-lg fa-check-circle\"></i>Salvar</button>
										  &nbsp;&nbsp;&nbsp;<a class=\"btn btn-secondary \" onClick=\"fncButtonCadastro(this)\" href=\"#\" funcao=\"telaListar".$sessao."\" controlador=\"Controlador".$sessao."\" retorno=\"div_central\" ><i class=\"fa fa-fw fa-lg fa-times-circle\"></i>Voltar</a>
										</div>
									  </div>
									</div>
								  </div>          
								<?php
							}		
		";
		return $script;
	}
	
	public function telaListar($sessao,$campos){
		$script = "
							public function telaListar".$sessao."(\$obj".$sessao.") {
								\$controladorAcao = new ControladorAcao();
								\$perfil = \$controladorAcao->retornaPerfilClasseAcao(\$_SESSION[\"login\"],'telaListar".$sessao."');
								?>
								  <div class=\"app-title\">
									<div>
									  <h1><i class=\"fa fa-th-list\"></i> ".$sessao." &nbsp;&nbsp;&nbsp;
										<button class=\"btn btn-primary \" <?php echo (\$perfil === 'A')?'onClick=\"fncButtonCadastro(this)\"':'disabled=\"true\"'; ?> funcao=\"telaCadastrar".$sessao."\" controlador=\"Controlador".$sessao."\" retorno=\"div_central\"><i class=\"fa fa-fw fa-lg fa-plus\"></i>Novo</button>                
									  </h1>              
									</div>
									<ul class=\"app-breadcrumb breadcrumb side\">
									  <li class=\"breadcrumb-item\"><i class=\"fa fa-home fa-lg\"></i></li>
									  <li class=\"breadcrumb-item\">Cadastros</li>
									  <li class=\"breadcrumb-item active\"><a href=\"#\">".$sessao." </a></li>
									</ul>
								  </div>
								  <div class=\"row\">
									<div class=\"col-md-12\">
									  <div class=\"tile\">
										<div class=\"tile-body\">
										  <table class=\"table table-hover table-bordered\" id=\"sampleTable\">
											<thead>
											  <tr>
												<th>Código</th>
												<th>Nome</th>
												<th>Descrição</th>
												<th class=\"sorting_disabled\" >Ações</th> 
											  </tr>
											</thead>
											<tbody>
											   <?php 
												if (\$obj".$sessao.") {
													foreach (\$obj".$sessao." as ".strtolower($sessao).") {
												?>    
														<tr> 
															<td class=\"center\"><?php echo str_pad(\$".strtolower($sessao)."->getId(), 5, \"0\", STR_PAD_LEFT); ?></td>
															<td class=\"center\" onClick=\"getId(this)\"   style=\"cursor:pointer\"  id=\"<?php echo \$".strtolower($sessao)."->getId(); ?>\" funcao=\"telaVisualizar".$sessao."\" controlador=\"Controlador".$sessao."\" retorno=\"div_central\">
																<?php echo limitarTexto(\$".strtolower($sessao)."->getNome(), 27); ?>
															</td>
															<td class=\"center\" onClick=\"getId(this)\"  style=\"cursor:pointer\"  id=\"<?php echo \$".strtolower($sessao)."->getId(); ?>\" funcao=\"telaVisualizar".$sessao."\" controlador=\"Controlador".$sessao."\" retorno=\"div_central\">
																<?php
																if (\$".strtolower($sessao)."->getDescricao()) {
																	echo limitarTexto(\$".strtolower($sessao)."->getDescricao(), 20);
																} else {
																	echo \"-\";
																}
																?>
															</td>
															<td style=\"text-align:center;width:100px;\">                              
																<button <?php echo (\$perfil !== 'C')?'onClick=\"getId(this)\"':'disabled=\"true\"'; ?> class=\"btn btn-secondary btn-list\" type=\"button\" title=\"Alterar\" id=\"<?php echo \$".strtolower($sessao)."->getId(); ?>\" funcao=\"telaAlterar".$sessao."\" controlador=\"Controlador".$sessao."\" retorno=\"div_central\"><i class=\"fa fa-lg fa-edit\"></i></button>
																<button <?php echo (\$perfil === 'A')?'onClick=\"fncDeleteId(this)\"':'disabled=\"true\"'; ?> class=\"btn btn-secondary btn-list\" type=\"button\" title=\"Excluir\" id=\"<?php echo \$".strtolower($sessao)."->getId(); ?>\" funcao=\"excluir".$sessao."\" controlador=\"Controlador".$sessao."\" retorno=\"div_central\" mensagem=\"4\"><i class=\"fa fa-lg fa-trash\"></i></button>
															</td> 
														</tr> 
												<?php
													}
												}
												?>  
											</tbody>
										  </table>
										</div>
									  </div>
									</div>
								  </div>        
								  <script type=\"text/javascript\">\$('#sampleTable').DataTable();</script>        
								<?php
							}		
		";
		return $script;
	}

	public function telaAlterar($sessao,$campos){
		$script = "
							public function telaAlterar".$sessao."(\$obj".$sessao.") {
								?>
								<script type=\"text/javascript\">
									\$(\".maskMoney\").maskMoney();
									setDatePicker('data_nascimento');

									\$(document).ready(function() {
										fncInserirArquivo(\"form_arquivo\", \"progress_arquivo\", \"porcentagem_arquivo\", \"arquivo\", \"arquivoAtual\", \"./arquivos/".strtolower($sessao)."/\", \"arquivo\");
										fncInserirArquivo(\"form_imagem\", \"progress\", \"porcentagem\", \"imagem\", \"imagemAtual\", \"./imagens/".strtolower($sessao)."/\", \"imagem\");
									});
								</script>


								  <div class=\"app-title\">
									<div>
									  <h1><i class=\"fa fa-file-text-o\"></i> ".$sessao." </h1>              
									</div>
									<ul class=\"app-breadcrumb breadcrumb\">
									  <li class=\"breadcrumb-item\"><i class=\"fa fa-home fa-lg\"></i></li>
									  <li class=\"breadcrumb-item\">Cadastros</li>
									  <li class=\"breadcrumb-item\"><a href=\"#\">".$sessao." </a></li>
									  <li class=\"breadcrumb-item active\"><a href=\"#\">Cadastrar </a></li>
									</ul>
								  </div>

								  <div class=\"row\">
									<div class=\"col-md-12\">
									  <div class=\"tile\">
										<h3 class=\"tile-title\">Formulário</h3>
										<div class=\"tile-body\">

										<form action=\"#\" method=\"post\" id=\"formCadastro\" class=\"\">
											<input type=\"hidden\" name=\"retorno\" id=\"retorno\" value=\"div_central\"/>
											<input type=\"hidden\" name=\"controlador\" id=\"controlador\" value=\"Controlador".$sessao."\"/>
											<input type=\"hidden\" name=\"funcao\" id=\"funcao\" value=\"alterar".$sessao."\"/>
											<input type=\"hidden\" name=\"mensagem\" id=\"mensagem\" value=\"2\"/>
											<input type=\"hidden\" name=\"id\" id=\"id\" value=\"<?php echo \$obj".$sessao."[0]->getId(); ?>\"/>
											<div class=\"form-group\">
												<label class=\"control-label\">Nome *</label>
												<input type=\"text\" onkeyup=\"this.value = this.value.toUpperCase();\" id=\"nome\" name=\"nome\" value=\"<?php echo \$obj".$sessao."[0]->getNome(); ?>\" class=\"form-control mgs_alerta\" >
											</div>
											<div class=\"form-group\">
												<label class=\"control-label\">Descrição</label>                    
												<textarea id=\"descricao\" name=\"descricao\" class=\"form-control\" ><?php echo \$obj".$sessao."[0]->getDescricao(); ?></textarea>
											</div>
										  </form>
										</div>
										<div class=\"tile-footer\">
										  <button class=\"btn btn-primary \" onClick=\"fncFormCadastro(this)\" type=\"button\"><i class=\"fa fa-fw fa-lg fa-check-circle\"></i>Salvar</button>
										  &nbsp;&nbsp;&nbsp;<a class=\"btn btn-secondary \" onClick=\"fncButtonCadastro(this)\" href=\"#\" funcao=\"telaListar".$sessao."\" controlador=\"Controlador".$sessao."\" retorno=\"div_central\" ><i class=\"fa fa-fw fa-lg fa-times-circle\"></i>Voltar</a>
										</div>
									  </div>
									</div>
								  </div>         
								<?php
							}		
		";
		return $script;
	}

	public function telaVisualizar($sessao,$campos){
		$script = "
							public function telaVisualizar".$sessao."(\$obj".$sessao.") {
								?>
								  <div class=\"app-title\">
									<div>
									  <h1><i class=\"fa fa-file-text-o\"></i> ".$sessao." </h1>              
									</div>
									<ul class=\"app-breadcrumb breadcrumb\">
									  <li class=\"breadcrumb-item\"><i class=\"fa fa-home fa-lg\"></i></li>
									  <li class=\"breadcrumb-item\">Cadastros</li>
									  <li class=\"breadcrumb-item\"><a href=\"#\">".$sessao." </a></li>
									  <li class=\"breadcrumb-item active\"><a href=\"#\">Visualizar </a></li>
									</ul>
								  </div>

								  <div class=\"row\">
									<div class=\"col-md-12\">
									  <div class=\"tile\">
										<h3 class=\"tile-title\">Formulário</h3>
										<div class=\"tile-body\">

										<form action=\"#\" method=\"post\" id=\"formCadastro\" class=\"\">
											<div class=\"form-group\">
												<label class=\"control-label\">Nome *</label>
												<input type=\"text\" disabled=\"true\" onkeyup=\"this.value = this.value.toUpperCase();\" id=\"nome\" name=\"nome\" value=\"<?php echo \$obj".$sessao."[0]->getNome(); ?>\" class=\"form-control mgs_alerta\" >
											</div>
											<div class=\"form-group\">
												<label class=\"control-label\">Descrição</label>                    
												<textarea id=\"descricao\" name=\"descricao\" disabled=\"true\" class=\"form-control\" ><?php echo \$obj".$sessao."[0]->getDescricao(); ?></textarea>                                            
											</div>
										  </form>
										</div>
										<div class=\"tile-footer\">
										  <a class=\"btn btn-secondary \" onClick=\"fncButtonCadastro(this)\" href=\"#\" funcao=\"telaListar".$sessao."\" controlador=\"Controlador".$sessao."\" retorno=\"div_central\" ><i class=\"fa fa-fw fa-lg fa-times-circle\"></i>Voltar</a>
										</div>
									  </div>
									</div>
								  </div>
								<?php
							}		
		";
		return $script;
	}	
	
	
	public function create($sessao,$campos){

		echo "iniciando view \\n";
		$view = fopen("../view/view".$sessao.".php", "w") or die("Unable to open file!");
		fwrite($view, "
						<?php

						class View".$sessao." {

							//construtor
							public function __construct() {
								
							}

							//destruidor
							public function __destruct() {
								
							}

							".$this->telaCadastrar($sessao,$campos)."	

							".$this->telaListar($sessao,$campos)."	

							".$this->telaAlterar($sessao,$campos)."	

							".$this->telaVisualizar($sessao,$campos)."	

						}
						?>						
			");
		fclose($view);
		echo "termino view\n";
	
	}
	
}


?>

