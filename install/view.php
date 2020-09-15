<?php

class View{
	
	public function tipoQtd($campos,$tipo){
		$contador = 0;
		for($i=0;$i< count($campos);$i++){
			if($campos[$i]->tipo === $tipo){	
				$contador++;
			}
		}		
		return $contador;
	}
	
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
									  ".$this->createImagem($sessao, $campos, false, false)."	
									  ".$this->createArquivo($sessao, $campos, false, false)."							 
										<form action=\"#\" method=\"post\" id=\"formCadastro\" class=\"\">
											<input type=\"hidden\" name=\"r3\" id=\"r3\" value=\"div_central\"/>
											<input type=\"hidden\" name=\"c2\" id=\"c2\" value=\"Controlador".$sessao."\"/>
											<input type=\"hidden\" name=\"f1\" id=\"f1\" value=\"incluir".$sessao."\"/>
											<input type=\"hidden\" name=\"m4\" id=\"m4\" value=\"1\"/>
											".$this->campos($sessao, $campos,false,false)."
											<!--div class=\"form-group\">
												<label class=\"control-label\">Descrição</label>
												<textarea  id=\"descricao\" name=\"descricao\" rows=\"4\" value=\"\" class=\"form-control\" ></textarea>
											</div-->
										  </form>
										</div>
										<div class=\"tile-footer\">
										  <button class=\"btn btn-primary \" onClick=\"fncFormCadastro(this)\" type=\"button\"><i class=\"fa fa-fw fa-lg fa-check-circle\"></i>Salvar</button>
										  &nbsp;&nbsp;&nbsp;<a class=\"btn btn-secondary \" onClick=\"fncButtonCadastro(this)\" href=\"#\" f1=\"telaListar".$sessao."\" c2=\"Controlador".$sessao."\" r3=\"div_central\" ><i class=\"fa fa-fw fa-lg fa-times-circle\"></i>Voltar</a>
										</div>
									  </div>
									</div>
								  </div>          
								<?php
							}		
		";
		return $script;
	}
	
	public function titulosListar($campos){
		$script = "";
		for($i=0;$i< count($campos);$i++){
			if($campos[$i]->grid === "1"){	
				$script .= "<th>".ucfirst(strtolower($campos[$i]->campo))."</th>
				";
			}
		}
		return $script;
	}
	
	public function colunasListar($sessao,$campos){
		$script = "";
		for($i=0;$i< count($campos);$i++){	
			if($campos[$i]->grid === "1"){	
				$script .= "
															<td class=\"center\" onClick=\"getId(this)\"  style=\"cursor:pointer\"  id=\"<?php echo \$".strtolower($sessao)."->getId(); ?>\" f1=\"telaVisualizar".$sessao."\" c2=\"Controlador".$sessao."\" r3=\"div_central\">
																<?php
																if (\$".strtolower($sessao)."->get".ucfirst(strtolower($campos[$i]->campo))."()) {
																	echo limitarTexto(\$".strtolower($sessao)."->get".ucfirst(strtolower($campos[$i]->campo))."(), 20);
																} else {
																	echo \"-\";
																}
																?>
															</td>			
				";
			}
		}
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
										<button class=\"btn btn-primary \" <?php echo (\$perfil === 'A')?'onClick=\"fncButtonCadastro(this)\"':'disabled=\"true\"'; ?> f1=\"telaCadastrar".$sessao."\" c2=\"Controlador".$sessao."\" r3=\"div_central\"><i class=\"fa fa-fw fa-lg fa-plus\"></i>Novo</button>                
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
												".$this->titulosListar($campos)."
												<th class=\"sorting_disabled\" >Ações</th> 
											  </tr>
											</thead>
											<tbody>
											   <?php 
												if (\$obj".$sessao.") {
													foreach (\$obj".$sessao." as \$".strtolower($sessao).") {
												?>    
														<tr> 
															<td class=\"center\"><?php echo str_pad(\$".strtolower($sessao)."->getId(), 5, \"0\", STR_PAD_LEFT); ?></td>
															".$this->colunasListar($sessao,$campos)."
															<td style=\"text-align:center;width:100px;\">                              
																<button <?php echo (\$perfil !== 'C')?'onClick=\"getId(this)\"':'disabled=\"true\"'; ?> class=\"btn btn-secondary btn-list\" type=\"button\" title=\"Alterar\" id=\"<?php echo \$".strtolower($sessao)."->getId(); ?>\" f1=\"telaAlterar".$sessao."\" c2=\"Controlador".$sessao."\" r3=\"div_central\"><i class=\"fa fa-lg fa-edit\"></i></button>
																<button <?php echo (\$perfil === 'A')?'onClick=\"fncDeleteId(this)\"':'disabled=\"true\"'; ?> class=\"btn btn-secondary btn-list\" type=\"button\" title=\"Excluir\" id=\"<?php echo \$".strtolower($sessao)."->getId(); ?>\" f1=\"excluir".$sessao."\" c2=\"Controlador".$sessao."\" r3=\"div_central\" m4=\"4\"><i class=\"fa fa-lg fa-trash\"></i></button>
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
										fncInserirArquivo(\"form_arquivo\", \"progress_arquivo\", \"porcentagem_arquivo\", \"arquivo\", \"arquivoAtual_".strtolower($campos[$i]->campo)."\", \"./arquivos/".strtolower($sessao)."/\", \"arquivo\");
										fncInserirArquivo(\"form_imagem\", \"progress\", \"porcentagem\", \"imagem\", \"imagemAtual_".strtolower($campos[$i]->campo)."\", \"./imagens/".strtolower($sessao)."/\", \"imagem\");
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
									    ".$this->createImagem($sessao, $campos, true, false)."	
									    ".$this->createArquivo($sessao, $campos, true, false)."	
										<form action=\"#\" method=\"post\" id=\"formCadastro\" class=\"\">
											<input type=\"hidden\" name=\"r3\" id=\"r3\" value=\"div_central\"/>
											<input type=\"hidden\" name=\"c2\" id=\"c2\" value=\"Controlador".$sessao."\"/>
											<input type=\"hidden\" name=\"f1\" id=\"f1\" value=\"alterar".$sessao."\"/>
											<input type=\"hidden\" name=\"m4\" id=\"m4\" value=\"2\"/>
											<input type=\"hidden\" name=\"id\" id=\"id\" value=\"<?php echo \$obj".$sessao."[0]->getId(); ?>\"/>
											".$this->campos($sessao, $campos,true,false)."
										  </form>
										</div>
										<div class=\"tile-footer\">
										  <button class=\"btn btn-primary \" onClick=\"fncFormCadastro(this)\" type=\"button\"><i class=\"fa fa-fw fa-lg fa-check-circle\"></i>Salvar</button>
										  &nbsp;&nbsp;&nbsp;<a class=\"btn btn-secondary \" onClick=\"fncButtonCadastro(this)\" href=\"#\" f1=\"telaListar".$sessao."\" c2=\"Controlador".$sessao."\" r3=\"div_central\" ><i class=\"fa fa-fw fa-lg fa-times-circle\"></i>Voltar</a>
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
									    ".$this->createImagem($sessao, $campos, true,true)."		
									    ".$this->createArquivo($sessao, $campos, true,true)."	
										<form action=\"#\" method=\"post\" id=\"formCadastro\" class=\"\">
											".$this->campos($sessao, $campos,true,true)."
										  </form>
										</div>
										<div class=\"tile-footer\">
										  <a class=\"btn btn-secondary \" onClick=\"fncButtonCadastro(this)\" href=\"#\" f1=\"telaListar".$sessao."\" c2=\"Controlador".$sessao."\" r3=\"div_central\" ><i class=\"fa fa-fw fa-lg fa-times-circle\"></i>Voltar</a>
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
		
	}
		
	public function campos($sessao,$campos,$isValue,$isDisabled){
		$script = "";
		for($i=0;$i< count($campos);$i++){
			$simbolo = ($campos[$i]->obrigatorio === '1')?'*':'';
			$mgsAlerta = ($campos[$i]->obrigatorio === '1')?' mgs_alerta':'';
			
			if($campos[$i]->tipo !== "imagem" && $campos[$i]->tipo !== "arquivo"){
				$script .= "
											<div class=\"form-group\">";
				$script .= "
												<label class=\"control-label\">".ucfirst(strtolower($campos[$i]->campo))." ".$simbolo."</label>";
				
				switch($campos[$i]->tipo){
					case "text":
						$script .= $this->createCampoText($sessao, $campos[$i], $mgsAlerta,$isValue,$isDisabled);		
					break;		
					case "number":
						$script .= $this->createCampoNumber($sessao, $campos[$i], $mgsAlerta,$isValue,$isDisabled);	
					break;
					case "monetario":
						$script .= $this->createCampoMonetario($sessao, $campos[$i], $mgsAlerta,$isValue,$isDisabled);			
					break;
					case "textarea":
						$script .= $this->createCampoTextArea($sessao, $campos[$i], $mgsAlerta,$isValue,$isDisabled);			
					break;
					case "data":		
						$script .= $this->createCampoData($sessao, $campos[$i], $mgsAlerta,$isValue,$isDisabled);			
					break;					
					case "radio-button":
						$script .= $this->createCampoRadio($sessao, $campos[$i], $mgsAlerta,$isValue,$isDisabled);			
					break;
					case "check-box":			
						$script .= $this->createCampoCheck($sessao, $campos[$i], $mgsAlerta,$isValue,$isDisabled);			
					break;
					case "select":		
						$script .= $this->createCampoSelect($sessao, $campos[$i], $mgsAlerta,$isValue,$isDisabled);								
					break;
				}
					    
                $script .= "
											</div>";				
			}else if($campos[$i]->tipo !== "imagem"){
				  $value = ($isValue === true)?" value=\"<?php echo \$obj".$sessao."[0]->get".ucfirst(strtolower($campos[$i]->campo))."(); ?>\" ":"";	
				  $script .= "<input type=\"hidden\" name=\"".strtolower($campos[$i]->campo)."\" id=\"".strtolower($campos[$i]->campo)."\" ".$value." />";                    
			}else if($campos[$i]->tipo !== "arquivo"){
				  $value = ($isValue === true)?" value=\"<?php echo \$obj".$sessao."[0]->get".ucfirst(strtolower($campos[$i]->campo))."(); ?>\" ":"";	
				  $script .= "<input type=\"hidden\" name=\"".strtolower($campos[$i]->campo)."\" id=\"".strtolower($campos[$i]->campo)."\" ".$value." />"; 
			}						
		}
		return $script;
	}		
	
	public function createCampoText($sessao, $campo, $mgsAlerta,$isValue,$isDisabled){
		$disabled = ($isDisabled === true)? " disabled=\"true\" ":"";
		$value = ($isValue === true)?" value=\"<?php echo \$obj".$sessao."[0]->get".ucfirst(strtolower($campo->campo))."(); ?>\" ":"";
		$script .= "					  
												  <input ".$disabled." class=\"form-control".$mgsAlerta."\" id=\"".strtolower($campo->campo)."\" name=\"".strtolower($campo->campo)."\" type=\"text\" ".$value." >";			
		return $script;
	}	
	
	public function createCampoNumber($sessao, $campo, $mgsAlerta,$isValue,$isDisabled){
		$disabled = ($isDisabled === true)? " disabled=\"true\" ":"";
		$value = ($isValue === true)?" value=\"<?php echo \$obj".$sessao."[0]->get".ucfirst(strtolower($campo->campo))."(); ?>\" ":"";
		$script .= "					  
												  <input ".$disabled." class=\"form-control".$mgsAlerta."\" id=\"".strtolower($campo->campo)."\" name=\"".strtolower($campo->campo)."\" type=\"number\" ".$value." onkeypress=\"return mascara(event, this, '#');\" maxlength=\"6\" >";			
		return $script;
	}

	public function createCampoMonetario($sessao, $campo, $mgsAlerta,$isValue,$isDisabled){
		$disabled = ($isDisabled === true)? " disabled=\"true\" ":"";
		$value = ($isValue === true)?" value=\"<?php echo \$obj".$sessao."[0]->get".ucfirst(strtolower($campo->campo))."(); ?>\" ":"";
		$script .= "					  
												  <input ".$disabled." class=\"maskMoney form-control ".$mgsAlerta."\" id=\"".strtolower($campo->campo)."\" name=\"".strtolower($campo->campo)."\" type=\"text\" ".$value." >";			
		return $script;		
	}	
	
	public function createCampoTextArea($sessao, $campo, $mgsAlerta,$isValue,$isDisabled){
		$disabled = ($isDisabled === true)? " disabled=\"true\" ":"";
		$value = ($isValue === true)?" <?php echo \$obj".$sessao."[0]->get".ucfirst(strtolower($campo->campo))."(); ?> ":"";
		$script .= "
												  <textarea ".$disabled." class=\"form-control".$mgsAlerta."\" id=\"".strtolower($campo->campo)."\" name=\"".strtolower($campo->campo)."\" rows=\"4\" >".$value."</textarea>";				
		return $script;
	}	
	
	public function createCampoData($sessao, $campo, $mgsAlerta,$isValue,$isDisabled){
		$disabled = ($isDisabled === true)? " disabled=\"true\" ":"";
		$value = ($isValue === true)?" value=\"<?php echo (\$obj".$sessao."[0]->get".ucfirst(strtolower($campo->campo))."() != \"0000-00-00\") ? recuperaData(\$obj".$sessao."[0]->get".ucfirst(strtolower($campo->campo))."()) : \"\"; ?>\" ":"";
		$script .= "
												  <script type=\"text/javascript\" >setDatePicker('".strtolower($campo->campo)."');</script> 	
												  <input ".$disabled." class=\"data form-control".$mgsAlerta."\" id=\"".strtolower($campo->campo)."\" name=\"".strtolower($campo->campo)."\" onkeypress=\"return mascara(event, this, '##/##/####');\" maxlength=\"10\" type=\"text\" ".$value." >";		
		return $script;
	}	
	
	public function createCampoRadio($sessao, $campo, $mgsAlerta,$isValue,$isDisabled){
		$disabled = ($isDisabled === true)? " disabled=\"true\" ":"";
		$script .= "
												<?php
													\$sim = '';
													\$nao = '';							
												?>					
					";
		if($isValue === true){
			$script .= "
												<?php
													if (\$obj".$sessao."[0]->get".ucfirst(strtolower($campo->campo))."() == \"1\") {
														\$sim = 'checked=\"checked\"';                            
													} elseif (\$obj".$sessao."[0]->get".ucfirst(strtolower($campo->campo))."() == \"0\") {
														\$nao = 'checked=\"checked\"';
													}
												?>					
						";
		}
		$titulo = strtolower($campo->campo);	
		$script .= "              
												  <br/><label>
													<input type=\"radio\" ".$disabled." <?php echo \$sim; ?> name=\"".$titulo."\" value=\"1\"><span class=\"label-text\">Sim</span>
												  </label><br/>
												  <label>
													<input type=\"radio\" ".$disabled." <?php echo \$nao; ?> name=\"".$titulo."\" value=\"0\"><span class=\"label-text\">Não</span>
												  </label>
					";		
		return $script;
	}	
	
	public function createCampoCheck($sessao, $campo, $mgsAlerta,$isValue,$isDisabled){
		
		return $script;
	}	
	
	public function createCampoSelect($sessao, $campo, $mgsAlerta,$isValue,$isDisabled){
		$disabled = ($isDisabled === true)? " disabled=\"true\" ":"";
		$value = ($isValue === true)?" value=\"<?php echo \$obj".$sessao."[0]->get".ucfirst(strtolower($campo->campo))."(); ?>\" ":"";
		
		$script .= "
												<select id=\"".strtolower($campo->campo)."\" name=\"".strtolower($campo->campo)."\" ".$value." class=\"form-control".$mgsAlerta."\">
													<option value=\"\">Selecione...</option>
													<option value=\"1\">Valor 1</option>
													<option value=\"2\">Valor 2</option>
													<option value=\"3\">Valor 3</option>													
												</select>";

		return $script;
	}	
		
	public function createImagem($sessao, $campos, $isValue, $isDisabled){
		$script = "";
		for($i=0;$i< count($campos);$i++){
			
			$simbolo = ($campos[$i]->obrigatorio === '1')?'*':'';
			$mgsAlerta = ($campos[$i]->obrigatorio === '1')?' mgs_alerta':'';			
			
			if($campos[$i]->tipo === 'imagem' && $isDisabled === true){

				$script .= "
											<div class=\"form-group\">
												<label class=\"control-label\">Imagem Largura Máxima: 640px</label>&nbsp;&nbsp;
												<?php //echo \$obj".$sessao."[0]->get".ucfirst(strtolower($campos[$i]->campo))."();
												if (\$obj".$sessao."[0]->get".ucfirst(strtolower($campos[$i]->campo))."()) {
													\$imagem = \"./imagens/".strtolower($sessao)."/thumbnail\" . \$obj".$sessao."[0]->get".ucfirst(strtolower($campos[$i]->campo))."();
												} else {
													\$imagem = \"./img/imagemPadrao.jpg\";
												}
												?>   
												<span name=\"imagemLink\" id=\"<?php echo \$imagem; ?>\" title=\"Imagem\" >
													<img name=\"imagemAtual_".strtolower($campos[$i]->campo)."\" src=\"<?php echo \$imagem; ?>\" border=\"0\" />
												</span>
											</div>  
				";			
			
			}else if($campos[$i]->tipo === 'imagem' && $isDisabled === false){

				
				$script .= "
											<script type=\"text/javascript\">											
												\$(document).ready(function() {
													fncInserirArquivo('form_imagem_".strtolower($campos[$i]->campo)."', 'progress_".strtolower($campos[$i]->campo)."', 'porcentagem_".strtolower($campos[$i]->campo)."', '".strtolower($campos[$i]->campo)."', 'imagemAtual_".strtolower($campos[$i]->campo)."', './imagens/".strtolower($sessao)."/', 'imagem');
												});
											</script>
											";
				$value = "";								
				if($isValue === true){
					$script .= "											
											<?php
											if (\$obj".$sessao."[0]->get".ucfirst(strtolower($campos[$i]->campo))."()) {
												\$imagem = \"./imagens/".strtolower($sessao)."/thumbnail\" . \$obj".$sessao."[0]->get".ucfirst(strtolower($campos[$i]->campo))."();
											} else {
												\$imagem = \"./img/imagemPadrao.jpg\";
											}
											?> 
											";
					$value = "<?php echo \$imagem; ?>";							
				}else{
					$value = "./img/imagemPadrao.jpg";
				}
				
				
				$script .= "				<div class=\"form-group\">";
				$script .= "					<table border=\"0\" style=\"width: 100%\">
													<tr>
														<td colspan=\"3\">
															<label>Imagem Largura Máxima: 640px</label>&nbsp;&nbsp; 
														</td>
													</tr>
													<tr style=\"height: 110px;\">
														<td style=\"width: 20%;text-align: right;\">
															<span id=\"span-teste\" class=\"upload-wrapper\" >  
																<form action=\"./post-imagem.php\" method=\"post\" id=\"form_imagem_".strtolower($campos[$i]->campo)."\">
																	<input name=\"pastaArquivo\" type=\"hidden\" value=\"./imagens/".strtolower($sessao)."/\">
																	<input name=\"largura\" type=\"hidden\" value=\"640\">
																	<input name=\"opcao\" type=\"hidden\" value=\"1\">
																	<input name=\"tipoArq\" type=\"hidden\" value=\"imagem\">
																	<input type=\"file\" name=\"file\" class=\"upload-file\" onchange=\"javascript: fncSubmitArquivo('enviar_".strtolower($campos[$i]->campo)."', this);\" >
																	<input type=\"submit\" id=\"enviar_".strtolower($campos[$i]->campo)."\" style=\"display:none;\">   
																	<img src=\"./img/img_upload.png\" class=\"upload-button\" />
																</form> 
															</span>
														</td>
														<td style=\"width: 20%\">
															<img onclick=\"fncRemoverArquivo('imagem', './imagens/".strtolower($sessao)."', 'imagem', 'imagemAtual_".strtolower($campos[$i]->campo)."', './img/imagemPadrao.jpg');\" src=\"./img/remove.png\" border=\"0\" title=\"Clique para remover\" style=\"cursor:pointer;margin-bottom:7px;\" class=\"upload-button\" />
														</td>
														<td style=\"width: 60%\">
															<img id=\"imagemAtual_".strtolower($campos[$i]->campo)."\" name=\"imagemAtual_".strtolower($campos[$i]->campo)."\" src=\"".$value."\" border=\"0\" style=\"\" />
														</td>
													</tr>
													<tr>
														<td  colspan=\"2\">
															<progress id=\"progress_".strtolower($campos[$i]->campo)."\" value=\"0\" max=\"100\" style=\"display:none;float: right;\"></progress>
														</td>
														<td  colspan=\"1\">
															<span id=\"porcentagem_".strtolower($campos[$i]->campo)."\" style=\"display:none;float: left;\">0%</span>
														</td>
													</tr>
												</table>			
				";
				$script .= "				</div>";
			}
		}
		return $script;		
	}

	public function createArquivo($sessao, $campos, $isValue, $isDisabled){
		$script = "";
		for($i=0;$i< count($campos);$i++){
			
			$simbolo = ($campos[$i]->obrigatorio === '1')?'*':'';
			$mgsAlerta = ($campos[$i]->obrigatorio === '1')?' mgs_alerta':'';			
			
			if($campos[$i]->tipo === 'arquivo' && $isDisabled === true){
				
				$script .= "
											<div class=\"form-group\">
												<label class=\"control-label\">Arquivo Tamanho Máximo: 2MB</label>
												<div style=\"padding-bottom: 19px;\">
												<span name=\"arquivoAtual_".strtolower($campos[$i]->campo)."\" onClick=\"fnAbreArquivo('arquivo', './arquivos/".strtolower($sessao)."/')\" style=\"<?php echo (\$obj".$sessao."[0]->get".ucfirst(strtolower($campos[$i]->campo))."()) ? 'cursor: pointer; text-decoration: underline;' : '' ?>\">
													<?php
													if (\$obj".$sessao."[0]->get".ucfirst(strtolower($campos[$i]->campo))."()) {
														echo \$obj".$sessao."[0]->get".ucfirst(strtolower($campos[$i]->campo))."();
													} else {
														?>Adicione um arquivo clicando no <img src=\"./img/img_upload.png\" border=\"0\" style=\"float:none;margin:0;width: 20px;\" /><?php
													}
													?>                                                    
												</span>
												</div>
											</div>   
				";				
				
			}else if($campos[$i]->tipo === 'arquivo' && $isDisabled === false){
				$span = "";
				if($isValue === true){
					$span = "
															<span name=\"arquivoAtual_".strtolower($campos[$i]->campo)."\" id=\"arquivoAtual_".strtolower($campos[$i]->campo)."\" onClick=\"fnAbreArquivo('".strtolower($campos[$i]->campo)."', './arquivos/".strtolower($sessao)."/')\" style=\"<?php echo (\$obj".$sessao."[0]->get".ucfirst(strtolower($campos[$i]->campo))."()) ? 'cursor: pointer; text-decoration: underline;' : '' ?>\" >
																<?php
																if (\$obj".$sessao."[0]->get".ucfirst(strtolower($campos[$i]->campo))."()) {
																	echo \$obj".$sessao."[0]->get".ucfirst(strtolower($campos[$i]->campo))."();
																} else {
																	?><br />Adicione um arquivo clicando no <img src=\"./img/img_upload.png\" border=\"0\" style=\"float:none;margin:0;width: 20px;\" /><?php
																}
																?>
															</span>";					
				}else{
					$span = "
															<span name=\"arquivoAtual_".strtolower($campos[$i]->campo)."\" id=\"arquivoAtual_".strtolower($campos[$i]->campo)."\" onClick=\"fnAbreArquivo('".strtolower($campos[$i]->campo)."', './arquivos/".strtolower($campos[$i]->campo)."/')\"   ><br />Adicione um arquivo clicando no <img src=\"./img/img_upload.png\" border=\"0\" style=\"float:none;margin:0;width: 20px;\" /></span>";
				}
				
				$script .= "
											<script type=\"text/javascript\">											
												\$(document).ready(function() {
													fncInserirArquivo('form_arquivo_".strtolower($campos[$i]->campo)."', 'progress_arquivo_".strtolower($campos[$i]->campo)."', 'porcentagem_arquivo_".strtolower($campos[$i]->campo)."', '".strtolower($campos[$i]->campo)."', 'arquivoAtual_".strtolower($campos[$i]->campo)."', './arquivos/".strtolower($sessao)."/', 'arquivo');
												});
											</script>											";
				$script .= "				<div class=\"form-group\">";
				$script .= "					<table border=\"0\" style=\"width: 100%\">
													<tr>
														<td colspan=\"3\">
															<label>Tamanho Máxima: 2 Megas.</label>&nbsp;&nbsp; 
														</td>
													</tr>
													<tr style=\"height: 110px;\">
														<td style=\"width: 20%;text-align: right;\">
															<span id=\"span-teste\" class=\"upload-wrapper\" >  
																<form action=\"./post-imagem.php\" method=\"post\" id=\"form_arquivo_".strtolower($campos[$i]->campo)."\">
																	<input name=\"pastaArquivo\" type=\"hidden\" value=\"./arquivos/".strtolower($sessao)."/\">
																	<input name=\"largura\" type=\"hidden\" value=\"640\">
																	<input name=\"opcao\" type=\"hidden\" value=\"1\">
																	<input name=\"tipoArq\" type=\"hidden\" value=\"arquivo\">
																	<input type=\"file\" name=\"file\" class=\"upload-file\" onchange=\"javascript: fncSubmitArquivo('enviar_arquivo_".strtolower($campos[$i]->campo)."', this);\" >
																	<input type=\"submit\" id=\"enviar_arquivo_".strtolower($campos[$i]->campo)."\" style=\"display:none;\">   
																	<img src=\"./img/img_upload.png\" class=\"upload-button\" />
																</form> 
															</span>
														</td>
														<td style=\"width: 20%\">
															<img onclick=\"fncRemoverArquivo('".strtolower($campos[$i]->campo)."', './arquivos/".strtolower($sessao)."/', 'arquivo', 'arquivoAtual_".strtolower($campos[$i]->campo)."', '');\" src=\"./img/remove.png\" border=\"0\" title=\"Clique para remover\" style=\"cursor:pointer;margin-bottom:7px;\" class=\"upload-button\" />
														</td>
														<td style=\"width: 60%\">
															".$span."
														</td>
													</tr>
													<tr>
														<td  colspan=\"2\">
															<progress id=\"progress_arquivo_".strtolower($campos[$i]->campo)."\" value=\"0\" max=\"100\" style=\"display:none;float: right;\"></progress>
														</td>
														<td  colspan=\"1\">															
															<span id=\"porcentagem_arquivo_".strtolower($campos[$i]->campo)."\" style=\"display:none;float: left;\">0%</span>
														</td>
													</tr>
												</table>			
				";
				$script .= "				</div>";
			}
		}
		return $script;		
	}		
	
}


?>

