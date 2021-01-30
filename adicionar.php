<html>
	
<head>
	<title>Adicionar Dado</title>
</head>

<body>
<?php

include_once("configuracaoDoBancoDeDados.php");

if(isset($_POST['Submit'])) {	
	
	$nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
	$idade = mysqli_real_escape_string($mysqli, $_POST['idade']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		
	if(empty($nome) || empty($idade) || empty($email)) {
				
		if(empty($nome)) {
			echo "<font color='red'>Nome está vazio.</font><br/>";
		}
		
		if(empty($idade)) {
			echo "<font color='red'>Idade está vazio.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email está vazio.</font><br/>";
		}		
	
		echo "<br/><a href='javascript:self.history.back();'>Voltar</a>";
		
	} else { 
		
		$result = mysqli_query($mysqli, "INSERT INTO usuarios(nome,idade,email) VALUES('$nome','$idade','$email')");
			
		echo "<font color='green'>Dado Adicionado com Sucesso.";
		echo "<br/><a href='index.php'>Ver Resultado</a>";
	}
}
?>
</body>
</html>
