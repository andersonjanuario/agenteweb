<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Website Admin</title>
<!--link href="css/login-box.css" rel="stylesheet" type="text/css" /-->
</head>
<body>
	<div id="msgSlide" class="msgSlide"></div>
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="js/lib.js" type="text/javascript" ></script>
	<link type="text/css" rel="stylesheet" href="css/login-box.css">
	<script type="text/javascript">
		$(document).ready(function(){
			$('#divLogin').css('padding','100px 0 0 '+((screen.width/2)-242)+'px');
		});
		/*
		var mensagem = "<?php echo ($_GET["m"])?$_GET["m"]:"";?>";
		var invalido = "<?php echo ($_GET["i"])?$_GET["i"]:"";?>";  
		if(mensagem != ""){
			//$.grow2UI('Área restrita!', '&nbsp;');	
			//$('#msgSlide').html('<span>Área restrita!</span>');
			//$('#msgSlide').slideDown('slow', function() {
        	//	setTimeout("$('#msgSlide').slideUp('slow')",3000);
	        //});
						
		}else if(invalido != ""){
			//$.grow2UI('Usuário ou senha invalidos!', '&nbsp;');	
			
			$('#msgSlide').html('<span>Usuário ou senha invalidos!</span>');
			$('#msgSlide').slideDown('slow', function() {
	        	setTimeout("$('#msgSlide').slideUp('slow')",3000);
	        });
		}
		*/
	</script>
	<script language="JavaScript">
		function enterPressed(evn) {
			if (window.event && window.event.keyCode == 13) {
			 	$('.formLogin').click();
			} else if (evn && evn.keyCode == 13) {
				$('.formLogin').click();				   
			}
		}
		document.onkeypress = enterPressed;
	</script>
	<div id="divLogin" style="padding: 100px 0 0 250px;">
		<div id="login-box">
			<form action="login.php" method="post" name="formLogin" id="formLogin" >
			<input type="hidden" name="retorno" id="retorno" value="msgSlide"/>
			<input type="hidden" name="controlador" id="controlador" value="ControladorLogin"/>
			<input type="hidden" name="funcao" id="funcao" value="validarLogin"/>
			<input type="hidden" name="mensagem" id="mensagem" value="10"/>
				
				<h2>Conteudo</h2>Informe o Usuário e senha!<br /><br />
				
				<div id="login-box-name" style="margin-top:20px;">Usuário:</div>
				<div id="login-box-field" style="margin-top:20px;">
					<input name="login" id="login"  class="form-login" title="Username" value="" size="30" maxlength="2048" />
				</div>
				<div id="login-box-name">Senha:</div>
				<div id="login-box-field">
					<input name="senha" id="senha"  type="password" class="form-login" title="Password" value="" size="30" maxlength="2048" />
				</div>
				<!-- <br />
				<span class="login-box-options">
					<input type="checkbox" name="1" value="1"> Remember Me 
					<a href="#" style="margin-left:30px;">Forgot password?</a>
				</span> -->
				<br /><br />
				<a href="#">
					<img src="img/login-btn.png" id="loginbtn" class="formLogin" width="103" height="42" style="margin-left:90px;" />
				</a><br /><br /><br /><br />
				<span style="float:right">
					Versão 1.1.0 Beta
				</span> 
			</form>
		</div>
	</div>
</body>
</html>
