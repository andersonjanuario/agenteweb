<?php

class ViewClasse{
	
	//construtor
	public function __construct(){}

	//destruidor
	public function __destruct(){}
	
	
	public function telaCadastrarClasse($post){		
		?>
		<script type="text/javascript">
			<?php
			echo ($post)?"$.growlUI2('".$post."', '&nbsp;');":"";
			?>			        
   		</script>


	      <div class="app-title">
	        <div>
	          <h1><i class="fa fa-dashboard"></i> Classes </h1>
	          <!--p>A free and modular admin template</p-->
	        </div>
	        <ul class="app-breadcrumb breadcrumb">
	          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          <li class="breadcrumb-item">Cadastros</li>
	          <li class="breadcrumb-item"><a href="#">Classes </a></li>
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
					<input type="hidden" name="controlador" id="controlador" value="ControladorClasse"/>
					<input type="hidden" name="funcao" id="funcao" value="incluirClasse"/>
					<input type="hidden" name="mensagem" id="mensagem" value="1"/>              
	                <div class="form-group">
	                  <label class="control-label">Nome *</label>
	                  <input class="form-control mgs_alerta" id="nome" name="nome" type="text" onkeyup="this.value=this.value.toUpperCase();" >
	                </div>
					<div class="form-group">
						<label class="control-label">Controlador *</label>
						<input type="text" id="controlador_" name="controlador_" value="" class="mgs_alerta form-control " onkeyup="" >
					</div>
					<div class="form-group">
						<label class="control-label">Função *</label>
						<input type="text" id="funcao_" name="funcao_" value="" class="mgs_alerta form-control " onkeyup="" >
					</div>
	                <div class="form-group">
						<label class="control-label">Seção *</label>
						<input type="text" id="funcao_" name="secao" value="" class="mgs_alerta form-control " onkeyup="" >
					</div>
					<div class="form-group">
						<label class="control-label">Modulo *</label>
						<select id="modulo" name="modulo"  class="mgs_alerta form-control ">
						<?php 
						try {
							$controladorModulo = new ControladorModulo();
							$objModulo = $controladorModulo->listarModulo();
						} catch (Exception $e) {
						}
						?>
							<option value="">Selecione...</option>
						<?php 
						 foreach ($objModulo as $catModulo){
						?>
							<option value="<?php echo $catModulo->getId()?>"><?php echo $catModulo->getNome();?></option>
						<?php                                  	
						 }
						 ?>                                 
						</select>
					</div>		                
	              </form>
	            </div>
	            <div class="tile-footer">
	              <button class="btn btn-primary formCadastro" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
	              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary buttonCadastro" href="#" funcao="telaListarClasse" controlador="ControladorClasse" retorno="div_central" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Voltar</a>
	            </div>
	          </div>
	        </div>
	      </div>
	      <script src="js/lib.js"></script>
		<?php
	} 
	
	
	public function telaListarClasse($objClasse){            
        ?>
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Módulos &nbsp;&nbsp;&nbsp;
            <a href="#" class="btn btn-primary buttonCadastro" funcao="telaCadastrarClasse" controlador="ControladorClasse" retorno="div_central">Novo</a>
          </h1>
          <!--p>Table to display analytical data effectively</p-->
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Cadastros</li>
          <li class="breadcrumb-item active"><a href="#">Classes </a></li>
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
					<th>Descri&ccedil;&atilde;o</th> 
					<th>Controlador</th> 
					<th>Fun&ccedil;&atilde;o</th> 
                    <th>Se&ccedil;&atilde;o</th> 
					<th>Modulo</th> 	
                    <th class="sorting_disabled" >Ações</th> 
                  </tr>
                </thead>
                <tbody>
                   <?php 
                    if ($objClasse) {
                        foreach ($objClasse as $classe) {
                    ?>    
						<tr> 
							<td class="getId" style="cursor:pointer"  id="<?php echo $classe->getId(); ?>" funcao="telaVisualizarClasse" controlador="ControladorClasse" retorno="div_central"><?php echo str_pad($classe->getId(), 5, "0", STR_PAD_LEFT); ?></td> 
							<td class="getId" style="cursor:pointer"  id="<?php echo $classe->getId(); ?>" funcao="telaVisualizarClasse" controlador="ControladorClasse" retorno="div_central"><?php echo $classe->getNome(); ?></td> 
							<td class="getId" style="cursor:pointer"  id="<?php echo $classe->getId(); ?>" funcao="telaVisualizarClasse" controlador="ControladorClasse" retorno="div_central"><?php echo ($classe->getControlador())?$classe->getControlador():"-";?></td> 
							<td class="getId" style="cursor:pointer"  id="<?php echo $classe->getId(); ?>" funcao="telaVisualizarClasse" controlador="ControladorClasse" retorno="div_central"><?php echo ($classe->getFuncao())?$classe->getFuncao():"-";?></td> 
							<td class="getId" style="cursor:pointer"  id="<?php echo $classe->getId(); ?>" funcao="telaVisualizarClasse" controlador="ControladorClasse" retorno="div_central"><?php echo ($classe->getSecao())?$classe->getSecao():"-";?></td> 
                            <td class="getId" style="cursor:pointer"  id="<?php echo $classe->getId(); ?>" funcao="telaVisualizarClasse" controlador="ControladorClasse" retorno="div_central"><?php echo ($classe->getModulo())?$classe->getModulo()->getNome():"-";?></td> 
							<td style="text-align:center;width:100px">
								<button class="btn btn-secondary getId btn-list" type="button" title="Alterar" id="<?php echo $classe->getId(); ?>" funcao="telaAlterarClasse" controlador="ControladorClasse" retorno="div_central"><i class="fa fa-lg fa-edit"></i></button>
								<button class="btn btn-secondary deleteId btn-list" type="button" title="Excluir" id="<?php echo $classe->getId(); ?>" funcao="excluirClasse" controlador="ControladorClasse" retorno="div_central" mensagem="4"><i class="fa fa-lg fa-trash"></i></button>
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
	<?php 
	}
		
	
	public function telaAlterarClasse($objClasse){
		?>

	      <div class="app-title">
	        <div>
	          <h1><i class="fa fa-dashboard"></i> Classes </h1>
	          <!--p>A free and modular admin template</p-->
	        </div>
	        <ul class="app-breadcrumb breadcrumb">
	          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          <li class="breadcrumb-item">Cadastros</li>
	          <li class="breadcrumb-item"><a href="#">Classes </a></li>
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
					<input type="hidden" name="controlador" id="controlador" value="ControladorClasse"/>
					<input type="hidden" name="funcao" id="funcao" value="alterarClasse"/>
					<input type="hidden" name="mensagem" id="mensagem" value="1"/>
					<input type="hidden" name="id" id="id" value="<?php echo $objClasse[0]->getId();?>"/>	
					<div class="form-group">
						<label class="control-label">Nome *</label>
						<input type="text" id="nome" name="nome" value="<?php echo $objClasse[0]->getNome();?>" class="mgs_alerta form-control" onkeyup="this.value=this.value.toUpperCase();" >
					</div>
					<div class="form-group">
						<label class="control-label">Controlador *</label>
						<input type="text" id="controlador_" name="controlador_" value="<?php echo $objClasse[0]->getControlador();?>" class="mgs_alerta form-control" onkeyup="" >
					</div>
					<div class="form-group">
						<label class="control-label">Função *</label>
						<input type="text" id="funcao_" name="funcao_" value="<?php echo $objClasse[0]->getFuncao();?>" class="mgs_alerta form-control" onkeyup="" >
					</div>
	                <div class="form-group">
						<label class="control-label">Seção *</label>
						<input type="text" id="funcao_" name="secao" value="<?php echo $objClasse[0]->getSecao();?>" class="mgs_alerta form-control" onkeyup="" >
					</div>
					<div class="form-group">
						<label class="control-label">Modulo *</label>
						<select id="modulo" name="modulo"  class="mgs_alerta form-control">
						<?php 
						try {
							$controladorModulo = new ControladorModulo();
							$objModulo = $controladorModulo->listarModulo();
						} catch (Exception $e) {
						}
						?>
							<option value="">Selecione...</option>
						<?php 
						foreach ($objModulo as $catModulo){
							if($catModulo->getId() == $objClasse[0]->getModulo()->getId()){
								?><option value="<?php echo $catModulo->getId()?>" selected="selected"><?php echo $catModulo->getNome();?></option><?php 
							}else{
								?><option value="<?php echo $catModulo->getId()?>"><?php echo $catModulo->getNome();?></option><?php                                  	
							}
						 }
						 ?>                                 
						</select>
					</div>         
	              </form>
	            </div>
	            <div class="tile-footer">
	              <button class="btn btn-primary formCadastro" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
	              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary buttonCadastro" href="#" funcao="telaListarClasse" controlador="ControladorClasse" retorno="div_central" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Voltar</a>
	            </div>
	          </div>
	        </div>
	      </div>
	      <script src="js/lib.js"></script>			
		<?php
	} 
	
	
	public function telaVisualizarClasse($objClasse){
		?>


	      <div class="app-title">
	        <div>
	          <h1><i class="fa fa-dashboard"></i> Classes </h1>
	          <!--p>A free and modular admin template</p-->
	        </div>
	        <ul class="app-breadcrumb breadcrumb">
	          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          <li class="breadcrumb-item">Cadastros</li>
	          <li class="breadcrumb-item"><a href="#">Classes </a></li>
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
						<label class="control-label">Nome *</label>
						<input type="text"  disabled="true" id="nome" name="nome" value="<?php echo $objClasse[0]->getNome();?>" class="mgs_alerta form-control" onkeyup="this.value=this.value.toUpperCase();" >
					</div>
					<div class="form-group">
						<label class="control-label">Controlador *</label>
						<input type="text"  disabled="true" id="controlador_" name="controlador_" value="<?php echo $objClasse[0]->getControlador();?>" class="mgs_alerta form-control" onkeyup="" >
					</div>
					<div class="form-group">
						<label class="control-label">Função *</label>
						<input type="text"  disabled="true" id="funcao_" name="funcao_" value="<?php echo $objClasse[0]->getFuncao();?>" class="mgs_alerta form-control" onkeyup="" >
					</div>
	                <div class="form-group">
						<label class="control-label">Seção *</label>
						<input type="text"  disabled="true" id="funcao_" name="secao" value="<?php echo $objClasse[0]->getSecao();?>" class="mgs_alerta form-control" onkeyup="" >
					</div>
					<div class="form-group">
						<label class="control-label">Modulo *</label>
						<select id="modulo"  disabled="true" name="modulo"  class="mgs_alerta form-control">
						<?php 
						try {
							$controladorModulo = new ControladorModulo();
							$objModulo = $controladorModulo->listarModulo();
						} catch (Exception $e) {
						}
						?>
							<option value="">Selecione...</option>
						<?php 
						foreach ($objModulo as $catModulo){
							if($catModulo->getId() == $objClasse[0]->getModulo()->getId()){
								?><option value="<?php echo $catModulo->getId()?>" selected="selected"><?php echo $catModulo->getNome();?></option><?php 
							}else{
								?><option value="<?php echo $catModulo->getId()?>"><?php echo $catModulo->getNome();?></option><?php                                  	
							}
						 }
						 ?>                                 
						</select>
					</div>         
	              </form>
	            </div>
	            <div class="tile-footer">
	              <a class="btn btn-secondary buttonCadastro" href="#" funcao="telaListarClasse" controlador="ControladorClasse" retorno="div_central" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Voltar</a>
	            </div>
	          </div>
	        </div>
	      </div>
	      <script src="js/lib.js"></script>
		<?php
	} 
	
	
	
}


?>