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
    <link rel="icon" type="image/png" sizes="16x16" href="/sucah/assets/images/favicon.png">
    <title>Administrativo - Altas Habilidades</title>
    <!-- Bootstrap Core CSS -->
    <link href="/sucah/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="/sucah/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="/sucah/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="/sucah/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="/sucah/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/sucah/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="/sucah/css/colors/blue.css" id="theme" rel="stylesheet">
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
                        <h3 class="text-themecolor">Relatório Simples</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Pages</li>
                            <li class="breadcrumb-item active">Relatorio</li>
			    <li class="breadcrumb-item active">Relatorio Simples</li>
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
                            <div class="card-block bg-primary">
                                <h1 class="text-white card-title"><span class="mdi mdi-presentation"></span>Relatório para simples conferência</h1>
                            </div>
                          <div class="card-block">
                                <div class="message-box contact-box">
                                    <h2 class="add-ct-btn"><button type="button" class="btn btn-circle btn-lg btn-warning waves-effect waves-dark">?</button></h2>
<div class="message-widget contact-widget">
                                        <!-- Message -->
<h4 class="card-subtitle text-black"><span class="mdi mdi-transfer"></span> Relatório para simples conferência da sala de recurso.  </h4>
	<h3>1. Dados do centro de atendimento</h3>
	<?php 
		$select = mysqli_query($link, "SELECT * FROM tb_escola") or die(mysqli_error($link));
                          while ($linha = mysqli_fetch_array($select)) {
				if($linha['codEscola'] == $cod_escola){
					echo "Nome do centro: " .$linha['nomeEscola']. "<br>";
					echo "CRE: " .$linha['cre']. "<br>";
					$cre = $linha['cre'];
					echo "Endereco: " .$linha['endereco']. "<br>";
					echo "Telefone: " .$linha['telefone']. "<br><br>";
					echo "Descrição: " .$linha['descricao']. "<br>";
				}
                        }
?>
<br>
	<h3>2. Professores do centro de atendimento</h3>
	<?php 
		$select = mysqli_query($link, "SELECT * FROM tb_professor") or die(mysqli_error($link));
                          while ($linha = mysqli_fetch_array($select)) {
				if($linha['codEscola'] == $cod_escola){	
					echo "Professor(a): " .$linha['nomeProfessor']. ", especialista em " .$linha['especialidade']. ", da área de " .$linha['area']. ".";
				}
                        }
?>
<br>
	
	<h3>3. Atendimentos realizados</h3>
	<h5 class="card-subtitle text-black"><span class="mdi mdi-transfer"></span> Lista dos últimos 20 atendimentos</h5>
<?php
$count = 0;
		$select = mysqli_query($link, "SELECT * FROM tb_atendimento") or die(mysqli_error($link));
                          while ($linha = mysqli_fetch_array($select)) {
				if(($linha['cre'] == $cre) && ($count <= 19)){
					$count = $count + 1;
					echo "<hr>Estudante " .$linha['nomeAluno']. ", " .$linha['itinerante']. ", código do aluno " .$linha['matriculaAluno']. ", " .$linha['serie']. "º série, professor" .$linha['professor']. ", situação " .$linha['situacao']. ", turno " .$linha['turno']. "<hr>";
				}
                        }
?>
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
