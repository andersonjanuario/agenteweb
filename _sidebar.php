     <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" style="width:48;height:48;" src="imagens/usuario/<?php echo $_SESSION["login"]->getImagem();?>" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION["login"]->getNome();?></p>
          <p class="app-sidebar__user-designation"><?php echo ($_SESSION["login"]->getPerfil() === "1"?"Administrador":"Usuário"); ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <?php
            $controladorAcao = new ControladorAcao();                
            $objAcao = $controladorAcao->listarClasseAcaoParaMenu($_SESSION["login"]);            
            
            if($objAcao){
                foreach ($objAcao as $modulo){
                    ?>
                    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label"><?php echo $modulo->getNome(); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
                      <ul class="treeview-menu">
                      <?php 
                      foreach ($modulo->getClasse() as $classe){
                          if($classe->getPerfil() == "2" ){
                          ?>
                            <li funcao="<?php echo $classe->getFuncao();?>" controlador="<?php echo $classe->getControlador();?>" retorno="div_central" secao="<?php echo $classe->getSecao();?>" class="buttonMenu">
                              <a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> <?php echo $classe->getNome();?></a>
                            </li>
                          <?php
                          } 
                      }
                      ?>
                      </ul>
                    </li>
                    <?php                   
                }
            }

            if($_SESSION["login"]->getPerfil() == "1"){
            ?>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Cadastros</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                  <ul class="treeview-menu">
                    <li funcao="telaListarUsuario" controlador="ControladorUsuario" retorno="div_central" secao="usuario" class="buttonMenu"><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Usuários</a></li>
                    <li funcao="telaListarClasse" controlador="ControladorClasse" retorno="div_central" secao="classe" class="buttonMenu"><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Classes</a></li>
                    <li funcao="telaListarModulo" controlador="ControladorModulo" retorno="div_central" secao="modulo" class="buttonMenu"><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Módulos</a></li>                    
                  </ul>
                </li>                
            <?php
            }
        ?>
      </ul>
    </aside>