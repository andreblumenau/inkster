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
    <title>Alterção de Conta</title>
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
<?php
    error_reporting(0);

    include_once ('../inc/Session.php');
    include_once ('../inc/Database.php');
    include_once ('../inc/dbAccount.php');
    include_once ('../inc/Session.php');

    $dbRecord = new Database();
    
    unset($_SESSION['users']);

    $errors = array();
    
    foreach ($_GET as $key => $value) {
        $get[$key] = filter($value); //get variables are filtered.
    }

    if ($_POST['UpdateDo'] == 'Confirma') {

        foreach ($_POST as $key => $value) {
            $data[$key] = filter($value); // post variables are filtered
        }

        $pass = $data['txtAccountUserPassword'];

        $result = mysql_query(
            "SELECT " .
                "id, " .
                "user_password, " .
                "user_level, " .
                "approved " .
            "FROM " .
                "users " .
            "WHERE " .
                "user_password='" .
                $pass .
            "' AND " .
                "banned='0'") or die(mysql_error());

        $num = mysql_num_rows($result);

        // Match row found with more than 1 results  - the user is authenticated. 
        if ($num > 0 && !$errors) {
            list($id, $pwd, $user_level, $approves) = mysql_fetch_row($result);

            if (!$approves) {
                //$msg = urlencode("Account not activated. Please check your email for activation code");
                $errors[] = "Verifique o código de ativação em seu E-mail.";

                //header("Location: login.php?msg=$msg");
                //exit();
            }
            if ($pwd === PwdHash($pass, substr($pwd, 0, 9))) {
                if (empty($errors)) {

                    // this sets session and logs user in  
                    //session_start();
                    session_regenerate_id(true); //prevent against session fixation attacks.
                    // this sets variables in the session 
                    $_SESSION['user_id'] = $id;
                    $_SESSION['user_level'] = $user_level;
                    $_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);

                    //update the timestamp and key for cookie
                    $stamp = time();
                    $ckey = GenKey();
                    mysql_query("UPDATE users SET ctime='$stamp', ckey = '$ckey' WHERE id='$id'") or die(mysql_error());

                    header("Location: ../pages/home.php");
                }
            } else {
                $rows = mysql_fetch_assoc($num);
                $_SESSION['users'] = $rows;
                Session::authValidateLogin();
                //header("Location: ../inc/accountChange.php");
            }
        } else {
            $errors[] = "Erro - A Senha informada é inválida.";
        }
    }
?>
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
                    if (isset( $_SESSION['logged'])) {
                ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"> <?php print( $_SESSION['logged']); ?> </i>
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
                                <i class="fa fa-dashboard"></i><a href="../pages/home.php"> Home</a>
                            </li>
                            <li>
                                <i class="fa fa-file"></i><a href="../pages/profile.php"> Perfil</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-check"></i> Alteração de Senha
                            </li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="pager text-center">Alteração de Conta de Acesso</h1>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dl">
                            
                            <?php
                                if (!empty($errors)) {
                                    print("<div class='msg'>");
                                    foreach($errors as $er) {
                                        print("$er <br/>");
                                    }
                                    print("</div>");
                                }
                            ?>
                            
                            <div class="panel panel-default">
                                <?php
                                if (isset($_SESSION['logged'])) {
                                    $rsContents = $dbRecord->rs_manager(
                                        "SELECT ".
                                            "id " .
                                        "FROM " .
                                            "users " .
                                        "WHERE " .
                                            "ID='" . $_SESSION['idi'] . "'");

                                    if (mysql_num_rows($rsContents) == 0) {
                                        print('<label>Nenhum registro encontrado</label>');
                                    } else {
                                        while ($rowIdent = mysql_fetch_assoc($rsContents)) {
                                ?>
                                <div class="panel-body-padd">
                                    <!-- ../inc/accountChange.php -->
                                    <form role="form" action="" method="POST" onload="return onLoadPageAccount();"
                                        onsubmit="return validateFormAccount();">
                                        <div class="form-group">
                                            <input type="hidden" id="txtAccoundPwdUpdId" name="txtAccoundPwdUpdId" value="<?php print($rowIdent['id']); ?>"/>
                                            <label>Senha Atual</label>
                                            <input type="password" class="form-control" id="txtAccountUserPassword" name="txtAccountUserPassword"
                                                onkeyup="return checkPassAccount();"/>
                                            <span id="txtAccountUserPasswordError" class="spanerr"></span>
                                        </div>

                                        <div class="form-group">
                                            <label>Nova Senha</label><label class="text-info">Mínimo 8 dígitos</label>
                                            <input type="password" class="form-control" id="txtAccountUserConfPassword" name="txtAccountUserConfPassword"
                                                onkeyup="return checkPassAccount();"/>
                                            <span id="confirmMessageAccount" class="spanerr"></span>
                                        </div>

                                        <ol class="breadcrumb">
                                            <li>
                                                <input type="submit" class="btn btn-default" value="Confirma" id="UpdateDo" name="UpdateDo"/>
                                                <input type="button" class="btn btn-default" onclick="goReturn();" value="Retorna"/>
                                            </li>
                                        </ol>
                                    </form>
                                </div>
                                <?php
                                        }
                                    }
                                    mysql_close($rsContents);
                                }
                                ?>
                            </div>
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
    <script type="text/javascript">
        window.onload = function onLoadPageAccount() {
            document.getElementById('txtAccountUserPassword').focus();
        };
    </script>
</body>
</html>