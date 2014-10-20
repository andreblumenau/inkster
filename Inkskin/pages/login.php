<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>INKSKIN - LOGIN</title>
    <!-- Custom CSS -->
    <link type="text/css" rel="stylesheet" href="../css/account/login.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    error_reporting(0);
    
    session_start();

    include_once ('../inc/db.php');
    include_once ('../inc/Session.php');

    unset($_SESSION['users']);

    $errors = array();
    
    $hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

    foreach ($_GET as $key => $value) {
        $get[$key] = filter($value); //get variables are filtered.
    }

    if ($_POST['doLogin'] == 'Login') {

        foreach ($_POST as $key => $value) {
            $data[$key] = filter($value); // post variables are filtered
        }

        $usr_email = null;
        $pwd = null;
        $user_email = $data['user_email'];
        $pass = $data['user_password'];

        if (strpos($user_email, '@') === false) {
            $user_cond = "user_name='$user_email'";
            $pwd_cond = "user_password=BINARY '$pass'";
        } else {
            $user_cond = "user_email='$user_email'";
            $pwd_cond = "user_password=BINARY '$pass'";
        }

        $result = mysql_query(
            "SELECT " .
                "id," .
                "user_password," .
                "user_name," .
                "user_email, " .
                "approved, " .
                "user_level " .
            "FROM " .
                "users " .
            "WHERE " .
                $user_cond .
            " AND " .
            " BINARY " .
                $pwd_cond .
            " AND " .
                "banned='0'") or die(mysql_error());

        $num = mysql_num_rows($result);

        // Match row found with more than 1 results  - the user is authenticated. 
        if ($num > 0 && !$errors) {
            list($id, $pwd, $user_name, $usr_email, $approved, $user_level) = mysql_fetch_row($result);

            if (!$approved) {
                //$msg = urlencode("Account not activated. Please check your email for activation code");
                $errors[] = "Conta desativada. Verifique o código de ativação em seu E-mail";

                //header("Location: login.php?msg=$msg");
                //exit();
            } else if ($pwd === PwdHash($pass, substr($pwd, 0, 9))) {
                if (empty($errors)) {

                    // this sets session and logs user in  
                    //session_start();
                    session_regenerate_id(true); //prevent against session fixation attacks.
                    // this sets variables in the session 
                    $_SESSION['user_id'] = $id;
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['user_level'] = $user_level;
                    $_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);

                    //update the timestamp and key for cookie
                    $stamp = time();
                    $ckey = GenKey();
                    mysql_query("UPDATE users SET ctime='$stamp', ckey = '$ckey' WHERE id='$id'") or die(mysql_error());

                    //set a cookie 

                    if (isset($_POST['remember'])) {
                        setcookie("user_id", $_SESSION['user_id'], time() + 60 * 60 * 24 * COOKIE_TIME_OUT, "/");
                        setcookie("user_key", sha1($ckey), time() + 60 * 60 * 24 * COOKIE_TIME_OUT, "/");
                        setcookie("user_name", $_SESSION['user_name'], time() + 60 * 60 * 24 * COOKIE_TIME_OUT, "/");
                    }
                    //header('Location: http://' . $hostname . ($path == '/' ? '' : $path . '/' . 'x.php'));
                    header('Location: x.php');
                }
            } else {
                $rows = mysql_fetch_assoc($num);
                $_SESSION['users'] = $rows;
                
                $_SESSION['logged'] = $user_name;
                $_SESSION['idi'] = $id;
                
                // Weiterleitung zur geschützten Startseite
                if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
                    if (php_sapi_name() == 'cgi') {
                        header('Status: 303 See Other');
                    } else {
                        header('HTTP/1.1 303 See Other');
                    }
                }

                //header('Location: http://' . $hostname . ($path == '/' ? '' : $path . '/' . 'home.php'));
                header('Location: ../pages/index.php');
                exit;
            }
        } else if ($user_email == $usr_email && $pass != $pwd || $user_email != $usr_email && $pass != $pwd) {
            $errors[] = "Login inválido. Entre com o E-mail/Usuário e senha corretos";
        } else {
            $errors[] = "Erro - login inválido. Este usuário não existe";
        }
    }
}
?>
    
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Inkskin</h1>
                        <p class="text-center">..:: Portal de Acesso do Tatuador ::..</p><br/>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-xs-6-login text-pos-login">
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
                                <div class="panel-body">
                                    <form role="form" action="../pages/login.php" method="POST" onsubmit=""
                                          id="loginForm" name="loginForm" onload="return onLoadPage();">
                                        <div class="dl-innner">
                                            <div class="form-group">
                                                <label>E-mail / Usuário</label>
                                                <input class="form-control" id="txtLoginAuthEmail" name="user_email" autocomplete="off"/>
                                            </div>

                                            <div class="form-group">
                                                <label>Senha</label>
                                                <input type="password" class="form-control" id="txtLoginAuthPassword" name="user_password"/>
                                            </div>

                                            <input type="submit" id="doLogin" name="doLogin" class="btn btn-lg btn-default" value="Login"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="row-login-options">
                                    <div class="row-login-left">
                                        <a href="../pages/register.php">Criar Conta</a>
                                    </div>

                                    <div class="row-login-right">
                                        <a>Recuperar Senha</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="row-login-options" style="text-align: center;">
                                    <div>
                                        <a href="../pages/activation.php">Código de Ativação</a>
                                    </div>
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

    <!-- jQuery Version 1.11.0 -->
    <script src="../js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

    <!-- Javascrpts and jQuery on page loading -->
    <script type="text/javascript" language="javascript">
        window.onload = function onLoadPage() {
            document.getElementById('txtLoginAuthEmail').focus();
        };
    </script>
</body>
</html>