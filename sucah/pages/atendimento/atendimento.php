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
                                        <h3 class="text-themecolor">Atendimento</h3>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                            <li class="breadcrumb-item active">Atendimento</li>
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
                                            <h1 class="text-white card-title">Formulário de Atendimento</h1>
                                            <h5 class="card-subtitle text-white ">Preencha as informações abaixo e depois  </h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="message-box contact-box">
                                                <h2 class="add-ct-btn"><button type="button" class="btn btn-circle btn-lg btn-warning waves-effect waves-dark">?</button></h2>
                                                <div class="message-widget contact-widget">
                                                    <!-- Message -->
                                                    <form action="verifica_atendimento.php" method="POST">
                                                     <h3>CRE:
                                                         <input type="text" style="width:100%;" name="cre">
                                                         Itinerante: <input type="text" style="width:100%;" name="itinerante" placeholder="Nome da(o) itinerante"></h3>
                                                         <h3>Data: 
                                                             <input type="text" style="width:100%;" name="data" placeholder="dd / mm / yyyy"></h3>
                                                             <h3>Matrícula: 
                                                                 <input type="text" style=width:100%;" name="matricula"><br><br></h3>
                                                                 <hr>
                                                                 <h4>Nome completo do aluno: 
                                                                     <br><input type="text" style="width:100%;" name="nome_aluno" placeholder="Nome do aluno"><br></h4>
                                                                     <h4>Data de Nascimento: 
                                                                         <br><input type="text" style="width:100%;" name="dn" placeholder="dd / mm / yyyy"><br></h4>
                                                                         <h4>Escola de origem: 
                                                                             <br><input type="text" style="width:100%;" name="escola_origem"><br></h4>
                                                                             <h4>Ano: 
                                                                                 <br><select style="width:100%;">
                                                                                 <option name="ano">Escolher série</option>
                                                                                 <option name="ano">1° Ano</option>
                                                                                 <option name="ano">2° Ano</option>
                                                                                 <option name="ano">3° Ano</option>
                                                                                 <option name="ano">4° Ano</option>
                                                                                 <option name="ano">5° Ano</option>
                                                                                 <option name="ano">6° Ano</option>
                                                                                 <option name="ano">7° Ano</option>
                                                                                 <option name="ano">8° Ano</option>
                                                                                 <option name="ano">9° Ano</option>
                                                                             </select><br><br></h4>
                                                                             <hr>
                                                                             <h4>Professor 1: 
                                                                                 <br><select style="width:100%;">
                                                                                 <option name="serie">Escolher professor</option>
                                                                                 <?php
                                                                                 $select = mysqli_query($link, "SELECT * FROM tb_professor") or die(mysqli_error($link));
                                                                                 while ($linha = mysqli_fetch_array($select)) {
                                                                                     echo "<option name=\"serie\">" .$linha['nomeProfessor']. "</option>";
                                                                                 }
                                                                                 ?>
                                                                             </select><br><br></h4>
                                                                             <h4>Professor 2: 
                                                                                 <br><select style="width:100%;">
                                                                                 <option name="serie">Escolher professor</option>
                                                                                 <?php
                                                                                 $select = mysqli_query($link, "SELECT * FROM tb_professor") or die(mysqli_error($link));
                                                                                 while ($linha = mysqli_fetch_array($select)) {
                                                                                     echo "<option name=\"serie\">" .$linha['nomeProfessor']. "</option>";
                                                                                 }
                                                                                 ?>
                                                                             </select><br><br></h4>
                                                                             <h4>Professor 3: 
                                                                                 <br><select style="width:100%;">
                                                                                 <option name="serie">Escolher professor</option>
                                                                                 <?php
                                                                                 $select = mysqli_query($link, "SELECT * FROM tb_professor") or die(mysqli_error($link));
                                                                                 while ($linha = mysqli_fetch_array($select)) {
                                                                                     echo "<option name=\"serie\">" .$linha['nomeProfessor']. "</option>";
                                                                                 }
                                                                                 ?>
                                                                             </select><br><br></h4>
                                                                             <h4>Professor 4: 
                                                                                 <br><select style="width:100%;">
                                                                                 <option name="serie">Escolher professor</option>
                                                                                 <?php
                                                                                 $select = mysqli_query($link, "SELECT * FROM tb_professor") or die(mysqli_error($link));
                                                                                 while ($linha = mysqli_fetch_array($select)) {
                                                                                     echo "<option name=\"serie\">" .$linha['nomeProfessor']. "</option>";
                                                                                 }
                                                                                 ?>
                                                                             </select><br><br></h4>
                                                                             <h4>Situação: 
                                                                                 <br><input type="text" style="width:100%;" name="situacao" style="width:100%"><br></h4>
                                                                                 <hr>
                                                                                 <h4>Dia da semana:
                                                                                     <br><select style="width:100%;">
                                                                                     <option name="serie">Escolher dia</option>
                                                                                     <option name="serie">Segunda-feira</option>
                                                                                     <option name="serie">Terça-feira</option>
                                                                                     <option name="serie">Quarta-feira</option>
                                                                                     <option name="serie">Quinta-feira</option>
                                                                                     <option name="serie">Sexta-feira</option>
                                                                                 </select><br><br></h4>
                                                                                 <h4>Turno:</h4>	
                                                                                 <div class="radio">
                                                                                  <label><input type="radio" name="turno" value="Turno" checked> Matutino</label>
                                                                              </div>
                                                                              <div class="radio">
                                                                                  <label><input type="radio" name="turno" value="Turno"> Vespertino</label>
                                                                              </div>
                                                                              <div class="radio">
                                                                                  <label><input type="radio" name="turno" value="Turno"> Noturno</label>
                                                                              </div>
                                                                              <br>
                                                                              <h4>Escola de origem: <br><select style="width:100%;" required>
                                                                                <option name="serie">Escolher escola</option>
                                                                                <?php
                                                                                $select = mysqli_query($link, "SELECT * FROM tb_escola") or die(mysqli_error($link));
                                                                                while ($linha = mysqli_fetch_array($select)) {
                                                                                    echo "<option name=\"serie\">" .$linha['nomeEscola']. "</option>";
                                                                                }
                                                                                ?>
                                                                            </select><br><br></h4>
                                                                            <h4>Telefone(s) para contato: 
                                                                             <br><input type="text" style="width:100%;" name="telefone_contato" style="width:100%"><br>
                                                                             <h4>Responsável: 
                                                                                 <br><input type="text" style="width:100%;" name="responsavel" style="width:100%"><br><br>
                                                                                 <input type="submit" value="Inscrever"><input type="reset" value="Limpar">
                                                                             </form>                      </div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
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
