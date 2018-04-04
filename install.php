<?php 
if($_GET["op"] === "1"){
    echo "<pre>";
    var_dump($_POST);
    
    $sessao = $_POST["sessao"];

    $view = fopen("./view/"+$sessao+".php", "w") or die("Unable to open file!");
    $classe = fopen("./classe/"+$sessao+".php", "w") or die("Unable to open file!");
    $controle = fopen("./controle/"+$sessao+".php", "w") or die("Unable to open file!");
    $dao = fopen("./dao/"+$sessao+".php", "w") or die("Unable to open file!");
    fwrite($view, "
                    <?php

                    class View"+$sessao+" {

                        //construtor
                        public function __construct() {
                            
                        }

                        //destruidor
                        public function __destruct() {
                            
                        }

                        public function telaCadastrar"+$sessao+"(\$post) {
                            ?>

                            <script type=\"text/javascript\" >
                            <?php
                            echo (\$post) ? \"\$.growlUI2('\" . \$post . \"', '&nbsp;');\" : \"\";
                            ?>
                                \$(\".maskMoney\").maskMoney();
                                setDatePicker('data_nascimento');

                                \$(document).ready(function() {
                                    fncInserirArquivo(\"form_arquivo\", \"progress_arquivo\", \"porcentagem_arquivo\", \"arquivo\", \"arquivoAtual\", \"./arquivos/template/\", \"arquivo\");
                                    fncInserirArquivo(\"form_imagem\", \"progress\", \"porcentagem\", \"imagem\", \"imagemAtual\", \"./imagens/template/\", \"imagem\");
                                });
                            </script>
                              <div class=\"app-title\">
                                <div>
                                  <h1><i class=\"fa fa-file-text-o\"></i> "+$sessao+" </h1>              
                                </div>
                                <ul class=\"app-breadcrumb breadcrumb\">
                                  <li class=\"breadcrumb-item\"><i class=\"fa fa-home fa-lg\"></i></li>
                                  <li class=\"breadcrumb-item\">Cadastros</li>
                                  <li class=\"breadcrumb-item\"><a href=\"#\">"+$sessao+" </a></li>
                                  <li class=\"breadcrumb-item active\"><a href=\"#\">Cadastrar </a></li>
                                </ul>
                              </div>

                              <div class=\"row\">
                                <div class=\"col-md-12\">
                                  <div class=\"tile\">
                                    <h3 class=\"tile-title\">Formulário</h3>
                                    <div class=\"tile-body\">
                     

                                    <div class=\"form-group\">
                                        <table border=\"0\" style=\"width: 100%\">
                                            <tr>
                                                <td colspan=\"3\">
                                                    <label>Imagem Largura Máxima: 640px</label>&nbsp;&nbsp; 
                                                </td>
                                            </tr>
                                            <tr style=\"height: 110px;\">
                                                <td style=\"width: 20%;text-align: right;\">
                                                    <span id=\"span-teste\" class=\"upload-wrapper\" >  
                                                        <form action=\"./post-imagem.php\" method=\"post\" id=\"form_imagem\">
                                                            <input name=\"pastaArquivo\" type=\"hidden\" value=\"./imagens/template/\">
                                                            <input name=\"largura\" type=\"hidden\" value=\"640\">
                                                            <input name=\"opcao\" type=\"hidden\" value=\"1\">
                                                            <input name=\"tipoArq\" type=\"hidden\" value=\"imagem\">
                                                            <input type=\"file\" name=\"file\" class=\"upload-file\" onchange=\"javascript: fncSubmitArquivo('enviar', this);\" >
                                                            <input type=\"submit\" id=\"enviar\" style=\"display:none;\">   
                                                            <img src=\"./img/img_upload.png\" class=\"upload-button\" />
                                                        </form> 
                                                    </span>
                                                </td>
                                                <td style=\"width: 20%\">
                                                    <img onclick=\"fncRemoverArquivo('imagem', './imagens/template', 'imagem', 'imagemAtual', './img/imagemPadrao.jpg');\" src=\"./img/remove.png\" border=\"0\" title=\"Clique para remover\" style=\"cursor:pointer;margin-bottom:7px;\" class=\"upload-button\" />
                                                </td>
                                                <td style=\"width: 60%\">
                                                    <img id=\"imagemAtual\" name=\"imagemAtual\" src=\"./img/imagemPadrao.jpg\" border=\"0\" style=\"\" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  colspan=\"3\">
                                                    <progress id=\"progress\" value=\"0\" max=\"100\" style=\"display:none;\"></progress>
                                                    <span id=\"porcentagem\" style=\"display:none;float: right;\">0%</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                     <div class=\"form-group\">
                                        <table border=\"0\" style=\"width: 100%\">
                                            <tr>
                                                <td colspan=\"3\">
                                                    <label>Tamanho Máxima: 2 Megas.</label>&nbsp;&nbsp; 
                                                </td>
                                            </tr>
                                            <tr style=\"height: 110px;\">
                                                <td style=\"width: 20%;text-align: right;\">
                                                    <span id=\"span-teste\" class=\"upload-wrapper\" >                                                        
                                                        <form action=\"./post-imagem.php\" method=\"post\" id=\"form_arquivo\">
                                                            <input name=\"pastaArquivo\" type=\"hidden\" value=\"./arquivos/template/\">
                                                            <input name=\"largura\" type=\"hidden\" value=\"640\">
                                                            <input name=\"opcao\" type=\"hidden\" value=\"1\">
                                                            <input name=\"tipoArq\" type=\"hidden\" value=\"arquivo\">
                                                            <input type=\"file\" name=\"file\" class=\"upload-file\" onchange=\"javascript: fncSubmitArquivo('enviar_arquivo', this);\" >
                                                            <input type=\"submit\" id=\"enviar_arquivo\" style=\"display:none;\">
                                                            <img src=\"./img/img_upload.png\" class=\"upload-button\" />
                                                        </form>
                                                    </span>
                                                </td>
                                                <td style=\"width: 20%\">
                                                    <img onclick=\"fncRemoverArquivo('arquivo', './arquivos/template/', 'arquivo', 'arquivoAtual', '');\" src=\"./img/remove.png\" border=\"0\" title=\"Clique para remover\" style=\"cursor:pointer;margin-bottom:7px;\" class=\"upload-button\" />
                                                </td>
                                                <td style=\"width: 60%;\">
                                                    <span name=\"arquivoAtual\" id=\"arquivoAtual\" onClick=\"fnAbreArquivo('arquivo', './arquivos/template/')\"   ><br />Adicione um arquivo clicando no <img src=\"./img/img_upload.png\" border=\"0\" style=\"float:none;margin:0;width: 20px;\" /></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  colspan=\"3\">
                                                    <progress id=\"progress_arquivo\" value=\"0\" max=\"100\" style=\"display:none;\"></progress>
                                                    <span id=\"porcentagem_arquivo\" style=\"display:none;\">0%</span>                                                  
                                                </td>
                                            </tr>
                                        </table>
                                    </div>


                                    <form action=\"#\" method=\"post\" id=\"formCadastro\" class=\"\">
                                        <input type=\"hidden\" name=\"retorno\" id=\"retorno\" value=\"div_central\"/>
                                        <input type=\"hidden\" name=\"controlador\" id=\"controlador\" value=\"Controlador"+$sessao+"\"/>
                                        <input type=\"hidden\" name=\"funcao\" id=\"funcao\" value=\"incluir"+$sessao+"\"/>
                                        <input type=\"hidden\" name=\"mensagem\" id=\"mensagem\" value=\"1\"/>
                                        <input type=\"hidden\" name=\"arquivo\" id=\"arquivo\" value=\"\" />    
                                        <input type=\"hidden\" name=\"imagem\" id=\"imagem\" value=\"\" />              
                                    <div class=\"form-group\">
                                      <label class=\"control-label\">Nome *</label>
                                      <input class=\"form-control mgs_alerta\" id=\"nome\" name=\"nome\" type=\"text\" onkeyup=\"this.value=this.value.toUpperCase();\" >
                                    </div>
                                    <div class=\"animated-radio-button\">
                                      <label class=\"control-label\">Radio *</label><br/>
                                      <label>
                                        <input type=\"radio\" name=\"sexo\" checked=\"checked\" value=\"M\"><span class=\"label-text\">Masculino</span>
                                      </label><br/>
                                      <label>
                                        <input type=\"radio\" name=\"sexo\" value=\"F\"><span class=\"label-text\">Feminino</span>
                                      </label>
                                    </div>
                                    <div class=\"form-group\">
                                        <label class=\"control-label\">Profissão TextArea</label>
                                        <textarea  id=\"profissao\" name=\"profissao\" rows=\"4\" value=\"\" class=\"form-control\" ></textarea>
                                    </div>
                                    <div class=\"form-group\">
                                        <label class=\"control-label\">Faixa Salarial - Monetaorio R\$ </label>
                                        <input type=\"text\" id=\"faixa_salarial\" name=\"faixa_salarial\" value=\"\" class=\"maskMoney form-control\"  > 
                                    </div>
                                   

                                    <div class=\"form-group\">
                                        <label class=\"control-label\">Data de Nascimento - Data</label>
                                        <input type=\"text\" id=\"data_nascimento\" name=\"data_nascimento\" value=\"\" class=\"data form-control\" onkeypress=\"return mascara(event, this, '##/##/####');\" maxlength=\"10\" >
                                    </div>
                                    <div class=\"form-group\">
                                        <label class=\"control-label\">CPF - Mascara</label>
                                        <input type=\"text\"  id=\"cpf\" name=\"cpf\" value=\"\" class=\"form-control\" onkeypress=\"return mascara(event, this, '###.###.###-##');\" maxlength=\"14\" >
                                    </div>
                                   

                                    <div class=\"form-group\">
                                        <label class=\"control-label\">Telefone Residencial</label>
                                        <input type=\"text\" id=\"telefone_residencial\" name=\"telefone_residencial\" value=\"\" class=\"form-control\" onkeypress=\"return mascara(event, this, '(##)#####-####');\" maxlength=\"14\">
                                    </div>
                                    <div class=\"form-group\">
                                        <label class=\"control-label\">Logradouro - Maiuscula</label>
                                        <input type=\"text\" onkeyup=\"this.value = this.value.toUpperCase();\" id=\"logradouro\" name=\"logradouro\" value=\"\" class=\"form-control\" >
                                    </div>

                                    <div class=\"form-group\">
                                        <label class=\"control-label\">Número</label>
                                        <input type=\"text\"  id=\"numero\" name=\"numero\" value=\"\" class=\"form-control\" onkeypress=\"return mascara(event, this, '#');\" maxlength=\"6\">
                                    </div>
                                    <div class=\"form-group\">
                                        <label class=\"control-label\">CEP - Mascara</label>
                                        <input type=\"text\"  id=\"cep\" name=\"cep\" value=\"\" class=\"form-control\" onkeypress=\"return mascara(event, this, '#####-###');\" maxlength=\"9\">
                                    </div>
                                    <div class=\"form-group\">
                                        <label class=\"control-label\">Estado</label>
                                        <select id=\"estado\" name=\"estado\" value=\"\" class=\"form-control\">
                                            <option value=\"\">Selecione...</option>
                                            <?php echo montaSelectEstados(null); ?>
                                        </select>
                                    </div>

                                    <div class=\"form-group\">
                                        <label class=\"control-label\">E-mail - Minusculo</label>
                                        <input type=\"text\"  id=\"email\" name=\"email\" value=\"\" class=\"form-control\" onkeyup=\"this.value = this.value.toLowerCase();\" >
                                    </div>
                                       <div class=\"form-group\">
                                            <label class=\"control-label\">Pais</label>
                                            <select id=\"pais\" name=\"pais\" class=\"mgs_alerta form-control\" >
                                                <?php
                                                try {
                                                    \$controladorPais = new ControladorPais();
                                                    \$objPais = \$controladorPais->listarPais();
                                                } catch (Exception \$e) {
                                                    
                                                }
                                                ?>
                                                <option value=\"\">Selecione...</option>
                                                <?php
                                                foreach (\$objPais as \$pais) {
                                                    if (\$pais->getId() == 17) {
                                                        ?><option value=\"<?php echo \$pais->getId() ?>\" selected=\"selected\"><?php echo \$pais->getNome(); ?></option><?php
                                                    } else {
                                                        ?><option value=\"<?php echo \$pais->getId() ?>\"><?php echo \$pais->getNome(); ?></option><?php
                                                    }
                                                }
                                                ?>                                 
                                            </select>
                                        </div>  

                                      </form>
                                    </div>
                                    <div class=\"tile-footer\">
                                      <button class=\"btn btn-primary \" onClick=\"fncFormCadastro(this)\" type=\"button\"><i class=\"fa fa-fw fa-lg fa-check-circle\"></i>Salvar</button>
                                      &nbsp;&nbsp;&nbsp;<a class=\"btn btn-secondary \" onClick=\"fncButtonCadastro(this)\" href=\"#\" funcao=\"telaListar"+$sessao+"\" controlador=\"Controlador"+$sessao+"\" retorno=\"div_central\" ><i class=\"fa fa-fw fa-lg fa-times-circle\"></i>Voltar</a>
                                    </div>
                                  </div>
                                </div>
                              </div>          
                            <?php
                        }

                        public function telaListar"+$sessao+"(\$obj"+$sessao+") {
                            \$controladorAcao = new ControladorAcao();
                            \$perfil = \$controladorAcao->retornaPerfilClasseAcao(\$_SESSION[\"login\"],'telaListar"+$sessao+"');
                            ?>
                              <div class=\"app-title\">
                                <div>
                                  <h1><i class=\"fa fa-th-list\"></i> "+$sessao+" &nbsp;&nbsp;&nbsp;
                                    <button class=\"btn btn-primary \" <?php echo (\$perfil === 'A')?'onClick=\"fncButtonCadastro(this)\"':'disabled=\"true\"'; ?> funcao=\"telaCadastrar"+$sessao+"\" controlador=\"Controlador"+$sessao+"\" retorno=\"div_central\"><i class=\"fa fa-fw fa-lg fa-plus\"></i>Novo</button>                
                                  </h1>              
                                </div>
                                <ul class=\"app-breadcrumb breadcrumb side\">
                                  <li class=\"breadcrumb-item\"><i class=\"fa fa-home fa-lg\"></i></li>
                                  <li class=\"breadcrumb-item\">Cadastros</li>
                                  <li class=\"breadcrumb-item active\"><a href=\"#\">"+$sessao+" </a></li>
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
                                            <!--th>Telefone</th>
                                            <th>E-mail</th>
                                            <th>Logradouro</th>
                                            <th>Estado</th--> 
                                            <th class=\"sorting_disabled\" >Ações</th> 
                                          </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                            if (\$obj"+$sessao+") {
                                                foreach (\$obj"+$sessao+" as \$template) {
                                            ?>    
                                                    <tr> 
                                                        <td class=\"center\"><?php echo str_pad(\$template->getId(), 5, \"0\", STR_PAD_LEFT); ?></td>
                                                        <td class=\"center\" onClick=\"getId(this)\"   style=\"cursor:pointer\"  id=\"<?php echo \$template->getId(); ?>\" funcao=\"telaVisualizar"+$sessao+"\" controlador=\"Controlador"+$sessao+"\" retorno=\"div_central\">
                                                            <?php echo limitarTexto(\$template->getNome(), 27); ?>
                                                        </td>
                                                        <!--td class=\"center\" onClick=\"getId(this)\"  style=\"cursor:pointer\"  id=\"<?php echo \$template->getId(); ?>\" funcao=\"telaVisualizar"+$sessao+"\" controlador=\"Controlador"+$sessao+"\" retorno=\"div_central\">
                                                            <?php
                                                            if (\$template->getTelefoneResidencial()) {
                                                                echo limitarTexto(\$template->getTelefoneResidencial(), 20);
                                                            } else {
                                                                echo \"-\";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class=\"center\" onClick=\"getId(this)\"  style=\"cursor:pointer\"  id=\"<?php echo \$template->getId(); ?>\" funcao=\"telaVisualizar"+$sessao+"\" controlador=\"Controlador"+$sessao+"\" retorno=\"div_central\">
                                                            <?php
                                                            if (\$template->getEmail() != \"\") {
                                                                echo limitarTexto(\$template->getEmail(), 27);
                                                            } else {
                                                                echo \"-\";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class=\"center\" onClick=\"getId(this)\"  style=\"cursor:pointer\"  id=\"<?php echo \$template->getId(); ?>\" funcao=\"telaVisualizar"+$sessao+"\" controlador=\"Controlador"+$sessao+"\" retorno=\"div_central\">
                                                            <?php
                                                            if (\$template->getLogradouro() != \"\") {
                                                                echo limitarTexto(\$template->getLogradouro(), 20);
                                                            } else {
                                                                echo \"-\";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class=\"center\" onClick=\"getId(this)\"  style=\"cursor:pointer\"  id=\"<?php echo \$template->getId(); ?>\" funcao=\"telaVisualizar"+$sessao+"\" controlador=\"Controlador"+$sessao+"\" retorno=\"div_central\">
                                                            <?php
                                                            if (\$template->getEstado() != \"\") {
                                                                echo \$template->getEstado();
                                                            } else {
                                                                echo \"-\";
                                                            }
                                                            ?>
                                                        </td-->
                                                        <td style=\"text-align:center;width:100px;\">                              
                                                            <button <?php echo (\$perfil !== 'C')?'onClick=\"getId(this)\"':'disabled=\"true\"'; ?> class=\"btn btn-secondary btn-list\" type=\"button\" title=\"Alterar\" id=\"<?php echo \$template->getId(); ?>\" funcao=\"telaAlterar"+$sessao+"\" controlador=\"Controlador"+$sessao+"\" retorno=\"div_central\"><i class=\"fa fa-lg fa-edit\"></i></button>
                                                            <button <?php echo (\$perfil === 'A')?'onClick=\"fncDeleteId(this)\"':'disabled=\"true\"'; ?> class=\"btn btn-secondary btn-list\" type=\"button\" title=\"Excluir\" id=\"<?php echo \$template->getId(); ?>\" funcao=\"excluir"+$sessao+"\" controlador=\"Controlador"+$sessao+"\" retorno=\"div_central\" mensagem=\"4\"><i class=\"fa fa-lg fa-trash\"></i></button>
                                                        </td> 



                                                        <!--td style=\"text-align:center;width:100px;\">
                                                            <?php
                                                                //echo (\$perfil !== 'C')? '<button class=\"btn btn-secondary btn-list\" onClick=\"getId(this)\" type=\"button\" title=\"Alterar\" id=\"'.\$template->getId().'\" funcao=\"telaAlterar"+$sessao+"\" controlador=\"Controlador"+$sessao+"\" retorno=\"div_central\"><i class=\"fa fa-lg fa-edit\"></i></button>':'<input type=\"image\" src=\"images/icn_edit_disable.png\" title=\"Editar\" >';
                                                                //echo (\$perfil === 'A')? '<button onClick=\"fncDeleteId(this)\" class=\"btn btn-secondary btn-list\" type=\"button\" title=\"Excluir\" id=\"'.\$template->getId().'\" funcao=\"excluir"+$sessao+"\" controlador=\"Controlador"+$sessao+"\" retorno=\"div_central\" mensagem=\"4\"><i class=\"fa fa-lg fa-trash\"></i></button>':'<input type=\"image\" src=\"images/icn_trash_disable.png\" title=\"Excluir\" >'; 
                                                            ?>                                        
                                                        </td --> 
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

                        public function telaAlterar"+$sessao+"(\$obj"+$sessao+") {
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
                                  <h1><i class=\"fa fa-file-text-o\"></i> "+$sessao+" </h1>              
                                </div>
                                <ul class=\"app-breadcrumb breadcrumb\">
                                  <li class=\"breadcrumb-item\"><i class=\"fa fa-home fa-lg\"></i></li>
                                  <li class=\"breadcrumb-item\">Cadastros</li>
                                  <li class=\"breadcrumb-item\"><a href=\"#\">"+$sessao+" </a></li>
                                  <li class=\"breadcrumb-item active\"><a href=\"#\">Cadastrar </a></li>
                                </ul>
                              </div>

                              <div class=\"row\">
                                <div class=\"col-md-12\">
                                  <div class=\"tile\">
                                    <h3 class=\"tile-title\">Formulário</h3>
                                    <div class=\"tile-body\">

                                    <div class=\"form-group\">
                                        <?php
                                        if (\$obj"+$sessao+"[0]->getImagem()) {
                                            \$imagem = \"./imagens/template/thumbnail\" . \$obj"+$sessao+"[0]->getImagem();
                                        } else {
                                            \$imagem = \"./img/imagemPadrao.jpg\";
                                        }
                                        ?>   
                                        <table border=\"0\" style=\"width: 100%\">
                                            <tr>
                                                <td colspan=\"3\">
                                                    <label class=\"control-label\">Imagem Largura Máxima: 640px</label>&nbsp;&nbsp; 
                                                </td>
                                            </tr>
                                            <tr style=\"height: 110px;\">
                                                <td style=\"width: 20%;text-align: right;\">
                                                    <span id=\"span-teste\" class=\"upload-wrapper\" >  
                                                        <form action=\"./post-imagem.php\" method=\"post\" id=\"form_imagem\">
                                                            <input name=\"pastaArquivo\" type=\"hidden\" value=\"./imagens/template/\">
                                                            <input name=\"largura\" type=\"hidden\" value=\"640\">
                                                            <input name=\"opcao\" type=\"hidden\" value=\"1\">
                                                            <input name=\"tipoArq\" type=\"hidden\" value=\"imagem\">
                                                            <input type=\"file\" name=\"file\" class=\"upload-file\" onchange=\"javascript: fncSubmitArquivo('enviar', this);\" >
                                                            <input type=\"submit\" id=\"enviar\" style=\"display:none;\">   
                                                            <img src=\"./img/img_upload.png\" class=\"upload-button\" />
                                                        </form> 
                                                    </span>
                                                </td>
                                                <td style=\"width: 20%\">
                                                    <img onclick=\"fncRemoverArquivo('imagem', './imagens/template', 'imagem', 'imagemAtual', './img/imagemPadrao.jpg');\" src=\"./img/remove.png\" border=\"0\" title=\"Clique para remover\" style=\"cursor:pointer;margin-bottom:7px;\" class=\"upload-button\" />
                                                </td>
                                                <td style=\"width: 60%\">
                                                    <img id=\"imagemAtual\" name=\"imagemAtual\" src=\"<?php echo \$imagem; ?>\" border=\"0\" style=\"\" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  colspan=\"3\">
                                                    <progress id=\"progress\" value=\"0\" max=\"100\" style=\"display:none;\"></progress>
                                                    <span id=\"porcentagem\" style=\"display:none;float: right;\">0%</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div> 
                                    <div class=\"form-group\">
                                        <table border=\"0\" style=\"width: 100%\">
                                            <tr>
                                                <td colspan=\"3\">
                                                    <label class=\"control-label\">Tamanho Máxima: 2 Megas.</label>&nbsp;&nbsp; 
                                                </td>
                                            </tr>
                                            <tr style=\"height: 110px;\">
                                                <td style=\"width: 20%;text-align: right;\">
                                                    <span id=\"span-teste\" class=\"upload-wrapper\" >                                                        
                                                        <form action=\"./post-imagem.php\" method=\"post\" id=\"form_arquivo\">
                                                            <input name=\"pastaArquivo\" type=\"hidden\" value=\"./arquivos/template/\">
                                                            <input name=\"largura\" type=\"hidden\" value=\"640\">
                                                            <input name=\"opcao\" type=\"hidden\" value=\"1\">
                                                            <input name=\"tipoArq\" type=\"hidden\" value=\"arquivo\">
                                                            <input type=\"file\" name=\"file\" class=\"upload-file\" onchange=\"javascript: fncSubmitArquivo('enviar_arquivo', this);\" >
                                                            <input type=\"submit\" id=\"enviar_arquivo\" style=\"display:none;\">
                                                            <img src=\"./img/img_upload.png\" class=\"upload-button\" />
                                                        </form>
                                                    </span>
                                                </td>
                                                <td style=\"width: 20%\">
                                                    <img onclick=\"fncRemoverArquivo('arquivo', './arquivos/template/', 'arquivo', 'arquivoAtual', '');\" src=\"./img/remove.png\" border=\"0\" title=\"Clique para remover\" style=\"cursor: pointer;margin-bottom:7px;\" class=\"upload-button\" />
                                                </td>
                                                <td style=\"width: 60%\">
                                                    <span name=\"arquivoAtual\" id=\"arquivoAtual\" onClick=\"fnAbreArquivo('arquivo', './arquivos/template/')\" style=\"<?php echo (\$obj"+$sessao+"[0]->getArquivo()) ? 'cursor: pointer; text-decoration: underline;' : '' ?>\"  >
                                                        <?php
                                                        if (\$obj"+$sessao+"[0]->getArquivo()) {
                                                            echo \$obj"+$sessao+"[0]->getArquivo();
                                                        } else {
                                                            ?><br />Adicione um arquivo clicando no <img src=\"./img/img_upload.png\" border=\"0\" style=\"float:none;margin:0;width: 20px;\" /><?php
                                                        }
                                                        ?> 
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  colspan=\"3\">
                                                    <progress id=\"progress_arquivo\" value=\"0\" max=\"100\" style=\"display:none;\"></progress>
                                                    <span id=\"porcentagem_arquivo\" style=\"display:none;float: right;\">0%</span>                                                 
                                                </td>
                                            </tr>
                                        </table>  
                                    </div>   

                                    <form action=\"#\" method=\"post\" id=\"formCadastro\" class=\"\">
                                        <input type=\"hidden\" name=\"retorno\" id=\"retorno\" value=\"div_central\"/>
                                        <input type=\"hidden\" name=\"controlador\" id=\"controlador\" value=\"Controlador"+$sessao+"\"/>
                                        <input type=\"hidden\" name=\"funcao\" id=\"funcao\" value=\"alterar"+$sessao+"\"/>
                                        <input type=\"hidden\" name=\"mensagem\" id=\"mensagem\" value=\"2\"/>
                                        <input type=\"hidden\" name=\"id\" id=\"id\" value=\"<?php echo \$obj"+$sessao+"[0]->getId(); ?>\"/>
                                        <input type=\"hidden\" name=\"imagem\" id=\"imagem\" value=\"<?php echo \$obj"+$sessao+"[0]->getImagem(); ?>\" />
                                        <input type=\"hidden\" name=\"arquivo\" id=\"arquivo\" value=\"<?php echo \$obj"+$sessao+"[0]->getArquivo(); ?>\">   
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Nome *</label>
                                            <input type=\"text\" onkeyup=\"this.value = this.value.toUpperCase();\" id=\"nome\" name=\"nome\" value=\"<?php echo \$obj"+$sessao+"[0]->getNome(); ?>\" class=\"form-control mgs_alerta\" >
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Sexo *</label>
                                            <?php
                                            if (\$obj"+$sessao+"[0]->getSexo() == \"M\") {
                                                \$macho = 'checked=\"checked\"';
                                                \$femia = '';
                                            } elseif (\$obj"+$sessao+"[0]->getSexo() == \"F\") {
                                                \$macho = '';
                                                \$femia = 'checked=\"checked\"';
                                            }
                                            ?>
                                            <input type=\"radio\" name=\"sexo\" <?php echo \$macho; ?> value=\"M\"/>
                                            Masculino
                                            <input type=\"radio\" name=\"sexo\" <?php echo \$femia; ?> value=\"F\" />
                                            Feminino                            
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Profissão</label>                    
                                            <textarea id=\"profissao\" name=\"profissao\" class=\"form-control\" ><?php echo \$obj"+$sessao+"[0]->getProfissao(); ?></textarea>
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Faixa Salarial R\$ </label>
                                            <input type=\"text\" id=\"faixa_salarial\" name=\"faixa_salarial\" value=\"<?php echo valorMonetario(\$obj"+$sessao+"[0]->getFaixaSalarial(), \"2\"); ?>\" class=\"maskMoney form-control\"  > 
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Data de Nascimento</label>
                                            <input type=\"text\" id=\"data_nascimento\" name=\"data_nascimento\" value=\"<?php echo (\$obj"+$sessao+"[0]->getDataNascimento() != \"0000-00-00\") ? recuperaData(\$obj"+$sessao+"[0]->getDataNascimento()) : \"\"; ?>\" class=\"data form-control\" onkeypress=\"return mascara(event, this, '##/##/####');\" maxlength=\"10\" >
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">CPF</label>
                                            <input type=\"text\" id=\"cpf\" name=\"cpf\" value=\"<?php echo \$obj"+$sessao+"[0]->getCpf(); ?>\" class=\"form-control\" onkeypress=\"return mascara(event, this, '###.###.###-##');\" maxlength=\"14\" >
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Logradouro</label>
                                            <input type=\"text\" onkeyup=\"this.value = this.value.toUpperCase();\" id=\"logradouro\" name=\"logradouro\" value=\"<?php echo \$obj"+$sessao+"[0]->getLogradouro(); ?>\" class=\"form-control\" >
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Número</label>
                                            <input type=\"text\" id=\"numero\" name=\"numero\" value=\"<?php echo \$obj"+$sessao+"[0]->getNumero(); ?>\" class=\"form-control\" onkeypress=\"return mascara(event, this, '#');\" maxlength=\"6\">
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">CEP</label>
                                            <input type=\"text\" id=\"cep\" name=\"cep\" value=\"<?php echo \$obj"+$sessao+"[0]->getCep(); ?>\" class=\"form-control\" onkeypress=\"return mascara(event, this, '#####-###');\" maxlength=\"9\">
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Estado</label>
                                            <select id=\"estado\" name=\"estado\" value=\"\" class=\"form-control\">
                                                <option value=\"\">Selecione...</option>
                                                <?php echo montaSelectEstados(\$obj"+$sessao+"[0]->getEstado()); ?>
                                            </select>
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Telefone Residencial</label>
                                            <input type=\"text\" id=\"telefone_residencial\" name=\"telefone_residencial\" value=\"<?php echo \$obj"+$sessao+"[0]->getTelefoneResidencial(); ?>\" class=\"form-control\" onkeypress=\"return mascara(event, this, '(##)#####-####');\" maxlength=\"14\">
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">E-mail</label>
                                            <input type=\"text\" id=\"email\" name=\"email\" value=\"<?php echo \$obj"+$sessao+"[0]->getEmail(); ?>\" class=\"form-control\" onkeyup=\"this.value = this.value.toLowerCase();\" >
                                        </div>
                                        <div class=\"form-group\">     
                                            <label class=\"control-label\">Pais</label>     
                                            <select id=\"pais\" name=\"pais\" class=\"mgs_alerta form-control\" >
                                                <?php
                                                try {
                                                    \$controladorPais = new ControladorPais();
                                                    \$objPais = \$controladorPais->listarPais();
                                                } catch (Exception \$e) {
                                                    
                                                }
                                                ?>                                      
                                                <option value=\"\">Selecione...</option>
                                                <?php
                                                foreach (\$objPais as \$pais) {
                                                    if (\$pais->getId() == \$obj"+$sessao+"[0]->getPais()->getId()) {
                                                        ?><option value=\"<?php echo \$pais->getId() ?>\" selected=\"selected\"><?php echo \$pais->getNome(); ?></option><?php
                                                    } else {
                                                        ?><option value=\"<?php echo \$pais->getId() ?>\"><?php echo \$pais->getNome(); ?></option><?php
                                                    }
                                                }
                                                ?>                                 
                                            </select>
                                        </div> 

                                      </form>
                                    </div>
                                    <div class=\"tile-footer\">
                                      <button class=\"btn btn-primary \" onClick=\"fncFormCadastro(this)\" type=\"button\"><i class=\"fa fa-fw fa-lg fa-check-circle\"></i>Salvar</button>
                                      &nbsp;&nbsp;&nbsp;<a class=\"btn btn-secondary \" onClick=\"fncButtonCadastro(this)\" href=\"#\" funcao=\"telaListar"+$sessao+"\" controlador=\"Controlador"+$sessao+"\" retorno=\"div_central\" ><i class=\"fa fa-fw fa-lg fa-times-circle\"></i>Voltar</a>
                                    </div>
                                  </div>
                                </div>
                              </div>         
                            <?php
                        }

                        public function telaVisualizar"+$sessao+"(\$obj"+$sessao+") {
                            ?>
                              <div class=\"app-title\">
                                <div>
                                  <h1><i class=\"fa fa-file-text-o\"></i> "+$sessao+" </h1>              
                                </div>
                                <ul class=\"app-breadcrumb breadcrumb\">
                                  <li class=\"breadcrumb-item\"><i class=\"fa fa-home fa-lg\"></i></li>
                                  <li class=\"breadcrumb-item\">Cadastros</li>
                                  <li class=\"breadcrumb-item\"><a href=\"#\">"+$sessao+" </a></li>
                                  <li class=\"breadcrumb-item active\"><a href=\"#\">Visualizar </a></li>
                                </ul>
                              </div>

                              <div class=\"row\">
                                <div class=\"col-md-12\">
                                  <div class=\"tile\">
                                    <h3 class=\"tile-title\">Formulário</h3>
                                    <div class=\"tile-body\">

                                    <input type=\"hidden\" name=\"arquivo\" id=\"arquivo\" value=\"<?php echo \$obj"+$sessao+"[0]->getArquivo(); ?>\" />    
                                    <div class=\"form-group\">
                                        <label class=\"control-label\">Imagem Largura Máxima: 640px</label>&nbsp;&nbsp;
                                        <?php //echo \$obj"+$sessao+"[0]->getImagem();
                                        if (\$obj"+$sessao+"[0]->getImagem()) {
                                            \$imagem = \"./imagens/template/thumbnail\" . \$obj"+$sessao+"[0]->getImagem();
                                        } else {
                                            \$imagem = \"./img/imagemPadrao.jpg\";
                                        }
                                        ?>   
                                        <span name=\"imagemLink\" id=\"<?php echo \$imagem; ?>\" title=\"Imagem\" >
                                            <img name=\"imagemAtual\" src=\"<?php echo \$imagem; ?>\" border=\"0\" />
                                        </span>
                                    </div>             
                                    <div class=\"form-group\">
                                        <label class=\"control-label\">Arquivo Tamanho Máximo: 2MB</label>
                                        <span name=\"arquivoAtual\" onClick=\"fnAbreArquivo('arquivo', './arquivos/template/')\" style=\"<?php echo (\$obj"+$sessao+"[0]->getArquivo()) ? 'cursor: pointer; text-decoration: underline;' : '' ?>\">
                                            <?php
                                            if (\$obj"+$sessao+"[0]->getArquivo()) {
                                                echo \$obj"+$sessao+"[0]->getArquivo();
                                            } else {
                                                ?>Adicione um arquivo clicando no <img src=\"./img/img_upload.png\" border=\"0\" style=\"float:none;margin:0;width: 20px;\" /><?php
                                            }
                                            ?>                                                    
                                        </span>
                                    </div>  
                                    <form action=\"#\" method=\"post\" id=\"formCadastro\" class=\"\">
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Nome *</label>
                                            <input type=\"text\" disabled=\"true\" onkeyup=\"this.value = this.value.toUpperCase();\" id=\"nome\" name=\"nome\" value=\"<?php echo \$obj"+$sessao+"[0]->getNome(); ?>\" class=\"form-control mgs_alerta\" >
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Sexo *</label>
                                            <?php
                                            if (\$obj"+$sessao+"[0]->getSexo() == \"M\") {
                                                \$macho = 'checked=\"checked\"';
                                                \$femia = '';
                                            } elseif (\$obj"+$sessao+"[0]->getSexo() == \"F\") {
                                                \$macho = '';
                                                \$femia = 'checked=\"checked\"';
                                            }
                                            ?>
                                            <input type=\"radio\" disabled=\"true\" name=\"sexo\" <?php echo \$macho; ?> value=\"M\"/>
                                            Masculino
                                            <input type=\"radio\" disabled=\"true\" name=\"sexo\" <?php echo \$femia; ?> value=\"F\" />
                                            Feminino                            
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Profissão</label>                    
                                            <textarea id=\"profissao\" name=\"profissao\" disabled=\"true\"  value=\"<?php echo \$obj"+$sessao+"[0]->getProfissao(); ?>\" class=\"form-control\" ></textarea>
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Faixa Salarial R\$ </label>
                                            <input type=\"text\" id=\"faixa_salarial\" disabled=\"true\" name=\"faixa_salarial\" value=\"<?php echo valorMonetario(\$obj"+$sessao+"[0]->getFaixaSalarial(), \"2\"); ?>\" class=\"maskMoney form-control\"  > 
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Data de Nascimento</label>
                                            <input type=\"text\" id=\"data_nascimento\" disabled=\"true\" name=\"data_nascimento\" value=\"<?php echo (\$obj"+$sessao+"[0]->getDataNascimento() != \"0000-00-00\") ? recuperaData(\$obj"+$sessao+"[0]->getDataNascimento()) : \"\"; ?>\" class=\"data form-control\" onkeypress=\"return mascara(event, this, '##/##/####');\" maxlength=\"10\" >
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">CPF</label>
                                            <input type=\"text\" id=\"cpf\" disabled=\"true\" name=\"cpf\" value=\"<?php echo \$obj"+$sessao+"[0]->getCpf(); ?>\" class=\"form-control\" onkeypress=\"return mascara(event, this, '###.###.###-##');\" maxlength=\"14\" >
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Logradouro</label>
                                            <input type=\"text\" disabled=\"true\" onkeyup=\"this.value = this.value.toUpperCase();\" id=\"logradouro\" name=\"logradouro\" value=\"<?php echo \$obj"+$sessao+"[0]->getLogradouro(); ?>\" class=\"form-control\" >
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Número</label>
                                            <input type=\"text\" id=\"numero\" name=\"numero\" disabled=\"true\" value=\"<?php echo \$obj"+$sessao+"[0]->getNumero(); ?>\" class=\"form-control\" onkeypress=\"return mascara(event, this, '#');\" maxlength=\"6\">
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">CEP</label>
                                            <input type=\"text\" id=\"cep\" name=\"cep\" disabled=\"true\" value=\"<?php echo \$obj"+$sessao+"[0]->getCep(); ?>\" class=\"form-control\" onkeypress=\"return mascara(event, this, '#####-###');\" maxlength=\"9\">
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Estado</label>
                                            <select id=\"estado\" name=\"estado\" value=\"\" class=\"form-control\" disabled=\"true\">
                                                <option value=\"\">Selecione...</option>
                                                <?php echo montaSelectEstados(\$obj"+$sessao+"[0]->getEstado()); ?>
                                            </select>
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">Telefone Residencial</label>
                                            <input type=\"text\" id=\"telefone_residencial\" name=\"telefone_residencial\" disabled=\"true\" value=\"<?php echo \$obj"+$sessao+"[0]->getTelefoneResidencial(); ?>\" class=\"form-control\" onkeypress=\"return mascara(event, this, '(##)#####-####');\" maxlength=\"14\">
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"control-label\">E-mail</label>
                                            <input type=\"text\" id=\"email\" name=\"email\" value=\"<?php echo \$obj"+$sessao+"[0]->getEmail(); ?>\" disabled=\"true\" class=\"form-control\" onkeyup=\"this.value = this.value.toLowerCase();\" >
                                        </div>
                                        <div class=\"form-group\">     
                                            <label class=\"control-label\">Pais</label>     
                                            <select id=\"pais\" name=\"pais\" class=\"mgs_alerta form-control\" disabled=\"true\" >
                                                <?php
                                                try {
                                                    \$controladorPais = new ControladorPais();
                                                    \$objPais = \$controladorPais->listarPais();
                                                } catch (Exception \$e) {
                                                    
                                                }
                                                ?>                                      
                                                <option value=\"\">Selecione...</option>
                                                <?php
                                                foreach (\$objPais as \$pais) {
                                                    if (\$pais->getId() == \$obj"+$sessao+"[0]->getPais()->getId()) {
                                                        ?><option value=\"<?php echo \$pais->getId() ?>\" selected=\"selected\"><?php echo \$pais->getNome(); ?></option><?php
                                                    } else {
                                                        ?><option value=\"<?php echo \$pais->getId() ?>\"><?php echo \$pais->getNome(); ?></option><?php
                                                    }
                                                }
                                                ?>                                 
                                            </select>
                                        </div> 

                                      </form>
                                    </div>
                                    <div class=\"tile-footer\">
                                      <a class=\"btn btn-secondary \" onClick=\"fncButtonCadastro(this)\" href=\"#\" funcao=\"telaListar"+$sessao+"\" controlador=\"Controlador"+$sessao+"\" retorno=\"div_central\" ><i class=\"fa fa-fw fa-lg fa-times-circle\"></i>Voltar</a>
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

    fwrite($classe,"
                    <?php

                        class "+$sessao+"{

                            private \$id;

                            //construtor
                            public function __construct(){}

                            //destruidor
                            public function __destruct(){}

                            //Get And Sets
                            public function getId(){
                                return \$this->id;
                            }

                            public function setId(\$id){
                                
                                if(\$id == ""){
                                    throw new Exception('Atributo id foi passado como nulo'); 
                                }
                                \$this->id = \$id;
                            }

                    }
                    ?>
        ");
    fclose($classe);

    fwrite($controle, "

                    <?php

                    class Controlador"+$sessao+" {

                        //construtor
                        public function __construct(){}

                        //destruidor
                        public function __destruct(){}


                        public function listar"+$sessao+"(\$id = null){
                            try {
                                \$modulo"+$sessao+" = new Dao"+$sessao+"();
                                
                                return \$modulo"+$sessao+"->listar"+$sessao+"(\$id);
                                \$modulo"+$sessao+"->__destruct();
                            } catch (Exception \$e) {
                                return \$e;
                            }
                        }
                        

                        public function incluir"+$sessao+"(\$post){
                            try {
                                \$template = new "+$sessao+"();
                                \$modulo"+$sessao+" = new Dao"+$sessao+"();
                                
                                if(\$modulo"+$sessao+"->incluir"+$sessao+"(\$template)){
                                    return \$this->telaCadastrar"+$sessao+"();  
                                }       
                                \$modulo"+$sessao+"->__destruct();
                            } catch (Exception \$e) {
                            }
                        }

                        public function alterar"+$sessao+"(\$post){
                            try {
                                \$template = new "+$sessao+"();
                                \$template->setId(\$post[\"id\"]);

                                
                                \$modulo"+$sessao+" = new Dao"+$sessao+"();
                                if(\$modulo"+$sessao+"->alterar"+$sessao+"(\$template)){
                                    return \$this->telaListar"+$sessao+"();
                                }
                                \$modulo"+$sessao+"->__destruct();
                            } catch (Exception \$e) {
                                return \$e;
                            } 
                            
                            
                        }

                        public function excluir"+$sessao+"(\$post){
                            try {
                                \$id = \$post["id"];
                                \$modulo"+$sessao+" = new Dao"+$sessao+"();
                                \$modulo"+$sessao+"->excluir"+$sessao+"(\$id);
                                \$modulo"+$sessao+"->__destruct();
                                return \$this->telaListar"+$sessao+"();
                            } catch (Exception \$e) {
                                return \$e;
                            }
                        }

                        public function telaCadastrar"+$sessao+"(\$post = null){
                            try {
                                \$view"+$sessao+" = new View"+$sessao+"();
                                return \$view"+$sessao+"->telaCadastrar"+$sessao+"(\$post);
                                \$view"+$sessao+"->__destruct();
                            } catch (Exception \$e) {
                                return \$e;
                            }
                        }
                        
                        public function telaListar"+$sessao+"(\$post = null){
                            try {
                                \$view"+$sessao+" = new View"+$sessao+"();
                                return \$view"+$sessao+"->telaListar"+$sessao+"(\$this->listar"+$sessao+"(null));
                                \$view"+$sessao+"->__destruct();
                            } catch (Exception \$e) {
                                return \$e;
                            }
                        }
                        
                        public function telaAlterar"+$sessao+"(\$post = null){
                            try {
                                \$view"+$sessao+" = new View"+$sessao+"();
                                return \$view"+$sessao+"->telaAlterar"+$sessao+"(\$this->listar"+$sessao+"(\$post[\"id\"]));
                                \$view"+$sessao+"->__destruct();
                            } catch (Exception \$e) {
                                return \$e;
                            }
                        }
                        
                        
                        public function telaVisualizar"+$sessao+"(\$post = null){
                            try {
                                \$view"+$sessao+" = new View"+$sessao+"();
                                return \$view"+$sessao+"->telaVisualizar"+$sessao+"(\$this->listar"+$sessao+"(\$post[\"id\"]));
                                \$view"+$sessao+"->__destruct();
                            } catch (Exception \$e) {
                                return \$e;
                            }
                        }
                        


                    }
                    ?>

        ");
    fclose($controle);

    fwrite($dao, "
                    <?php

                    class Dao"+$sessao+" extends Dados {

                        //construtor
                        public function __construct() {
                            
                        }

                        //destruidor
                        public function __destruct() {
                            
                        }

                        public function listar"+$sessao+"(\$id = null) {
                            try {
                                \$retorno = array();
                                \$conexao = \$this->conectarBanco();
                                \$sql = "SELECT id              
                                                FROM tb_agenteweb_template
                                        WHERE status = '1'";
                                \$sql .= (\$id != null) ? " AND id = " . \$id : "";
                                \$query = mysqli_query(\$conexao,\$sql) or die('Erro na execução do listar!');
                                while (\$objeto"+$sessao+" = mysqli_fetch_object(\$query)) {

                                    \$template = new "+$sessao+"();

                                    \$template->setId(\$objeto"+$sessao+"->id);

                                    \$retorno[] = \$template;
                                }
                                \$this->FecharBanco(\$conexao);
                                return \$retorno;
                            } catch (Exception \$e) {
                                return \$e;
                            }
                        }

                        public function incluir"+$sessao+"(\$template) {
                            try {
                                \$conexao = \$this->conectarBanco();
                                
                                \$sql = "INSERT INTO tb_agenteweb_template (  id
                                                                            )VALUES(
                                                                            NULL)";

                                \$retorno = mysqli_query(\$conexao,\$sql) or die('Erro na execução do insert!');
                                \$this->FecharBanco(\$conexao);
                                return \$retorno;
                            } catch (Exception \$e) {
                                return \$e;
                            }
                        }

                        public function alterar"+$sessao+"(\$template) {
                            try {

                                \$conexao = \$this->conectarBanco();
                                \$sql = "UPDATE tb_agenteweb_template SET nome = '" . \$template->getNome() . "',
                                                                         status = '1' 
                                                                         WHERE id = " . \$template->getId() . "";

                                
                                \$retorno = mysqli_query(\$conexao,\$sql) or die('Erro na execução do update!');
                                \$this->FecharBanco(\$conexao);
                                return \$retorno;
                            } catch (Exception \$e) {
                                return \$e;
                            }
                        }

                        public function excluir"+$sessao+"(\$id) {
                            try {
                                \$conexao = \$this->conectarBanco();

                                \$sql = "UPDATE tb_agenteweb_template SET status = '0' WHERE id = " . \$id . "";            
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
                                <input class="form-control" type="text" name="sessao" id="sessao" onkeyup="this.value=this.value.toLowerCase();">
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