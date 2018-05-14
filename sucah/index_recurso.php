<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Dashboard - Altas Habilidades</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
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
            $_SESSION['privilegio'] = $linha['privilegio'];
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
                        <a class="navbar-brand" href="index.php" style="color:#ffffff;">
                          
                            <!-- Logo text --><span>
                            
                            <!-- Light Logo text -->
                            <img src="assets/images/logo1.png" class="light-logo" alt="Altas Habilidades"/>Altas Habilidades</span> </a>
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
                                     <!-- Talvez irei retirar essa opção de campo de busca porque podemos acessar por botões, mas pode ser interessante poder acessar por pesquisa também -->
                                     <input type="text" class="form-control" placeholder="Aluno, professor, atendimento ou relatório?"><a class="srh-btn"><i class="ti-close"></i></a> </form>
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
                                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="profile-pic m-r-10" /><?php echo $user; ?></a>
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
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav">
                                <li> <a class="waves-effect waves-dark" href="index.html" aria-expanded="false"><i class="mdi mdi-school"></i><span class="hide-menu">Sala de Recurso</span></a>
                                </li>
                                <li> <a class="waves-effect waves-dark" href="pages-profile.html" aria-expanded="false"><i class="mdi mdi-brightness-auto"></i><span class="hide-menu">Açoes</span></a>
                                </li>
                                <li> <a class="waves-effect waves-dark" href="table-basic.html" aria-expanded="false"><i class="mdi mdi-account-card-details"></i><span class="hide-menu">Itinerante</span></a>
                                </li>
                            </ul>
                        </nav>
                        <!-- End Sidebar navigation -->
                    </div>
                    <!-- End Sidebar scroll-->
                    <!-- Bottom points-->
                    <div class="sidebar-footer">
                        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Ajustes"><i class="ti-settings"></i></a>
                        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Mensagem"><i class="mdi mdi-gmail"></i></a>
                        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Encerrar sessão"><i class="mdi mdi-power"></i></a> </div>
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
                                    <h3 class="text-themecolor">Sala de Recurso</h3>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                        <li class="breadcrumb-item active">Sala de Recurso</li>
                                    </ol>
                                </div>
                                
                            </div>
                            <!-- ============================================================== -->

                            
                            <!-- Row -->
                            <div class="row">
                                <!-- Column -->
                                <div class="col-lg-12 col-xlg-3 col-md-5">
                                    <!-- Column -->
                                    <?php
                                    $select = mysqli_query($link, "SELECT * FROM tb_escola") or die(mysqli_error($link));
                                    while ($linha = mysqli_fetch_array($select)) {
                                        if($linha['codEscola'] == $cod_escola){                            
                                           $nomeEscola = $linha['nomeEscola'];
                                           $cre = $linha['cre'];
                                           $endereco = $linha['endereco'];
                                           $descricao = $linha['descricao'];
                                       }
                                   }
                                   ?>
                                   <div class="card">
                                     <?php
                                     if($cre == 'Asa Sul'){                           
                                       echo '<img class="card-img-top" src="assets/images/big/taguatinga.jpg" alt="Card image cap">';
                                   }else{
                                       echo '<img class="card-img-top" src="assets/images/background/profile-bg2.jpg" alt="Card image cap">';
                                   }
                                   ?>
                                   <div class="card-block little-profile text-center">
                                    <div class="pro-img"><img src="assets/images/background/circle-bg.jpg" alt="user" /></div>
                                    <h3 class="m-b-0"><?php echo "$nomeEscola"; ?></h3>
                                    <p><?php echo "$cre"; ?></p>
                                    <div class="row text-center m-t-20">
                                        <div class="col-lg-4 col-md-4 m-t-20">
                                            <h3 class="m-b-0 font-light"><?php
                                                $select = mysqli_query($link, "SELECT * FROM tb_inscricao") or die(mysqli_error($link));
                                                $count_inscricao = 0;
                                                while ($linha = mysqli_fetch_array($select)) {
                                                    if($linha['cre'] == $cre){
                                                       $count_inscricao ++;
                                                   }
                                               }
                                               echo "$count_inscricao";
                                               ?></h3><small>Inscritos<br><i class="mdi mdi-account-settings"></i></small></div>
                                               <div class="col-lg-4 col-md-4 m-t-20">
                                                <h3 class="m-b-0 font-light"><?php
                                                    $select = mysqli_query($link, "SELECT * FROM tb_atendimento") or die(mysqli_error($link));
                                                    $count_atendimento = 0;
                                                    while ($linha = mysqli_fetch_array($select)) {
                                                        if($linha['cre'] == $cre){
                                                           $count_atendimento ++;
                                                       }
                                                   }
                                                   echo "$count_atendimento";
                                                   ?></h3><small>Atendimentos<br><i class="mdi mdi-format-float-none"></i></small></div>
                                                   <div class="col-lg-4 col-md-4 m-t-20">
                                                    <h3 class="m-b-0 font-light">Onde?</h3><small>Mapa<br><i class="mdi mdi-earth"></i></small></div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="card">
                                            <div class="card-block bg-success">
                                                <h1 class="text-white card-title">Painel de ações</h1>
                                                <h5 class="card-subtitle text-white ">As ações abaixo executam uma função</h5>
                                            </div>
                                            <div class="card-block">
                                                <div class="message-box contact-box">
                                                    <h2 class="add-ct-btn"><button type="button" class="btn btn-circle btn-lg btn-warning waves-effect waves-dark">?</button></h2>
                                                    <div class="message-widget contact-widget">
                                                        <!-- Message -->
                                                        <span class="mdi mdi-numeric-1-box-multiple-outline"></span><a href="pages/inscricao/inscricao.php"><button class="btn btn-success " style="width:100%; height:3rem;"><b>ESTUDANTE <i class="mdi mdi-contacts"></i></b></button></a>
                                                        <span class="mdi mdi-numeric-2-box-multiple-outline"></span><a href="pages/atendimento/atendimento.php"><button class="btn btn-info" style="width:100%; height:3rem;"><b>ATENDIMENTO <i class="mdi mdi-format-float-none"></i></b></button></a>
                                                        <span class="mdi mdi-numeric-3-box-multiple-outline"></span><a href="pages/demanda/demanda.php"><button class="btn btn-success" style="width:100%; height:3rem;"><b>DEMANDA REPRIMIDA <i class="mdi mdi-format-list-numbers"></i></b></button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                
                                <!-- Column -->
                                <div class="card">
                                    <div class="card-block bg-info">
                                        <h4 class="text-white card-title">Professores da unidade</h4>
                                        <h5 class="card-subtitle text-white">Veja a lista abaixo</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="message-box contact-box">
                                            <h2 class="add-ct-btn"><button type="button" class="btn btn-circle btn-lg btn-warning waves-effect waves-dark">?</button></h2>
                                            <div class="message-widget contact-widget">
                                                <!-- Message -->
                                                <?php
                                                $select = mysqli_query($link, "SELECT p.codProfessor, p.codEscola, p.nomeProfessor, p.especialidade, p.area, e.codEscola FROM tb_professor p, tb_escola e WHERE p.codEscola=e.codEscola ORDER BY p.nomeProfessor;") or die(mysqli_error($link));
                                                while ($linha = mysqli_fetch_array($select)) {
                                                    echo '<a href="#"><div class="user-img"> <span class="round btn-primary">0'. $linha['codProfessor']. '';
                                                    echo '</span></div><div class="mail-contnet"><h5>';
                                                    echo $linha['nomeProfessor'];
                                                    echo '</h5><span class="mail-desc">';
                                                    echo $linha['especialidade'];
                                                    echo " - " .$linha['area'];
                                                    echo '</span></div></a>';
                                                }
                                                ?>                                       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- coloquei essa tag de fechamento da div para recolocar o footer no lugar -->
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
        <footer class="footer"> © 2018 SEDF GDF - UnB</footer>
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
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="assets/plugins/bootstrap/js/tether.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!-- chartist chart -->
<script src="assets/plugins/chartist-js/dist/chartist.min.js"></script>
<script src="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!--c3 JavaScript -->
<script src="assets/plugins/d3/d3.min.js"></script>
<script src="assets/plugins/c3-master/c3.min.js"></script>
<!-- Chart JS -->
<script src="js/dashboard1.js"></script>
</body>

</html>
