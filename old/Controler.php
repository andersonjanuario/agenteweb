<?php
$path = './';
require $path . 'Dao.php';


function debug($valor){
	echo "<pre>";
	var_dump($valor);
	die();
}

class Controler {
	
    public function __construct() {}

    public function __destruct() {}
	
	public function debug($valor){
		echo "<pre>";
		var_dump($valor);
		die();
	}
	
	public function consultarCampos($request) {
        $dao = new Dao();
        return $dao->consultarCampos($request);
    }
	
	public function consultarDados($request) {
        $dao = new Dao();
        return $dao->consultarDados($request);
    }
	
	public function estruturaInputTextBasic($campo){
		$html = "<div class='form-group'>
                    <label class='control-label col-md-3'>$campo->campo</label>
                    <div class='col-md-8'>
                      <input class='form-control' type='text' id='$campo->nome' name='$campo->nome' >
                    </div>
                </div>";	
		return $html;	
	}

	public function estruturaTextAreaBasic($campo){
		$html = "<div class='form-group'>
                    <label class='control-label col-md-3'>$campo->campo</label>
                    <div class='col-md-8'>
                      <textarea class='form-control' type='text' id='$campo->nome' name='$campo->nome' >
					  </textarea>
                    </div>
                </div>";	
		return $html;		
	}
	
	public function estruturaSelectBasic($campo){
		$html = "<div class='form-group'>
                    <label class='control-label col-md-3'>$campo->campo</label>
                    <div class='col-md-8'>
                      <input class='form-control' type='text' id='$campo->nome' name='$campo->nome' >
                    </div>
                </div>";	
		return $html;		
	}	
	
	public function estruturaInputNumberBasic($campo){
		$html = "<div class='form-group'>
                    <label class='control-label col-md-3'>$campo->campo</label>
                    <div class='col-md-8'>
                      <input class='form-control' type='number' id='$campo->nome' name='$campo->nome' >
                    </div>
                </div>";	
		return $html;		
	}

	public function estruturaInputEmailBasic($campo){
		$html = "<div class='form-group'>
                    <label class='control-label col-md-3'>$campo->campo</label>
                    <div class='col-md-8'>
                      <input class='form-control' type='text' id='$campo->nome' name='$campo->nome' >
                    </div>
                </div>";	
		return $html;		
	}
	public function estruturaInputHiddenBasic($campo){
		$html = "<div class='form-group'>
                    <label class='control-label col-md-3'>$campo->campo</label>
                    <div class='col-md-8'>
                      <input class='form-control' type='text' id='$campo->nome' name='$campo->nome' >
                    </div>
                </div>";	
		return $html;		
	}
	public function estruturaInputCheckBasic($campo){
		$html = "<div class='form-group'>
                    <label class='control-label col-md-3'>$campo->campo</label>
                    <div class='col-md-8'>
                      <input class='form-control' type='text' id='$campo->nome' name='$campo->nome' >
                    </div>
                </div>";	
		return $html;		
	}	
	
	
	public function checarCapos($campo){
		switch($campo->prefixo){
			case "ipt":
				return $this->estruturaInputTextBasic($campo);
			break;
			case "num":
				return $this->estruturaInputNumberBasic($campo);
			break;
			case "txa":
				return $this->estruturaTextAreaBasic($campo);
			break;
			case "sel":
				return $this->estruturaSelectBasic($campo);
			break;
			case "ema":
				return $this->estruturaInputEmailBasic($campo);
			break;
			case "hid":
				return $this->estruturaInputHiddenBasic($campo);
			break;
			case "btn":
				return $this->estruturaInputTextBasic($campo);
			break;
			case "chk":
				return $this->estruturaInputCheckBasic($campo);
			break;		
		}		
	}
	
}

	$controler = new Controler();
    $camposLoop = $controler->consultarCampos("noticia");	
	echo "<pre/>";
	var_dump($camposLoop);	
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Document</title>
</head>
<body>
	<form action="#" method="post">
	<?php 
		for ($i = 0; $i < count($camposLoop); $i++) {
			echo $controler->checarCapos($camposLoop[$i]);
		}
	?>
	<input type="submit" value="btn">
	</form>
</body>
</html>