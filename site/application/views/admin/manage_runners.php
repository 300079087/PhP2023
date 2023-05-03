<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= asset_url() ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= asset_url() ?>css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= asset_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php
        $this->load->view('includes/header.php');
        $this->load->view('includes/menu.php');
        ?>
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <h2>Contextual Classes</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Page</th>
                                <th>Visits</th>
                                <th>% New Visits</th>
                                <th>Revenue</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="active">
                                <td>/index.html</td>
                                <td>1265</td>
                                <td>32.3%</td>
                                <td>$321.33</td>
                            </tr>
                            <tr class="success">
                                <td>/about.html</td>
                                <td>261</td>
                                <td>33.3%</td>
                                <td>$234.12</td>
                            </tr>
                            <tr class="warning">
                                <td>/sales.html</td>
                                <td>665</td>
                                <td>21.3%</td>
                                <td>$16.34</td>
                            </tr>
                            <tr class="danger">
                                <td>/blog.html</td>
                                <td>9516</td>
                                <td>89.3%</td>
                                <td>$1644.43</td>
                            </tr>
                            <tr>
                                <td>/404.html</td>
                                <td>23</td>
                                <td>34.3%</td>
                                <td>$23.52</td>
                            </tr>
                            <tr>
                                <td>/services.html</td>
                                <td>421</td>
                                <td>60.3%</td>
                                <td>$724.32</td>
                            </tr>
                            <tr>
                                <td>/blog/post.html</td>
                                <td>1233</td>
                                <td>93.2%</td>
                                <td>$126.34</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?= asset_url() ?>js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= asset_url() ?>js/bootstrap.min.js"></script>

</body>

</html>
