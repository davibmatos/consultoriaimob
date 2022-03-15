<?php $pagina = 'clientes'; ?>

<div class="row botao-novo">
	<div class="col-md-12">
		<a id="btn-novo" data-toggle="modal" data-target="#modal"></a>
		<a href="index.php?acao=<?php echo $pagina ?>&funcao=novo"  type="button" class="btn btn-secondary">Novo Cliente</a>
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
				<input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Nome ou CPF" aria-label="Search" id="txtbuscar" name="txtbuscar">
				<button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i class="fas fa-search"></i></button>
			</form>
		</div>
		
	</div>

	
</div>
<div id="listar">


</div>


<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
					$cpf = $dados[0]['cpf'];
					$imovel = $dados[0]['imovel'];
					$corretor = $dados[0]['corretor'];
					$vendedor = $dados[0]['vendedor'];
					$contacorrente = $dados[0]['contacorrente'];
					$produto = $dados[0]['produto'];
					$entrevista = $dados[0]['entrevista'];
					$documentacaoa = $dados[0]['documentacaoa'];
					$documentacaop = $dados[0]['documentacaop'];
					$telefone = $dados[0]['telefone'];
					$situacao = $dados[0]['situacao'];
					$observacoes = $dados[0]['observacoes'];

					$res_sit = $pdo->query("SELECT * from situacao where id = '$situacao' ");
					$dados_sit = $res_sit->fetchAll(PDO::FETCH_ASSOC);
					for ($i=0; $i < count($dados_sit); $i++) { 
						foreach ($dados_sit[$i] as $key => $value) {
						}

						$id_sit = $dados_sit[$i]['id'];
						$nome_sit = $dados_sit[$i]['nome'];

					}


					echo 'Edição de Clientes';
				}else{
					$nome_botao = 'Salvar';
					echo 'Cadastro de Clientes';
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
							<label for="exampleFormControlInput1">Nome</label>
							<input type="text" class="form-control" id="nome" placeholder="Insira o Nome" name="nome" value="<?php echo @$nome ?>">
						</div>
					</div>

					<div class="col-md-6 col-sm-12">	
						<div class="form-group">
							<label for="exampleFormControlSelect1">Status:</label>
							<select class="form-control" id="" name="situacao">
								<?php 

								//SE EXISTIR EDIÇÃO DOS DADOS, TRAZER COMO PRIMEIRO REGISTRO A SITUAÇÃO DO CLIENTE


								echo	'<option value="'.$id_sit.'">'.$nome_sit.'</option>';


								//TRAZER TODOS OS REGISTROS DE SITUAÇÕES
								$res = $pdo->query("SELECT * from situacao order by nome asc");
								$dados = $res->fetchAll(PDO::FETCH_ASSOC);
								for ($i=0; $i < count($dados); $i++) { 
									foreach ($dados[$i] as $key => $value) {
									}

									$id = $dados[$i]['id'];
									$nome = $dados[$i]['nome'];

									echo	'<option value="'.$id.'">'.$nome.'</option>';
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">CPF</label>
							<input type="text" class="form-control" id="cpf" name="cpf" placeholder="Insira o CPF" value="<?php echo @$cpf ?>">
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Telefone</label>
							<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="<?php echo @$telefone ?>">
						</div>
					</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Imóvel</label>
							<input type="text" class="form-control" id="" name="imovel" placeholder="Imóvel" value="<?php echo @$imovel ?>">
						</div>
					</div>
				</div>				
				

				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Corretor</label>
							<input type="text" class="form-control" id="telefone" name="corretor" placeholder="Corretor" value="<?php echo @$corretor ?>">
						</div>
					</div>
					
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Vendedor</label>
							<input type="text" class="form-control" id="telefone" name="vendedor" placeholder="Vendedor" value="<?php echo @$vendedor ?>">
						</div>
					</div>				
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Conta Corrente</label>
							<input type="text" class="form-control" id="" name="contacorrente" placeholder="Conta Corrente" value="<?php echo @$contacorrente ?>">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Produto</label>
							<input type="text" class="form-control" id="" name="produto" placeholder="Produto" value="<?php echo @$produto ?>">
						</div>
					</div>


					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Entrevista</label>
							<input type="text" class="form-control" id="" name="entrevista" placeholder="Entrevista" value="<?php echo @$entrevista ?>">
						</div>
					</div>
				</div>					

				<div class="row">
					<div class="col-md-12 col-sm-12">						
						<div class="form-group">
							<label for="exampleFormControlInput1">Documentação Apresentada:</label>
							<textarea  class="form-control" id="" name="documentacaoa" maxlength="350" ><?php echo @$documentacaoa ?></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12">						
						<div class="form-group">
							<label for="exampleFormControlInput1">Documentação Pendente:</label>
							<textarea  class="form-control" id="" name="documentacaop" maxlength="350" ><?php echo @$documentacaop ?></textarea>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 col-sm-12">						
						<div class="form-group">
							<label for="exampleFormControlInput1">Observações:</label>
							<textarea  class="form-control" id="observacoes" name="observacoes"><?php echo @$observacoes ?></textarea>
						</div>
					</div>

					<div id="mensagem" class=""> 

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

<!--CÓDIGO DO BOTÃO NOVO -->



<!--CÓDIGO MODAL NOVO -->
<?php 
if(@$_GET['funcao'] == 'novo'){ 

	?>
	<script>$('#btn-novo').click();</script>
<?php } ?>


<!--CÓDIGO DA MODAL EDITAR -->
<?php 
if(@$_GET['funcao'] == 'editar'){ 

	?>
	<script>$('#btn-novo').click();</script>
<?php } ?>

<!--CÓDIGO DA MODAL DELETAR -->
<?php 
if(@$_GET['funcao'] == 'excluir'){ 
	$id = $_GET['id'];

	?>
	<div class="modal" id="modal-deletar" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Excluir Registro</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<p>Deseja realmente Excluir este Registro?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
					<form method="post">
						<input type="hidden" id="id"  name="id" value="<?php echo @$id ?>" required>

						<button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php } ?>

<script>$('#modal-deletar').modal("show");</script>

<!--MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>


<!--AJAX PARA INSERÇÃO DOS DADOS -->

<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#Salvar').click(function(event){
			event.preventDefault();
			$.ajax({
				url: pag + "/inserir.php",
				method: "post",
				data:$('form').serialize(),
				dataType:"text",
				success: function(mensagem){
					$('#mensagem').removeClass()


					if(mensagem.trim() == 'Cadastrado com Sucesso'){
						
						$('#mensagem').addClass('mensagem-sucesso')

						$('#nome').val('')
						$('#cpf').val('')
						$('#telefone').val('')
						$('#situacao').val('')
						$('#rg').val('')
						$('#observacoes').val('')
						$('#entrevista').val('')
						$('#pesquisacadastral').val('')
						$('#produto').val('')
						


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

<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#btn-deletar').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/excluir.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					$('#txtbuscar').val('')
					$('#btn-buscar').click();
					$('#btn-cancelar-excluir').click();

				},
				
			})
		})
	})
</script>