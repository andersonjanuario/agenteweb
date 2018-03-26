<?php
class DaoTemplate extends Dados {

    //construtor
    public function __construct() {
        
    }

    //destruidor
    public function __destruct() {
        
    }

    public function listarTemplate($id = null) {
        try {
            $retorno = array();
            $conexao = $this->conectarBanco();
            $sql = "SELECT	id,titulo,descricao,data_cadastro,data_modificacao,status							
					FROM tb_conteudo_template2
					WHERE status = '1'";
            $sql .= ($id != null) ? " AND id = " . $id : "";
            $query = mysqli_query($conexao, $sql) or die('Erro na execução do listar template!');
            while ($objetoTemplate = mysqli_fetch_object($query)) {
                $retorno[] = $objetoTemplate;
            }
            $this->fecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function incluirTemplate($request) {
        try {
            $conexao = $this->conectarBanco();
            
            $sql = "INSERT INTO tb_conteudo_template2 ( id,
                                                        titulo,
                                                        descricao,                                                        
                                                        data_cadastro,
                                                        status
                                                        )VALUES(
                                                        NULL , 
                                                        '" . $request["titulo"] . "', 
                                                        '" . $request["descricao"] . "',                                                         
                                                        NOW(), 
                                                        '1')";

            //debug($sql);
            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do insert!');
            $this->fecharBanco($conexao);;
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function alterarTemplate($request) {
        try {

            $conexao = $this->conectarBanco();
            $sql = "UPDATE tb_conteudo_template SET titulo = '" . $request["titulo"] . "',
													descricao = '" . $request["descricao"] . "',											
													data_modificacao = NOW(),
													status = '1' 
												WHERE id = " . $request["id"] . "";


            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do update!');
            $this->fecharBanco($conexao);;
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function excluirTemplate($id) {
        try {
            $conexao = $this->conectarBanco();

            $sql = "UPDATE tb_conteudo_template SET status = '0' WHERE id = " . $id . "";            
            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do delet!');

            $this->fecharBanco($conexao);;
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }

}

?>