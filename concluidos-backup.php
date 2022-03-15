<?php $pagina = 'concluidos'; ?>

<div class="row botao-novo" >
	<div class="col-md-12">
		<a id="btn-novo" data-toggle="modal" data-target="#modal"></a>
		
	</div>
</div>

<div class="row mt-4">
	<div class="col-md-6 col-sm-12">
		<div class="float-left">
			
			<form method="post">
				<select onChange="submit();" class="form-control-sm" id="exampleFormControlSelect1" name="itens-pagina">

					<?php 

					if(isset($_POST['itens-pagina'])){
						$item_paginado = $_POST['itens-pagina'];
					}elseif(isset($_GET['itens'])){
						$item_paginado = $_GET['itens'];
					}

					?>

					<option value="<?php echo @$opcao3 ?>"><?php echo @$opcao3 ?> Registros</option>


					

				</select>
			</form>
		</div>

	</div>
	
	<?php 

	//DEFINIR O NUMERO DE ITENS POR PÁGINA
	if(isset($_POST['itens-pagina'])){
		$itens_por_pagina = $_POST['itens-pagina'];
		@$_GET['pagina'] = 0;
	}elseif(isset($_GET['itens'])){
		$itens_por_pagina = $_GET['itens'];
	}
	else{
		$itens_por_pagina = $opcao3;

	}

	?>

	<div class="col-md-6 col-sm-12">

		<div class="float-right mr-4">
			<form id="frm" class="form-inline my-2 my-lg-0" method="post">
				<input type="hidden" id="pag" name="pag" value="<?php echo @$_GET['pagina'] ?>">
				<input type="hidden" id="itens" name="itens" value="<?php echo @$itens_por_pagina; ?>">
				<input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Mês ou Produto" aria-label="Search" id="txtbuscar" name="txtbuscar">
				<button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i class="fas fa-search"></i></button>
			</form>
		</div>
		
	</div>

	
</div>
<div id="listar">


</div>


<!--CÓDIGO DA MODAL EDITAR -->
<?php 
if(@$_GET['funcao'] == 'editar'){ 
	$id = $_GET['id'];

	?>
	<div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?php if(@$_GET['funcao'] == 'editar'){

						$nome_botao = 'Editar';
						$id_reg = $_GET['id'];

					//BUSCAR DADOS DO REGISTRO A SER EDITADO
						$res = $pdo->query("select * from clientes where id = '$id_reg'");
						$dados = $res->fetchAll(PDO::FETCH_ASSOC);
						$nome = $dados[0]['nome'];
						$dataconclusao = $dados[0]['dataconclusao'];
						$conformidade = $dados[0]['conformidade'];
						$valorfinanciamento = $dados[0]['valorfinanciamento'];
						$mesconclusao = $dados[0]['mesconclusao'];



						echo 'Edição do Processo';
					}else{
						$nome_botao = 'Editar';
						echo 'Edição do Processo';
					} ?>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<input type="hidden" id="id" name="id" value="<?php echo @$id_reg ?>">
								<input type="hidden" id="campo_antigo" name="campo_antigo" value="<?php echo @$cpf ?>">
								<label for="exampleFormControlInput1">Data da Conclusão</label>
								<input type="date" class="form-control" id="data" placeholder="Insira a Data" name="dataconclusao" value="<?php echo @$dataconclusão ?>">
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="exampleFormControlSelect1">Conclusão:</label>
								<select class="form-control" id="" name="conformidade">
									<option>Conformidade</option> </select>

								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Valor Final:</label>
									<input type="text" class="mascara form-control" id="" name="valorfinanciamento" placeholder="Valor" value="<?php echo @$valorfinanciamento ?>">
								</div>
							</div>

							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Mês da Competência:</label>
									<select class="form-control" id="" name="mesconclusao">
										<option>Janeiro</option> 
										<option>Fevereiro</option> 
										<option>Março</option> 
										<option>Abril</option> 
										<option>Maio</option> 
										<option>Junho</option> 
										<option>Julho</option> 
										<option>Agosto</option> 
										<option>Setembro</option> 
										<option>Outubro</option> 
										<option>Novembro</option> 
										<option>Dezembro</option> 
									</select>
								</div>
							</div>

							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Remuneração:</label>
									<select class="form-control" id="" name="tiporemuneracao">
										<option>CCSBPE</option> 
										<option>PCVA</option> 
									</select>
								</div>
							</div>

						</div>


						<div id="mensagem2" class=""> 

						</div>


						<div class="modal-footer">
							<button id="btn-fechar" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

							<button name="<?php echo $nome_botao ?>" id="<?php echo $nome_botao ?>" class="btn btn-primary"><?php echo $nome_botao ?></button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>







<!--MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<script src="../js/mascaras.js"></script>


<!--AJAX PARA EDIÇÃO DOS DADOS -->

<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#Editar').click(function(event){
			event.preventDefault();
			$.ajax({
				url: pag + "/editar.php",
				method: "post",
				data:$('form').serialize(),
				dataType:"text",
				success: function(mensagem){
					$('#mensagem').removeClass()


					if(mensagem.trim() == 'Editado com Sucesso'){

						$('#mensagem').addClass('mensagem-sucesso')


						$('#txtbuscar').val('')
						$('#btn-buscar').click()
						$('#btn-fechar').click()

					}else{

						$('#mensagem').addClass('mensagem-erro')
					}

					$('#mensagem').text(mensagem)

				},
			})
		})
	})

</script>

<!--CÓDIGO DA MODAL EDITAR -->
<?php 
if(@$_GET['funcao'] == 'editar'){ 

	?>
	<script>$('#btn-novo').click();</script>
<?php } ?>


<!--AJAX PARA LISTAR OS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){

		var pag = "<?=$pagina?>";

		$.ajax({
			url: pag + "/listar.php",
			method: "post",
			data: $('#frm').serialize(),
			dataType: "html",
			success: function(result){
				$('#listar').html(result)

			},


		})
	})
</script>

<!--AJAX PARA BUSCAR OS DADOS -->

<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#btn-buscar').click(function(event){
			event.preventDefault();

			$.ajax({
				url: pag + "/listar.php",
				method: "post",
				data:$('form').serialize(),
				dataType:"html",
				success: function(result){

					$('#listar').html(result)


				},
			})
		})
	})




</script>

<!--AJAX PARA LISTAR OS DADOS -->

<script type="text/javascript">

	$('#txtbuscar').keyup(function(){
		$('#btn-buscar').click();
	})
</script>


