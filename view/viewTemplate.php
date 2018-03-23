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
				<form class="form-horizontal">
				  <div class="form-group">
					<label class="control-label col-md-3">Name</label>
					<div class="col-md-8">
					  <input class="form-control" type="text" placeholder="Enter full name">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-md-3">Email</label>
					<div class="col-md-8">
					  <input class="form-control col-md-8" type="email" placeholder="Enter email address">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-md-3">Address</label>
					<div class="col-md-8">
					  <textarea class="form-control" rows="4" placeholder="Enter your address"></textarea>
					</div>
				  </div>
				  <div class="form-group">
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
				  </div>
				  <div class="form-group">
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
				  </div>
				</form>
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-md-8 col-md-offset-3">
					<button class="btn btn-primary icon-btn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		<?php
	}
	
	public function telaTemplate(){
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
			  <?php $this->telaGridTemplateAjax(); ?>	
			  <?php $this->telaFormTemplate(); ?>			
			</div>
		  </div>			  
		<?php
	}
	
	public function telaGridTemplateAjax(){
		?>
		  <div class="col-md-6">
			<div class="card">
				<table class="table table-hover table-bordered" id="sampleTable">
				  <thead>
					<tr>
					  <th>Name</th>
					  <th>Position</th>
					  <th>Office</th>
					  <th>Age</th>
					  <th>Start date</th>
					  <th>Salary</th>
					</tr>
				  </thead>				
				</table>			
			</div>
		  </div>
		<script type="text/javascript">$('#sampleTable').DataTable(
																	{
																		"pagingType": "numbers",
																		"pageLength": 5,
																		"numbersLength": 3,
																		"ajax": 'data.json'
																	}
																);
		</script>	  
		<?php
		//Pode ser um .php tambem não é obrigado ser .json
	}
	
	public function telaGridTemplate(){
		?>
		  <div class="col-md-6">
			<div class="card">
				<table class="table table-hover table-bordered" id="sampleTable">
				  <thead>
					<tr>
					  <th>Name</th>
					  <th>Position</th>
					  <th>Office</th>
					  <th>Age</th>
					  <th>Start date</th>
					  <th>Salary</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <td>Tiger Nixon</td>
					  <td>System Architect</td>
					  <td>Edinburgh</td>
					  <td>61</td>
					  <td>2011/04/25</td>
					  <td>$320,800</td>
					</tr>
					<tr>
					  <td>Garrett Winters</td>
					  <td>Accountant</td>
					  <td>Tokyo</td>
					  <td>63</td>
					  <td>2011/07/25</td>
					  <td>$170,750</td>
					</tr>
					<tr>
					  <td>Ashton Cox</td>
					  <td>Junior Technical Author</td>
					  <td>San Francisco</td>
					  <td>66</td>
					  <td>2009/01/12</td>
					  <td>$86,000</td>
					</tr>
					<tr>
					  <td>Cedric Kelly</td>
					  <td>Senior Javascript Developer</td>
					  <td>Edinburgh</td>
					  <td>22</td>
					  <td>2012/03/29</td>
					  <td>$433,060</td>
					</tr>
					<tr>
					  <td>Airi Satou</td>
					  <td>Accountant</td>
					  <td>Tokyo</td>
					  <td>33</td>
					  <td>2008/11/28</td>
					  <td>$162,700</td>
					</tr>
					<tr>
					  <td>Brielle Williamson</td>
					  <td>Integration Specialist</td>
					  <td>New York</td>
					  <td>61</td>
					  <td>2012/12/02</td>
					  <td>$372,000</td>
					</tr>
					<tr>
					  <td>Herrod Chandler</td>
					  <td>Sales Assistant</td>
					  <td>San Francisco</td>
					  <td>59</td>
					  <td>2012/08/06</td>
					  <td>$137,500</td>
					</tr>
					<tr>
					  <td>Rhona Davidson</td>
					  <td>Integration Specialist</td>
					  <td>Tokyo</td>
					  <td>55</td>
					  <td>2010/10/14</td>
					  <td>$327,900</td>
					</tr>
					<tr>
					  <td>Colleen Hurst</td>
					  <td>Javascript Developer</td>
					  <td>San Francisco</td>
					  <td>39</td>
					  <td>2009/09/15</td>
					  <td>$205,500</td>
					</tr>
					<tr>
					  <td>Sonya Frost</td>
					  <td>Software Engineer</td>
					  <td>Edinburgh</td>
					  <td>23</td>
					  <td>2008/12/13</td>
					  <td>$103,600</td>
					</tr>
					<tr>
					  <td>Jena Gaines</td>
					  <td>Office Manager</td>
					  <td>London</td>
					  <td>30</td>
					  <td>2008/12/19</td>
					  <td>$90,560</td>
					</tr>
					<tr>
					  <td>Quinn Flynn</td>
					  <td>Support Lead</td>
					  <td>Edinburgh</td>
					  <td>22</td>
					  <td>2013/03/03</td>
					  <td>$342,000</td>
					</tr>
					<tr>
					  <td>Charde Marshall</td>
					  <td>Regional Director</td>
					  <td>San Francisco</td>
					  <td>36</td>
					  <td>2008/10/16</td>
					  <td>$470,600</td>
					</tr>
					<tr>
					  <td>Haley Kennedy</td>
					  <td>Senior Marketing Designer</td>
					  <td>London</td>
					  <td>43</td>
					  <td>2012/12/18</td>
					  <td>$313,500</td>
					</tr>
					<tr>
					  <td>Tatyana Fitzpatrick</td>
					  <td>Regional Director</td>
					  <td>London</td>
					  <td>19</td>
					  <td>2010/03/17</td>
					  <td>$385,750</td>
					</tr>
					<tr>
					  <td>Michael Silva</td>
					  <td>Marketing Designer</td>
					  <td>London</td>
					  <td>66</td>
					  <td>2012/11/27</td>
					  <td>$198,500</td>
					</tr>
					<tr>
					  <td>Paul Byrd</td>
					  <td>Chief Financial Officer (CFO)</td>
					  <td>New York</td>
					  <td>64</td>
					  <td>2010/06/09</td>
					  <td>$725,000</td>
					</tr>
					<tr>
					  <td>Gloria Little</td>
					  <td>Systems Administrator</td>
					  <td>New York</td>
					  <td>59</td>
					  <td>2009/04/10</td>
					  <td>$237,500</td>
					</tr>
					<tr>
					  <td>Bradley Greer</td>
					  <td>Software Engineer</td>
					  <td>London</td>
					  <td>41</td>
					  <td>2012/10/13</td>
					  <td>$132,000</td>
					</tr>
					<tr>
					  <td>Dai Rios</td>
					  <td>Personnel Lead</td>
					  <td>Edinburgh</td>
					  <td>35</td>
					  <td>2012/09/26</td>
					  <td>$217,500</td>
					</tr>
					<tr>
					  <td>Jenette Caldwell</td>
					  <td>Development Lead</td>
					  <td>New York</td>
					  <td>30</td>
					  <td>2011/09/03</td>
					  <td>$345,000</td>
					</tr>
					<tr>
					  <td>Yuri Berry</td>
					  <td>Chief Marketing Officer (CMO)</td>
					  <td>New York</td>
					  <td>40</td>
					  <td>2009/06/25</td>
					  <td>$675,000</td>
					</tr>
					<tr>
					  <td>Caesar Vance</td>
					  <td>Pre-Sales Support</td>
					  <td>New York</td>
					  <td>21</td>
					  <td>2011/12/12</td>
					  <td>$106,450</td>
					</tr>
					<tr>
					  <td>Doris Wilder</td>
					  <td>Sales Assistant</td>
					  <td>Sidney</td>
					  <td>23</td>
					  <td>2010/09/20</td>
					  <td>$85,600</td>
					</tr>
					<tr>
					  <td>Angelica Ramos</td>
					  <td>Chief Executive Officer (CEO)</td>
					  <td>London</td>
					  <td>47</td>
					  <td>2009/10/09</td>
					  <td>$1,200,000</td>
					</tr>
					<tr>
					  <td>Gavin Joyce</td>
					  <td>Developer</td>
					  <td>Edinburgh</td>
					  <td>42</td>
					  <td>2010/12/22</td>
					  <td>$92,575</td>
					</tr>
					<tr>
					  <td>Jennifer Chang</td>
					  <td>Regional Director</td>
					  <td>Singapore</td>
					  <td>28</td>
					  <td>2010/11/14</td>
					  <td>$357,650</td>
					</tr>
					<tr>
					  <td>Brenden Wagner</td>
					  <td>Software Engineer</td>
					  <td>San Francisco</td>
					  <td>28</td>
					  <td>2011/06/07</td>
					  <td>$206,850</td>
					</tr>
					<tr>
					  <td>Fiona Green</td>
					  <td>Chief Operating Officer (COO)</td>
					  <td>San Francisco</td>
					  <td>48</td>
					  <td>2010/03/11</td>
					  <td>$850,000</td>
					</tr>
					<tr>
					  <td>Shou Itou</td>
					  <td>Regional Marketing</td>
					  <td>Tokyo</td>
					  <td>20</td>
					  <td>2011/08/14</td>
					  <td>$163,000</td>
					</tr>
					<tr>
					  <td>Michelle House</td>
					  <td>Integration Specialist</td>
					  <td>Sidney</td>
					  <td>37</td>
					  <td>2011/06/02</td>
					  <td>$95,400</td>
					</tr>
					<tr>
					  <td>Suki Burks</td>
					  <td>Developer</td>
					  <td>London</td>
					  <td>53</td>
					  <td>2009/10/22</td>
					  <td>$114,500</td>
					</tr>
					<tr>
					  <td>Prescott Bartlett</td>
					  <td>Technical Author</td>
					  <td>London</td>
					  <td>27</td>
					  <td>2011/05/07</td>
					  <td>$145,000</td>
					</tr>
					<tr>
					  <td>Gavin Cortez</td>
					  <td>Team Leader</td>
					  <td>San Francisco</td>
					  <td>22</td>
					  <td>2008/10/26</td>
					  <td>$235,500</td>
					</tr>
					<tr>
					  <td>Martena Mccray</td>
					  <td>Post-Sales support</td>
					  <td>Edinburgh</td>
					  <td>46</td>
					  <td>2011/03/09</td>
					  <td>$324,050</td>
					</tr>
					<tr>
					  <td>Unity Butler</td>
					  <td>Marketing Designer</td>
					  <td>San Francisco</td>
					  <td>47</td>
					  <td>2009/12/09</td>
					  <td>$85,675</td>
					</tr>
					<tr>
					  <td>Howard Hatfield</td>
					  <td>Office Manager</td>
					  <td>San Francisco</td>
					  <td>51</td>
					  <td>2008/12/16</td>
					  <td>$164,500</td>
					</tr>
					<tr>
					  <td>Hope Fuentes</td>
					  <td>Secretary</td>
					  <td>San Francisco</td>
					  <td>41</td>
					  <td>2010/02/12</td>
					  <td>$109,850</td>
					</tr>
					<tr>
					  <td>Vivian Harrell</td>
					  <td>Financial Controller</td>
					  <td>San Francisco</td>
					  <td>62</td>
					  <td>2009/02/14</td>
					  <td>$452,500</td>
					</tr>
					<tr>
					  <td>Timothy Mooney</td>
					  <td>Office Manager</td>
					  <td>London</td>
					  <td>37</td>
					  <td>2008/12/11</td>
					  <td>$136,200</td>
					</tr>
					<tr>
					  <td>Jackson Bradshaw</td>
					  <td>Director</td>
					  <td>New York</td>
					  <td>65</td>
					  <td>2008/09/26</td>
					  <td>$645,750</td>
					</tr>
					<tr>
					  <td>Olivia Liang</td>
					  <td>Support Engineer</td>
					  <td>Singapore</td>
					  <td>64</td>
					  <td>2011/02/03</td>
					  <td>$234,500</td>
					</tr>
					<tr>
					  <td>Bruno Nash</td>
					  <td>Software Engineer</td>
					  <td>London</td>
					  <td>38</td>
					  <td>2011/05/03</td>
					  <td>$163,500</td>
					</tr>
					<tr>
					  <td>Sakura Yamamoto</td>
					  <td>Support Engineer</td>
					  <td>Tokyo</td>
					  <td>37</td>
					  <td>2009/08/19</td>
					  <td>$139,575</td>
					</tr>
					<tr>
					  <td>Thor Walton</td>
					  <td>Developer</td>
					  <td>New York</td>
					  <td>61</td>
					  <td>2013/08/11</td>
					  <td>$98,540</td>
					</tr>
					<tr>
					  <td>Finn Camacho</td>
					  <td>Support Engineer</td>
					  <td>San Francisco</td>
					  <td>47</td>
					  <td>2009/07/07</td>
					  <td>$87,500</td>
					</tr>
					<tr>
					  <td>Serge Baldwin</td>
					  <td>Data Coordinator</td>
					  <td>Singapore</td>
					  <td>64</td>
					  <td>2012/04/09</td>
					  <td>$138,575</td>
					</tr>
					<tr>
					  <td>Zenaida Frank</td>
					  <td>Software Engineer</td>
					  <td>New York</td>
					  <td>63</td>
					  <td>2010/01/04</td>
					  <td>$125,250</td>
					</tr>
					<tr>
					  <td>Zorita Serrano</td>
					  <td>Software Engineer</td>
					  <td>San Francisco</td>
					  <td>56</td>
					  <td>2012/06/01</td>
					  <td>$115,000</td>
					</tr>
					<tr>
					  <td>Jennifer Acosta</td>
					  <td>Junior Javascript Developer</td>
					  <td>Edinburgh</td>
					  <td>43</td>
					  <td>2013/02/01</td>
					  <td>$75,650</td>
					</tr>
					<tr>
					  <td>Cara Stevens</td>
					  <td>Sales Assistant</td>
					  <td>New York</td>
					  <td>46</td>
					  <td>2011/12/06</td>
					  <td>$145,600</td>
					</tr>
					<tr>
					  <td>Hermione Butler</td>
					  <td>Regional Director</td>
					  <td>London</td>
					  <td>47</td>
					  <td>2011/03/21</td>
					  <td>$356,250</td>
					</tr>
					<tr>
					  <td>Lael Greer</td>
					  <td>Systems Administrator</td>
					  <td>London</td>
					  <td>21</td>
					  <td>2009/02/27</td>
					  <td>$103,500</td>
					</tr>
					<tr>
					  <td>Jonas Alexander</td>
					  <td>Developer</td>
					  <td>San Francisco</td>
					  <td>30</td>
					  <td>2010/07/14</td>
					  <td>$86,500</td>
					</tr>
					<tr>
					  <td>Shad Decker</td>
					  <td>Regional Director</td>
					  <td>Edinburgh</td>
					  <td>51</td>
					  <td>2008/11/13</td>
					  <td>$183,000</td>
					</tr>
					<tr>
					  <td>Michael Bruce</td>
					  <td>Javascript Developer</td>
					  <td>Singapore</td>
					  <td>29</td>
					  <td>2011/06/27</td>
					  <td>$183,000</td>
					</tr>
					<tr>
					  <td>Donna Snider</td>
					  <td>Customer Support</td>
					  <td>New York</td>
					  <td>27</td>
					  <td>2011/01/25</td>
					  <td>$112,000</td>
					</tr>
				  </tbody>
				</table>			
			</div>
		  </div>
		<script type="text/javascript">$('#sampleTable').DataTable(
																{
																	"pagingType": "numbers",
																	"pageLength": 5,
																	"numbersLength": 3
																}
															);
		</script>  
		<?php
	}
	
	
	

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

}
?>