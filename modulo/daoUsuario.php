<?php
class DaoUsuario extends Dados{

	//construtor
	public function __construct(){}

	//destruidor
	public function __destruct(){}

	public function listarUsuario($id = null){
		try {	
			$conexao = $this->conectarBanco();
			$retorno = array();
			$sql = "SELECT u.id, u.nome, u.imagem, u.login, u.senha, u.status, u.id_perfil
          			FROM tb_conteudo_usuario u 
					WHERE u.status = '1'";
			$sql .= ($id != null)?" AND u.id = ".$id:"";
			$sql .= " GROUP BY u.id";
			
			
			$query = mysqli_query($conexao,$sql) or die ('Erro na execução do listar!: '. $sql);
			while($objetoUsuario =  mysqli_fetch_object($query)){
				$usuario = new Usuario();
				$usuario->setId($objetoUsuario->id);
				$usuario->setNome($objetoUsuario->nome);
				$usuario->setImagem($objetoUsuario->imagem);
				$usuario->setLogin($objetoUsuario->login);
				$usuario->setSenha($objetoUsuario->senha);
				$usuario->setPerfil($objetoUsuario->id_perfil);				
				$usuario->setStatus($objetoUsuario->status);
				
				$retorno[] = $usuario; 
			}
				$this->FecharBanco($conexao);
				return $retorno;
		} catch (Exception $e) {
			return $e;
		}
	}
	
	
        public function listarUsuarioLogin($id = null){
		try {	
			$retorno = array();
			$conexao = $this->conectarBanco();
			$sql = "SELECT u.id, u.nome, u.imagem, u.login, u.senha, u.status, u.id_perfil              				
          			FROM tb_conteudo_usuario u WHERE u.status = '1'";
			$sql .= ($id != null)?" AND u.id = ".$id:"";
			$sql .= " GROUP BY u.id";
			
			
			$query = mysqli_query($conexao,$sql) or die ('Erro na execução do listar!');
			while($objetoUsuario =  mysqli_fetch_object($query)){
				$usuario = new Usuario();
				$usuario->setId($objetoUsuario->id);
				$usuario->setNome($objetoUsuario->nome);
				$usuario->setImagem($objetoUsuario->imagem);
				$usuario->setLogin($objetoUsuario->login);
				$usuario->setSenha($objetoUsuario->senha);
				$usuario->setPerfil($objetoUsuario->id_perfil);				
				$usuario->setStatus($objetoUsuario->status);
				
				$retorno = $usuario; 
			}
				$this->FecharBanco($conexao);
				return $retorno;
		} catch (Exception $e) {
			return $e;
		}
	}

        
	public function incluirUsuario($usuario){
		try {	
			$conexao = $this->conectarBanco();
			$sql = "INSERT INTO tb_conteudo_usuario(nome,imagem,login,senha,id_perfil,status) VALUES ('".$usuario->getNome()."','".$usuario->getImagem()."','".$usuario->getLogin()."','".$usuario->getSenha()."','".$usuario->getPerfil()."','".$usuario->getStatus()."')";
//			mysqli_query($conexao,$sql) or die ('Erro na execução  do insert!');
//			$usuario->setId(mysql_insert_id());
//			$sql = "INSERT INTO tb_conteudo_usuario_empresa (id_usuario,id_empresa) VALUES ('".$usuario->getId()."','".$usuario->getEmpresa()."')";
			$retorno = mysqli_query($conexao,$sql) or die ('Erro na execução do insert relacional!');
			$this->FecharBanco($conexao);
			return $retorno;
		} catch (Exception $e) {
			return $e;
		}
	}

        
	public function alterarUsuario($usuario){
		try {	

			$conexao = $this->conectarBanco();
			$sql = "UPDATE tb_conteudo_usuario SET  
					nome = '".$usuario->getNome()."',
					imagem = '".$usuario->getImagem()."',
					login = '".$usuario->getLogin()."',
					senha = '".$usuario->getSenha()."',
					id_perfil = '".$usuario->getPerfil()."',
					status = '".$usuario->getStatus()."' 
					WHERE id =".$usuario->getId()."";
			$retorno = mysqli_query($conexao,$sql) or die ('Erro na execução do update relacional!');
			$this->FecharBanco($conexao);                        
			return $retorno;
		} catch (Exception $e) {
			return $e;
		}
	}

        
	public function excluirUsuario($id){
		try {
			$conexao = $this->conectarBanco();
			$sql = "UPDATE tb_conteudo_usuario SET status = '0' WHERE id =".$id."";
			$retorno = mysqli_query($conexao,$sql) or die ('Erro na execução do delet!');
			$this->FecharBanco($conexao);
			return $retorno;
		} catch (Exception $e) {
			return $e;
		}

	}

//	public function validaUsuarioEmpresa($usuario){
//		try {	
//			$conexao = $this->conectarBanco();
//			$sql = "SELECT ue.id as id_usuario_empresa FROM tb_conteudo_usuario_empresa ue WHERE ue.id_usuario = ".$usuario->getId()." AND ue.id_empresa = ".$usuario->getEmpresa()->getId()."";
//			
//			$query = mysqli_query($conexao,$sql) or die ('Erro na execução do listar!');
//			if($objetoUsuario =  mysqli_fetch_object($query)){
//				$retorno = $objetoUsuario->id_usuario_empresa; 
//			}
//			$this->FecharBanco($conexao);
//			return $retorno;
//		} catch (Exception $e) {
//			return $e;
//		}	
//	} 


}

?>