<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Projeto Locadora</title>
	<link rel='stylesheet' type='text/css' href='../estilos/geral.css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1>Filmes</h1>
<div class="flex-container">
<div id="box">
	<table border="1"><tr><th width="50%">Titulo</th><th>Gênero</th><th>Produtora</th>
	<th>Diretor</th><th>Valor</th></tr>
<?php
include ("../controle/conexao.php");
try{
    $titulo = $_POST['titulo'];
	$sql = "SELECT f.titulo, g.genero, p.produtora, d.diretor, f.valor FROM filme f 
	INNER JOIN genero g ON g.cod_genero=f.genero_filme 
	INNER JOIN produtora p ON p.cod_produtora=f.produtora_filme 
	INNER JOIN diretor d ON d.cod_diretor=f.diretor_filme
    WHERE titulo LIKE '%$titulo%' ORDER BY f.titulo";
	foreach ($conn->query($sql) as $row) {
	   print "<tr><td>".$row['titulo']."</td>
	   		  <td>".$row['genero']."</td>
              <td width='15%'>".$row['produtora']."</td>
			  <td width='15%'>".$row['diretor']."</td>
              <td class='valores' width='15%'> R$ ".number_format($row['valor'],2,",",".")."</td></tr>";
	}
}catch(PDOException $ex){
	echo 'Erro '. $ex->getMessage();
}
?>
</table><br><a href='http://localhost/00_marcelo/projeto_locadora'>Voltar</a>
</div></div></body></html>
