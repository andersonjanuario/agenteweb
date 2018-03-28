<?php

class ViewUsuario{
	
	//construtor
	public function __construct(){}

	//destruidor
	public function __destruct(){}
	
	
	public function telaCadastrarUsuario(){		
		?>
		<script src="js/popupUpload.js" type="text/javascript"></script>
        <script type="text/javascript">
        <?php
          //echo ($post) ? "$.growlUI2('" . $post . "', '&nbsp;');" : "";
        ?> 

       </script>

	      <div class="app-title">
	        <div>
	          <h1><i class="fa fa-dashboard"></i> Módulos </h1>
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
	        <div class="col-md-12">
	          <div class="tile">
	            <h3 class="tile-title">Formulário</h3>
	            <div class="tile-body">
	              <form action="#" method="post" id="formCadastro" class="">
		            <input type="hidden" name="retorno" id="retorno" value="div_central"/>
		            <input type="hidden" name="controlador" id="controlador" value="ControladorUsuario"/>
		            <input type="hidden" name="funcao" id="funcao" value="incluirUsuario"/>
		            <input type="hidden" name="mensagem" id="mensagem" value="1"/>              

		            <div class="form-group">
		                <label>Imagem Largura Máxima: 640px<br /> 
						<a href="javascript:fnInserirArquivo('imagem','./imagens/usuario/','640','imagem')">
							<img name="imagemIcone" src="img/notes-add.gif" border="0" title="Clique para adicionar" />
						</a>
						<a href="javascript:fnRemoverArquivo('imagem','./imagens/usuario/','imagem')">
							<img src="img/notes-reject.gif" border="0" title="Clique para remover" />
						</a>				
						</label>
						<span name="imagemLink" id="./img/imagemPadrao.jpg" title="Imagem">
							<img name="imagemAtual" src="./img/imagemPadrao.jpg" border="0" />
						</span>
						<input type="hidden" name="imagem" id="imagem" />
					</div>            
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
	              <button class="btn btn-primary formCadastro" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
	              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary buttonCadastro" href="#" funcao="telaListarUsuario" controlador="ControladorUsuario" retorno="div_central" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Voltar</a>
	            </div>
	          </div>
	        </div>
	      </div>
	      <script src="js/lib.js"></script>





        <!--script src="js/popup-upload.js" type="text/javascript"></script>
        <header><h3 class="tabs_involved">Cadatro Usuário</h3>
            <ul class="tabs">
                <li><a href="#" funcao="telaListarUsuario" controlador="ControladorUsuario" retorno="div_central" class="buttonCadastro" >Voltar</a></li>
                <li><a href="#" class="formCadastro">Cadastrar</a></li>
            </ul>
        </header>
        <div class="module_content">
            <form action="#" method="post" id="formCadastro" class="">
            <input type="hidden" name="retorno" id="retorno" value="div_central"/>
            <input type="hidden" name="controlador" id="controlador" value="ControladorUsuario"/>
            <input type="hidden" name="funcao" id="funcao" value="incluirUsuario"/>
            <input type="hidden" name="mensagem" id="mensagem" value="1"/>
            <fieldset>
                <label>Imagem Largura Máxima: 640px<br /> 
				<a href="javascript:fnInserirArquivo('imagem','./imagens/usuario/','640','imagem')">
					<img name="imagemIcone" src="img/notes-add.gif" border="0" title="Clique para adicionar" />
				</a>
				<a href="javascript:fnRemoverArquivo('imagem','./imagens/usuario/','imagem')">
					<img src="img/notes-reject.gif" border="0" title="Clique para remover" />
				</a>				
				</label>
				<span name="imagemLink" id="./img/imagemPadrao.jpg" title="Imagem">
					<img name="imagemAtual" src="./img/imagemPadrao.jpg" border="0" />
				</span>
				<input type="hidden" name="imagem" id="imagem" />
			</fieldset>            
			<fieldset>
                <label>Nome *</label>
                <input type="text" id="nome" name="nome" value="" class="mgs_alerta" onkeyup="this.value=this.value.toUpperCase();" >
            </fieldset>            
            <fieldset>
                <label>Login *</label>
                <input type="text" id="login" name="login" value="" class="mgs_alerta" onkeyup="this.value=this.value.toLowerCase();" >
            </fieldset>            
            <fieldset>
                <label>Senha *</label>
                <input type="password" id="senha" name="senha" value="" class="mgs_alerta" onkeyup="" >
            </fieldset>            
            <fieldset>
                <label>Repetir a Senha *</label>
                <input type="password" id="senha2" name="senha2" value="" class="mgs_alerta senha">
            </fieldset>            
            <fieldset style="width:48%; float:left; margin-right: 3%;">
                <label>Perfil *</label>
				<select id="perfil" name="perfil" class="" style="width:92%;">
                    <option value="1" >Adiministrador</option>
					<option value="2" selected="selected" >Usuário</option>
                </select>
            </fieldset>            
            <div class="clear"></div>            
            </form>
        </div-->
	<?php
	} 
	
	
	public function telaListarUsuario($objUsuario){		
	?>
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Módulos &nbsp;&nbsp;&nbsp;
            <a href="#" class="btn btn-primary buttonCadastro" funcao="telaCadastrarUsuario" controlador="ControladorUsuario" retorno="div_central">Novo</a>
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
							<td class="getId" style="cursor:pointer"  id="<?php echo $usuario->getId(); ?>" funcao="telaVisualizarUsuario" controlador="ControladorUsuario" retorno="div_central"><?php echo str_pad($usuario->getId(), 5, "0", STR_PAD_LEFT); ?></td> 
							<td class="getId" style="cursor:pointer"  id="<?php echo $usuario->getId(); ?>" funcao="telaVisualizarUsuario" controlador="ControladorUsuario" retorno="div_central"><?php echo $usuario->getNome(); ?></td> 
							<td class="getId" style="cursor:pointer"  id="<?php echo $usuario->getId(); ?>" funcao="telaVisualizarUsuario" controlador="ControladorUsuario" retorno="div_central"><?php echo $usuario->getLogin();?></td> 
							<td >
								<input type="image" src="images/icn_edit.png" title="Alterar" id="<?php echo $usuario->getId(); ?>" class="getId" funcao="telaAlterarUsuario" controlador="ControladorUsuario" retorno="div_central">
								<input type="image" src="images/icn_trash.png" title="Excluir" id="<?php echo $usuario->getId(); ?>" class="deleteId" funcao="excluirUsuario" controlador="ControladorUsuario" retorno="div_central" mensagem="4">
                                <img src="images/icn_security.png" title="Perfil" id="<?php echo $usuario->getId();?>" style="margin-top:10px;cursor:pointer"  class="getId" funcao="telaListarAcao" controlador="ControladorAcao" retorno="div_central">
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
    <script src="js/lib.js"></script>






	<!--script type="text/javascript">
            $('.tablesorter').dataTable({
            	"sPaginationType": "full_numbers"
            });
    </script>
	<header><h3 class="tabs_involved">Usuários</h3>
			<ul class="tabs">
				<!--<li><a href="#" >Voltar</a></li>->
				<li><a href="#" class="buttonCadastro" funcao="telaCadastrarUsuario" controlador="ControladorUsuario" retorno="div_central">Novo</a></li>
			</ul>
		</header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
				<table class="tablesorter" cellspacing="0"> 
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
					if($objUsuario){
						foreach ($objUsuario as $usuario){
					?>    
						<tr> 
							<td class="getId" style="cursor:pointer"  id="<?php echo $usuario->getId(); ?>" funcao="telaVisualizarUsuario" controlador="ControladorUsuario" retorno="div_central"><?php echo str_pad($usuario->getId(), 5, "0", STR_PAD_LEFT); ?></td> 
							<td class="getId" style="cursor:pointer"  id="<?php echo $usuario->getId(); ?>" funcao="telaVisualizarUsuario" controlador="ControladorUsuario" retorno="div_central"><?php echo $usuario->getNome(); ?></td> 
							<td class="getId" style="cursor:pointer"  id="<?php echo $usuario->getId(); ?>" funcao="telaVisualizarUsuario" controlador="ControladorUsuario" retorno="div_central"><?php echo $usuario->getLogin();?></td> 
							<td >
								<input type="image" src="images/icn_edit.png" title="Alterar" id="<?php echo $usuario->getId(); ?>" class="getId" funcao="telaAlterarUsuario" controlador="ControladorUsuario" retorno="div_central">
								<input type="image" src="images/icn_trash.png" title="Excluir" id="<?php echo $usuario->getId(); ?>" class="deleteId" funcao="excluirUsuario" controlador="ControladorUsuario" retorno="div_central" mensagem="4">
                                <img src="images/icn_security.png" title="Perfil" id="<?php echo $usuario->getId();?>" style="margin-top:10px;cursor:pointer"  class="getId" funcao="telaListarAcao" controlador="ControladorAcao" retorno="div_central">
							</td> 
						</tr> 
					<?php
						}
					}
					?>    				
					</tbody> 
				</table>
			</div>
		</div-->
	<?php 
	}
	
	
	public function telaAlterarUsuario($objUsuario){
		?>
		  <script src="js/popup-upload.js" type="text/javascript"></script>
	      <div class="app-title">
	        <div>
	          <h1><i class="fa fa-dashboard"></i> Módulos </h1>	         
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
	              <form action="#" method="post" id="formCadastro" class="">
					<input type="hidden" name="retorno" id="retorno" value="div_central"/>
					<input type="hidden" name="controlador" id="controlador" value="ControladorUsuario"/>
					<input type="hidden" name="funcao" id="funcao" value="alterarUsuario"/>
					<input type="hidden" name="mensagem" id="mensagem" value="2"/>
					<input type="hidden" name="id" id="id" value="<?php echo $objUsuario[0]->getId()?>"/>
		            <div class="form-group">
		                <label class="control-label">Imagem Largura Máxima: 640px<br /> 
						<a href="javascript:fnInserirArquivo('imagem','./imagens/usuario/','640','imagem')">
							<img name="imagemIcone" src="img/notes-add.gif" border="0" title="Clique para adicionar" />
						</a>
						<a href="javascript:fnRemoverArquivo('imagem','./imagens/usuario/','imagem')">
							<img src="img/notes-reject.gif" border="0" title="Clique para remover" />
						</a>				
						</label>
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
						<input type="hidden" name="imagem" id="imagem" value="<?php echo $objUsuario[0]->getImagem();?>" />
					</div>            
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
	              <button class="btn btn-primary formCadastro" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
	              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary buttonCadastro" href="#" funcao="telaListarUsuario" controlador="ControladorUsuario" retorno="div_central" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Voltar</a>
	            </div>
	          </div>
	        </div>
	      </div>
	      <script src="js/lib.js"></script>



		<!--script src="js/popupUpload.js" type="text/javascript"></script>
		<header><h3 class="tabs_involved">Alterar Usuário</h3>
            <ul class="tabs">
                <li><a href="#" funcao="telaListarUsuario" controlador="ControladorUsuario" retorno="div_central" class="buttonCadastro" >Voltar</a></li>
                <li><a href="#" class="formCadastro">Alterar</a></li>
            </ul>
        </header>
        <div class="module_content">
            <form action="#" method="post" id="formCadastro" class="">
			<input type="hidden" name="retorno" id="retorno" value="div_central"/>
			<input type="hidden" name="controlador" id="controlador" value="ControladorUsuario"/>
			<input type="hidden" name="funcao" id="funcao" value="alterarUsuario"/>
			<input type="hidden" name="mensagem" id="mensagem" value="2"/>
			<input type="hidden" name="id" id="id" value="<?php echo $objUsuario[0]->getId()?>"/>
            <fieldset>
                <label>Imagem Largura Máxima: 640px<br /> 
				<a href="javascript:fnInserirArquivo('imagem','./imagens/usuario/','640','imagem')">
					<img name="imagemIcone" src="img/notes-add.gif" border="0" title="Clique para adicionar" />
				</a>
				<a href="javascript:fnRemoverArquivo('imagem','./imagens/usuario/','imagem')">
					<img src="img/notes-reject.gif" border="0" title="Clique para remover" />
				</a>				
				</label>
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
				<input type="hidden" name="imagem" id="imagem" value="<?php echo $objUsuario[0]->getImagem();?>" />
			</fieldset>            
			<fieldset>
                <label>Nome *</label>
                <input type="text" id="nome" name="nome" value="<?php echo $objUsuario[0]->getNome() ;?>" class="mgs_alerta" onkeyup="this.value=this.value.toUpperCase();" >
            </fieldset>            
            <fieldset>
                <label>Login *</label>
                <input type="text" id="login" name="login" value="<?php echo $objUsuario[0]->getLogin() ;?>" class="mgs_alerta" onkeyup="this.value=this.value.toLowerCase();" >
            </fieldset>            
            <fieldset>
                <label>Senha *</label>
                <input type="password" id="senha" name="senha" value="" class="mgs_alerta" onkeyup="" >
            </fieldset>            
            <fieldset>
                <label>Repetir a Senha *</label>
                <input type="password" id="senha2" name="senha2" value="" class="mgs_alerta senha">
            </fieldset>            
            <fieldset style="width:48%; float:left; margin-right: 3%;">
                <label>Perfil *</label>
				<select id="perfil" name="perfil" class="" style="width:92%;">
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
            </fieldset>            
            <div class="clear"></div>            
            </form>
        </div-->		
	<?php
	} 
	

