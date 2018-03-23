<?php
class Dao{

	private $local = "localhost";
	private $usuario = "root";
	private $senha  = "";
	private $banco = "compras";

	public function __construct(){}

	public function __destruct(){}
	
	public function conectarBanco(){
		$conexao = mysqli_connect($this->local,$this->usuario,$this->senha) or die( "nao foi possivel conectar" );
		mysqli_set_charset($conexao,"utf8");

		mysqli_select_db($conexao,$this->banco) or die ("Nao foi possivel selecionar o banco de dados");
		return $conexao;
	}

	public function fecharBanco($conexao){
		mysqli_close($conexao);
	}
	
	public function consultar($tabela, $filter = null){
		$conexao = $this->conectarBanco();
		$sql = "SELECT * FROM `$tabela` $filter";
		$query = mysqli_query($conexao, $sql) or die('Erro na execução da query!');
		$this->fecharBanco($conexao);
		return $query;
	}
	
    public function consultarDados($tabela) {
        try {
			$query = $this->consultar($tabela);
			$dados = array();
			while ($dado = mysqli_fetch_object($query)) {
				array_push($dados, $dado);	
			}
			return $dados;
			
        } catch (Exception $e) {
			return $e;
        }
    }	

    public function consultarCampos($tabela) {
        try {
			$query = $this->consultar($tabela);
            $objetos = array();       
			$retorno = new StdClass(); 

			$campos = $tipos = array();
			for ($i = 0; $i < mysqli_num_fields($query); $i++) {
				$campoInfo = mysqli_fetch_field_direct($query,$i);
				$objetos = explode("_",$campoInfo->name);

				$campo = new StdClass(); 
				$campo->prefixo = $objetos[0];
				$campo->campo = $objetos[1];
				$campo->nome = $campoInfo->name;

				array_push($campos, $campo);				
			}
			return $campos;
			
        } catch (Exception $e) {
			return $e;
        }
    }

}
?>