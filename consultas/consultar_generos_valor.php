<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Projeto Locadora</title>
	<link rel='stylesheet' type='text/css' href='../estilos/geral.css'>
</head>
<body>
<h1>Faturamento por gênero</h1>
<div class="flex-container">
<div id="box">
<fieldset>	
	<table border="1"><tr><th width="50%">Gênero</th><th>Total locado</th></tr>
<?php
include ("../controle/conexao.php");
try{
	$sql = "SELECT g.genero, sum(f.valor) FROM filme f 
	INNER JOIN genero g ON g.cod_genero=f.genero_filme 
	GROUP BY g.genero ORDER BY sum(f.valor) DESC";
	foreach ($conn->query($sql) as $row) {
	   print "<tr><td>".$row['genero']."</td>
              <td class='valores' width='25%'>R$ ".number_format($row['sum(f.valor)'],2,",",".")."</td></tr>";
	}
}catch(PDOException $ex){
	echo 'Erro '. $ex->getMessage();
}
?>
</table><br><a href='http://localhost/00_marcelo/projeto_locadora'>Voltar</a>
</fieldset></div></div></body></html>
