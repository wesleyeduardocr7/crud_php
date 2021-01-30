<?php

include_once("configuracaoDoBancoDeDados.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);	
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

	} else {	
	
		$result = mysqli_query($mysqli, "UPDATE usuarios SET nome='$nome',idade='$idade',email='$email' WHERE id=$id");
		
		header("Location: index.php");
	}
}
?>
<?php

$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nome = $res['nome'];
	$idade = $res['idade'];
	$email = $res['email'];
}
?>

<html>
<head>	
	<title>Editar Dado</title>
</head>

<body>
	<a href="index.php">Inicio</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr> 
				<td>Nome</td>
				<td><input type="text" name="nome" value="<?php echo $nome;?>"></td>
			</tr>
			<tr> 
				<td>Idade</td>
				<td><input type="text" name="idade" value="<?php echo $idade;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Atualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
