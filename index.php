<?php

include_once("configuracaoDoBancoDeDados.php");

$result = mysqli_query($mysqli, "SELECT * FROM usuarios ORDER BY id DESC"); 

?>

<html>
<head>	
	<title>Página Inicial</title>
</head>

<body>
<a href="adicionar.html">Adicionar Novo Dado</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Nome</td>
		<td>Idade</td>
		<td>Email</td>
		<td>Atualizar</td>
	</tr>
	<?php 
	
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['nome']."</td>";
		echo "<td>".$res['idade']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td><a href=\"editar.php?id=$res[id]\">Editar</a> | <a href=\"deletar.php?id=$res[id]\" onClick=\"return confirm('Você tem certeza que deseja deletar?')\">Deletar</a></td>";		
	}
	?>
	</table>
</body>
</html>
