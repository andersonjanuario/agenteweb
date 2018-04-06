<?php 
function debug($valor){
	echo "<pre>";
    var_dump($valor);
	die();
}

if($_GET["op"] === "1"){
	
	function criarTabela($sessao,$campos){
		try {
			$local = "localhost";
			$usuario = "root";
			$senha  = "";
			$banco = "agenteweb";
			
			$conexao = mysqli_connect($local,$usuario,$senha) or die( "nao foi possivel conectar" );
			mysqli_set_charset($conexao,"utf8");

			mysqli_select_db($conexao,$banco) or die ("Nao foi possivel selecionar o banco de dados");
					
			
			$sql = "
					CREATE TABLE tb_agenteweb_".$sessao." 
					(
					id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					nome VARCHAR(50) NOT NULL,
					descricao VARCHAR(500) NULL,
					status INT(1) NULL DEFAULT '1'
					)";
			//$retorno = mysqli_query($conexao,$sql) or die ('Erro na execução de criar tabela!');
			
			
			$sql = "INSERT INTO `tb_agenteweb_classe` ( `id`, 
														`nome`, 
														`id_perfil`, 
														`controlador`, 
														`funcao`, 
														`secao`, 
														`id_modulo`, 
														`status`
														) VALUES (
														NULL, 
														'".$sessao."', 
														'2', 
														'Controlador".$sessao."', 
														'telaListar".$sessao."', 
														'".$sessao."', 
														(SELECT id FROM tb_agenteweb_modulo WHERE nome = 'SITE'), 
														'1')";
			//$retorno = mysqli_query($conexao,$sql) or die ('Erro na execução erro na execução de update class!');
			
			mysqli_close($conexao);
			return $retorno;
		} catch (Exception $e) {
			return $e;
		}

	}	
	
	
	
    
    $data = json_decode(file_get_contents("php://input"));
    $sessao = $data->sessao;
	
	criarTabela($sessao,null);
	
	echo "iniciando view \\n";
    $view = fopen("./view/view".$sessao.".php", "w") or die("Unable to open file!");
    fwrite($view, "
                    <?php

                    class View".$sessao." {

                        //construtor
                        public function __construct() {
                            
                        }

                        //destruidor
                        public function __destruct() {
                            
                        }

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
                                                foreach (\$obj".$sessao." as \$template) {
                                            ?>    
                                                    <tr> 
                                                        <td class=\"center\"><?php echo str_pad(\$template->getId(), 5, \"0\", STR_PAD_LEFT); ?></td>
                                                        <td class=\"center\" onClick=\"getId(this)\"   style=\"cursor:pointer\"  id=\"<?php echo \$template->getId(); ?>\" funcao=\"telaVisualizar".$sessao."\" controlador=\"Controlador".$sessao."\" retorno=\"div_central\">
                                                            <?php echo limitarTexto(\$template->getNome(), 27); ?>
                                                        </td>
                                                        <td class=\"center\" onClick=\"getId(this)\"  style=\"cursor:pointer\"  id=\"<?php echo \$template->getId(); ?>\" funcao=\"telaVisualizar".$sessao."\" controlador=\"Controlador".$sessao."\" retorno=\"div_central\">
                                                            <?php
                                                            if (\$template->getDescricao()) {
                                                                echo limitarTexto(\$template->getDescricao(), 20);
                                                            } else {
                                                                echo \"-\";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style=\"text-align:center;width:100px;\">                              
                                                            <button <?php echo (\$perfil !== 'C')?'onClick=\"getId(this)\"':'disabled=\"true\"'; ?> class=\"btn btn-secondary btn-list\" type=\"button\" title=\"Alterar\" id=\"<?php echo \$template->getId(); ?>\" funcao=\"telaAlterar".$sessao."\" controlador=\"Controlador".$sessao."\" retorno=\"div_central\"><i class=\"fa fa-lg fa-edit\"></i></button>
                                                            <button <?php echo (\$perfil === 'A')?'onClick=\"fncDeleteId(this)\"':'disabled=\"true\"'; ?> class=\"btn btn-secondary btn-list\" type=\"button\" title=\"Excluir\" id=\"<?php echo \$template->getId(); ?>\" funcao=\"excluir".$sessao."\" controlador=\"Controlador".$sessao."\" retorno=\"div_central\" mensagem=\"4\"><i class=\"fa fa-lg fa-trash\"></i></button>
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

                        public function telaAlterar".$sessao."(\$obj".$sessao.") {
                            ?>
                            <script type=\"text/javascript\">
                                \$(\".maskMoney\").maskMoney();
                                setDatePicker('data_nascimento');

                                \$(document).ready(function() {
                                    fncInserirArquivo(\"form_arquivo\", \"progress_arquivo\", \"porcentagem_arquivo\", \"arquivo\", \"arquivoAtual\", \"./arquivos/template/\", \"arquivo\");
                                    fncInserirArquivo(\"form_imagem\", \"progress\", \"porcentagem\", \"imagem\", \"imagemAtual\", \"./imagens/template/\", \"imagem\");
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

                    }
                    ?>


        ");
    fclose($view);
	echo "termino view\n";

	echo "iniciando classe \n";
    $classe = fopen("./classe/".$sessao.".php", "w") or die("Unable to open file!");
    fwrite($classe,"
                    <?php

                        class ".$sessao."{

                            private \$id;
							private \$nome;
							private \$descricao;
							private \$status;

                            //construtor
                            public function __construct(){}

                            //destruidor
                            public function __destruct(){}

                            //Get And Sets
                            public function getId(){
                                return \$this->id;
                            }

                            public function setId(\$id){                                
                                \$this->id = \$id;
                            }
							
							public function getNome(){
								return \$this->nome;
							}

							public function setNome(\$v){
								\$this->nome = \$v;
							}
							
							public function getDescricao(){
								return \$this->descricao;
							}

							public function setDescricao(\$v){
								\$this->descricao = \$v;
							}					

							public function getStatus(){
								return \$this->status;
							}

							public function setStatus(\$v){
								\$this->status = \$v;
							}							
													
                    }
                    ?>"
		);
    fclose($classe);
	echo "termino classe\n";
	
	echo "iniciando controller\n";
    $controle = fopen("./controle/controlador".$sessao.".php", "w") or die("Unable to open file!");
    fwrite($controle, "

                    <?php

                    class Controlador".$sessao." {

                        //construtor
                        public function __construct(){}

                        //destruidor
                        public function __destruct(){}


                        public function listar".$sessao."(\$id = null){
                            try {
                                \$modulo".$sessao." = new Dao".$sessao."();
                                
                                return \$modulo".$sessao."->listar".$sessao."(\$id);
                                \$modulo".$sessao."->__destruct();
                            } catch (Exception \$e) {
                                return \$e;
                            }
                        }
                        

                        public function incluir".$sessao."(\$post){
                            try {
                                \$template = new ".$sessao."();
								\$template->setNome(\$post['nome']);
								\$template->setDescricao(\$post['descricao']);								
                                \$modulo".$sessao." = new Dao".$sessao."();
                                
                                if(\$modulo".$sessao."->incluir".$sessao."(\$template)){
                                    return \$this->telaCadastrar".$sessao."();  
                                }       
                                \$modulo".$sessao."->__destruct();
                            } catch (Exception \$e) {
                            }
                        }

                        public function alterar".$sessao."(\$post){
                            try {
                                \$template = new ".$sessao."();
                                \$template->setId(\$post['id']);
								\$template->setNome(\$post['nome']);
								\$template->setDescricao(\$post['descricao']);

                                
                                \$modulo".$sessao." = new Dao".$sessao."();
                                if(\$modulo".$sessao."->alterar".$sessao."(\$template)){
                                    return \$this->telaListar".$sessao."();
                                }
                                \$modulo".$sessao."->__destruct();
                            } catch (Exception \$e) {
                                return \$e;
                            } 
                            
                            
                        }

                        public function excluir".$sessao."(\$post){
                            try {
                                \$id = \$post['id'];
                                \$modulo".$sessao." = new Dao".$sessao."();
                                \$modulo".$sessao."->excluir".$sessao."(\$id);
                                \$modulo".$sessao."->__destruct();
                                return \$this->telaListar".$sessao."();
                            } catch (Exception \$e) {
                                return \$e;
                            }
                        }

                        public function telaCadastrar".$sessao."(\$post = null){
                            try {
                                \$view".$sessao." = new View".$sessao."();
                                return \$view".$sessao."->telaCadastrar".$sessao."(\$post);
                                \$view".$sessao."->__destruct();
                            } catch (Exception \$e) {
                                return \$e;
                            }
                        }
                        
                        public function telaListar".$sessao."(\$post = null){
                            try {
                                \$view".$sessao." = new View".$sessao."();
                                return \$view".$sessao."->telaListar".$sessao."(\$this->listar".$sessao."(null));
                                \$view".$sessao."->__destruct();
                            } catch (Exception \$e) {
                                return \$e;
                            }
                        }
                        
                        public function telaAlterar".$sessao."(\$post = null){
                            try {
                                \$view".$sessao." = new View".$sessao."();
                                return \$view".$sessao."->telaAlterar".$sessao."(\$this->listar".$sessao."(\$post['id']));
                                \$view".$sessao."->__destruct();
                            } catch (Exception \$e) {
                                return \$e;
                            }
                        }
                        
                        
                        public function telaVisualizar".$sessao."(\$post = null){
                            try {
                                \$view".$sessao." = new View".$sessao."();
                                return \$view".$sessao."->telaVisualizar".$sessao."(\$this->listar".$sessao."(\$post['id']));
                                \$view".$sessao."->__destruct();
                            } catch (Exception \$e) {
                                return \$e;
                            }
                        }
                        


                    }
                    ?>

        ");
    fclose($controle);
	echo "termino controller\n";
	
	echo "iniciando dao\n";
	$dao = fopen("./dao/dao".$sessao.".php", "w") or die("Unable to open file!");	
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
	
	
}else{
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Form Samples - Vali Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body class="app sidebar-mini rtl">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Gerar de Sessão&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-primary" onClick="envio();" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Criar</button>
                    </h3>
                    <div class="tile-body">
                        <form class="row" id="form-install">
                            <div class="form-group col-md-6">
                                <label class="control-label">Nome da Sessão</label>
                                <input class="form-control" type="text" name="sessao" id="sessao" onkeyup="this.value=this.value.capitalize();">
                            </div>
                            <div  class="row col-md-12">

                                <div class="form-group col-md-2">
                                    <label class="control-label">Nome do Campo</label>
                                    <input class="form-control" type="text" name="campo" id="campo" onkeyup="this.value=this.value.toLowerCase();">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="control-label">Tipo do Campo</label>
                                    <select id="tipo" name="tipo" class="mgs_alerta form-control">
                                        <option value="text">text</option>
                                        <option value="number">number</option>
                                        <option value="selec">textarea</option>
										<option value="selec">imagem</option>
										<option value="selec">arquivo</option>
										<option value="selec">data</option>
										<option value="selec">radio-button</option>
										<option value="selec">check-box</option>
                                    </select>
                                </div>
                                <div class="animated-radio-button col-md-2">
                                    <label class="control-label">Exibirar na Grid?</label>
                                    <br/>
                                    <label>
                                        <input type="radio" name="grid" checked="checked" value="1"><span class="label-text">Sim</span>&nbsp;&nbsp;                                        
                                    </label><br/>
									<label>
                                        <input type="radio" name="grid" value="0"><span class="label-text">Não</span>
                                    </label>
                                </div>
                                <div class="animated-radio-button col-md-2">
                                    <label class="control-label">Obrigatório</label>
                                    <br/>
                                    <label>
                                        <input type="radio" name="obrigatorio" checked="checked" value="1"><span class="label-text">Sim</span>&nbsp;&nbsp;
                                        
                                    </label><br/>
									<label>
                                        <input type="radio" name="obrigatorio" value="0"><span class="label-text">Não</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="control-label">Tamanho Campo</label>
                                    <input class="form-control" type="text" id="tamanho" name="tamanho" onkeyup="this.value=this.value.toLowerCase();">
                                </div>
								<div class="form-group col-md-2">
									<label class="control-label">&nbsp; &nbsp;</label><br/>
									<button class="btn btn-primary" type="button" onClick="addCampos();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Adicionar Campos</button>
								</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Campo</th>
                      <th>Tipo</th>
                      <th>Grid</th>
                      <th>Obrigatorio</th>
                      <th>Tamanho</th>
                      <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody id="formCampos">                    
                  </tbody>
                </table>
            </div>
        </div>
        <!-- Essential javascripts for application to work-->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="js/plugins/pace.min.js"></script>
        <script>
			String.prototype.capitalize = function() {
				return this.charAt(0).toUpperCase() + this.slice(1).toLowerCase();
			}
		
            var totalCampos = 0;
            var campos = [];
            function removerCampo(campo) {
                for(var i=0;i<campos.length;i++){
                    if(campos[i].id == campo){
                        console.log(campos);
                        campos.splice(i, 1);                   
                        console.log(campos);
                        break;
                    } 
                }

                $("#linha-" + campo).remove();
            }

            function addCampos() {
                totalCampos++;
                var objeto = {  id: totalCampos,
                                campo: $("#campo").val(),
                                tipo: $("#tipo").val(),
                                grid: $("#grid").val(),
                                obrigatorio: $("#obrigatorio").val(),
                                tamanho: $("#tamanho").val()
                            };
                campos.push(objeto);

                var html = '<tr id="linha-'+totalCampos+'"><td>'+objeto.campo+'</td><td>'+objeto.tipo+'</td><td>'+objeto.grid+'</td><td>'+objeto.obrigatorio+'</td><td>'+objeto.tamanho+'</td><td><button class="btn btn-primary" type="button" onClick="removerCampo('+totalCampos+');"><i class="fa fa-fw fa-lg fa-check-circle"></i>Remover</button></td></tr>';
                $("#formCampos").append(html);
				
				$("#form-install").each(function(){
					$('[name=campo]',this).val('');
					$('[name=tipo]',this).val('text');
					$('[name=tamanho]',this).val('');
					$('[name=grid]',this)[0].checked = true;
					$('[name=obrigatorio]',this)[0].checked = true;
					
					
				});
            }


            function envio(){
                $.ajax({
                    url: 'install.php?op=1',
                    type: 'POST',
                    data: JSON.stringify({ 
                        'sessao': $("#sessao").val(),
                        'campos':campos
                    }),
                    success: function(result) {
                        //$('#' + retorno).html(result);
                    },
                    beforeSend: function() {},
                    complete: function() {}
                });
            }
        </script>
    </body>

    </html>
    <?php } ?>