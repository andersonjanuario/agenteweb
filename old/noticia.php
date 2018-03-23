<?php
$myfile = fopen("newfile.php", "w") or die("Unable to open file!");
$template = "
<?php
var_dump(\$_POST);
echo \"<br/><br/>\";

\$conexao = mysqli_connect(\"localhost\",\"root\",\"\") or die( \"nao foi possivel conectar\" );
mysqli_set_charset(\$conexao,\"utf8\");
mysqli_select_db(\$conexao,\"compras\") or die (\"Nao foi possivel selecionar o banco de dados\");

\$sql = \"SELECT * FROM `noticia`\";

\$query = mysqli_query(\$conexao, \$sql) or die('Erro na execução da query!');
\$array = array();       
while (\$objItem = mysqli_fetch_object(\$query)) {
	\$array[] = \$objItem;            
}

\$retorno = new StdClass(); 

\$campos = array();
\$tipos = array();
\$fields = mysqli_num_fields(\$query);
for (\$i = 0; \$i < \$fields; \$i++) {
	\$finfo = mysqli_fetch_field_direct(\$query,\$i);
	\$array = explode(\"_\",\$finfo->name);				
	array_push(\$campos, \$finfo->name);
	array_push(\$tipos, \$array[0]);
}

\$retorno->campos = \$campos;
\$retorno->tipos = \$tipos;
echo json_encode(\$retorno);
mysqli_close(\$conexao);
echo \"<br/><br/>\";			
?>			

<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\"/>
    <title>Document</title>
</head>
<body>
	<form action=\"#\" method=\"post\">
	<?php 
		for (\$i = 0; \$i < count(\$retorno->tipos); \$i++) {
			if(\$retorno->tipos[\$i] === 'ipt' ){
				echo \$retorno->campos[\$i].': <input type=\"text\" name=\"'.\$retorno->campos[\$i].'\" id=name=\"'.\$retorno->campos[\$i].'\"><br/>';
			}else if(\$retorno->tipos[\$i] === 'txa' ){
				echo \$retorno->campos[\$i].': <textarea name=\"'.\$retorno->campos[\$i].'\" id=name=\"'.\$retorno->campos[\$i].'\"></textarea><br/>';
			}else if(\$retorno->tipos[\$i] === 'num' ){
				echo \$retorno->campos[\$i].': <input type=\"number\" name=\"'.\$retorno->campos[\$i].'\" id=name=\"'.\$retorno->campos[\$i].'\"><br/>';
			}
		}
	?>
	<input type=\"submit\" value=\"btn\">
	</form>
</body>
</html>
";
fwrite($myfile, $template);
//$template = "Jane Doe\n";
//fwrite($myfile, $template);
fclose($myfile);
?>