
<?php

	require_once('conexao.php');

	if(isset($_POST['Nome']) && $_POST['Nome'] != ""){

		$Nome = $_POST['Nome'];
		$Telefone = $_POST['Telefone'];
		$Atividade = $_POST['Atividade'];
		$Status = 'espera';
		$Registro = 'now()';
		$id = $_POST['id'];

		if($id == ""){
			$sql = "insert into atendimentos (Nome, Telefone, Atividade, Registro, Status, id)
				values ('$Nome', '$Telefone', '$Atividade', $Registro, '$Status', '$id')
			";
		}else{
			$sql = "update atendimentos set Nome = '$Nome', Telefone = '$Telefone', Atividade = '$Atividade', Status = '$Status', id = '$id'
					where id = ".$id;
		}
		
		$resultado = mysqli_query($conexao, $sql);

		if ($resultado && $id==""){
			$_GET['msg'] = 'Dados inseridos com sucesso';
			$_POST = null;
		}elseif($resultado && $id!=""){
			$_GET['msg'] = 'Dados alterados com sucesso';
			$_POST = null;
		}elseif(!$resultado){
			$_GET['msg'] = 'Falha ao inserir a mensagem';
		}
	}
	
	if(isset($_GET['msg']) && $_GET['msg'] != ""){
		echo $_GET['msg'];
	}
 
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Atendimento SQL</title>
    <meta charset="utf-8"/>
   </head>
<body>
    <h2 align=center> Lista de Atendimentos:</h2>
    <p align=center> <a href="dados.php">Cadastrar</a></p>

    <table border=1 width=80% align=center><tr>
		<td><label for="id">Id:</label></td>
        <td><label for="Nome">Nome:</label></td>
        <td><label for="Telefone">Telefone:</label></td>        
        <td><span>Atividade</span></td>
        <td><label for="Status">Registro:</label></td>
        <td><label for="acoes">Atendimento:</label></td>
        <td><label for="acoes">Status:</label></td>
        <td><label for="acoes">Ações:</label></td> 
    </tr>

    
    <?php
    	$sql = "select id, Nome, Telefone, Atividade, Registro, Atendimento, Status from atendimentos";
		$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

		while($dados = mysqli_fetch_array($resultado)){
			echo '<tr><td>'.$dados['id'].'</td>
				  <td>'.$dados['Nome'].'</td>
				  <td>'.$dados['Telefone'].'</td>        
				  <td>'.$dados['Atividade'].'</td>
				  <td>'.$dados['Registro'].'</td>
				  <td>'.$dados['Atendimento'].'</td>
				  <td>'.$dados['Status'].'</td>
				  <td>
					<a href="DelAtd.php?id='.$dados['id'].'">Excluir</a>
					<a href="alt.php?id='.$dados['id'].'">Alterar</a>
				  </td></tr>';
		}

		mysqli_close($conexao);

	?>

    </table>
    <p align=center> <a href="dados.php">Cadastrar</a></p>
</body>
</html>