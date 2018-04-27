<?php
function tamanhoImagem($imagem, $largura) {
    $tam_img = getimagesize($imagem);
    if ($tam_img[0] > $largura) {
        return false;
    } else {
        return true;
    }
}

function redimensionaImg($path, $imagem, $largura) {
    $arquivo_origem = $path . '/' . $imagem;
    $arquivo_destino = $arquivo_origem;
    $nome_arquivo_destino = $imagem;
	$ext = exif_imagetype($arquivo_origem);
	
    if ($ext === 2) {
        $img_origem = imagecreatefromjpeg($arquivo_origem);
    }
    if ($ext === 1) {
        $img_origem = imagecreatefromgif($arquivo_origem);
    }
    if ($ext === 3) {
        $img_origem = imagecreatefrompng($arquivo_origem);
    }

    if (imagesx($img_origem) > $largura) {
        $nova_largura = $largura;
        $nova_altura = $nova_largura * imagesy($img_origem) / imagesx($img_origem);
        $img_destino = imagecreatetruecolor($nova_largura, $nova_altura);
        imagecopyresampled($img_destino, $img_origem, 0, 0, 0, 0, $nova_largura, $nova_altura, imagesx($img_origem), imagesy($img_origem));

        if ($ext === 2) {
            imageJPEG($img_destino, $arquivo_destino, 85);
        }
        if ($ext === 1) {
            imageGIF($img_destino, $arquivo_destino);
        }
        if ($ext === 3) {
            imagePNG($img_destino, $arquivo_destino);
        }
    }

    return $nome_arquivo_destino;
}

function geraThumb($path, $imagem) {
    $arquivo_origem = $path . $imagem;
    $arquivo_destino = $path . 'thumbnail' . $imagem;
    $nome_arquivo_destino = 'thumbnail' . $imagem;
	$ext = exif_imagetype($arquivo_origem);
	
    if ($ext === 2) {
        $img_origem = imagecreatefromjpeg($arquivo_origem);
    }
    if ($ext === 1) {
        $img_origem = imagecreatefromgif($arquivo_origem);
    }
    if ($ext === 3) {
        $img_origem = imagecreatefrompng($arquivo_origem);
    }

    if (imagesx($img_origem) > $largura) {
        if (imagesx($img_origem) > imagesy($img_origem)) {
            $nova_largura = 100;
            $nova_altura = $nova_largura * imagesy($img_origem) / imagesx($img_origem);
        } else {
            $nova_altura = 75;
            $nova_largura = $nova_altura * imagesx($img_origem) / imagesy($img_origem);
        }
        if ($nova_largura > 350)
            $nova_largura = 350;
        $img_destino = imagecreatetruecolor($nova_largura, $nova_altura);
        imagecopyresampled($img_destino, $img_origem, 0, 0, 0, 0, $nova_largura, $nova_altura, imagesx($img_origem), imagesy($img_origem));

        if ($ext === 2) {
            imageJPEG($img_destino, $arquivo_destino, 85);
        }
        if ($ext === 1) {
            imageGIF($img_destino, $arquivo_destino);
        }
        if ($ext === 3) {
            imagePNG($img_destino, $arquivo_destino);
        }
    }

    return $nome_arquivo_destino;
}

function setImagemFile($imagem,$path) {

	if (strstr($imagem, 'data:image/jpeg;base64,') || strstr($imagem, 'data:image/jpg;base64,')) {
		$base64 = str_replace('data:image/jpeg;base64,', '', $imagem);
		$filename_path = md5(time() . uniqid()) . ".jpg";
	} else if (strstr($imagem, 'data:image/png;base64,')) {
		$base64 = str_replace('data:image/png;base64,', '', $imagem);
		$filename_path = md5(time() . uniqid()) . ".png";
	}
	$decoded = base64_decode($base64);
	file_put_contents($path . $filename_path, $decoded);
	//geraThumb($path, $filename_path); 
	if (!tamanhoImagem($path . $filename_path, 640)) {
		redimensionaImg($path, $filename_path, 640);
	}	
	return $filename_path;
}

function validarImagem($imagem) {
	$retorno = true;
	if (strripos($imagem, 'data:image') === false) {
		$retorno = false;
	}
	return $retorno;
}

function deleteImagem($id,$posicao,$path) {
	$item = $this->findUserById($id,true);
	switch ($posicao) {
		case 1:
			$arquivoExclusao = $item->foto;
			break;
		case 2:
			$arquivoExclusao = $item->fundo;
			break;            
	}       

	if (!empty($arquivoExclusao)) {
		if (file_exists($path . $arquivoExclusao)) {
			unlink($path . $arquivoExclusao);
		}
	}
}  

function selecao($valor1, $valor2) {
    $selecao = "";
    if (($valor1 == "" && $valor2 == 1) || ($valor1 == $valor2)) {
        $selecao = "selected='selected'";
    }
    return $selecao;
}


