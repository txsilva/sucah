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
    <title>Central de Usuário - Altas Habilidades</title>
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
<body>
    <?php
    require 'config.php';
    require 'funcoes.php';

//Start the session
    session_start();

    $matricula = $_POST['matricula'];


    $senha = $_POST['senha'];

    $_SESSION['matricula'] = $matricula;

    $acesso = 0;

    $link = DBConnect();
    $select = mysqli_query($link, "SELECT * FROM tb_professor") or die(mysqli_error($link));
    while ($linha = mysqli_fetch_array($select)){
     if((($linha['matriculaProf'] == $matricula) && ($linha['senha'] == $senha)) && ($linha['privilegio'] == 'sala_recurso')){
      $acesso = 1;
      $_SESSION['privilegio'] = $linha['privilegio'];
      echo '<div class="card">
      <div class="card-block bg-primary">
        <h1 class="text-white card-title">Central do Usuário</h1>
        <h5 class="card-subtitle text-white ">Verificação, ajustes e atualizações de conta.</h5>
    </div>
    <div class="card-block">
        <div class="message-box contact-box">
            <div class="message-widget contact-widget">
                <!-- Message -->
                <h1  class="mdi mdi-numeric-1-box-multiple-outline">Professor da Sala de Recurso</h1>
                <h4>Sr.(a) '. $linha['nomeProfessor'] .'<br><br>
                    Você poderá acessar a página do seu centro de atendimento, realizar atendimentos e ver relatórios gerados sobre esse centro.

                    O sistema está sendo iniciando a sessão. Aguarde e em instantes tudo estará pronto.</h4>
                    <center><img src="assets/images/carregando.gif" width="100px" class="light-logo" alt="Carregando"/></center>
                    <meta http-equiv="refresh" content="10;url=index_recurso.php">
                </div>
            </div>
        </div>
    </div>';
}

if((($linha['matriculaProf'] == $matricula) && ($linha['senha'] == $senha)) && ($linha['privilegio'] == 'itinerante')){
  $acesso =2;
  $_SESSION['privilegio'] = $linha['privilegio'];
  echo '<div class="card">
  <div class="card-block bg-primary">
    <h1 class="text-white card-title">Central do Usuário</h1>
    <h5 class="card-subtitle text-white ">Verificação, ajustes e atualizações de conta.</h5>
</div>
<div class="card-block">
    <div class="message-box contact-box">
        <div class="message-widget contact-widget">
            <!-- Message -->
            <h1 class="mdi mdi-numeric-2-box-multiple-outline">Professor Itinerante</h1>
            <h4>Sr.(a) '. $linha['nomeProfessor'] .'<br><br>
                Você poderá acessar a página do seu centro de atendimento, inscrever alunos, realizar atendimentos e gerar relatórios sobre esse centro.

                O sistema está sendo iniciando a sessão. Aguarde e em instantes tudo estará pronto.</h4>
                <center><img src="assets/images/carregando.gif" width="100px" class="light-logo" alt="Carregando"/></center>
                <meta http-equiv="refresh" content="10;url=index_itinerante.php">
            </div>
        </div>
    </div>
</div>';
}

if((($linha['matriculaProf'] == $matricula) && ($linha['senha'] == $senha)) && ($linha['privilegio'] == 'regional')){
  $acesso =3;
  $_SESSION['privilegio'] = $linha['privilegio'];
  echo '<div class="card">
  <div class="card-block bg-primary">
    <h1 class="text-white card-title">Central do Usuário</h1>
    <h5 class="card-subtitle text-white ">Verificação, ajustes e atualizações de conta.</h5>
</div>
<div class="card-block">
    <div class="message-box contact-box">
        <div class="message-widget contact-widget">
            <!-- Message -->
            <h1 class="mdi mdi-numeric-2-box-multiple-outline">Administrativo Uniube</h1>
            <h4>Sr.(a) '. $linha['nomeProfessor'] .'<br><br>
                Você poderá acessar a página da regional da SEEDF, gerar relatório de cada unidade, relatório geral e .

                O sistema está sendo iniciando a sessão. Aguarde e em instantes tudo estará pronto.</h4>
                <center><img src="assets/images/carregando.gif" width="100px" class="light-logo" alt="Carregando"/></center>
                <meta http-equiv="refresh" content="10;url=index_regional.php">
            </div>
        </div>
    </div>
</div>';
}

}


if($acesso == 0){
	echo '<div class="card">
    <div class="card-block bg-primary">
        <h1 class="text-white card-title">Central do Usuário</h1>
        <h5 class="card-subtitle text-white ">Verificação, ajustes e atualizações de conta.</h5>
    </div>
    <div class="card-block">
        <div class="message-box contact-box">
            <div class="message-widget contact-widget">
                <!-- Message -->
                <h1 class="mdi mdi-comment-alert-outline"></h1> <h4> Talvez possa estar havendo um engano, verifique o usuário e senha.</h4><br><br>
                <meta http-equiv="refresh" content="10;url=login.html">
            </div>
        </div>
    </div>
</div>';

}

?>

<center>
    <footer class="text-center"> © 2018 SEDF GDF - UnB</footer>
</center>
</body>
</html>
