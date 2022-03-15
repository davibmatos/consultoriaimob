<?php $pagina = 'aprovados'; ?>

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
				<input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Nome" aria-label="Search" id="txtbuscar" name="txtbuscar">
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
					$telefone = $dados[0]['telefone'];
					$situacao = $dados[0]['situacao'];
					$observacoes = $dados[0]['observacoes'];
					$produto = $dados[0]['produto'];
					$corretor = $dados[0]['corretor'];
					$vendedor = $dados[0]['vendedor'];
					$imovel = $dados[0]['imovel'];
					$documentacaoa = $dados[0]['documentacaoa'];
					$documentacaop = $dados[0]['documentacaop'];
					$contacorrente = $dados[0]['contacorrente'];
					$valorcompravenda = $dados[0]['valorcompravenda'];
					$valorfinanciamento = $dados[0]['valorfinanciamento'];
					$valorprestacao = $dados[0]['valorprestacao'];
					$valorsubsidio = $dados[0]['valorsubsidio'];
					$valoravaliacao = $dados[0]['valoravaliacao'];
					$prazo = $dados[0]['prazo'];
					$valorfgts = $dados[0]['valorfgts'];
					$taxajuros = $dados[0]['taxajuros'];
					$sistemaamor = $dados[0]['sistemaamor'];								
					$entrevista = $dados[0]['entrevista'];
					$pesquisacadastral = $dados[0]['pesquisacadastral'];
					$tiporemuneracao = $dados[0]['tiporemuneracao'];
					$mesconclusao = $dados[0]['mesconclusao'];

					$res_sit = $pdo->query("SELECT * from situacao where id = '$situacao' ");
					$dados_sit = $res_sit->fetchAll(PDO::FETCH_ASSOC);
					for ($i=0; $i < count($dados_sit); $i++) { 
						foreach ($dados_sit[$i] as $key => $value) {
						}

						$id_sit = $dados_sit[$i]['id'];
						$nome_sit = $dados_sit[$i]['nome'];


					}

					


					echo 'Atualização do Cliente';
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
							<input type="text" class="form-control" id="nome" placeholder="Insira o Nome" name="nome" disabled value="<?php echo @$nome ?> ">
						</div>
					</div>

					
					<div class="col-md-6 col-sm-12">	
						<div class="form-group">
							<label for="exampleFormControlSelect1">Estado atual:</label>
							<select class="form-control" id="" name="situacao" disabled>
								<?php 

								//SE EXISTIR EDIÇÃO DOS DADOS, TRAZER COMO PRIMEIRO REGISTRO A SITUAÇÃO DO CLIENTE


								echo	'<option value="'.$id_sit.'">'.$nome_sit.'</option>';


								?>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">CPF</label>
							<input type="text" class="form-control" id="cpf" disabled name="cpf"  placeholder="Insira o CPF" value="<?php echo @$cpf ?>" >
						</div>
					</div>
					
					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Telefone</label>
							<input type="text" class="form-control" id="" name="telefone" disabled placeholder="Telefone" value="<?php echo @$telefone ?>" >
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Imóvel</label>
							<input type="text" class="form-control" id="" name="imovel" placeholder="Imóvel" value="<?php echo @$imovel ?>" disabled>
						</div>
					</div>
					
					
				</div>

				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Corretor</label>
							<input type="text" class="form-control" id="" name="corretor" placeholder="Corretor" value="<?php echo @$corretor ?>" disabled>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Vendedor</label>
							<input type="text" class="form-control" id="" name="vendedor" placeholder="Vendedor" value="<?php echo @$vendedor ?>" disabled>
						</div>
					</div>				
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Conta Corrente</label>
							<input type="text" class="form-control" id="" name="contacorrente" placeholder="Conta Corrente" value="<?php echo @$contacorrente ?>" disabled>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Produto</label>
							<input type="text" class="form-control" disabled id="" name="produto" placeholder="Produto" value="<?php echo @$produto ?>">
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Entrevista</label>
							<input type="text" class="form-control" id="" name="entrevista" placeholder="Entrevista" disabled value="<?php echo @$entrevista ?>" disabled>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Valor da Compra e Venda</label>
							<input type="text" class="mascara form-control"  name="valorcompravenda" placeholder="Valor" value="<?php echo @$valorcompravenda ?>">
						</div>
					</div>					

					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Valor Avaliação do Banco</label>
							<input type="text" class="mascara form-control" id="" name="valoravaliacao" placeholder="Valor" value="<?php echo @$valoravaliacao ?>">
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Prazo</label>
							<input type="text" class="form-control" id="" name="prazo" placeholder="Prazo" value="<?php echo @$prazo ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Valor do Financiamento</label>
							<input type="text" class="mascara form-control" id="valorfinanciamento" name="valorfinanciamento" placeholder="Valor" value="<?php echo @$valorfinanciamento ?>">
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Valor da Prestação</label>
							<input type="text" class="mascara form-control" id="valorprestacao" name="valorprestacao" placeholder="Valor" value="<?php echo @$valorprestacao ?>">
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Valor do Subsidio</label>
							<input type="text" class="mascara form-control" id="valorsubsidio" name="valorsubsidio" placeholder="Valor" value="<?php echo @$valorsubsidio ?>">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Valor do FGTS</label>
							<input type="text" class="mascara form-control" id="" name="valorfgts" placeholder="Valor" value="<?php echo @$valorfgts ?>">
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Taxa de Juros</label>
							<input type="text" class="form-control" id="" name="taxajuros" placeholder="%" value="<?php echo @$taxajuros ?>">
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Sistema de Amortização</label>
							<input type="text" class="form-control" id="" name="sistemaamor" placeholder="Sistema" value="<?php echo @$sistemaamor ?>">
						</div>
					</div>
				</div>			
				<div class="row">
					<div class="col-md-12 col-sm-12">						
						<div class="form-group">
							<label for="exampleFormControlInput1">Documentação Apresentada</label>
							<textarea  class="form-control" id="" name="documentacaoa" maxlength="350" disabled><?php echo @$documentacaoa ?></textarea>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 col-sm-12">						
						<div class="form-group">
							<label for="exampleFormControlInput1">Documentação Pendente</label>
							<textarea  class="form-control" id="" name="documentacaop" maxlength="350" disabled><?php echo @$documentacaop ?></textarea>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 col-sm-12">						
						<div class="form-group">
							<label for="exampleFormControlInput1">Observações</label>
							<textarea  class="form-control" id="observacoes" name="observacoes" maxlength="350" disabled ><?php echo @$observacoes ?></textarea>
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

