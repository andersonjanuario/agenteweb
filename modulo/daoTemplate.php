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
            $sql = "SELECT	c.id,c.nome,c.sexo,c.profissao,c.faixa_salarial,c.data_nascimento,c.cpf,c.imagem,c.arquivo,
							c.logradouro,c.numero,c.cep,c.estado,c.telefone_residencial,
							c.email,c.data_cadastro,c.data_modificacao,c.id_pais,p1.nome as nome_pais,c.status							
							FROM tb_conteudo_template c 							
							LEFT JOIN tb_conteudo_pais p1 ON (c.id_pais = p1.id)
					WHERE c.status = '1'";
            $sql .= ($id != null) ? " AND c.id = " . $id : "";
            $query = mysqli_query($conexao,$sql) or die('Erro na execução do listar!');
            while ($objetoTemplate = mysqli_fetch_object($query)) {

                $template = new Template();

                $template->setId($objetoTemplate->id);
                $template->setNome($objetoTemplate->nome);
                $template->setSexo($objetoTemplate->sexo);                
                $template->setProfissao($objetoTemplate->profissao);
                $template->setFaixaSalarial($objetoTemplate->faixa_salarial);
                $template->setDataNascimento($objetoTemplate->data_nascimento);
                $template->setCpf($objetoTemplate->cpf);                
                $template->setImagem($objetoTemplate->imagem);
                $template->setArquivo($objetoTemplate->arquivo);

                $template->setLogradouro($objetoTemplate->logradouro);
                $template->setNumero($objetoTemplate->numero);
                $template->setCep($objetoTemplate->cep);
                $template->setEstado($objetoTemplate->estado);

                $template->setTelefoneResidencial($objetoTemplate->telefone_residencial);
                $template->setEmail($objetoTemplate->email);
                $template->setDataCadastro($objetoTemplate->data_cadastro);
                $template->setDataModificacao($objetoTemplate->data_modificacao);
                $template->setStatus($objetoTemplate->status);

                $pais = new Pais();
                $pais->setId($objetoTemplate->id_pais);
                $pais->setNome($objetoTemplate->nome_pais);

                $template->setPais($pais);

                $retorno[] = $template;
            }
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function incluirTemplate($template) {
        try {
            $conexao = $this->conectarBanco();
            
            $sql = "INSERT INTO tb_conteudo_template (  id,
                                                        nome,
                                                        sexo,                                                        
                                                        profissao,
                                                        faixa_salarial,
                                                        data_nascimento,
                                                        cpf,                                                        
                                                        imagem,
                                                        arquivo,
                                                        logradouro,
                                                        numero,                                                        
                                                        cep,
                                                        estado,
                                                        telefone_residencial,                                                        
                                                        email,
                                                        data_cadastro,
                                                        id_pais,												
                                                        status
                                                        )VALUES(
                                                        NULL , 
                                                        '" . $template->getNome() . "', 
                                                        '" . $template->getSexo() . "',                                                         
                                                        '" . $template->getProfissao() . "', 
                                                        '" . $template->getFaixaSalarial() . "', 
                                                        '" . $template->getDataNascimento() . "', 
                                                        '" . $template->getCpf() . "',                                                         
                                                        '" . $template->getImagem() . "', 
                                                        '" . $template->getArquivo() . "',
                                                        '" . $template->getLogradouro() . "', 
                                                        '" . $template->getNumero() . "',                                                         
                                                        '" . $template->getCep() . "', 
                                                        '" . $template->getEstado() . "', 
                                                        '" . $template->getTelefoneResidencial() . "',                                                         
                                                        '" . $template->getEmail() . "', 
                                                        NOW(), 
                                                        '" . $template->getPais() . "', 												
                                                        '" . $template->getStatus() . "')";

            //debug($sql);
            $retorno = mysqli_query($conexao,$sql) or die('Erro na execução do insert!');
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function alterarTemplate($template) {
        try {

            $conexao = $this->conectarBanco();
            $sql = "UPDATE tb_conteudo_template SET nome = '" . $template->getNome() . "',
											sexo = '" . $template->getSexo() . "',											
											profissao = '" . $template->getProfissao() . "',
											faixa_salarial = '" . $template->getFaixaSalarial() . "',
											data_nascimento = '" . $template->getDataNascimento() . "',
											cpf = '" . $template->getCpf() . "',											
											imagem = '" . $template->getImagem() . "',
                                                                                        arquivo = '" . $template->getArquivo() . "',
											logradouro = '" . $template->getLogradouro() . "',
											numero = '" . $template->getNumero() . "',											
											cep = '" . $template->getCep() . "',
											estado = '" . $template->getEstado() . "',
											telefone_residencial = '" . $template->getTelefoneResidencial() . "',											
											email = '" . $template->getEmail() . "',
											data_modificacao = NOW(),
											id_pais = '" . $template->getPais() . "',
											status = '1' WHERE id = " . $template->getId() . "";


            $retorno = mysqli_query($conexao,$sql) or die('Erro na execução do update!');
            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function excluirTemplate($id) {
        try {
            $conexao = $this->conectarBanco();

            $sql = "UPDATE tb_conteudo_template SET status = '0' WHERE id = " . $id . "";            
            $retorno = mysqli_query($conexao,$sql) or die('Erro na execução do delet!');

            $this->FecharBanco($conexao);
            return $retorno;
        } catch (Exception $e) {
            return $e;
        }
    }

}

?>