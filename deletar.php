<?php

include("configuracaoDoBancoDeDados.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM usuarios WHERE id=$id");

header("Location:index.php");

?>

