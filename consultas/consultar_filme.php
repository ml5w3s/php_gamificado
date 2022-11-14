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
<div id="box" class="barra">
	<table border="1"><tr><th width="50%">Titulo</th></tr>
<?php
include ("../controle/conexao.php");
try{
    $nome=$_POST['cfilme'];
    $sql="SELECT * FROM filme WHERE titulo LIKE '%$nome%' ORDER BY titulo";
    print "<form method='post' action='../controle/incluir_itens.php'>";
    foreach($conn->query($sql) as $row){
        print "<tr><td><input name='item' type='radio' value='".$row['cod_filme']."'>".$row['titulo']."</td></tr>";
    }
    echo "<input type='submit' value='Incluir item'></form></table>";
}catch(PDOException $ex){
    echo 'Erro'.$ex->getMessage();
}
?></div></div></body></html>
