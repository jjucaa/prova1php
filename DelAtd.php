<?php

	require_once('conexao.php');
	
	$id = $_GET['id'];
	
	if($id != ""){
		
		$sql = "delete from atendimentos where id = ".$id;
		$resultado = mysqli_query($conexao, $sql);
		if($resultado){
			$msg = "Dados excluidos";
		}
		echo "<script>window.location.href='tabela.php?msg=$msg';</script>";
		
	}
	
?>