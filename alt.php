<?php

	require_once('conexao.php');
	
	$id = $_GET['id'];
    $now = 'now()';
    
	if($id != ""){
		
		$sql = "UPDATE `atendimentos` SET `Atendimento` = '$now', `Status` = 'Atendido' WHERE `atendimentos`.`id` = $id";
		$resultado = mysqli_query($conexao, $sql);
		if($resultado){
			$msg = "Atendido";
		}
		echo "<script>window.location.href='tabela.php?msg=$msg';</script>";
		
	}
	
?>
