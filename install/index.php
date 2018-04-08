    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Form Samples - Vali Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body class="app sidebar-mini rtl">
		<div id="retorno"></div>
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
                                        <option value="textarea">textarea</option>
										<option value="imagem">imagem</option>
										<option value="arquivo">arquivo</option>
										<option value="data">data</option>
										<option value="radio-button">radio-button</option>
										<option value="check-box">check-box</option>
										<option value="select">select</option>										
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
                        $('#retorno').html(result);
                    },
                    beforeSend: function() {},
                    complete: function() {}
                });
            }
        </script>
    </body>

    </html>
