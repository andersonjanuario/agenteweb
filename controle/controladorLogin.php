<?php

class ControladorLogin {

	//construtor
	public function __construct(){}

	//destruidor
	public function __destruct(){}

	
	public function incluirLogin($post){
		try {
			$login = new Login();
			$login->setUsuario($_SESSION["login"]->getId());
			$login->setStatus('1');
			$moduloLogin = new DaoLogin();
			if($moduloLogin->incluirLogin($login)){
				return 1;
			}		
			$moduloLogin->__destruct();
		} catch (Exception $e) {
		}
	}

	
	public function validarLogin($post = null){
		try {
			unset($_SESSION["login"]);
			$post["senha"] = md5($post["senha"]);
			$moduloLogin = new DaoLogin();
			if($moduloLogin->validarLogin($post)){
				if($this->incluirLogin($post)){
					return "<script>javascript:open('main.php', '_top')</script>";
				}
			}else{
				return "<script>javascript:
					        $('#formLogin').each(function() {
					            mensagem = $(this).children('#m4').val();
					            $('#msgSlide').html('<span>Usuário ou senha invalidos!</span>');
					            $('#msgSlide').slideDown('slow', function() {
					                setTimeout(\"$('#msgSlide').slideUp('slow')\", 3000);
					            });
					        });
				</script>";
			}
						
			$moduloLogin->__destruct();
		} catch (Exception $e) {
			return $e;
		}
	}
	
	
	public function logout($post = null){
		try {
			unset($_SESSION["login"]);
			return "<script>javascript:open('index.php', '_top')</script>";			
		} catch (Exception $e) {
			return $e;
		}
	}

	public function ultimoAcesso($id){
		$moduloLogin = new DaoLogin();
		$hora = explode(":", $moduloLogin->ultimoAcesso($id));
		if($hora[0] > 99){
			$retorno = "h&aacute; mais de 99:99:99";
		} else{
			$retorno = $moduloLogin->ultimoAcesso($id);
		}
		return $retorno;
		$moduloLogin->__destruct();
	}

}
?>