	public function telaVisualizarUsuario($objUsuario){
		?>

	      <div class="app-title">
	        <div>
	          <h1><i class="fa fa-dashboard"></i> Módulos </h1>	         
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
	              <button class="btn btn-primary formCadastro" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
	              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary buttonCadastro" href="#" funcao="telaListarUsuario" controlador="ControladorUsuario" retorno="div_central" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Voltar</a>
	            </div>
	          </div>
	        </div>
	      </div>
	      <script src="js/lib.js"></script>

		<!--script src="js/popupUpload.js" type="text/javascript"></script>
		<header><h3 class="tabs_involved">Visualizar Usuário</h3>
            <ul class="tabs">
                <li><a href="#" funcao="telaListarUsuario" controlador="ControladorUsuario" retorno="div_central" class="buttonCadastro" >Voltar</a></li>
            </ul>
        </header>
        <div class="module_content">
            <form action="#" method="post" id="formCadastro" class="">
			<input type="hidden" name="retorno" id="retorno" value="div_central"/>
			<input type="hidden" name="controlador" id="controlador" value="ControladorUsuario"/>
			<input type="hidden" name="funcao" id="funcao" value="alterarUsuario"/>
			<input type="hidden" name="mensagem" id="mensagem" value="2"/>
			<input type="hidden" name="id" id="id" value="<?php echo $objUsuario[0]->getId()?>"/>
            <fieldset>
                <label>Imagem Largura Máxima: 640px<br /> 
				</label>
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
			</fieldset>            
			<fieldset>
                <label>Nome *</label>
                <?php echo $objUsuario[0]->getNome() ;?>
            </fieldset>            
            <fieldset>
                <label>Login *</label>
                <?php echo $objUsuario[0]->getLogin() ;?>
            </fieldset>            
            <fieldset style="width:48%; float:left; margin-right: 3%;">
                <label>Perfil *</label>
		<?php echo ($objUsuario[0]->getPerfil() == 1?"Adiministrador":"Usuário" ); ?>
            </fieldset>            
            <div class="clear"></div>            
            </form>
        </div-->					
	<?php
	} 


}


?>