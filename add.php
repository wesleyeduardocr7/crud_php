<html>
	
<head>
	<title>Adicionar Dado</title>
</head>

<body>
<?php

include_once("config.php");

if(isset($_POST['Submit'])) {	
	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		

	if(empty($name) || empty($age) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>>Nome está vazio.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>>Idade está vazio.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>>Email está vazio.</font><br/>";
		}
		
	
		echo "<br/><a href='javascript:self.history.back();'>Voltar</a>";
	} else { 
		
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");
			
		echo "<font color='green'>Dado Adicionado com Sucesso.";
		echo "<br/><a href='index.php'>Ver Resultado</a>";
	}
}
?>
</body>
</html>
