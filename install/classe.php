<?php

class Classe{
	
		
	public function create($sessao,$campos){
		echo "iniciando classe \n";
		$classe = fopen("../classe/".$sessao.".php", "w") or die("Unable to open file!");
		
		$template = "
						<?php

							class ".$sessao."{

								private \$id;
								private \$status;
        ";
		for($i=0;$i< count($campos);$i++){	
			$template .= "      private \$".strtolower($campos[$i]->campo)."; 
			";
		}
		$template .= "
								//construtor
								public function __construct(){}

								//destruidor
								public function __destruct(){}

								//Get And Sets
								public function getId(){
									return \$this->id;
								}

								public function setId(\$id){                                
									\$this->id = \$id;
								}
								
								public function getStatus(){
									return \$this->status;
								}

								public function setStatus(\$valor){
									\$this->status = \$valor;
								} 
								
								";
		for($i=0;$i< count($campos);$i++){	
		
			$template .= "
								public function get".ucfirst(strtolower($campos[$i]->campo))."(){
									return \$this->".$campos[$i]->campo.";
								}

								public function set".ucfirst(strtolower($campos[$i]->campo))."(\$valor){
									\$this->".$campos[$i]->campo." = \$valor;
								} 
								
			";
		
		}
		
		$template .= "		}
						?>";
		
		
		fwrite($classe,$template);
		fclose($classe);
		echo "termino classe\n";
				
	}
	
}

?>