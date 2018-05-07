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
<?php
			//Start the session
			session_start();
			//Verifica se o usuário está logado ou não
			if($_SESSION['matricula'] == NULL){
				echo '<meta http-equiv="refresh" content="0;url=login.html">';
			}else{
				$login_matricula = $_SESSION['matricula'];
			}
			
			//Conexão com o banco de dados
                        require 'config.php';
                        require 'funcoes.php';
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
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/sucah/assets/images/users/1.jpg" alt="user" class="profile-pic m-r-10" /><?php echo $user; ?></a>
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
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Conta"><i class="ti-settings"></i></a>
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Notícia(s)"><i class="mdi mdi-gmail"></i></a>
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Sair sessão"><i class="mdi mdi-power"></i></a> </div>
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
                        <h3 class="text-themecolor">Cadastro de Estudante</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Ação</li>
                            <li class="breadcrumb-item active">Cadastro de Estudante</li>
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
                            <div class="card-block bg-success">
                                <h1 class="text-white card-title"><span class="mdi mdi-account-card-details"></span>Formulário de Cadastro de Estudante</h1>
                            </div>
                          <div class="card-block">
                                <div class="message-box contact-box">
                                    <h2 class="add-ct-btn"><button type="button" class="btn btn-circle btn-lg btn-warning waves-effect waves-dark">?</button></h2>
<div class="message-widget contact-widget">
                                        <!-- Message -->
<h4 class="card-subtitle text-black"><span class="mdi mdi-transfer"></span> Preencha as informações abaixo e depois acione o botão "Cadastrar Estudante".  </h4>
<form action="verifica_inscricao.php" name="inscricao" method="post" enctype="multipart/form-data">
	<h3>1. Informações do(a) estudante</h3>
	Código no IEDUCAR: <br><select style="width:50%" name="cod_aluno">
	<option>Selecionar</option>
	<?php 
		$select = mysqli_query($link, "SELECT * FROM tb_ieducar") or die(mysqli_error($link));
                          while ($linha = mysqli_fetch_array($select)) {
				if($linha['cadastrado'] == 0){
					echo "<option>";
					echo $linha['cod_aluno'];
					echo "</option>";
				}
                        }
?>
</select><span class="mdi mdi-account-key"></span>
<br>
	Nome completo: <br><input type="text" style="width:96%;" name="nomeAluno" placeholder=" Digite o nome completo do estudante."><br>
	Foto: <br><table border="1" width="50%"><tr><td><input type="file" style="width:100%" name="foto"></td></tr></table><br>
	Data de nascimento: <br><select style="width:30%"  name="data_nascimento">
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
				</select><span class="mdi mdi-calendar-multiple"></span><br>
<p id="data"></p>
<input type="text" style="width:97%" name="idade" placeholder="Qual a idade atual do estudante?" hidden>
	Sexo: <br>
		<select style="width:50%" name="sexo">
			<option>Escolher</option>
			<option>Feminino</option>
			<option>Masculino</option>
		</select>
<span class="mdi mdi-face"></span><br><br>
	<hr>
	<h3>2. Informações da escolarização</h3>
	Escola: <br><select style="width:50%" name="escola_origem"><option>Selecionar</option>
	<?php 
		$select = mysqli_query($link, "SELECT * FROM tb_escola") or die(mysqli_error($link));
                          while ($linha = mysqli_fetch_array($select)) {
				echo "<option>";
				echo $linha['nomeEscola'];
				echo "</option>";
                        }
?>
</select><span class="mdi mdi-store"></span><br>
	Telefone da escola: <br><input type="text" style="width:97%" name="telefone_escola" placeholder="Informe da escola que indicou esse estudante.">
<br>
	CRE: <br><select type="text" style="width:50%" name="cre">
		<option>Selecionar</option>
<?php 
		$select = mysqli_query($link, "SELECT * FROM tb_escola") or die(mysqli_error($link));
                          while ($linha = mysqli_fetch_array($select)) {
				echo "<option>";
				echo $linha['cre'];
				echo "</option>";
                        }
?></select><span class="mdi mdi-map-marker-circle"></span><br>
	Escolaridade:<br>
		<select style="width:45%" name="serie" onchange="mostra_escolaridade()">
			<option value="0" selected>Escolher</option>
			<option value="1">Precoce</option>
			<option value="2">Infantil</option>
			<option value="3">Fundamental</option>
			<option value="4">Ensino Médio</option>
		</select><span class="mdi mdi-chair-school">
		<span id="divEscolaridade"></span>
		<br>
<script language="jscript">
	function mostra_escolaridade(){
		//Valor escolhido da escolaridade
		var escolaridade
		escolaridade = document.inscricao.serie[document.inscricao.serie.selectedIndex].value
		if(escolaridade == 1){
			document.getElementById("divEscolaridade").innerHTML = "<select style='width:45%' name='serie1'><option selected>--</option><option>Precoce 1</option><option>Precoce 2</option></select>";
		}		
		if(escolaridade == 2){
			document.getElementById("divEscolaridade").innerHTML = "<select style='width:45%' name='serie1'><option selected>--</option><option>Intanfil 1</option><option>Infantil 2</option><option>Infantil 3</option></select>";
		}
		if(escolaridade == 3){
			document.getElementById("divEscolaridade").innerHTML = "<select style='width:45%' name='serie1'><option selected>--</option><option>1º ano</option><option>2º ano</option><option>2º ano</option><option>4º ano</option><option>5º ano</option><option>6º ano</option><option>7º ano</option><option>8º ano</option><option>9º ano</option></select>";
		}
		if(escolaridade == 4){
			document.getElementById("divEscolaridade").innerHTML = "<select style='width:45%' name='serie1'><option selected>--</option><option>1 ano</option><option>2° ano</option><option>3° ano</option></select>";
		}
	}
