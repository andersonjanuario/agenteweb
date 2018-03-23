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
					FROM tb_conteudo_template c
					WHERE status = '1'";
            $sql .= ($id != null) ? " AND id = " . $id : "";
            $query = mysqli_query($conexao, $sql) or die('Erro na execução do listar!');
            while ($objetoTemplate = mysqli_fetch_object($query)) {

                $template = new Template();

                $template->setId($objetoTemplate->id);
                $template->setTitulo($objetoTemplate->titulo);
                $template->setDescricao($objetoTemplate->descricao);                
                $template->setDataCadastro($objetoTemplate->data_cadastro);
                $template->setDataModificacao($objetoTemplate->data_modificacao);
                $template->setStatus($objetoTemplate->status);

                $retorno[] = $template;
            }
            $this->fecharBanco($conexao);;
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function incluirTemplate($template) {
        try {
            $conexao = $this->conectarBanco();
            
            $sql = "INSERT INTO tb_conteudo_template (  id,
                                                        titulo,
                                                        descricao,                                                        
                                                        data_cadastro,
                                                        status
                                                        )VALUES(
                                                        NULL , 
                                                        '" . $template->getTitulo() . "', 
                                                        '" . $template->getDescricao() . "',                                                         
                                                        NOW(), 
                                                        '" . $template->getStatus() . "')";

            //debug($sql);
            $retorno = mysqli_query($conexao, $sql) or die('Erro na execução do insert!');
            $this->fecharBanco($conexao);;
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function alterarTemplate($template) {
        try {

            $conexao = $this->conectarBanco();
            $sql = "UPDATE tb_conteudo_template SET titulo = '" . $template->getTitulo() . "',
													descricao = '" . $template->getDescricao() . "',											
													data_modificacao = NOW(),
													status = '1' 
												WHERE id = " . $template->getId() . "";


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