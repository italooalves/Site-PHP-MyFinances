<?php  
	$conexao_bd = new mysqli("localhost",
	"root","","myfinances");

	// if ($conexao_bd == true) {
	// 	echo "Conectado com sucesso";
	// } else {
	// 	echo "Conexão falhou";
	// }

	$sql = "SELECT * FROM movimentacao";

	$result = mysqli_query($conexao_bd,$sql);

	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="salvar.php">
		<h1>Cadastrar uma transação</h1>
		<input type="text" placeholder="Nome" name="nome">
		<br>
		<input type="text" placeholder="Preço"  name="preco">
		<br>

		<label for="entrada">Entrada</label>
		<input id="entrada" type="radio" name="tipo_movimentacao" value="entrada">

		<label for="saida">Saída</label>
		<input id="saida" type="radio" name="tipo_movimentacao" value="saida">
		<br>
		<input type="text" placeholder="Categoria"  name="categoria">
		<br>
		<button type="submit">Enviar</button>
	</form>
	<br>
	<br>
	
	<table style="width:100%" border="1">
		<tr>
			<th>Nome</th>
			<th>Preço</th>
			<th>Tipo Movimentação</th>
			<th>Categoria</th>
		</tr>
		<?php  
		foreach ($result as $linha) {
			
			echo "<tr>
					<td>".$linha['nome']."</td>
					<td>".$linha['preco']."</td>
					<td>".$linha['tipo_movimentacao']."</td>
					<td>".$linha['categoria']."</td>
				</tr>";
		}

		?>
		
		
	</table>


	
</body>
</html>