</script>
	Turno:<br> <select style="width:50%" name="turno">
			<option>Selecionar</option>
			<option>Matutino</option>
			<option>Vespertino</option>
		</select><span class="mdi mdi-clock"></span><br><br>
<hr>
	<h3>3. Informações dos responsáveis</h3>
	Endereço residencial: <br><input type="text" style="width:97%" name="endereco_residencial" placeholder="Qual o endereço do estudante?"><br>
	Telefone: <br><input type="text" style="width:97%" name="telefone" placeholder="Informe o número de telefone do estudante?"><br><br>
	<h5>Nome do(a) responsável 1:</h5><input type="text" style="width:97%" name="nome_pai" placeholder="Qual o nome do(a) responsável 1?"><br>
	Profissão do(a) responsável 1: <br><input type="text" style="width:97%" name="profissao_pai" placeholder="Se houver, informe o telefone do(a) responsável 1."><br>
	Telefone do trabalho: <br><input type="text" style="width:97%" name="telefone_trab_pai" placeholder="Se houver, informe o telefone do trabalho do(a) responsável 1."><br>
	Celular do(a) responsável 1: <br><input type="text" style="width:97%" name="celular_pai" placeholder="Se houver, informe o celular do(a) responsável 1."><br>
	Email do(a) responsável 1: <br><input type="text" style="width:97%" name="email_pai" placeholder="Se houver, informe o email do(a) responsável 1."><br><br>
	<h5>Nome do(a) responsável 2:</h5><input type="text" style="width:97%" name="nome_mae" placeholder="Qual o nome do(a) responsável 2?"><br>
	Profissão do(a) responsável 2: <br><input type="text" style="width:97%" name="profissao_mae" placeholder="Se houver, informe o telefone do(a) responsável 2."><br>
	Telefone do trabalho: <br><input type="text" style="width:97%" name="telefone_trab_mae" placeholder="Se houver, informe o telefone do trabalho do(a) responsável 2."><br>
	Celular do(a) responsável 2: <br><input type="text" style="width:97%" name="celular_mae" placeholder="Se houver, informe o celular do(a) responsável 2."><br>
	Email do(a) responsável 2: <br><input type="text" style="width:97%" name="email_mae" placeholder="Se houver, informe o email do(a) responsável 2."><br><br>
	<h4>Observações sobre responsável:</h4><textarea rows="5" cols="100" name="anotacao" style="width:97%;" placeholder="Faça observações sobre o(s) responsáveis aqui."></textarea><br><hr>
	<h3>4. Observação do(a) itinerante</h3>
	Área indicada: <br>
	<select style="width:45%" name="area_indicada" onchange="mostra_area()">
		<option value="0">Escolher</option>
		<option value="1">Acadêmico</option>
		<option value="2">Talento</option>
	</select><span class="mdi mdi-package-variant"></span>
	<span id="divIndicada"></span>
<script language="jscript">
	function mostra_area(){
		//Valor escolhido da escolaridade
		var escolaridade
		escolaridade = document.inscricao.area_indicada[document.inscricao.area_indicada.selectedIndex].value
		if(escolaridade == 1){
			document.getElementById("divIndicada").innerHTML = "<select style='width:45%' name='area1'><option selected>--</option><option>Ciências exatas</option><option>Ciências humanas ou sociais</option><option>Lingugagem</option><option>Atividades</option></select>";
		}		
		if(escolaridade == 2){
			document.getElementById("divIndicada").innerHTML = "<select style='width:40%' name='area1'><option selected>--</option><option>Artes visuais</option><option>Artes cênicas</option><option>Artes musicais</option></select>";
		}
	}
</script><br>
	Início do período de observação: <br><select style="width:30%"  name="inicio_periodo_obs">
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
				</select><br>
	<input type="text" style="width:97%" name="devolutiva" placeholder="" hidden>
	<input type="text" style="width:97%" name="efetivado" placeholder="" hidden>
	<input type="text" style="width:97%" name="desligado" placeholder="" hidden>
	<input type="text" style="width:97%" name="motivo" placeholder="" hidden>
<hr><br>
<input type="submit" value="Cadastrar Estudante" class="btn btn-warning" onclick="cadastrar()">
<script type="text/javascript">
	function cadastrar(){
		alert("Deseja cadastrar o estudante?");
		document.getElementById("demo").innerHTML = "O estudante será cadastrado";
	}
</script>
<input type="Reset" value="Limpar Tudo" class="btn btn-danger" onclick="limpar()">
<script type="text/javascript">
	function limpar(){
		alert("Deseja limpar o formulário");
		document.getElementById("demo").innerHTML = "As informações foram dos campos foram limpas";
	}
</script>
<p id="demo"></p>
</form>
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