<!--CÓDIGO DA MODAL CONCLUIR -->
<?php 
if(@$_GET['funcao'] == 'concluir'){ 
	$id = $_GET['id'];

	?>
	<div class="modal fade" id="modal-concluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?php if(@$_GET['funcao'] == 'concluir'){

						$nome_botao = 'Atualizar';
						$id_reg = $_GET['id'];

					//BUSCAR DADOS DO REGISTRO A SER EDITADO
						$res = $pdo->query("select * from clientes where id = '$id_reg'");
						$dados = $res->fetchAll(PDO::FETCH_ASSOC);
						$nome = $dados[0]['nome'];
						$dataconclusao = $dados[0]['dataconclusao'];
						$conformidade = $dados[0]['conformidade'];
						$valorfinanciamento = $dados[0]['valorfinanciamento'];
						



						echo 'Confirmação do Processo';
					}else{
						$nome_botao = 'Editar';
						echo 'Conclusão do Processo';
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
								<label for="exampleFormControlSelect1">Mês da Conclusão:</label>
								<select class="form-control" id="" name="mesconclusao">
									<option>Janeiro</option>
									<option>Fevereiro</option>
									<option>Março</option>
									<option>Abril</option>
									<option>Maio</option>
									<option>Julho</option>
									<option>Agosto</option>
									<option>Setembro</option>
									<option>Outubro</option>
									<option>Novembro</option>
									<option>Dezembro</option> </select>

								</div>
							</div>

							<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label for="exampleFormControlSelect1">Tipo da Remuneração:</label>
								<select class="form-control" id="" name="tiporemuneracao">
									<option>CCSBPE</option>
									<option>PCVA</option> </select>

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


<script>$('#modal-concluir').modal("show");</script>

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


					if(mensagem.trim() == 'Atualizado com sucesso'){
						
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



<!--AJAX PARA CONCLUSÃO DOS DADOS -->

<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#Atualizar').click(function(event){
			event.preventDefault();
			$.ajax({
				url: pag + "/concluir.php",
				method: "post",
				data:$('form').serialize(),
				dataType:"text",
				success: function(mensagem){
					$('#mensagem2').removeClass()


					if(mensagem.trim() == 'Atualizado com sucesso'){

						$('#mensagem2').addClass('mensagem-sucesso')


						$('#txtbuscar').val('')
						$('#btn-buscar').click()
						$('#btn-fechar').click()

					}else{

						$('#mensagem2').addClass('mensagem-erro')
					}

					$('#mensagem2').text(mensagem)

				},
			})
		})
	})

</script>





