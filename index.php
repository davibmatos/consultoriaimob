
<?php 	
@session_start();

require_once("../conexao.php");

if(@$_SESSION['nivel_usuario'] != 'admin') {
  echo "<script language='javascript'>window.location='../login.php'; </script>";
}
$notificacoes = 3;

//VARIÁVEIS DOS MENUS
$item1 = 'home';
$item2 = 'clientes';
$item3 = 'aprovados';
$item4 = 'concluidos';
$item5 = 'imoveis';
$item7 = 'situacao';
$item8 = 'tipo';
$item9 = 'relclientes';
$item10 = 'relclientes';
$item11 = 'relclientes';
$item12 = 'relclientes';


//VERIFICAR QUAL O MENU CLICADO E PASSAR A CLASSE ATIVO
if(@$_GET['acao'] == $item1){
	$item1ativo = 'active';
}elseif(@$_GET['acao'] == $item2 or isset($_GET[$item2])){
	$item2ativo = 'active';
}elseif(@$_GET['acao'] == $item3 or isset($_GET[$item3])){
	$item3ativo = 'active';
}elseif(@$_GET['acao'] == $item4 or isset($_GET[$item4])){
	$item4ativo = 'active';
}elseif(@$_GET['acao'] == $item5 or isset($_GET[$item5])){
	$item5ativo = 'active';
}elseif(@$_GET['acao'] == $item7 or isset($_GET[$item7])){
	$item7ativo = 'active';
}elseif(@$_GET['acao'] == $item8 or isset($_GET[$item8])){
	$item8ativo = 'active';
}elseif(@$_GET['acao'] == $item9 or isset($_GET[$item9])){
	$item9ativo = 'active';	
}else{
	$item1ativo = 'active';
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Painel Administrativo</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" href="../css/painel.css">

	<!--REFERENCIA PARA O FAVICON -->
	<link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon/favicon2.ico" type="image/x-icon">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>




</head>
<body>

	<nav class="navbar navbar-light bg-light">
		<div class="col-md-12">
			<img class="float-left" src="../imagens/elologo.jpeg"  style="width:70px">
			<li class="float-right nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?php echo @$_SESSION['nome_usuario'] ?>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="../logout.php">Sair</a>
				</div>
			</li>


		</div>
	</nav>

	<div class="container-fluid mt-4">
		<div class="row">
			<div class="col-md-3 col-sm-12 mb-4">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link <?php echo $item1ativo ?>" id="v-pills-home-tab" href="index.php?acao=<?php echo $item1 ?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-home mr-1"></i>Home</a>
						<a class="nav-link <?php echo $item2ativo ?>"  id="link-medicos"  href="index.php?acao=<?php echo $item2 ?>" role="tab" aria-controls="v-pills-profile"  aria-selected="false"><i class="fas fa-user-md mr-1"></i>Cadastro Cliente</a>
						<a class="nav-link <?php echo $item3ativo ?>"  id="link-medicos"  href="index.php?acao=<?php echo $item3 ?>" role="tab" aria-controls="v-pills-profile"  aria-selected="false"><i class="fas fa-user-md mr-1"></i> Aprovados</a>
							<a class="nav-link <?php echo $item4ativo ?>"  id="link-medicos"  href="index.php?acao=<?php echo $item4 ?>" role="tab" aria-controls="v-pills-profile"  aria-selected="false"><i class="fas fa-user-md mr-1"></i>Processos Concluídos</a>
						<a class="nav-link <?php echo $item5ativo ?>" id="v-pills-messages-tab"  href="index.php?acao=<?php echo $item5 ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="far fa-user mr-1"></i>Cadastro Imóveis</a>
						<a class="nav-link <?php echo $item7ativo ?>" id="v-pills-messages-tab"  href="index.php?acao=<?php echo $item7 ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="far fa-user mr-1"></i> Status Cliente</a>
						<a class="nav-link <?php echo $item8ativo ?>" id="v-pills-messages-tab"  href="index.php?acao=<?php echo $item8 ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="far fa-user mr-1"></i> Status OS</a>
						<li class="nav-link dropdown">
						<a  href="index.php?acao=<?php echo $item9 ?>" id="dropdown-menu" aria-controls="v-pills-messages" aria-selected="false" data-toggle="dropdown" aria-expanded="false"><i class="far fa-user mr-1"></i> Relatórios</a>
						<ul class="dropdown-menu" aria-labelledby="dropdown-menu">
							<a class="dropdown-item <?php echo $item10ativo ?>" id="v-pills-messages-tab"  href="index.php?acao=<?php echo $item9 ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="far fa-user mr-1"></i> Clientes</a>
							<a class="dropdown-item <?php echo $item11ativo ?>" id="v-pills-messages-tab"  href="index.php?acao=<?php echo $item8 ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="far fa-user mr-1"></i> Clientes</a>
							<a class="dropdown-item <?php echo $item12ativo ?>" id="v-pills-messages-tab"  href="index.php?acao=<?php echo $item8 ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="far fa-user mr-1"></i> Clientes</a>
							<a class="dropdown-item <?php echo $item13ativo ?>" id="v-pills-messages-tab"  href="index.php?acao=<?php echo $item8 ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="far fa-user mr-1"></i> Clientes</a>
							<a class="dropdown-item <?php echo $item14ativo ?>" id="v-pills-messages-tab"  href="index.php?acao=<?php echo $item8 ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="far fa-user mr-1"></i> Clientes</a>

					</ul> </li>
				
				</div>
			</div>
			<div class="col-md-9 col-sm-12">
				<div class="tab-content" id="v-pills-tabContent">

					
					<div class="tab-pane fade show active"  role="tabpanel">
						<?php if(@$_GET['acao'] == $item1){
							include_once($item1.".php"); 
						}elseif(@$_GET['acao'] == $item2 or isset($_GET[$item2])){
							include_once($item2.".php"); 
						}elseif(@$_GET['acao'] == $item3 or isset($_GET[$item3])){
							include_once($item3.".php"); 						
						}elseif(@$_GET['acao'] == $item4 or isset($_GET[$item4])){
							include_once($item4.".php"); 
						}elseif(@$_GET['acao'] == $item5 or isset($_GET[$item5])){
							include_once($item5.".php");
						}elseif(@$_GET['acao'] == $item7 or isset($_GET[$item7])){
							include_once($item7.".php"); 
						}elseif(@$_GET['acao'] == $item8 or isset($_GET[$item8])){
							include_once($item8.".php"); 
						}elseif(@$_GET['acao'] == $item9 or isset($_GET[$item9])){
							include_once($item9.".php"); 
						}elseif(@$_GET['acao'] == $item10 or isset($_GET[$item10])){
							include_once($item10.".php"); 
						}elseif(@$_GET['acao'] == $item11 or isset($_GET[$item11])){
							include_once($item11.".php"); 
						}elseif(@$_GET['acao'] == $item12 or isset($_GET[$item12])){
							include_once($item12.".php"); 
						}else{
							include_once($item1.".php"); 
						}
						?>
					</div>

					

				</div>
			</div>
		</div>
	</div>


</body>
</html>




<?php 
/*

//EXECUTAR UM LINK HREF COM SCRIPT
if(isset($_GET['btnbuscarMedicos'])){ ?>

<script type="text/javascript">
	$('#link-medicos').click();
</script>

<?php } */ ?>
