<?php  
	$conexao_bd = new mysqli("localhost",
	"root","","myfinances");

	if ($conexao_bd == true) {
		// echo "Conectado com sucesso";
	} else {
		echo "Conexão falhou";
	}

	$sql = "SELECT * FROM movimentacao";

	$result = mysqli_query($conexao_bd,$sql);

	$sql_entrada = "
					SELECT 
						SUM(preco) AS entrada
					FROM movimentacao
					WHERE 
						tipo_movimentacao = 'entrada'
					;
					";
	$result_entrada = mysqli_query($conexao_bd,$sql_entrada);

	foreach ($result_entrada as $registro) {
			$total_entrada = $registro['entrada'];
	};	

	$sql_saida = "SELECT 
					SUM(preco) AS saida
				FROM movimentacao
				WHERE 
					tipo_movimentacao = 'saida'
				;";
	$result_saida = mysqli_query($conexao_bd, $sql_saida);

	foreach ($result_saida as $registro) {
			$total_saida = $registro['saida'];
		};

	$total = $total_entrada - $total_saida;


?>
<!DOCTYPE html>
<html>
<head>
	<title>Myfinances</title>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/
	bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 

	<link rel="shortcut icon" href="favicon.png">
	<link rel="stylesheet" href="css/global.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/styles.css">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=Ffz18E8gw1VBpJt7NhV-Azm1-uFofRSFXFf2V09ScFfh7XrJ2eQxl81z70bbqWx7NBbffC2r9j69hV3DH0ZpexOt0idsQVRQu3ZxB1Gvzpi0NXqs8Ijj92ZkKRDzMY6W3bDgkgHLt0WhhSEu-wedK2e_xluiMqLd9LtZHscYa4xnOEIUPNT3-G6T1mr8fnNWlyyNxkX_jOuq_hjc9H7AevQjRMCjqiOfYwz8WPjoQCQtMrWj9LnLytGiCsiFh-hXwouaA2Y8BIsV9ZRq7G_wmpf3ho4rgvHvoAlUaCx_LC5fDrIA3uRuGigYOaXnSPhIseLUw-TaZ3ScN1bm_L3KNw" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly9kb2MtMGctOG8tZG9jcy5nb29nbGV1c2VyY29udGVudC5jb20vZG9jcy9zZWN1cmVzYy9jOHVhMHZ1OWFmOHNzNjBsajE0cmxsMDJrdm1jcjdtMC9zcDk2NGQ3OWs5aGtmN2dhMDR1czhrcG8xbzRvMjQ1Mi8xNjE2ODc5MDI1MDAwLzE0MzMxMDg5MjIwNDA3OTk1ODY5LzA5Njk2MzE2MzU3NTg4MjAzMDY4LzFXdXR1dkh5Wmt4X29tckFRQmVycEpZaU1PUVljT1BBaj9lPWRvd25sb2FkJmF1dGh1c2VyPTA"/></head>
<body>	
	<div class="container-header">
		<div class="content-header">
			<img src="assets/logo.svg">			

			<!-- Botão para acionar modal -->
			<button type="button"  data-toggle="modal" data-target="#modalExemplo">
			  Nova transação
			</button>
		</div>
	</div>

	<div class="main">
		<div class="content-main">
				<div class="item-dashboard">
					<div>
						<p>Entradas</p>
						<img src="assets/income.svg" alt="">
					</div>
					
					<strong>R$ <?php echo str_replace('.', ',', $total_entrada) ?></strong>
				</div>

				<div class="item-dashboard">
					<div>
						<p>Saídas</p>
						<img src="assets/outcome.svg" alt="">
					</div>					
					<strong>R$- <?php echo str_replace('.', ',', $total_saida) ?></strong>
				</div>
				
				<div class="item-dashboard  hightlight" >
					<div>
						<p>Total</p>
						<img src="assets/total.svg" alt="">
					</div>					
					<strong>R$<?php echo str_replace('.', ',', $total); ?></strong>
				</div>			
		</div>
		<div class="content-table">
			<table>
				<thead>
					<tr>
						<th>Título</th>
						<th>Valor</th>
						<th>Tipo Movimentação</th>
						<th>Categoria</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($result as $linha) {
							if ($linha['tipo_movimentacao'] == 'entrada'){
								echo "<tr>
									<td class= 'title'>".$linha['nome']."</td>
									<td class= 'entrada-cor'>+".$linha['preco']."</td>
									<td class= ''>".$linha['tipo_movimentacao']."</td>
									<td>".$linha['categoria']."</td>
								</tr>";
							}else{
								echo "<tr>
									<td class= 'title'>".$linha['nome']."</td>
									<td class= 'saida-cor'>-".$linha['preco']."</td>
									<td class= ''>".$linha['tipo_movimentacao']."</td>
									<td>".$linha['categoria']."</td>
								</tr>";

							}
						
							if ($linha['tipo_movimentacao'] == 'entrada'){

							}else{

							}
						}
					 ?>
					
				</tbody>
			</table>
		</div>


		<!-- Modal -->
		<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Cadastrar transação</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
		        	<img src="assets/close.svg" alt="">
		        </button>
		      </div>
		      <div class="modal-body">
		      	<form method="post" action="salvar.php">
		      		<div class="form-body-input">
		      			<div class="input">
		      				<input type="text" placeholder="Nome" name='nome'>
		      			</div>
		      			<div class="input">
		      				<input type="number" placeholder="Valor" name='preco'>
		      			</div>
		      			
			        	<div class="radio">
			        		<input type="radio" id="entrada" value="entrada" name="tipo_movimentacao">
			        		<label for="entrada">
			        			<img src="assets/income.svg" alt="">
			        			<span>Entrada</span>
			        		</label>

			        	
			        		<input type="radio" id="saida" value="saida" name="tipo_movimentacao">
			        		<label for="saida">
			        			<img src="assets/outcome.svg" alt="">
			        			<span>Saída</span>
			        		</label>
			        	</div>

			        	<div class="input">
		      				<input type="text" placeholder="Categoria" name='categoria'>
		      			</div>
		      			<div class="cadastrar">
		      				<button type="submit" class="btn-cadastrar">Cadastrar</button>
		      			</div>			        
		      		</div>
		      	</form>
		      </div>
		      <!-- <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <button type="button" class="btn btn-primary">Salvar mudanças</button>
		      </div> -->
		    </div>
		  </div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  	
</body>
</html>