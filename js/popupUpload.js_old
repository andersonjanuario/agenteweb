	var campoGlobal = '';
	var pastaArquivoGlobal = '';
	var tipoArquivoGlobal = '';
	function guardarDados(valor){
		var campo = campoGlobal;
		var pastaArquivo = pastaArquivoGlobal;
		var tipoArquivo = tipoArquivoGlobal;
		var retorno = valor.toString();
		var vRetorno = retorno.split('»');

		if (vRetorno[0] == "00"){
				$('[name='+campo+']').val(vRetorno[1]);
			if (tipoArquivo == "imagem"){
				
				$('[name='+campo+'Link]').attr('id',pastaArquivo + '/' + vRetorno[1]);
				$('[name='+campo+'Atual]').attr('src',pastaArquivo + '/thumbnail' + vRetorno[1]);							
				fnAtualizaIcone(campo, 'atualizar', tipoArquivo,vRetorno[1]);
				
			} else if (tipoArquivo == "arquivo"){
				
				$('[name='+campo+'Atual]').html('<br />'+vRetorno[1]);
				fnAtualizaIcone(campo, 'atualizar', tipoArquivo,vRetorno[1]);
				
			}						
		}
		
	} 			

	function fnInserirArquivo(campo, pastaArquivo, largura,tipoArquivo){

		window.open('popupUpload.php?opcao=0&pastaArquivo='+pastaArquivo+'&largura='+largura+'&tipoArq='+tipoArquivo+'','mywindow','menubar=1,resizable=1,width=482,height=230');
		campoGlobal = campo;
		pastaArquivoGlobal = pastaArquivo;
		tipoArquivoGlobal = tipoArquivo;
	}
	
	
	
   function fnAtualizaIcone(nomeCampo, tipoIcone, tipoArquivo,file){
	   if (tipoIcone == "adicionar"){
			if ($('[name='+tipoArquivo+'Icone]') != null){
				
				$('[name='+tipoArquivo+'Icone]').attr('src',"img/notes-add.gif");
				$('[name='+tipoArquivo+'Icone]').attr('title',"Clique para adicionar");
				
			}
			if (tipoArquivo == "imagem"){

				$('[name='+nomeCampo+']').val(file);
				
			}
			else if (tipoArquivo == "arquivo"){
				//$('span[name='+nomeCampo+'Atual]').addClass("divArquivoOff");
				$('span[name='+nomeCampo+'Atual]').css('cursor','default');
				$('span[name='+nomeCampo+'Atual]').css('text-decoration','none');
				
			}
			return;
		}
		if (tipoIcone == "atualizar"){
			if ($('[name='+tipoArquivo+'Icone]') != null){
				
				$('[name='+tipoArquivo+'Icone]').attr('src',"img/edit-reject.gif");
				$('[name='+tipoArquivo+'Icone]').attr('title',"Clique para adicionar");
				
			}
			if (tipoArquivo == "imagem"){
				
				$('[name='+nomeCampo+']').val(file);
				
			}
			else if (tipoArquivo == "arquivo"){
				//$('span[name='+nomeCampo+'Atual]').addClass("divArquivo");
				$('span[name='+nomeCampo+'Atual]').css('cursor','pointer');
				$('span[name='+nomeCampo+'Atual]').css('text-decoration','underline');
				
			}
			return;
		}
	}

   function fnRemoverArquivo(campo, pastaArquivo,tipoArquivo){
	    
	    arquivo  = $('[name='+campo+']').val();
		if (arquivo == "") return;
		if (!confirm("Tem certeza que deseja realizar a EXCLUSÃO deste arquivo?")) return;
		
		$('[name='+campo+']').val("");
		
		if (tipoArquivo == "imagem"){
			
			$('[name='+campo+'Link]').attr('id','./img/imagemPadrao.jpg');
			$('[name='+campo+'Atual]').attr('src','./img/imagemPadrao.jpg');
			
			fnAtualizaIcone(campo, 'adicionar', tipoArquivo);
		}
		else if (tipoArquivo == "arquivo"){
			
			$('span[name='+campo+'Atual]').html("<br />Adicione um arquivo clicando no <img src='img/notes-add.gif' border='0' /> ao lado.");
			fnAtualizaIcone(campo, 'adicionar', tipoArquivo);
			
		}
		
		$.ajax({
			url:'popupUpload.php',
			type:'GET',
			data:'opcao=2&pastaArquivo='+pastaArquivo+'&arquivo='+arquivo					
		});
		
		
	}
   
   
	function fnAbreArquivo(campo,local){
		arquivo = $('#'+campo).val();
		if (arquivo == "") return;
		window.location = 'download_doc.php?d='+local+'&f='+arquivo;
	}

