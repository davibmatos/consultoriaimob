<div class="row botao-novo">
	<div class="col-md-12">
		<button data-toggle="modal" data-target="#modal" type="button" class="btn btn-secondary">Novo Médico</button>
	</div>
</div>

<div class="row mt-4">
	<div class="col-md-6 col-sm-12">
		<div class="float-left">
			
			<label class="registro" for="exampleFormControlSelect1">Registros</label>
			<select class="form-control-sm" id="exampleFormControlSelect1">
				<option>10</option>
				<option>25</option>
				<option>50</option>

			</select>
			
		</div>
	</div>
	

	<div class="col-md-6 col-sm-12">

		<div class="float-right mr-4">
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Nome ou CRM" aria-label="Search" name="txtbuscar" id="txtbuscar">
				<button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="<?php echo $item2; ?>"><i class="fas fa-search"></i></button>
			</form>
		</div>
		
	</div>

	
</div>


<table class="table table-sm mt-3">
	<thead class="thead-light">
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">Especialidade</th>
			<th scope="col">CRM</th>
			<th scope="col">Telefone</th>
			<th scope="col">Ações</th>
		</tr>
	</thead>
	<tbody>
		<tr>

			<td>Hugo Freitas</td>
			<td>Ortopedia</td>
			<td>MG87854845454</td>
			<td>3333333333</td>
			<td>
				<a href="#"><i class="fas fa-edit text-info"></i></a>
				<a href="#"><i class="far fa-trash-alt text-danger"></i></a>
			</td>
		</tr>

	</tbody>
</table>






<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cadastro de Médicos</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<form>
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="exampleFormControlInput1">Nome</label>
								<input type="text" class="form-control" id="" placeholder="Insira o Nome" name="nome">
							</div>
						</div>

						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="exampleFormControlSelect1">Especialidade</label>
								<select class="form-control" id="" name="especialidade">
									<option>1</option>
								</select>
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label for="exampleFormControlInput1">CRM</label>
								<input type="text" class="form-control" id="crm" name="crm" placeholder="Insira o CRM">
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label for="exampleFormControlInput1">CPF</label>
								<input type="text" class="form-control" id="cpf" name="cpf" placeholder="Insira o CPF">
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label for="exampleFormControlInput1">Telefone</label>
								<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Insira o Telefone">
							</div>
						</div>
					</div>
					
					
					
					
					
					<div class="form-group">
						<label for="exampleFormControlInput1">Email</label>
						<input type="email" class="form-control" id="" placeholder="Insira o Email">
					</div>
					
					
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<form method="post">
					<button type="submit" name="btn-salvar" class="btn btn-primary">Salvar</button>
				</form>
			</div>
		</div>
	</div>
</div>




 <!--MASCARAS -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>