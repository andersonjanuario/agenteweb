<?php

class ViewTemplate {

    //construtor
    public function __construct() {
        
    }

    //destruidor
    public function __destruct() {
        
    }
	
	public function telaFormTemplate(){
		?>
		<div class="col-md-6">
			<div class="card">
			  <h3 class="card-title">Register</h3>
			  <div class="card-body">
				<form class="form-horizontal" id="formDados" name="formDados">
					<input class="form-control" id="id" name="id" type="hidden">
				    <input type="hidden" name="c" id="c" value="ControladorTemplate"/>
					<input type="hidden" name="f" id="f" value="incluirTemplate"/>					
				  <div class="form-group">
					<label class="control-label col-md-3">Titulo</label>
					<div class="col-md-8">
					  <input class="form-control mgs_alerta" id="titulo" name="titulo" type="text">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-md-3">Status</label>
					<div class="col-md-8">
					  <input class="form-control col-md-8" id="status" name="status" type="text" >
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-md-3">Descrição</label>
					<div class="col-md-8">
					  <textarea class="form-control mgs_alerta" id="descricao" name="descricao" rows="4"></textarea>
					</div>
				  </div>
				  <!--div class="form-group">
					<label class="control-label col-md-3">Gender</label>
					<div class="col-md-9">
					  <div class="radio-inline">
						<label>
						  <input type="radio" name="gender">Male
						</label>
					  </div>
					  <div class="radio-inline">
						<label>
						  <input type="radio" name="gender">Female
						</label>
					  </div>
					</div>
				  </div-->
				  <!--div class="form-group">
					<label class="control-label col-md-3">Identity Proof</label>
					<div class="col-md-8">
					  <input class="form-control" type="file">
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-md-8 col-md-offset-3">
					  <div class="checkbox">
						<label>
						  <input type="checkbox">I accept the terms and conditions
						</label>
					  </div>
					</div>
				  </div-->				  
				</form>
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-md-8 col-md-offset-3">
					<button class="formCadastro btn btn-primary icon-btn" type="button" onclick="request();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		<?php
	}
	
	public function telaTemplate($objTemplate){
		?>
		  <div class="content-wrapper">
			<div class="page-title">
			  <div>
				<h1><i class="fa fa-dashboard"></i> Dashboard</h1>
				<p>A free and modular admin template</p>
			  </div>
			  <div>
				<ul class="breadcrumb">
				  <li><i class="fa fa-home fa-lg"></i></li>
				  <li><a href="#">Dashboard</a></li>
				</ul>
			  </div>
			</div>
			<div class="row">
			  	<div id="grid"> 				
			  		<?php $this->telaGridTemplate($objTemplate); ?>	
			  	</div>
			  	<div id="form"> 
			  		<?php $this->telaFormTemplate(); ?>			
			  	</div>
			</div>
		  </div>			  
		<?php
	}
	