function montaSelectEstados($valorSelecao) {
    $selectEstados = "";
    $selectEstados .= "<option value='AC' " . selecao('AC', $valorSelecao) . ">AC</option>";
    $selectEstados .= "<option value='AL' " . selecao('AL', $valorSelecao) . ">AL</option>";
    $selectEstados .= "<option value='AM' " . selecao('AM', $valorSelecao) . ">AM</option>";
    $selectEstados .= "<option value='AP' " . selecao('AP', $valorSelecao) . ">AP</option>";
    $selectEstados .= "<option value='BA' " . selecao('BA', $valorSelecao) . ">BA</option>";
    $selectEstados .= "<option value='CE' " . selecao('CE', $valorSelecao) . ">CE</option>";
    $selectEstados .= "<option value='DF' " . selecao('DF', $valorSelecao) . ">DF</option>";
    $selectEstados .= "<option value='ES' " . selecao('ES', $valorSelecao) . ">ES</option>";
    $selectEstados .= "<option value='GO' " . selecao('GO', $valorSelecao) . ">GO</option>";
    $selectEstados .= "<option value='MA' " . selecao('MA', $valorSelecao) . ">MA</option>";
    $selectEstados .= "<option value='MG' " . selecao('MG', $valorSelecao) . ">MG</option>";
    $selectEstados .= "<option value='MS' " . selecao('MS', $valorSelecao) . ">MS</option>";
    $selectEstados .= "<option value='MT' " . selecao('MT', $valorSelecao) . ">MT</option>";
    $selectEstados .= "<option value='PA' " . selecao('PA', $valorSelecao) . ">PA</option>";
    $selectEstados .= "<option value='PB' " . selecao('PB', $valorSelecao) . ">PB</option>";
    $selectEstados .= "<option value='PE' " . selecao('PE', $valorSelecao) . ">PE</option>";
    $selectEstados .= "<option value='PI' " . selecao('PI', $valorSelecao) . ">PI</option>";
    $selectEstados .= "<option value='PR' " . selecao('PR', $valorSelecao) . ">PR</option>";
    $selectEstados .= "<option value='RJ' " . selecao('RJ', $valorSelecao) . ">RJ</option>";
    $selectEstados .= "<option value='RN' " . selecao('RN', $valorSelecao) . ">RN</option>";
    $selectEstados .= "<option value='RO' " . selecao('RO', $valorSelecao) . ">RO</option>";
    $selectEstados .= "<option value='RR' " . selecao('RR', $valorSelecao) . ">RR</option>";
    $selectEstados .= "<option value='RS' " . selecao('RS', $valorSelecao) . ">RS</option>";
    $selectEstados .= "<option value='SC' " . selecao('SC', $valorSelecao) . ">SC</option>";
    $selectEstados .= "<option value='SE' " . selecao('SE', $valorSelecao) . ">SE</option>";
    $selectEstados .= "<option value='SP' " . selecao('SP', $valorSelecao) . ">SP</option>";
    $selectEstados .= "<option value='TO' " . selecao('TO', $valorSelecao) . ">TO</option>";
    return $selectEstados;
}

function valor01($valor) {
    $valor1 = $valor;
    switch ($valor) {
        case "0": $valor1 = "00";
            break;
        case "1": $valor1 = "01";
            break;
        case "2": $valor1 = "02";
            break;
        case "3": $valor1 = "03";
            break;
        case "4": $valor1 = "04";
            break;
        case "5": $valor1 = "05";
            break;
        case "6": $valor1 = "06";
            break;
        case "7": $valor1 = "07";
            break;
        case "8": $valor1 = "08";
            break;
        case "9": $valor1 = "09";
            break;
    }
    return $valor1;
}

/**
 * Função reponsavel para converter de Float para Monetario ou Monetario para Float
 * @author Deibson Anderson
 * @param $valor
 * @param $conversão 1 para versao US 2 para versão BR
 * @throws 
 * @return retorna o valor convertido.
 * @version 1.0.0
 * @since 1.1.6
 */
function valorMonetario($valor, $conversao) {
    switch ($conversao) {
        case "1":
            $valor = str_replace(" ", "", $valor);
            $valor = str_replace(".", "", $valor);
            $valor = str_replace(",", ".", $valor);
            break;

        case "2":
            $valor = str_replace(" ", "", $valor);
            $valor = str_replace(",", "", $valor);
            $valor = str_replace(".", ",", $valor);
            break;
    }
    return $valor;
}

/**
 * 
 * Função reponsavel Retornar a String que reprensenta o Sexo
 * @param unknown_type $string
 * @param unknown_type $conversao
 */
function retornarSexo($sexo) {
    if ($sexo) {
        switch ($sexo) {
            case "M":
                $sexo = "Masculino";
                break;
            case "F":
                $sexo = "Feminino";
                break;
        }
        return $sexo;
    }
}


function desformataData($date) {

    if ($date == "") {
        return "";
    }
    $ano = substr($date, 6, 4);
    $mes = substr($date, 3, 2);
    $dia = substr($date, 0, 2);
    return $ano . "-" . $mes . "-" . $dia;
}

