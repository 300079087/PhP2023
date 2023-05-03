

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Run Master</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= asset_url() ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= asset_url() ?>css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= asset_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
        if(isset($load_error))
        {
            $load_error=null;
            echo "<script>window.onload=function(){location.href='#login'}</script>";
        }
    ?>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li>
                        <a href="#login">Login</a>
                    </li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Runners Page</h1>
                        <h3>Interested in Running?</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><span class="network-name">Walking?</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><span class="network-name">Running?</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><span class="network-name">Marathon/Ultra?</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	<a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Walking?<br>Walking is Healthy For Everyone</h2>
                    <p class="lead">Walking, running, and sprinting is <a target="_blank" href="http://join.deathtothestockphoto.com/">Running Image</a> for everyone, no matter your age and conditions. Please enjoy and have a good time.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="<?= asset_url() ?>img/Runner.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Running<br>by Austin-Marathons</h2>
                    <p class="lead">Interested in running around the world?: <a target="_blank" href="http://www.psdcovers.com/">Signup!</a>Running improves your life in every way possible.</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="<?= asset_url() ?>img/Run.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Marathons / Ultra Maraaaaathons?<br>INTERESTED?</h2>
                    <p class="lead">Marathons and Ultra Marathons are for <a target="_blank" href="http://www.google.com/fonts">MARATHON?</a>, the best of the best? Do you think you got what it takes?</a>.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="<?= asset_url() ?>img/runnerbeach.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <a  name="login"></a>
    <div class="content-section-b">

        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-sm-12">
                    <?=validation_errors('<p class= "error">'); ?>
                    <?php
                    if (isset($error_message)){$error_message=null; echo "<p class= 'error'>$error_message</p>";}
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 col-sm-1">
                </div>
                <div class="col-lg-4 col-sm-5">
                    <h1> Login Account: </h1>
                    <?php
                        echo form_open('home/login');
                        echo form_input('user_name',"",'placeholder="User Name / Email Address"') . "<br/>";
                        echo form_password('password',"",'placeholder="Password"') . "<br/>";
                        echo form_submit('submit','Login') . "<br/>";
                        echo form_close();
                    ?>
                </div>
                <div class="col-lg-4 col-lg-offset-2 col-sm-5">
                    <h1> Create Account: </h1>
                    <?php
                    echo form_open('home/create');
                    echo form_input('user_name',"",'placeholder="User Name"')."<br/>";
                    echo form_input('email',"",'placeholder="Email Account"')."<br/>";
                    echo form_password('password',"",'placeholder="Password"')."<br/>";
                    echo form_password('confirm_password',"",'placeholder="Confirm Password"')."<br/>";

                    if('password' != 'confirm_password')
                    {
                        $error_message = 'Invalid Password Match';
                    }

                    echo form_submit('submit','Create')."<br/>";
                    echo form_close();
                    ?>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>


	<a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Marathon / Running Website!</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><span class="network-name">Walking</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"> <span class="network-name">Running</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><span class="network-name">Marathons / Ultras</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?= asset_url() ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= asset_url() ?>js/bootstrap.min.js"></script>

</body>

</html>
