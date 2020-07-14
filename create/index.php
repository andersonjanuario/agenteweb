<?php 
	require_once "base.php";
	
	function listarSessao(){
		$conexao = conectarBanco ();
		$sql = "SELECT `id`, `secao` FROM `tb_agenteweb_classe` ";
		$query = mysqli_query ( $conexao, $sql ) or die ( 'Erro na verificação da classe!' );
		while ( $obj = mysqli_fetch_object ( $query ) ) {
			$classe = new stdClass();
			$classe->id = $obj->id;
			$classe->secao = $obj->secao;
			$list[] = $classe;
		}
		fecharBanco ( $conexao );
		return $list;
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Form Samples - Vali Admin</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Main CSS-->
<link rel="stylesheet" type="text/css" href="../css/main.css">
<!-- Font-icon css-->
<link rel="stylesheet" type="text/css"
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="../img/favicon.ico" />
</head>
<body class="app sidebar-mini rtl">
	<div id="retorno"></div>
	<nav>
		<div class="nav nav-tabs" id="nav-tab" role="tablist">
			<a class="nav-item nav-link active" id="nav-home-tab"
				data-toggle="tab" href="#nav-home" role="tab"
				aria-controls="nav-home" aria-selected="true">Incluir Sessão</a> 
			<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
				href="#nav-profile" role="tab" aria-controls="nav-profile"
				aria-selected="false">Remover Sessão</a>
			<a class="nav-item nav-link" id="nav-list-tab" data-toggle="tab"
				href="#nav-list" role="tab" aria-controls="nav-list"
				aria-selected="false">Listar Sessões</a>
		</div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade show active" id="nav-home" role="tabpanel"
			aria-labelledby="nav-home-tab">

			<div class="row">
				<div class="col-md-12">
					<div class="tile">
						<h3 class="tile-title">
							Gerar de Sessão&nbsp;&nbsp;&nbsp;&nbsp;
							<button class="btn btn-primary" onClick="incluir();"
								type="button">
								<i class="fa fa-fw fa-lg fa-check-circle"></i>Criar
							</button>
						</h3>
						<div class="tile-body">
							<form class="row" id="form-install">
								<div class="form-group col-md-6">
									<label class="control-label">Nome da Sessão</label> <input
										class="form-control" type="text" name="sessao" id="sessao"
										onkeyup="this.value=this.value.capitalize();">
								</div>
								<div class="row col-md-12">

									<div class="form-group col-md-2">
										<label class="control-label">Nome do Campo</label> <input
											class="form-control" type="text" name="campo" id="campo"
											onkeyup="this.value=this.value.toLowerCase();">
									</div>
									<div class="form-group col-md-2">
										<label class="control-label">Tipo do Campo</label> <select
											id="tipo" name="tipo" class="mgs_alerta form-control"
											onchange="checarTipoCampo(this)">
											<option value="text">Texto Simples</option>
											<option value="number">Campo Númerico</option>
											<option value="textarea">Área de Texto</option>
											<option value="imagem">Update de Imagem</option>
											<option value="arquivo">Update de Arquivo</option>
											<option value="data">Campo de Data</option>
											<option value="radio-button">Campo de Radio-button</option>
											<option value="check-box">Campo de Check-box</option>
											<option value="select">Combo de Seleção</option>
										</select>
									</div>
									<div class="animated-radio-button col-md-2">
										<label class="control-label">Exibirar na Grid?</label> <br />
										<label> <input type="radio" name="grid" checked="checked"
											value="1"><span class="label-text">Sim</span>&nbsp;&nbsp;
										</label><br /> <label> <input type="radio" name="grid"
											value="0"><span class="label-text">Não</span>
										</label>
									</div>
									<div class="animated-radio-button col-md-2">
										<label class="control-label">Obrigatório</label> <br /> <label>
											<input type="radio" name="obrigatorio" checked="checked"
											value="1"><span class="label-text">Sim</span>&nbsp;&nbsp;

										</label><br /> <label> <input type="radio" name="obrigatorio"
											value="0"><span class="label-text">Não</span>
										</label>
									</div>
									<div class="form-group col-md-2">
										<label class="control-label">Tamanho Campo</label> <input
											class="form-control" type="number" id="tamanho"
											name="tamanho" value="50" onkeyup="this.value=this.value.toLowerCase();">
									</div>
									<div class="form-group col-md-2">
										<label class="control-label">&nbsp; &nbsp;</label><br />
										<button class="btn btn-primary" type="button"
											onClick="addCampos();">
											<i class="fa fa-fw fa-lg fa-check-circle"></i>Adicionar
											Campos
										</button>
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
								<th>Obrigatório</th>
								<th>Tamanho</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody id="formCampos">
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="nav-profile" role="tabpanel"
			aria-labelledby="nav-profile-tab">
			<div class="row">
				<div class="col-md-12">
					<div class="tile">
						<h3 class="tile-title">
							Remover Sessão Existente&nbsp;&nbsp;&nbsp;&nbsp;
							<button class="btn btn-primary" onClick="remover();"
								type="button">
								<i class="fa fa-fw fa-lg fa-check-circle"></i>Remover
							</button>
						</h3>
						<div class="tile-body">
							<form class="row" id="form-install">
								<div class="form-group col-md-6">
									<label class="control-label">Nome da Sessão</label> <select
										id="sessao_remove" name="sessao_remove" value="" class="form-control">
										<?php
											foreach (listarSessao() as $classe) {
												echo "<option value=" . $classe->secao . ">" . $classe->secao . "</option>";
											}											
										?>	                        			
	                     			</select>
									<!-- input class="form-control" type="text" name="sessao" id="sessao" onkeyup="this.value=this.value.capitalize();"-->
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered">
						<thead>
							<tr scope="row">
								<th scope="col">id</th>
								<th scope="col">Sessão</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach (listarSessao() as $classe) {
							?>
								<tr>
									<td scope="row"><?php echo $classe->id; ?></td>
									<td><?php echo $classe->secao; ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- Essential javascripts for application to work-->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<!-- The javascript plugin to display page loading on top-->
	<script src="../js/plugins/pace.min.js"></script>
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
				if(validar() === true){
					totalCampos++;
					var objeto = {  id: totalCampos,
									campo: $("#campo").val(),
									tipo: $("#tipo").val(),
									grid: $('input[name=grid]:checked').val(),
									obrigatorio: $('input[name=obrigatorio]:checked').val(),
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
				}else{
					alert('Os campos obrigatórios devem ser preechidos!');	
				}
            }
			
			function validar(){
				var retorno = true;
				if($("#campo").val() === ''){
					retorno = false;
				}else if(($("#tipo").val() === 'text' || $("#campo").val() === 'select') && $("#tamanho").val() === ''){
					retorno = false;
				}
				return retorno;
			}
			
			function checarTipoCampo(elemento){
				switch($(elemento).val()){
					case 'text':
						$('#tamanho').prop('disabled', false);					
					break;
					case 'select':
						$('#tamanho').prop('disabled', false);					
					break;					
					default:
						$('#tamanho').val('');
						$('#tamanho').prop('disabled', true);
					break;	
				}
			}


            function incluir(){
                $.ajax({
                    url: 'install.php?op=1',
                    type: 'POST',
                    data: JSON.stringify({ 
                        'sessao': $("#sessao").val(),
                        'campos':campos
                    }),
                    success: function(result) {
                        $('#retorno').html(result);
                    	//document.location.reload(true);
                    },
                    beforeSend: function() {},
                    complete: function() {}
                });
            }

			String.prototype.capitalize = function() {
				return this.charAt(0).toUpperCase() + this.slice(1).toLowerCase();
			}
		
            function remover(){
                $.ajax({
                    url: 'remove.php?op=1',
                    type: 'POST',
                    data: JSON.stringify({ 
                        'sessao': $("#sessao_remove").val()                        
                    }),
                    success: function(result) {
                        $('#retorno').html(result);
                    	document.location.reload(true);
                    },
                    beforeSend: function() {},
                    complete: function() {}
                });
            }
        </script>
</body>

</html>