function recuperaData($date) {
    if ($date == "") {
        return "";
    }
    $ano = substr($date, 0, 4);
    $mes = substr($date, 5, 2);
    $dia = substr($date, 8, 2);

    return $dia . "/" . $mes . "/" . $ano;
}

function recuperaDataHora($date) {
    if ($date == "") {
        return "";
    }
    $ano = substr($date, 0, 4);
    $mes = substr($date, 5, 2);
    $dia = substr($date, 8, 2);
    $hora = substr($date, 10, 9);
    return $dia . "/" . $mes . "/" . $ano . " " . $hora;
}

function montaEstadoCivil($valorSelecao) {
    $selectEstados .= "<option value='S' " . selecao('S', $valorSelecao) . ">SOLTEIRO(A)</option>";
    $selectEstados .= "<option value='C' " . selecao('C', $valorSelecao) . ">CASADO(A)</option>";
    $selectEstados .= "<option value='E' " . selecao('E', $valorSelecao) . ">SEPARADO(A)</option>";
    $selectEstados .= "<option value='D' " . selecao('D', $valorSelecao) . ">DIVORCIADO(A)</option>";
    $selectEstados .= "<option value='V' " . selecao('V', $valorSelecao) . ">VIÚVO(A)</option>";
    return $selectEstados;
}

function montaMes($valorSelecao) {
    $selectMes .= "<option value='01' " . selecao('01', $valorSelecao) . ">JANEIRO</option>";
    $selectMes .= "<option value='02' " . selecao('02', $valorSelecao) . ">FEVEREIRO</option>";
    $selectMes .= "<option value='03' " . selecao('03', $valorSelecao) . ">MARÇO</option>";
    $selectMes .= "<option value='04' " . selecao('04', $valorSelecao) . ">ABRIL</option>";
    $selectMes .= "<option value='05' " . selecao('05', $valorSelecao) . ">MAIO</option>";
    $selectMes .= "<option value='06' " . selecao('06', $valorSelecao) . ">JUNHO</option>";
    $selectMes .= "<option value='07' " . selecao('07', $valorSelecao) . ">JULHO</option>";
    $selectMes .= "<option value='08' " . selecao('08', $valorSelecao) . ">AGOSTO</option>";
    $selectMes .= "<option value='09' " . selecao('09', $valorSelecao) . ">SETEMBRO</option>";
    $selectMes .= "<option value='10' " . selecao('10', $valorSelecao) . ">OUTUBRO</option>";
    $selectMes .= "<option value='11' " . selecao('11', $valorSelecao) . ">NOVEMBRO</option>";
    $selectMes .= "<option value='12' " . selecao('12', $valorSelecao) . ">DEZEMBRO</option>";

    return $selectMes;
}

function recuperarEstadoCivil($estadoCivil) {
    switch ($estadoCivil) {
        case "S":
            $retorno = "SOLTEIRO(A)";
            break;
        case "C":
            $retorno = "CASADO(A)";
            break;
        case "E":
            $retorno = "SEPARADO(A)";
            break;
        case "D":
            $retorno = "DIVORCIADO(A)";
            break;
        case "V":
            $retorno = "VIÚVO(A)";
            break;
    }
    return $retorno;
}

function limitarTexto($string, $tamanho, $encode = 'UTF-8') {
    if (strlen($string) > $tamanho)
        $string = mb_substr($string, 0, $tamanho - 3, $encode) . '...';
    else
        $string = mb_substr($string, 0, $tamanho, $encode);

    return $string;
}

function zeroEsquerda($string) {
    if ($string) {
        $restante = (int) (5 - strlen($string));
        if ($restante > 0) {
            for ($i = 0; $i < $restante; $i++) {
                $retorno .= "0";
            }
        }
    }
    return $retorno . $string;
}


function exibirQuestion($titulo, $frase) {
    ?>

      <div class="row" id="question" style="display:none; cursor:default;width:600px !important">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title"><?php echo $titulo; ?></h3>
            <div class="form-group">
              <label class="control-label"><?php echo $frase; ?></label>
              <input class="btn btn-primary" type="button" id="sim" value="Sim" /> 
              <input class="btn btn-danger" type="button" id="nao" value="Não" />
            </div>            
          </div>
        </div>
      </div>    
    <!--div class="" id="question" style="display:none; cursor:default;width:300px !important" >
        <article class="module width_full" id=""> 
            <header><h3 class="tabs_involved"><?php echo $titulo; ?></h3></header>
        <div class="module_content" style="" >
            <fieldset>
                <br /><br />
                <input type="button" id="sim" value="Sim" /> 
                <input type="button" id="nao" value="Não" />
                <br /><br />
                 <?php echo $frase; ?>
                <br /><br />
            </fieldset>            			                
            <div class="clear"></div>			            
        </div>
        </article>
    </div-->    
    <?php
}
?>