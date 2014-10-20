<?php
include_once ('../account/authenticateDo.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Bootstrap Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link type="text/css" rel="stylesheet" href="../css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link type="text/css" rel="stylesheet" href="../css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link type="text/css" rel="stylesheet" href="../fonts/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="../pages/home.php">Inkskin</a>
            </div>
            
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <?php
                    error_reporting(0);
                    if (isset($_SESSION['logged'])) {
                ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"> <?php print($_SESSION['logged']); ?> </i>
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../pages/index.php?view=profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="../pages/index.php?view=settings"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../account/logoutDo.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <?php
                    } else {
                ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"> <?php print('[?]'); ?> </i>
                        <b class="caret-out"></b></a>
                    </a>
                </li>
                <?php
                    }
                ?>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only"></span>
                            <!-- <span class="sr-only">Toggle navigation</span> -->
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="../pages/index.php?view=home">Home</a>
                            </li>
                            <li>
                                <a href="../pages/index.php?view=register">Register</a>
                            </li>
                            <li>
                                <a href="../pages/index.php?view=login">Login</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Studios <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a>
                                    </li>
                                    <li><a href="#">Another action</a>
                                    </li>
                                    <li><a href="#">Something else here</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Nav header</li>
                                    <li><a href="#">Separated link</a>
                                    </li>
                                    <li><a href="#">One more separated link</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Perfil</small>
                            <?php if (isset($_SESSION['logged'])) { ?>
                            <?php print($_SESSION['logged']); ?>
                            <?php } ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../pages/index.php">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Perfil
                            </li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-2 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <?php
                            if (isset($_SESSION['logged'])) {
                                include_once ('../inc/Database.php');

                                $dbAccuracy = new Database();
                                $dbProfile = new Database();

                                $result = $dbAccuracy->rs_manager(
                                    "SELECT " .
                                        "full_name, " .
                                        "user_name, " .
                                        "user_email, " .
                                        "address, " .
                                        "city, " .
                                        "state, " .
                                        "country, " .
                                        "telephone, " .
                                        "cellphone, " .
                                        "presentation, " .
                                        "image " .
                                    "FROM users WHERE id='" . $_SESSION['idi'] . "'");

                                while($row = mysql_fetch_row($result)){
                                    $empty_count = 0;
                                    $count = count($row);
                                    for($i = 0; $i < $count; $i++) {
                                        if($row[$i] == '' || $row[$i] == 'NULL') {
                                            $empty_count++;
                                        }
                                    }
                                    print("<strong style='float:left;color:#4f4f4f;'>&nbsp;Perfil Completo</strong>");
                                    print("<strong style='font-size:16px;float:right;'>");
                                    print($percentage = ((int)(100*(1-$empty_count/($count)))));
                                    print('<strong>%&nbsp;</strong>');
                                    print('</strong>');

                                    $num_rows = mysql_num_fields($result);

                                    print("<div class='percent-level'>");
                                    print("<div style='width:" . $percentage . "%; background-color:#458B00; height:6px;'></div>");
                                    print("</div>");
                                }
                                mysql_close($dbAccuracy);
                            ?>
                            </div>
                        </div>
                        
                        <?php
                        $rsProfile = $dbProfile->rs_manager(
                            "SELECT ".
                                "image " .
                            "FROM " .
                                "users " .
                            "WHERE " .
                                "id='" . $_SESSION['idi'] . "'");

                        if (mysql_num_rows($rsProfile) == 0) {
                            print('<label>Nenhum registro encontrado</label>');
                        } else {
                            while ($rowValuesProfile = mysql_fetch_assoc($rsProfile)) {
                        ?>
                        
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <img src="../img/user/<?php print($rowValuesProfile['image']); ?>" title="Profile Image" alt="Add a Profile Image"/>
                            </div>
                        </div>
                        
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <ul class="nav-profile">
                                    <li><a href="../pages/settings.php"><i class="fa fa-fw fa-book"></i> Configurações</a></li>
                                    <li><a href="../pages/account.php"><i class="fa fa-fw fa-key"></i> Alterar Senha</a></li>
                                    <li><a href="../pages/studio.php"><i class="fa fa-fw fa-star"></i> Meu Studio</a></li>
                                    <li><a href="../pages/gallery.php"><i class="fa fa-fw fa-folder"></i> Minha Galeria</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="panel-body-padd">
                                <form role="form" action="../inc/registerDo.php" method="POST" onsubmit="" onload="return onLoadPage();">
                                    
                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" id="" name="" class=""/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
                <?php
                        }
                    }
                        mysql_close($dbProfile);
                    } else {
                ?>
                <div><label>Nenhum registro encontrado</label></div>
                <?php
                    }
                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Versions -->
    <script src="../js/jquery-1.11.0.js"></script>
    <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
    
    <!-- Input Temple Validator -->
    <script type="text/javascript" src="../js/loaders/valitade-inputs.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/plugins/truster/general-validate-function.js"></script>
    <script type="text/javascript" src="../js/plugins/truster/jquey-validate-min.js"></script>
    
    <!-- Javascrpts and jQuery on page loading -->
    <script type="text/javascript" src="../js/loaders/auto-loader.js"></script>
</body>
</html>