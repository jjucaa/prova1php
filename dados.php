<?php

require_once('conexao.php');

$id = '';
$Nome = '';
$Telefone = '';
$Atividade = '';
$Status = '';

if(isset($_GET['id']) && $_GET['id'] != ""){
	$sql = "select * from atendimentos where id = " . $_GET['id'];
    $resultado = mysqli_query($conexao, $sql);
	if($resultado){
		$dados = mysqli_fetch_array($resultado);
		$Nome = $dados['Nome'];
		$Telefone = $dados['Telefone'];
		$Atividade = $dados['Atividade'];
		$Status = $dados['Status'];
		$status = $dados ['id_do_quarto'];
	}
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Formulário</title>
	<meta charset="utf-8"/>
</head>
<body background-color = "gray">
	<div width=60% align=center>
		<form class="formulario" method="post" action="tabela.php" align=left> 
			
        <h1>Realize o cadastro aqui!!</h1>

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="field">
          <label for="Nome">Nome:</label>
          <input type="text" id="Nome" name="Nome" value="<?php echo $Nome; ?>" placeholder="Nome*" required>
        </div>

        <div class="field">
          <label for="Telefone">Telefone:</label>
          <input type="text" id="Telefone" name="Telefone" value="<?php echo $Telefone; ?>" placeholder="Digite o numero do Telefone*">
        </div>

        <div class="field">
          <label for="Atividade">Atividade:</label>
          <input type="text" id="Atividade" name="Atividade" value="<?php echo $Atividade; ?>" placeholder="Atividade*" required>
        </div>
        <input type="submit" name="clientes" value="Enviar">

		</form>
	</div>
</body>
</html>