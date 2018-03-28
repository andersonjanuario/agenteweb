function mascara(e,src,mask){
	_TXT = "";
	if (window.event){
		_TXT = e.keyCode;
	} else if (e.which){
		_TXT = e.which;
	}
	if (_TXT == ""){
		return true;
	}
	if (_TXT > 47 && _TXT < 58) {
		var i = src.value.length;
		var saida = "#"; //mask.substring(0,1);
		var texto = mask.substring(i);
		//alert(texto +" - "+ texto.substring(0,1))
		if (texto.substring(0,1) != saida){
			src.value += texto.substring(0,1);
			if (texto.substring(0,1) == ")"){
				src.value += " ";
			}
		}
		return true;
	} else {
		if (_TXT != 8){
			return false;
		} else {
			return true;
		}
	}
}