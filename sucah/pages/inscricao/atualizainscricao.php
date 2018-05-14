<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
	<title>Administrativo - Altas Habilidades</title>
	<!-- Bootstrap Core CSS -->
	<link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- chartist CSS -->
	<link href="../../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
	<link href="../../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
	<link href="../../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
	<!--This page css - Morris CSS -->
	<link href="../../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="../../css/style.css" rel="stylesheet">
	<!-- You can change the theme colors from here -->
	<link href="../../css/colors/blue.css" id="theme" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
	<?
			//Start the session
	session_start();
			//Verifica se o usuário está logado ou não
	if($_SESSION['matricula'] == NULL){
		echo '<meta http-equiv="refresh" content="0;url=login.html">';
	}else{
		$login_matricula = $_SESSION['matricula'];
	}

	$codinscricao = $_GET['codinscricao'];

			//Conexão com o banco de dados
	require '../../config.php';
	require '../../funcoes.php';
	$link = DBConnect();

	$select = mysqli_query($link, "SELECT * FROM tb_professor") or die(mysqli_error($link));
	$count_professor = 0;
	while ($linha = mysqli_fetch_array($select)) {
		if($login_matricula == $linha['matriculaProf']){
			$user = $linha['nomeProfessor'];
			$_SESSION['user'] = $user;
			$cod_escola = $linha['codEscola'];
		}
	}
	?>
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader">
		<svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
		</div>
		<!-- ============================================================== -->
		<!-- Main wrapper - style you can find in pages.scss -->
		<!-- ============================================================== -->
		<div id="main-wrapper">
			<!-- ============================================================== -->
			<!-- Topbar header - style you can find in pages.scss -->
			<!-- ============================================================== -->
			<header class="topbar">
				<nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
					<!-- ============================================================== -->
					<!-- Logo -->
					<!-- ============================================================== -->
					<div class="navbar-header">
						<a class="navbar-brand" href="/sucah/index.php" style="color:#ffffff;">
							
							<!-- Logo text --><span>
							
							<!-- Light Logo text -->
							<img src="/sucah/assets/images/logo1.png" class="light-logo" alt="Altas Habilidades"/>Altas Habilidades</span> </a>
						</div>
						<!-- ============================================================== -->
						<!-- End Logo -->
						<!-- ============================================================== -->
						<div class="navbar-collapse">
							<!-- ============================================================== -->
							<!-- toggle and nav items -->
							<!-- ============================================================== -->
							<ul class="navbar-nav mr-auto mt-md-0">
								<!-- This is  -->
								<li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
								<!-- ============================================================== -->
								<!-- Search -->
								<!-- ============================================================== -->
								<li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
									<form class="app-search">
										<input type="text" class="form-control" placeholder="Search & enter"><a class="srh-btn"><i class="ti-close"></i></a> </form>
									</li>
								</ul>
								<!-- ============================================================== -->
								<!-- User profile and search -->
								<!-- ============================================================== -->
								<ul class="navbar-nav my-lg-0">
									<!-- ============================================================== -->
									<!-- Profile -->
									<!-- ============================================================== -->
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../../assets/images/users/1.jpg" alt="user" class="profile-pic m-r-10" /><?php echo $_SESSION['user']; ?></a>
									</li>
								</ul>
							</div>
						</nav>
					</header>
					<!-- ============================================================== -->
					<!-- End Topbar header -->
					<!-- ============================================================== -->
					<!-- ============================================================== -->
					<!-- Left Sidebar - style you can find in sidebar.scss  -->
					<!-- ============================================================== -->
					<aside class="left-sidebar">
						<!-- Sidebar scroll-->
						<div class="scroll-sidebar">
							<!-- Sidebar navigation-->
							<?php
							require 'menu.php';
							?>
							<!-- End Sidebar navigation -->
						</div>
						<!-- End Sidebar scroll-->
						<!-- Bottom points-->
						<div class="sidebar-footer">
							<!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
							<!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
							<!-- item--><a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
							<!-- End Bottom points-->
						</aside>
						<!-- ============================================================== -->
						<!-- End Left Sidebar - style you can find in sidebar.scss  -->
						<!-- ============================================================== -->
						<!-- ============================================================== -->
						<!-- Page wrapper  -->
						<!-- ============================================================== -->
						<div class="page-wrapper">
							<!-- ============================================================== -->
							<!-- Container fluid  -->
							<!-- ============================================================== -->
							<div class="container-fluid">
								<!-- ============================================================== -->
								<!-- Bread crumb and right sidebar toggle -->
								<!-- ============================================================== -->
								<div class="row page-titles">
									<div class="col-md-5 col-8 align-self-center">
										<h3 class="text-themecolor">Atualiza Inscrição</h3>
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
											<li class="breadcrumb-item active">Lista de Estudante</li>
											<li class="breadcrumb-item active">Atualiza Inscrição</li>
										</ol>
									</div>
								</div>
								<!-- ============================================================== -->
								<!-- End Bread crumb and right sidebar toggle -->
								<!-- ============================================================== -->
								<!-- ============================================================== -->
								<!-- Start Page Content -->
								<!-- ============================================================== -->
								<!-- Row -->
								<div class="row-12">
									<div class="card">
										<div class="card-block bg-info">
											<h1 class="text-white card-title"><span class="mdi mdi-account-edit"></span>Atualizar cadastro do aluno</h1>                                
										</div>
										<div class="card-block">
											<div class="message-box contact-box">
												<h2 class="add-ct-btn"><button type="button" class="btn btn-circle btn-lg btn-warning waves-effect waves-dark">?</button></h2>
												<div class="message-widget contact-widget">
													<!-- Message -->
													<h4 class="card-subtitle text-black "><span class="mdi mdi-alert"></span> Preencha as informações abaixo e depois acione o botão "Atualizar Cadastro".  </h4>
													<?php

													$select = mysqli_query($link, "SELECT * FROM tb_inscricao") or die(mysqli_error($link));
													$count_professor = 0;
													while ($linha = mysqli_fetch_array($select)) {
														if($linha['codinscricao'] == $codinscricao){
															$matricula = $linha['codAluno'];
															$_SESSION['matriculaAluno'] = $matricula;
															$nome = $linha['nomeAluno'];
															$foto = $linha['foto'];
															$nascimento = $linha['dataNascimento'];
															$sexo = $linha['sexo'];
															$idade = $linha['idade'];
															$atual = $linha['atual'];
															$anos = $linha['anos'];
															$escolaorigem = $linha['escolaOrigem'];
															$telefoneescola = $linha['telefoneEscola'];
															$cre = $linha['cre'];
															
															$count_professor ++;
														}
													}
													?>

													<?php 
													$codinscricao_privilegio = $_SESSION['codinscricao_priviegio'];
													$contador = $_SESSION['contador'];

													$igual = 0;
													for($i=0; $i<$contador; $i++){			
														if($codinscricao_privilegio[$i] == $_GET['codinscricao']){
															$igual = 1;
														}
													}
													if($igual == 0){
														echo '<meta http-equiv="refresh" content="0;url=lista_inscritos.php">';
													}

													?>
													<form action="atualiza_inscricao.php" method="post" enctype="multipart/form-data">
														<h3>1. Informações do Estudante</h3>
														Código do Estudante: <br><input type="text" style="width:100%;" name="cod_aluno" placeholder="Nenhuma informação existente." value="<?php echo $matricula; ?>"><br>
														Nome completo: <br><input type="text" style="width:100%;" name="nomeAluno" placeholder="Nenhuma informação existente." value="<?php echo $nome; ?>"><br>
														<?php if($foto == "não"){ echo 'Foto: <br><input type="file" style="width:100%" name="foto" value="Oi">';}else{ echo '<br><div class="col-lg-3 col-md-6 m-b-20"><img src="fotos/'.$foto.'" class="img-responsive radius"></div>'; } ?><br>
															Data de nascimento: <br><?php if ($nascimento != null){ echo '<input type="text" style="width:50%"  name="data_nascimento" placeholder="     /   /   "  value="' .$nascimento.' ">';}else{ echo '<select style="width:30%"  name="data_nascimento">
															<option>Dia</option>
															<option>01</option>
															<option>02</option>
															<option>03</option>
															<option>04</option>
															<option>05</option>
															<option>06</option>
															<option>07</option>
															<option>08</option>
															<option>09</option>
															<option>10</option>
															<option>11</option>
															<option>12</option>
															<option>13</option>
															<option>14</option>
															<option>15</option>
															<option>16</option>
															<option>17</option>
															<option>18</option>
															<option>19</option>
															<option>20</option>
															<option>21</option>
															<option>22</option>
															<option>23</option>
															<option>24</option>
															<option>25</option>
															<option>26</option>
															<option>27</option>
															<option>28</option>
															<option>29</option>
															<option>30</option>
															<option>31</option>
														</select><span class="mdi mdi-calendar-blank"></span>
														<select style="width:30%"  name="data_nascimento">
															<option>Mês</option>
															<option>01</option>
															<option>02</option>
															<option>03</option>
															<option>04</option>
															<option>05</option>
															<option>06</option>
															<option>07</option>
															<option>08</option>
															<option>09</option>
															<option>10</option>
															<option>11</option>
															<option>12</option>
														</select><span class="mdi mdi-calendar"></span>
														<select style="width:30%"  name="data_nascimento">
															<option>Ano</option>
															<option>2018</option>
															<option>2017</option>
															<option>2016</option>
															<option>2015</option>
															<option>2014</option>
															<option>2013</option>
															<option>2012</option>
															<option>2011</option>
															<option>2010</option>
															<option>2009</option>
															<option>2008</option>
															<option>2007</option>
															<option>2006</option>
															<option>2005</option>
															<option>2004</option>
															<option>2003</option>
															<option>2002</option>
															<option>2001</option>
															<option>2000</option>
															<option>1999</option>
															<option>1998</option>
															<option>1997</option>
															<option>1996</option>
															<option>1995</option>
															<option>1994</option>
															<option>1993</option>
															<option>1992</option>
															<option>1991</option>
															<option>1990</option>
															<option>1989</option>
															<option>1988</option>
															<option>1987</option>
														</select>';}?><span class="mdi mdi-calendar-multiple"></span><br>
														Sexo: <br>
														<select style="width:50%" name="sexo">
															<?php
															if($sexo == 'Feminino'){
																echo '<option>Escolher</option>
																<option selected>Feminino</option>
																<option>Masculino</option>';
															}if($sexo == 'Masculino'){
																echo '<option>Escolher</option>
																<option>Feminino</option>
																<option selected>Masculino</option>';
															}else{
																echo '<option>Escolher</option>
																<option>Masculino</option>
																<option>Feminino</option>';
															}
															?>
														</select><span class="mdi mdi-face"></span><br>
														<input type="text" style="width:100%" name="idade" placeholder="Nenhuma informação existente." value="<?php echo $atual; ?>" hidden><br><hr>
														<h3>2. Informações da escolarização</h3>
														Escola: <br><?php if($escolaorigem != null){echo '<input type="text" style="width:100%" name="escola_origem" placeholder="Nenhuma informação existente." value="' .$escolaorigem. '">';}else{echo '<select style="width:50%" name="escola_origem"><option>Selecionar</option>';
														$select = mysqli_query($link, "SELECT * FROM tb_escola") or die(mysqli_error($link));
														while ($linha = mysqli_fetch_array($select)) {
															echo "<option>";
															echo $linha['nomeEscola'];
															echo "</option>";
														}
													}?>
												</select><span class="mdi mdi-store"></span><br>
												Telefone da escola: <br><input type="text" style="width:100%" name="telefone_escola" placeholder="Nenhuma informação existente." value="<?php echo $telefoneescola; ?>"><br>
												CRE: <br><input type="text" style="width:100%" name="cre" placeholder="Nenhuma informação existente." value="<?php echo $cre; ?>"><br><br>
												Escolaridade:<br>
												<select style="width:50%" name="serie">
													<option>Escolher</option>
													<option>Infantil</option>
													<option>Fundamental</option>
													<option>Ensino Médio</option>
												</select><br>
												Turno:<br> <select style="width:50%" name="turno">
												<option>Matutino</option>
												<option>Vespertino</option>
											</select><br><br><hr>
											<h3>3. Informações dos responsáveis</h3>
											Endereço residencial: <br><input type="text" style="width:100%" name="endereco_residencial" placeholder="Nenhuma informação existente."><br>
											Telefone: <br><input type="text" style="width:100%" name="telefone" placeholder="Nenhuma informação existente."><br><br>
											<h5>Nome do pai:</h5><input type="text" style="width:100%" name="nome_pai" placeholder="Nenhuma informação existente."><br>
											Profissão do pai: <br><input type="text" style="width:100%" name="profissao_pai" placeholder="Nenhuma informação existente."><br>
											Telefone do trabalho: <br><input type="text" style="width:100%" name="telefone_trab_pai" placeholder="Nenhuma informação existente."><br>
											Celular do pai: <br><input type="text" style="width:100%" name="celular_pai" placeholder="Nenhuma informação existente."><br>
											Email do pai: <br><input type="text" style="width:100%" name="email_pai" placeholder="Nenhuma informação existente."><br><br>
											<h5>Nome da mãe:</h5><input type="text" style="width:100%" name="nome_mae" placeholder="Nenhuma informação existente."><br>
											Profissão da mãe: <br><input type="text" style="width:100%" name="profissao_mae" placeholder="Nenhuma informação existente."><br>
											Telefone do trabalho: <br><input type="text" style="width:100%" name="telefone_trab_mae" placeholder="Nenhuma informação existente."><br>
											Celular da mãe: <br><input type="text" style="width:100%" name="celular_mae" placeholder="Nenhuma informação existente."><br>
											Email da mãe: <br><input type="text" style="width:100%" name="email_mae" placeholder="Nenhuma informação existente."><br><hr>
											<h3>4. Observação do(a) itinerante</h3>
											Área indicada: <br>
											<select style="width:120px" name="area_indicada">
												<option>Escolher</option>
												<option>Acadêmico</option>
												<option>Talento</option>
											</select><br>
											Número da ficha: <br><input type="text" style="width:100%" name="devolutiva" placeholder="Nenhuma informação existente."><br>
											Início do período de observação: <br><input type="text" style="width:100%" name="inicio_periodo_obs" placeholder="Nenhuma informação existente." value="Assim que coloca para atualizar"><br>
											Devolutiva: <br><input type="text" style="width:100%" name="devolutiva" placeholder=""><br>
											Efetivado: <br><input type="text" style="width:100%" name="efetivado" placeholder=""><br>
											Desligado: <br><input type="text" style="width:100%" name="desligado" placeholder=""><br>
											Motivo: <br><input type="text" style="width:100%" name="motivo" placeholder=""><br><br>
											<input type="submit" value="Atualizar Cadastro">  <input type="Reset" value="Resetar Preenchimento">
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
					
				</form>                        </div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End PAge Content -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- footer -->
	<!-- ============================================================== -->
	<footer class="footer"> © 2017 Material Pro Admin by wrappixel.com </footer>
	<!-- ============================================================== -->
	<!-- End footer -->
	<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="/sucah/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="/sucah/assets/plugins/bootstrap/js/tether.min.js"></script>
<script src="/sucah/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="/sucah/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="/sucah/js/waves.js"></script>
<!--Menu sidebar -->
<script src="/sucah/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="/sucah/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="/sucah/js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!-- chartist chart -->
<script src="/sucah/assets/plugins/chartist-js/dist/chartist.min.js"></script>
<script src="/sucah/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!--c3 JavaScript -->
<script src="/sucah/assets/plugins/d3/d3.min.js"></script>
<script src="/sucah/assets/plugins/c3-master/c3.min.js"></script>
<!-- Chart JS -->
<script src="/sucah/js/dashboard1.js"></script>
</body>

</html>
