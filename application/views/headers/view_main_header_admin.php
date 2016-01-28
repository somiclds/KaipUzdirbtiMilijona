<!DOCTYPE html>
<html lang="lt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kaip uždirbti milijoną</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo asset_url() ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo asset_url() ?>css/grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo asset_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">   <!--  var navbar = page-top.getAttribute('data-target'); // navbar = '.navbar-fixed-top' -->

<!-- Fixed navigation buttons -->
<a class = navBtn id="fixedButtonUp">
    <i class="fa fa-chevron-up"></i>
</a>
<a class = navBtn id="fixedButtonDown">
    <i class="fa fa-chevron-down"></i>
</a>

<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <i class="fa fa-home"></i>  <span class="light">Pradžia</span>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#about">Apie idėją</a>
                </li>
                <li>
                    <a class="page-scroll" href="#board">Reklama</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Kontaktai</a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>index.php/site/blogas">Blogas </a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>index.php/site/imones">Įmonės</a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>index.php/site/logout">Atsijungti</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>