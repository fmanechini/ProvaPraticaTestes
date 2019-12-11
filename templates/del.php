<?php
	include 'db.php';
	$sql = "SELECT * FROM colecionavel";
?>
<?php
	$id = $_GET['id'];
	$sql = mysqli_query($conexao, "DELETE FROM colecionavel WHERE idcolecionavel=".$id);
	header("Location: http://localhost/provapraticatestes/templates/lista.php");
?>