<?php

class ViewAcao{
	
	//construtor
	public function __construct(){}

	//destruidor
	public function __destruct(){}
	
	public function telaListarAcao($objModulo,$objUsuario){
		//echo "<pre>";
                //var_dump($objModulo);
    ?>


      <div class="app-title">
        <div>
          <h1><i class="fa fa-unlock"></i> Módulos </h1>          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Cadastros</li>
          <li class="breadcrumb-item"><a href="#">Usuário </a></li>
          <li class="breadcrumb-item active"><a href="#">Ações do Perfil </a></li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Formulário</h3>
            <div class="tile-body">
              <form action="#" method="post" id="formCadastro" class="">
                <input type="hidden" name="r3" id="r3" value="div_central"/>
                <input type="hidden" name="c2" id="c2" value="ControladorAcao"/>
                <input type="hidden" name="f1" id="f1" value="incluirClasseAcao"/>
                <input type="hidden" name="m4" id="m4" value="1"/>              
                <div class="form-group">
                    *&nbsp;A = Lista&nbsp;/&nbsp;Vizualiza&nbsp;/&nbsp;Altera&nbsp;/&nbsp;Inclui&nbsp;/&nbsp;Exclui.<br />
                    *&nbsp;B = Lista&nbsp;/&nbsp;Vizualiza&nbsp;/&nbsp;Altera.<br />
                    *&nbsp;C = Lista&nbsp;/&nbsp;Vizualiza.<br />
                    *&nbsp;0 = Nenhum acesso. 
                </div>
                <div class="form-group">
                    <label class="control-label">Usuário:</label>
                    <?php echo $objUsuario[0]->getNome(); ?>
                    <input type="hidden" name="usuario" id="usuario" value="<?php echo $objUsuario[0]->getId(); ?>"/>
                </div>
                <div class="form-group">
                    <table class="form" >
                            <?php 
                            foreach ($objModulo as $modulo){
                            ?>
                            <tr>
                                <td class="col1" >
                                 <label class="control-label"><?php echo $modulo->getNome(); ?></label>  
                                </td>
                            </tr>
                            <?php   
                            foreach ($modulo->getClasse() as $classe){
                            ?>
                            <tr>
                                <td class="col1" ><?php echo $classe->getNome();?></td>
                                <td class="col2" >
                                <?php 
                                switch ($classe->getAcao()->getPerfil()) {
                                    case "A":
                                    ?>
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|0" >&nbsp;0
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|A" checked="checked" >&nbsp;A
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|B" >&nbsp;B
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|C" >&nbsp;C
                                    <?php                                   
                                    break;
                                    case "B":
                                    ?>
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|0" >&nbsp;0
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|A" >&nbsp;A
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|B" checked="checked">&nbsp;B
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|C" >&nbsp;C
                                    <?php                                   
                                    break;
                                    case "C":
                                    ?>
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|0" >&nbsp;0
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|A" >&nbsp;A
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|B" >&nbsp;B
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|C" checked="checked">&nbsp;C
                                    <?php
                                    break;
                                    case "0":
                                    ?>
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|0" checked="checked">&nbsp;0
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|A" >&nbsp;A
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|B" >&nbsp;B
                                        <input type="radio" name="<?php echo $classe->getId();?>" value="<?php echo $classe->getId();?>|C" >&nbsp;C
                                    <?php
                                    break;
                                }
                                
                                ?>
                                </td>
                            </tr>
                            <?php 
                                }
                             }  
                            ?>
                        </table>
                    

                </fieldset>

              </form>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary " onClick="fncFormCadastro(this)" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary " onClick="fncButtonCadastro(this)" href="#" f1="telaListarUsuario" c2="ControladorUsuario"  r3="div_central" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Voltar</a>
            </div>
          </div>
        </div>
      </div>      
	<?php
	} 
		
	
}


?>