	public function telaGridTemplate($objTemplate){
		?>
		  <div class="col-md-6">
			<div class="card">
				<table class="table table-hover table-bordered" id="sampleTable">
				  <thead>
					<tr>
					  <th>Id</th>
					  <th>Titulo</th>
					  <th>Descrição</th>
					  <th>Data de Cadastro</th>
					  <th>Data da Modificação</th>
					  <th>Status</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php foreach($objTemplate as $key=>$objeto ){?>
					<tr onclick="montarForm(<?php echo $key; ?>); ">
					  <td><?php echo $objeto->id; ?></td>
					  <td><?php echo $objeto->titulo; ?></td>
					  <td><?php echo $objeto->descricao; ?></td>
					  <td><?php echo $objeto->data_cadastro; ?></td>
					  <td><?php echo $objeto->data_modificacao; ?></td>
					  <td><?php echo $objeto->status; ?></td>
					</tr>
				  <?php } ?>
				  </tbody>
				</table>			
			</div>
		  </div>
		<script type="text/javascript">
		$('#sampleTable').DataTable(
			{
				"pagingType": "numbers",
				"pageLength": 5,
				"numbersLength": 3
			}
		);
		var dados = <?php echo json_encode($objTemplate); ?>;
		function montarForm(key){
			var campos = Object.keys(dados[key]);
			var formulario = document.getElementById("formDados").elements;
			for (var i=0; i < formulario.length; i++) {
				for(var k=0; k < campos.length; k++){
					if(formulario[i].name == campos[k]){
						formulario[i].value = dados[key][formulario[i].name]; 
					}				
				}
			}
		}
		</script>  
		<?php
	}
	
	
	/*

    public function telaCadastrarTemplate($post) {
        ?>
        <script src="js/popup-upload.js" type="text/javascript"></script>
        <script src="js/mascara.js" type="text/javascript"></script>
        <script src="js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>
        <script src="js/jquery.form.js" type="text/javascript" ></script>
        <script type="text/javascript" >
        <?php
//echo ($post)?"$.blockUI({message: '".$post."', onOverlayClick: $.unblockUI});":"";
        echo ($post) ? "$.growlUI2('" . $post . "', '&nbsp;');" : "";
        ?>
            $(".maskMoney").maskMoney();
            setDatePicker('data_nascimento');

            $(document).ready(function() {
                fncInserirArquivo("form_arquivo", "progress_arquivo", "porcentagem_arquivo", "arquivo", "arquivoAtual", "./arquivos/template/", "arquivo");
                fncInserirArquivo("form_imagem", "progress", "porcentagem", "imagem", "imagemAtual", "./imagens/template/", "imagem");
            });
        </script>		
        <header><h3 class="tabs_involved">Cadatro Template</h3>
            <ul class="tabs">
                <li><a href="#" funcao="telaListarTemplate" controlador="ControladorTemplate" retorno="div_central" class="buttonCadastro" >Voltar</a></li>
                <li><a href="#" class="formCadastro">Cadastrar</a></li>
            </ul>
        </header>
        <div class="module_content">
            <!-- TEMPLATE -->
            <fieldset >
                <table border="0" style="width: 100%">
                    <tr>
                        <td colspan="3">
                            <label>Imagem Largura Máxima: 640px</label>&nbsp;&nbsp; 
                        </td>
                    </tr>
                    <tr style="height: 110px;">
                        <td style="width: 20%;text-align: right;">
                            <span id="span-teste" class="upload-wrapper" >  
                                <form action="./post-imagem.php" method="post" id="form_imagem">
                                    <input name="pastaArquivo" type="hidden" value="./imagens/template/">
                                    <input name="largura" type="hidden" value="640">
                                    <input name="opcao" type="hidden" value="1">
                                    <input name="tipoArq" type="hidden" value="imagem">
                                    <input type="file" name="file" class="upload-file" onchange="javascript: fncSubmitArquivo('enviar', this);" >
                                    <input type="submit" id="enviar" style="display:none;">   
                                    <img src="./img/img_upload.png" class="upload-button" />
                                </form> 
                            </span>
                        </td>
                        <td style="width: 20%">
                            <img onclick="fncRemoverArquivo('imagem', './imagens/template', 'imagem', 'imagemAtual', './img/imagemPadrao.jpg');" src="./img/remove.png" border="0" title="Clique para remover" style="cursor:pointer;margin-bottom:7px;" class="upload-button" />
                        </td>
                        <td style="width: 60%">
                            <img id="imagemAtual" name="imagemAtual" src="./img/imagemPadrao.jpg" border="0" style="" />
                        </td>
                    </tr>
                    <tr>
                        <td  colspan="3">
                            <progress id="progress" value="0" max="100" style="display:none;"></progress>
                            <span id="porcentagem" style="display:none;float: right;">0%</span>
                        </td>
                    </tr>
                </table>
            </fieldset>  	
            <!-- TEMPLATE -->

            <fieldset >
                <table border="0" style="width: 100%">
                    <tr>
                        <td colspan="3">
                            <label>Tamanho Máxima: 2 Megas.</label>&nbsp;&nbsp; 
                        </td>
                    </tr>
                    <tr style="height: 110px;">
                        <td style="width: 20%;text-align: right;">
                            <span id="span-teste" class="upload-wrapper" >                                                        
                                <form action="./post-imagem.php" method="post" id="form_arquivo">
                                    <input name="pastaArquivo" type="hidden" value="./arquivos/template/">
                                    <input name="largura" type="hidden" value="640">
                                    <input name="opcao" type="hidden" value="1">
                                    <input name="tipoArq" type="hidden" value="arquivo">
                                    <input type="file" name="file" class="upload-file" onchange="javascript: fncSubmitArquivo('enviar_arquivo', this);" >
                                    <input type="submit" id="enviar_arquivo" style="display:none;">
                                    <img src="./img/img_upload.png" class="upload-button" />
                                </form>
                            </span>
                        </td>
                        <td style="width: 20%">
                            <img onclick="fncRemoverArquivo('arquivo', './arquivos/template/', 'arquivo', 'arquivoAtual', '');" src="./img/remove.png" border="0" title="Clique para remover" style="cursor:pointer;margin-bottom:7px;" class="upload-button" />
                        </td>
                        <td style="width: 60%;">
                            <span name="arquivoAtual" id="arquivoAtual" onClick="fnAbreArquivo('arquivo', './arquivos/template/')"   ><br />Adicione um arquivo clicando no <img src="./img/img_upload.png" border="0" style="float:none;margin:0;width: 20px;" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td  colspan="3">
                            <progress id="progress_arquivo" value="0" max="100" style="display:none;"></progress>
                            <span id="porcentagem_arquivo" style="display:none;">0%</span>													
                        </td>
                    </tr>
                </table>
            </fieldset>
            <div class="clear"></div> 
            <form action="#" method="post" id="formCadastro" class="">
                <input type="hidden" name="retorno" id="retorno" value="div_central"/>
                <input type="hidden" name="controlador" id="controlador" value="ControladorTemplate"/>
                <input type="hidden" name="funcao" id="funcao" value="incluirTemplate"/>
                <input type="hidden" name="mensagem" id="mensagem" value="1"/>

                <input type="hidden" name="arquivo" id="arquivo" value="" />    
                <input type="hidden" name="imagem" id="imagem" value="" />

                <fieldset >
                    <label>Nome - Texto *</label>
                    <input type="text"  onkeyup="this.value = this.value.toUpperCase();" id="nome" name="nome" value="" class=" mgs_alerta" >
                </fieldset>

                <fieldset >
                    <label>Radio *</label>
                    <input type="radio" name="sexo" checked="checked" value="M"/>
                    Masculino
                    <input type="radio" name="sexo" value="F" />
                    Feminino                        
                </fieldset>
                <fieldset  >
                    <label>Profissão TextArea</label>
                    <textarea style="width:92%;" id="profissao" name="profissao" value="" class="" ></textarea>
                </fieldset>
                <fieldset >
                    <label>Faixa Salarial - Monetaorio R$ </label>
                    <input type="text" style="width:92%;" id="faixa_salarial" name="faixa_salarial" value="" class="maskMoney"  > 
                </fieldset>
               

                <fieldset >
                    <label>Data de Nascimento - Data</label>
                    <input type="text" style="width:92%;" id="data_nascimento" name="data_nascimento" value="" class="data" onkeypress="return mascara(event, this, '##/##/####');" maxlength="10" >
                </fieldset>
                <fieldset >
                    <label>CPF - Mascara</label>
                    <input type="text" style="width:92%;" id="cpf" name="cpf" value="" class="" onkeypress="return mascara(event, this, '###.###.###-##');" maxlength="14" >
                </fieldset>
               

                <fieldset >
                    <label>Telefone Residencial</label>
                    <input type="text" style="width:92%;" id="telefone_residencial" name="telefone_residencial" value="" class="" onkeypress="return mascara(event, this, '(##)#####-####');" maxlength="14">
                </fieldset>
                <fieldset>
                    <label>Logradouro - Maiuscula</label>
                    <input type="text" onkeyup="this.value = this.value.toUpperCase();" id="logradouro" name="logradouro" value="" class="" >
                </fieldset>

                <fieldset >
                    <label>Número</label>
                    <input type="text" style="width:92%;" id="numero" name="numero" value="" class="" onkeypress="return mascara(event, this, '#');" maxlength="6">
                </fieldset>
                <fieldset >
                    <label>CEP - Mascara</label>
                    <input type="text" style="width:92%;" id="cep" name="cep" value="" class="" onkeypress="return mascara(event, this, '#####-###');" maxlength="9">
                </fieldset>
                <fieldset >
                    <label>Estado</label>
                    <select id="estado" name="estado" value="" class="">
                        <option value="">Selecione...</option>
                        <?php echo montaSelectEstados(); ?>
                    </select>
                </fieldset>

                <fieldset >
                    <label>E-mail - Minusculo</label>
                    <input type="text" style="width:92%;" id="email" name="email" value="" class="" onkeyup="this.value = this.value.toLowerCase();" >
                </fieldset> 
                <fieldset >
                    <label>Pais - Exemplo</label>
                    <select id="pais" name="pais" class="mgs_alerta" >
                        <?php
                        try {
                            $controladorPais = new ControladorPais();
                            $objPais = $controladorPais->listarPais();
                        } catch (Exception $e) {
                            
                        }
                        ?>
                        <option value="">Selecione...</option>
                        <?php
                        foreach ($objPais as $pais) {
                            if ($pais->getId() == 17) {
                                ?><option value="<?php echo $pais->getId() ?>" selected="selected"><?php echo $pais->getNome(); ?></option><?php
                            } else {
                                ?><option value="<?php echo $pais->getId() ?>"><?php echo $pais->getNome(); ?></option><?php
                            }
                        }
                        ?>                                 
                    </select>
                </fieldset>                
                <div class="clear"></div>            

            </form>
        </div>		
        <?php
    }

    public function telaListarTemplate($objTemplate) {
        $controladorAcao = new ControladorAcao();
        $perfil = $controladorAcao->retornaPerfilClasseAcao($_SESSION["login"],'telaListarTemplate');
        ?>
        <script type="text/javascript">
            $('.tablesorter').dataTable({
                "sPaginationType": "full_numbers"
            });           
        </script>
        <header><h3 class="tabs_involved">Templates</h3>
            <?php
            if( $perfil === 'A' ){
            ?>
            <ul class="tabs">
                <!--<li><a href="#" >Voltar</a></li>-->                
                <li><a href="#" class="buttonCadastro" funcao="telaCadastrarTemplate" controlador="ControladorTemplate" retorno="div_central">Novo</a></li>
            </ul>
            <?php } ?>
        </header>
        <div class="tab_container">
            <div id="tab1" class="tab_content">
                <table class="tablesorter" cellspacing="0"> 
                    <thead> 
                        <tr> 
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Logradouro</th>
                            <th>Estado</th> 
                            <th class="sorting_disabled" >Actions</th> 
                        </tr> 
                    </thead> 
                    <tbody>
                        <?php
                        if ($objTemplate) {
                            foreach ($objTemplate as $template) {
                                ?>    
                                <tr> 
                                    <td class="center"><?php echo str_pad($template->getId(), 5, "0", STR_PAD_LEFT); ?></td>
                                    <td class="getId center"  style="cursor:pointer"  id="<?php echo $template->getId(); ?>" funcao="telaVisualizarTemplate" controlador="ControladorTemplate" retorno="div_central">
                                        <?php echo limitarTexto($template->getNome(), 27); ?>
                                    </td>
                                    <td class="getId center"  style="cursor:pointer"  id="<?php echo $template->getId(); ?>" funcao="telaVisualizarTemplate" controlador="ControladorTemplate" retorno="div_central">
                                        <?php
                                        if ($template->getTelefoneResidencial()) {
                                            echo limitarTexto($template->getTelefoneResidencial(), 20);
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </td>
                                    <td class="getId center"  style="cursor:pointer"  id="<?php echo $template->getId(); ?>" funcao="telaVisualizarTemplate" controlador="ControladorTemplate" retorno="div_central">
                                        <?php
                                        if ($template->getEmail() != "") {
                                            echo limitarTexto($template->getEmail(), 27);
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </td>
                                    <td class="getId center"  style="cursor:pointer"  id="<?php echo $template->getId(); ?>" funcao="telaVisualizarTemplate" controlador="ControladorTemplate" retorno="div_central">
                                        <?php
                                        if ($template->getLogradouro() != "") {
                                            echo limitarTexto($template->getLogradouro(), 20);
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </td>
                                    <td class="getId center"  style="cursor:pointer"  id="<?php echo $template->getId(); ?>" funcao="telaVisualizarTemplate" controlador="ControladorTemplate" retorno="div_central">
                                        <?php
                                        if ($template->getEstado() != "") {
                                            echo $template->getEstado();
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </td>						
                                    <td >
                                        <?php
                                        echo ($perfil !== 'C')? '<input type="image" src="images/icn_edit.png" title="Alterar" id="'.$template->getId().'" class="getId" funcao="telaAlterarTemplate" controlador="ControladorTemplate" retorno="div_central">':'<input type="image" src="images/icn_edit_disable.png" title="Excluir" mensagem="4" style="cursor: default;">'; 
                                        echo ($perfil === 'A')? '<input type="image" src="images/icn_trash.png" title="Excluir" id="'.$template->getId().'" class="deleteId" funcao="excluirTemplate" controlador="ControladorTemplate" retorno="div_central" mensagem="4">':'<input type="image" src="images/icn_trash_disable.png" title="Excluir" mensagem="4" style="cursor: default;">'; 
                                        ?>                                        
                                    </td > 
                                </tr> 
                                <?php
                            }
                        }
                        ?>    				
                    </tbody> 
                </table>
            </div>
        </div>	
        <?php
    }

    public function telaAlterarTemplate($objTemplate) {
        ?>
        <script src="js/jquery.form.js" type="text/javascript" ></script>
        <script src="js/popup-upload.js" type="text/javascript"></script>
        <script src="js/mascara.js" type="text/javascript"></script>
        <script src="js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(".maskMoney").maskMoney();
            setDatePicker('data_nascimento');

            $(document).ready(function() {
                fncInserirArquivo("form_arquivo", "progress_arquivo", "porcentagem_arquivo", "arquivo", "arquivoAtual", "./arquivos/template/", "arquivo");
                fncInserirArquivo("form_imagem", "progress", "porcentagem", "imagem", "imagemAtual", "./imagens/template/", "imagem");
            });
        </script>
        <header><h3 class="tabs_involved">Alterar Template</h3>
            <ul class="tabs">
                <li><a href="#" funcao="telaListarTemplate" controlador="ControladorTemplate" retorno="div_central" class="buttonCadastro" >Voltar</a></li>
                <li><a href="#" class="formCadastro">Alterar</a></li>
            </ul>
        </header>
        <div class="module_content">
            <fieldset>
                <?php
                if ($objTemplate[0]->getImagem()) {
                    $imagem = "./imagens/template/thumbnail" . $objTemplate[0]->getImagem();
                } else {
                    $imagem = "./img/imagemPadrao.jpg";
                }
                ?>	 
                <table border="0" style="width: 100%">
                    <tr>
                        <td colspan="3">
                            <label>Imagem Largura Máxima: 640px</label>&nbsp;&nbsp; 
                        </td>
                    </tr>
                    <tr style="height: 110px;">
                        <td style="width: 20%;text-align: right;">
                            <span id="span-teste" class="upload-wrapper" >  
                                <form action="./post-imagem.php" method="post" id="form_imagem">
                                    <input name="pastaArquivo" type="hidden" value="./imagens/template/">
                                    <input name="largura" type="hidden" value="640">
                                    <input name="opcao" type="hidden" value="1">
                                    <input name="tipoArq" type="hidden" value="imagem">
                                    <input type="file" name="file" class="upload-file" onchange="javascript: fncSubmitArquivo('enviar', this);" >
                                    <input type="submit" id="enviar" style="display:none;">   
                                    <img src="./img/img_upload.png" class="upload-button" />
                                </form> 
                            </span>
                        </td>
                        <td style="width: 20%">
                            <img onclick="fncRemoverArquivo('imagem', './imagens/template', 'imagem', 'imagemAtual', './img/imagemPadrao.jpg');" src="./img/remove.png" border="0" title="Clique para remover" style="cursor:pointer;margin-bottom:7px;" class="upload-button" />
                        </td>
                        <td style="width: 60%">
                            <img id="imagemAtual" name="imagemAtual" src="<?php echo $imagem; ?>" border="0" style="" />
                        </td>
                    </tr>
                    <tr>
                        <td  colspan="3">
                            <progress id="progress" value="0" max="100" style="display:none;"></progress>
                            <span id="porcentagem" style="display:none;float: right;">0%</span>
                        </td>
                    </tr>
                </table>
            </fieldset> 
            <fieldset>
                <table border="0" style="width: 100%">
                    <tr>
                        <td colspan="3">
                            <label>Tamanho Máxima: 2 Megas.</label>&nbsp;&nbsp; 
                        </td>
                    </tr>
                    <tr style="height: 110px;">
                        <td style="width: 20%;text-align: right;">
                            <span id="span-teste" class="upload-wrapper" >                                                        
                                <form action="./post-imagem.php" method="post" id="form_arquivo">
                                    <input name="pastaArquivo" type="hidden" value="./arquivos/template/">
                                    <input name="largura" type="hidden" value="640">
                                    <input name="opcao" type="hidden" value="1">
                                    <input name="tipoArq" type="hidden" value="arquivo">
                                    <input type="file" name="file" class="upload-file" onchange="javascript: fncSubmitArquivo('enviar_arquivo', this);" >
                                    <input type="submit" id="enviar_arquivo" style="display:none;">
                                    <img src="./img/img_upload.png" class="upload-button" />
                                </form>
                            </span>
                        </td>
                        <td style="width: 20%">
                            <img onclick="fncRemoverArquivo('arquivo', './arquivos/template/', 'arquivo', 'arquivoAtual', '');" src="./img/remove.png" border="0" title="Clique para remover" style="cursor: pointer;margin-bottom:7px;" class="upload-button" />
                        </td>
                        <td style="width: 60%">
                            <span name="arquivoAtual" id="arquivoAtual" onClick="fnAbreArquivo('arquivo', './arquivos/template/')" style="<?php echo ($objTemplate[0]->getArquivo()) ? 'cursor: pointer; text-decoration: underline;' : '' ?>"  >
                                <?php
                                if ($objTemplate[0]->getArquivo()) {
                                    echo $objTemplate[0]->getArquivo();
                                } else {
                                    ?><br />Adicione um arquivo clicando no <img src="./img/img_upload.png" border="0" style="float:none;margin:0;width: 20px;" /><?php
                                }
                                ?> 
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td  colspan="3">
                            <progress id="progress_arquivo" value="0" max="100" style="display:none;"></progress>
                            <span id="porcentagem_arquivo" style="display:none;float: right;">0%</span>													
                        </td>
                    </tr>
                </table>  
            </fieldset>             
            <form action="#" method="post" id="formCadastro" class="">
                <input type="hidden" name="retorno" id="retorno" value="div_central"/>
                <input type="hidden" name="controlador" id="controlador" value="ControladorTemplate"/>
                <input type="hidden" name="funcao" id="funcao" value="alterarTemplate"/>
                <input type="hidden" name="mensagem" id="mensagem" value="2"/>
                <input type="hidden" name="id" id="id" value="<?php echo $objTemplate[0]->getId(); ?>"/>
                <input type="hidden" name="imagem" id="imagem" value="<?php echo $objTemplate[0]->getImagem(); ?>" />
                <input type="hidden" name="arquivo" id="arquivo" value="<?php echo $objTemplate[0]->getArquivo(); ?>">   
                <fieldset>
                    <label>Nome *</label>
                    <input type="text" onkeyup="this.value = this.value.toUpperCase();" id="nome" name="nome" value="<?php echo $objTemplate[0]->getNome(); ?>" class=" mgs_alerta" >
                </fieldset>
                <fieldset>
                    <label>Sexo *</label>
                    <?php
                    if ($objTemplate[0]->getSexo() == "M") {
                        $macho = 'checked="checked"';
                        $femia = '';
                    } elseif ($objTemplate[0]->getSexo() == "F") {
                        $macho = '';
                        $femia = 'checked="checked"';
                    }
                    ?>
                    <input type="radio" name="sexo" <?php echo $macho; ?> value="M"/>
                    Masculino
                    <input type="radio" name="sexo" <?php echo $femia; ?> value="F" />
                    Feminino                            
                </fieldset>
                <fieldset>
                    <label>Profissão</label>                    
                    <textarea id="profissao" name="profissao" value="<?php echo $objTemplate[0]->getProfissao(); ?>" class="" ></textarea>
                </fieldset>
                <fieldset>
                    <label>Faixa Salarial R$ </label>
                    <input type="text" id="faixa_salarial" name="faixa_salarial" value="<?php echo valorMonetario($objTemplate[0]->getFaixaSalarial(), "2"); ?>" class="maskMoney"  > 
                </fieldset>
                <fieldset>
                    <label>Data de Nascimento</label>
                    <input type="text" id="data_nascimento" name="data_nascimento" value="<?php echo ($objTemplate[0]->getDataNascimento() != "0000-00-00") ? recuperaData($objTemplate[0]->getDataNascimento()) : ""; ?>" class="data" onkeypress="return mascara(event, this, '##/##/####');" maxlength="10" >
                </fieldset>
                <fieldset>
                    <label>CPF</label>
                    <input type="text" id="cpf" name="cpf" value="<?php echo $objTemplate[0]->getCpf(); ?>" class="" onkeypress="return mascara(event, this, '###.###.###-##');" maxlength="14" >
                </fieldset>
                <fieldset>
                    <label>Logradouro</label>
                    <input type="text" onkeyup="this.value = this.value.toUpperCase();" id="logradouro" name="logradouro" value="<?php echo $objTemplate[0]->getLogradouro(); ?>" class="" >
                </fieldset>
                <fieldset>
                    <label>Número</label>
                    <input type="text" id="numero" name="numero" value="<?php echo $objTemplate[0]->getNumero(); ?>" class="" onkeypress="return mascara(event, this, '#');" maxlength="6">
                </fieldset>
                <fieldset>
                    <label>CEP</label>
                    <input type="text" id="cep" name="cep" value="<?php echo $objTemplate[0]->getCep(); ?>" class="" onkeypress="return mascara(event, this, '#####-###');" maxlength="9">
                </fieldset>
                <fieldset>
                    <label>Estado</label>
                    <select id="estado" name="estado" value="" class="">
                        <option value="">Selecione...</option>
                        <?php echo montaSelectEstados($objTemplate[0]->getEstado()); ?>
                    </select>
                </fieldset>
                <fieldset>
                    <label>Telefone Residencial</label>
                    <input type="text" id="telefone_residencial" name="telefone_residencial" value="<?php echo $objTemplate[0]->getTelefoneResidencial(); ?>" class="" onkeypress="return mascara(event, this, '(##)#####-####');" maxlength="14">
                </fieldset>
                <fieldset>
                    <label>E-mail</label>
                    <input type="text" id="email" name="email" value="<?php echo $objTemplate[0]->getEmail(); ?>" class="" onkeyup="this.value = this.value.toLowerCase();" >
                </fieldset>
                <fieldset>			
                    <select id="pais" name="pais" class="mgs_alerta" >
                        <?php
                        try {
                            $controladorPais = new ControladorPais();
                            $objPais = $controladorPais->listarPais();
                        } catch (Exception $e) {
                            
                        }
                        ?>		                                
                        <option value="">Selecione...</option>
                        <?php
                        foreach ($objPais as $pais) {
                            if ($pais->getId() == $objTemplate[0]->getPais()->getId()) {
                                ?><option value="<?php echo $pais->getId() ?>" selected="selected"><?php echo $pais->getNome(); ?></option><?php
                            } else {
                                ?><option value="<?php echo $pais->getId() ?>"><?php echo $pais->getNome(); ?></option><?php
                            }
                        }
                        ?>                                 
                    </select>
                </fieldset>
                <div class="clear"></div>            
            </form>
        </div>			
        <?php
    }

    public function telaVisualizarTemplate($objTemplate) {
        ?>
        <script src="js/popup-upload.js" type="text/javascript"></script>
        <script src="js/mascara.js" type="text/javascript"></script>
        <script src="js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>
        <script type="text/javascript">
                        //$(document).ready(function () {
                        $(".maskMoney").maskMoney();
                        setDatePicker('data_nascimento');
                        //});
        </script>
        <header><h3 class="tabs_involved">Visualizar Template</h3>
            <ul class="tabs">
                <li><a href="#" funcao="telaListarTemplate" controlador="ControladorTemplate" retorno="div_central" class="buttonCadastro" >Voltar</a></li>            
            </ul>
        </header>
        <div class="module_content">
            <form action="#" method="post" id="formCadastro" class="">
                <input type="hidden" name="arquivo" id="arquivo" value="<?php echo $objTemplate[0]->getArquivo(); ?>" />    
                <fieldset>
                    <label>Imagem Largura Máxima: 640px</label>&nbsp;&nbsp;
                    <?php
                    if ($objTemplate[0]->getImagem()) {
                        $imagem = "./imagens/template/thumbnail" . $objTemplate[0]->getImagem();
                    } else {
                        $imagem = "./img/imagemPadrao.jpg";
                    }
                    ?>	 
                    <span name="imagemLink" id="<?php echo $imagem; ?>" title="Imagem" >
                        <img name="imagemAtual" src="<?php echo $imagem; ?>" border="0" />
                    </span>
                </fieldset>  			
                <fieldset>
                    <label>Arquivo Tamanho Máximo: 2MB</label>
                    <span name="arquivoAtual" onClick="fnAbreArquivo('arquivo', './arquivos/template/')" style="<?php echo ($objTemplate[0]->getArquivo()) ? 'cursor: pointer; text-decoration: underline;' : '' ?>">
                        <?php
                        if ($objTemplate[0]->getArquivo()) {
                            echo $objTemplate[0]->getArquivo();
                        } else {
                            ?>Adicione um arquivo clicando no <img src="./img/img_upload.png" border="0" style="float:none;margin:0;width: 20px;" /><?php
                        }
                        ?>                                                    
                    </span>
                </fieldset>            
                <fieldset>
                    <label>Nome *</label>
                    <?php echo $objTemplate[0]->getNome(); ?>
                </fieldset>
                <fieldset>
                    <label>Sexo *</label>
                    <?php echo retornarSexo($objTemplate[0]->getSexo()); ?>	
                </fieldset>
                <fieldset>
                    <label>Estado Civil</label>
                    <?php echo recuperarEstadoCivil($objTemplate[0]->getEstadoCivil()); ?>         									
                </fieldset>
                <fieldset>
                    <label>Profissão</label>
                    <?php echo $objTemplate[0]->getProfissao(); ?>
                </fieldset>
                <fieldset>
                    <label>Faixa Salarial</label>
                    <?php echo valorMonetario($objTemplate[0]->getFaixaSalarial(), "2"); ?>
                </fieldset>
                <fieldset>
                    <label>Data de Nascimento</label>
                    <?php echo ($objTemplate[0]->getDataNascimento() != "0000-00-00") ? recuperaData($objTemplate[0]->getDataNascimento()) : ""; ?>
                </fieldset>
                <fieldset>
                    <label>CPF</label>
                    <?php echo $objTemplate[0]->getCpf(); ?>
                </fieldset>
                <fieldset>
                    <label>Identidade</label>
                    <?php echo $objTemplate[0]->getIdentidade(); ?>
                </fieldset>
                <fieldset>
                    <label>Logradouro</label>
                    <?php echo $objTemplate[0]->getLogradouro(); ?>
                </fieldset>
                <fieldset>
                    <label>Número</label>
                    <?php echo $objTemplate[0]->getNumero(); ?>
                </fieldset>
                <fieldset>
                    <label>Complemento</label>
                    <?php echo $objTemplate[0]->getComplemento(); ?>
                </fieldset>
                <fieldset>
                    <label>Bairro</label>
                    <?php echo $objTemplate[0]->getBairro(); ?>
                </fieldset>
                <fieldset>
                    <label>Cidade</label>
                    <?php echo $objTemplate[0]->getCidade(); ?>
                </fieldset>
                <fieldset>
                    <label>CEP</label>
                    <?php echo $objTemplate[0]->getCep(); ?>
                </fieldset>
                <fieldset>
                    <label>Estado</label>
                    <?php echo $objTemplate[0]->getEstado(); ?>
                </fieldset>
                <fieldset>
                    <label>Telefone Residencial</label>
                    <?php echo $objTemplate[0]->getTelefoneResidencial(); ?>
                </fieldset>
                <fieldset>
                    <label>Telefone Celular</label>
                    <?php echo $objTemplate[0]->getTelefoneCelular(); ?>
                </fieldset>
                <fieldset>
                    <label>Telefone Comercial</label>
                    <?php echo $objTemplate[0]->getTelefoneComercial(); ?>
                </fieldset>
                <fieldset>
                    <label>E-mail</label>
                    <?php echo $objTemplate[0]->getEmail(); ?>
                </fieldset>
                <fieldset>
                    <label>Pais</label>
                    <?php echo $objTemplate[0]->getPais()->getNome(); ?>                                 
                </fieldset>			
                <div class="clear"></div>            
            </form>
        </div>	        
        <?php
    }
*/
}
?>