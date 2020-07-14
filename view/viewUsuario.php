<?php

class ViewUsuario{
	
	//construtor
	public function __construct(){}

	//destruidor
	public function __destruct(){}
	
	
	public function telaCadastrarUsuario(){		
		?>
		<script type="text/javascript">
        <?php
          //echo ($post) ? "$.growlUI2('" . $post . "', '&nbsp;');" : "";
        ?> 
            $(document).ready(function() {
            	fncInserirArquivo("form_imagem", "progress", "porcentagem", "imagem", "imagemAtual", "./imagens/usuario/", "imagem");
            });
       </script>

	      <div class="app-title">
	        <div>
	          <h1><i class="fa fa-id-card"></i> Módulos </h1>
	          <!--p>A free and modular admin template</p-->
	        </div>
	        <ul class="app-breadcrumb breadcrumb">
	          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          <li class="breadcrumb-item">Cadastros</li>
	          <li class="breadcrumb-item"><a href="#">Usuário </a></li>
	          <li class="breadcrumb-item active"><a href="#">Cadastrar </a></li>
	        </ul>
	      </div>

	      <div class="row">
	        <div class="col-md-6">
	          <div class="tile">
	            <h3 class="tile-title">Formulário</h3>
	            <div class="tile-body">

	                <div class="form-group">
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
	                                        <input name="pastaArquivo" type="hidden" value="./imagens/usuario/">
	                                        <input name="largura" type="hidden" value="640">
	                                        <input name="opcao" type="hidden" value="1">
	                                        <input name="tipoArq" type="hidden" value="imagem">
	                                        <input type="file" name="file" class="upload-file" style="width: 30px;"  onchange="javascript: fncSubmitArquivo('enviar', this);" >
	                                        <input type="submit" id="enviar" style="display:none;">   
	                                        <img src="./img/img_upload.png" class="upload-button" />
	                                    </form> 
	                                </span>
	                            </td>
	                            <td style="width: 20%">
	                                <img onclick="fncRemoverArquivo('imagem', './imagens/usuario', 'imagem', 'imagemAtual', './img/imagemPadrao.jpg');" src="./img/remove.png" border="0" title="Clique para remover" style="cursor:pointer;margin-bottom:13px;" class="upload-button" />
	                            </td>
	                            <td style="width: 60%">
	                                <img id="imagemAtual" name="imagemAtual" src="./img/imagemPadrao.jpg" border="0" style="" />
	                            </td>
	                        </tr>
	                        <tr>
								<td colspan="2">
									<progress id="progress" value="0" max="100" style="display:none;float: right;"></progress>
								</td>
	                            <td colspan="1">	                                
	                                <span id="porcentagem" style="display:none;float: left;">0%</span>
	                            </td>
	                        </tr>
	                    </table>
	                </div>
	              <form action="#" method="post" id="formCadastro" class="">
		            <input type="hidden" name="r3" id="r3" value="div_central"/>
		            <input type="hidden" name="c2" id="c2" value="ControladorUsuario"/>
		            <input type="hidden" name="f1" id="f1" value="incluirUsuario"/>
		            <input type="hidden" name="m4" id="m4" value="1"/> 
		            <input type="hidden" name="imagem" id="imagem" value="" />             
					<!--div class="row">
						<div class="form-group col-md-2">
							<div class="image"><img class="img-circle" id="preview" src="images/user.png" alt="" style="width:120px; height:120px;"></div>
						</div>           
					</div>					
					<div class="input-group">
						<input class="form-control" name="image" accept="image/*" required="false" id="fileinput" type="file" onchange="uploadFile(this,'preview','imagem')">
						<span class="input-group-btn">
							<button class="btn btn-default" onclick="removerFoto(visitanteForm)" type="button">Remover</button>
						</span>                  
					</div-->						
	                <div class="form-group">
	                  <label class="control-label">Nome *</label>
	                  <input class="form-control mgs_alerta" id="nome" name="nome" type="text" onkeyup="this.value=this.value.toUpperCase();" >
	                </div>          
		            <div class="form-group">
		                <label class="control-label">Login *</label>
		                <input type="text" id="login" name="login" value="" class="form-control mgs_alerta" onkeyup="this.value=this.value.toLowerCase();" >
		            </div>            
		            <div class="form-group">
		                <label class="control-label">Senha *</label>
		                <input type="password" id="senha" name="senha" value="" class="form-control mgs_alerta" onkeyup="" >
		            </div>            
		            <div class="form-group">
		                <label class="control-label">Repetir a Senha *</label>
		                <input type="password" id="senha2" name="senha2" value="" class="form-control mgs_alerta senha">
		            </div>            
		            <div class="form-group">
		                <label class="control-label">Perfil *</label>
						<select id="perfil" name="perfil" class="form-control" >
		                    <option value="1" >Adiministrador</option>
							<option value="2" selected="selected" >Usuário</option>
		                </select>
		            </div>   

	              </form>
	            </div>
	            <div class="tile-footer">
	              <button class="btn btn-primary " onClick="fncFormCadastro(this)" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
	              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary " onClick="fncButtonCadastro(this)" href="#" f1="telaListarUsuario" c2="ControladorUsuario" r3="div_central" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Voltar</a>
	            </div>
	          </div>
	        </div>
	      </div>	      
	<?php
	} 
	
	
	public function telaListarUsuario($objUsuario){		
	?>
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Módulos &nbsp;&nbsp;&nbsp;
            <a href="#" class="btn btn-primary " onClick="fncButtonCadastro(this)" f1="telaCadastrarUsuario" c2="ControladorUsuario" r3="div_central"><i class="fa fa-fw fa-lg fa-plus"></i>Novo</a>
          </h1>
          <!--p>Table to display analytical data effectively</p-->
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Cadastros</li>
          <li class="breadcrumb-item active"><a href="#">Módulos </a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
					<tr> 
						<th>Código</th> 
						<th>Nome</th> 
						<th>Login</th> 							
						<th class="sorting_disabled" >Actions</th> 
					</tr> 
                </thead>
                <tbody>
                   <?php 
                    if ($objUsuario) {
                        foreach ($objUsuario as $usuario) {
                    ?>    
						<tr> 
							<td onClick="getId(this)" style="cursor:pointer"  id="<?php echo $usuario->getId(); ?>" f1="telaVisualizarUsuario" c2="ControladorUsuario" r3="div_central"><?php echo str_pad($usuario->getId(), 5, "0", STR_PAD_LEFT); ?></td> 
							<td onClick="getId(this)" style="cursor:pointer"  id="<?php echo $usuario->getId(); ?>" f1="telaVisualizarUsuario" c2="ControladorUsuario" r3="div_central"><?php echo $usuario->getNome(); ?></td> 
							<td onClick="getId(this)" style="cursor:pointer"  id="<?php echo $usuario->getId(); ?>" f1="telaVisualizarUsuario" c2="ControladorUsuario" r3="div_central"><?php echo $usuario->getLogin();?></td> 
							<td style="text-align:center;width:140px;">
								<button onClick="getId(this)" class="btn btn-secondary btn-list" type="button" title="Alterar" id="<?php echo $usuario->getId(); ?>" f1="telaAlterarUsuario" c2="ControladorUsuario" r3="div_central"><i class="fa fa-lg fa-edit"></i></button>
                                <button class="btn btn-secondary btn-list" onClick="fncDeleteId(this)" type="button" title="Excluir" id="<?php echo $usuario->getId(); ?>" f1="excluirUsuario" c2="ControladorUsuario" r3="div_central" m4="4"><i class="fa fa-lg fa-trash"></i></button>
                                <button onClick="getId(this)" class="btn btn-secondary btn-list" type="button" title="Perfil" id="<?php echo $usuario->getId(); ?>" f1="telaListarAcao" c2="ControladorAcao" r3="div_central" ><i class="fa fa-lg fa-lock"></i></button>
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
    <script type="text/javascript">$('#sampleTable').DataTable();</script>    
	<?php 
	}
	
	
	public function telaAlterarUsuario($objUsuario){
		?>
		  <script type="text/javascript">
			$(document).ready(function() {
			    fncInserirArquivo("form_imagem", "progress", "porcentagem", "imagem", "imagemAtual", "./imagens/usuario/", "imagem");
			});
	      </script>		

	      <div class="app-title">
	        <div>
	          <h1><i class="fa fa-id-card"></i> Módulos </h1>	         
	        </div>
	        <ul class="app-breadcrumb breadcrumb">
	          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          <li class="breadcrumb-item">Cadastros</li>
	          <li class="breadcrumb-item"><a href="#">Usuário </a></li>
	          <li class="breadcrumb-item active"><a href="#">Atualizar </a></li>
	        </ul>
	      </div>

	      <div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <h3 class="tile-title">Formulário</h3>
	            <div class="tile-body">

                <div class="form-group">
                    <?php
                    if ($objUsuario[0]->getImagem() !== "") {
                        $imagem = "./imagens/usuario/thumbnail" . $objUsuario[0]->getImagem();
                    } else {
                        $imagem = "./img/imagemPadrao.jpg";
                    }
                    ?>   
                    <table border="0" style="width: 100%">
                        <tr>
                            <td colspan="3">
                                <label class="control-label">Imagem Largura Máxima: 640px</label>&nbsp;&nbsp; 
                            </td>
                        </tr>
                        <tr style="height: 110px;">
                            <td style="width: 20%;text-align: right;">
                                <span id="span-teste" class="upload-wrapper" >  
                                    <form action="./post-imagem.php" method="post" id="form_imagem">
                                        <input name="pastaArquivo" type="hidden" value="./imagens/usuario/">
                                        <input name="largura" type="hidden" value="640">
                                        <input name="opcao" type="hidden" value="1">
                                        <input name="tipoArq" type="hidden" value="imagem">
                                        <input type="file" name="file" class="upload-file" style="width: 30px;"  onchange="javascript: fncSubmitArquivo('enviar', this);" >
                                        <input type="submit" id="enviar" style="display:none;">   
                                        <img src="./img/img_upload.png" class="upload-button" />
                                    </form> 
                                </span>
                            </td>
                            <td style="width: 20%">
                                <img onclick="fncRemoverArquivo('imagem', './imagens/usuario', 'imagem', 'imagemAtual', './img/imagemPadrao.jpg');" src="./img/remove.png" border="0" title="Clique para remover" style="cursor:pointer;margin-bottom:7px;" class="upload-button" />
                            </td>
                            <td style="width: 60%">
                                <img id="imagemAtual" name="imagemAtual" src="<?php echo $imagem; ?>" border="0" style="" />
                            </td>
                        </tr>
						<tr>
							<td colspan="2">
								<progress id="progress" value="0" max="100" style="display:none;float: right;"></progress>
							</td>
							<td colspan="1">	                                
								<span id="porcentagem" style="display:none;float: left;">0%</span>
							</td>
						</tr>						
                    </table>
                </div> 

	              <form action="#" method="post" id="formCadastro" class="">
					<input type="hidden" name="r3" id="r3" value="div_central"/>
					<input type="hidden" name="c2" id="c2" value="ControladorUsuario"/>
					<input type="hidden" name="f1" id="f1" value="alterarUsuario"/>
					<input type="hidden" name="m4" id="m4" value="2"/>
					<input type="hidden" name="id" id="id" value="<?php echo $objUsuario[0]->getId()?>"/>
					<input type="hidden" name="imagem" id="imagem" value="<?php echo $objUsuario[0]->getImagem(); ?>" />
					<div class="form-group">
		                <label class="control-label">Nome *</label>
		                <input type="text" id="nome" name="nome" value="<?php echo $objUsuario[0]->getNome() ;?>" class="mgs_alerta form-control" onkeyup="this.value=this.value.toUpperCase();" >
		            </div>
		            <div class="form-group">
		                <label class="control-label">Login *</label>
		                <input type="text" id="login" name="login" value="<?php echo $objUsuario[0]->getLogin() ;?>" class="mgs_alerta form-control" onkeyup="this.value=this.value.toLowerCase();" >
		            </div>
		            <div class="form-group">
		                <label class="control-label">Senha *</label>
		                <input type="password" id="senha" name="senha" value="" class="mgs_alerta form-control" onkeyup="" >
		            </div>
		            <div class="form-group">
		                <label class="control-label">Repetir a Senha *</label>
		                <input type="password" id="senha2" name="senha2" value="" class="mgs_alerta senha form-control">
		            </div>
		            <div class="form-group">
		                <label class="control-label">Perfil *</label>
						<select id="perfil" name="perfil" class="form-control" >
						<?php 
							if($objUsuario[0]->getPerfil() == 1){
								$selected_1 = 'selected="selected"';
								$selected_2 = '';
							}else{
								$selected_1 = '';
								$selected_2 = 'selected="selected"';
							}
						?>
							<option value="1" <?php echo $selected_1; ?> >Adiministrador</option>
							<option value="2" <?php echo $selected_2; ?> >Usuário</option>
		                </select>
		            </div>

	              </form>
	            </div>
	            <div class="tile-footer">
	              <button class="btn btn-primary " onClick="fncFormCadastro(this)" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
	              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary " onClick="fncButtonCadastro(this)" href="#" f1="telaListarUsuario" c2="ControladorUsuario" r3="div_central" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Voltar</a>
	            </div>
	          </div>
	        </div>
	      </div>	      
	<?php
	} 
	

	public function telaVisualizarUsuario($objUsuario){
		?>

	      <div class="app-title">
	        <div>
	          <h1><i class="fa fa-id-card"></i> Módulos </h1>	         
	        </div>
	        <ul class="app-breadcrumb breadcrumb">
	          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          <li class="breadcrumb-item">Cadastros</li>
	          <li class="breadcrumb-item"><a href="#">Usuário </a></li>
	          <li class="breadcrumb-item active"><a href="#">Visualizar </a></li>
	        </ul>
	      </div>

	      <div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <h3 class="tile-title">Formulário</h3>
	            <div class="tile-body">
	              <form action="#" method="post" id="formCadastro" class="">
		            <div class="form-group">
		                <label class="control-label">Imagem Largura Máxima: 640px<br /></label>
						<?php 
							if($objUsuario[0]->getImagem()){
								$imagem = "./imagens/usuario/thumbnail".$objUsuario[0]->getImagem();
							}else{
								$imagem  = "./img/imagemPadrao.jpg";
							}
						?>	 
						<span name="imagemLink" id="<?php echo $imagem;?>" title="Imagem" >
							<img name="imagemAtual" src="<?php echo $imagem ;?>" border="0" />
						</span>
					</div>            
					<div class="form-group">
		                <label class="control-label">Nome *</label>
		                <input type="text" id="nome" disabled="true" name="nome" value="<?php echo $objUsuario[0]->getNome() ;?>" class="mgs_alerta form-control" onkeyup="this.value=this.value.toUpperCase();" >
		            </div>
		            <div class="form-group">
		                <label class="control-label">Login *</label>
		                <input type="text" id="login" disabled="true" name="login" value="<?php echo $objUsuario[0]->getLogin() ;?>" class="mgs_alerta form-control" onkeyup="this.value=this.value.toLowerCase();" >
		            </div>
		            <div class="form-group">
		                <label class="control-label">Senha *</label>
		                <input type="password" id="senha" disabled="true" name="senha" value="" class="mgs_alerta form-control" onkeyup="" >
		            </div>
		            <div class="form-group">
		                <label class="control-label">Repetir a Senha *</label>
		                <input type="password" id="senha2" disabled="true" name="senha2" value="" class="mgs_alerta senha form-control" >
		            </div>
		            <div class="form-group">
		                <label class="control-label">Perfil *</label>
						<select id="perfil" name="perfil" disabled="true" class="form-control" >
						<?php 
							if($objUsuario[0]->getPerfil() == 1){
								$selected_1 = 'selected="selected"';
								$selected_2 = '';
							}else{
								$selected_1 = '';
								$selected_2 = 'selected="selected"';
							}
						?>
							<option value="1" <?php echo $selected_1; ?> >Adiministrador</option>
							<option value="2" <?php echo $selected_2; ?> >Usuário</option>
		                </select>
		            </div>

	              </form>
	            </div>
	            <div class="tile-footer">
	              <button class="btn btn-primary " onClick="fncFormCadastro(this)" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
	              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary " onClick="fncButtonCadastro(this)" href="#" f1="telaListarUsuario" c2="ControladorUsuario" r3="div_central" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Voltar</a>
	            </div>
	          </div>
	        </div>
	      </div>	      
	<?php
	} 


}


?>