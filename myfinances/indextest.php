<!DOCTYPE html>
<html>
<head>
	<title>MyFinances</title>
</head>
<body>
	<form method = "post" action="salvartest.php">
		<h1>Cadastrar uma transação</h1>
		<input type="text" placeholder= "Nome" name="nome">
		<br>
		<input type="text" placeholder= "Preço" name="preco">
		<br>
		<label for="entrada">Entrada</label>
		<input id="entrada" type="radio" name="tipo_movimentacao" value="entrada">
		<label for="saida">Saída</label>
		<input id="saida" type="radio" name="tipo_movimentacao" value="saida">
		<br>
		<input type="text" placeholder= "Categoria" name="categoria">
		<br>
		<button type="submit">Enviar</button>
	</form>
	
</body>
</html>