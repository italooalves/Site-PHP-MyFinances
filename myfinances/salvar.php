<?php  
	
	$nome_movimentacao = $_POST['nome'];
	$preco_movimentacao = $_POST['preco'];
	$tipo_movimentacao = $_POST['tipo_movimentacao'];
	$categoria = $_POST['categoria'];

	$conexao_bd = new mysqli("localhost",
	"root","","myfinances") or die("Erro ao conectar com o bd");
	
	$sql = "INSERT INTO 
	movimentacao(
		nome,
		preco,
		tipo_movimentacao,
		categoria
	)
	VALUES(
		'$nome_movimentacao',
		$preco_movimentacao,
		'$tipo_movimentacao',
		'$categoria'
	);";

	
	$result = mysqli_query($conexao_bd, $sql) ;
	
	// if ($result == true) {
	// 	echo "Registro inserido com sucesso";
	// } else {
	// 	echo "Falha ao inserir registro";
	// }

	header("refresh:0, index.php");
?>

