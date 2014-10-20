<?php
    session_start();
    
    include_once('../inc/Database.php');

    $code_upd_user = $_SESSION['cKeyActive'];

    $arrUpdUser = array(
        'activation_code'       => $code_upd_user,
        'approved'              => 1
    );

    print($code_upd_user);
    $db_update = new Database();
    
    if ($code_upd_user) {
        $db_update->update_additive('users', $arrUpdUser, array('activation_code' => $code_upd_user));

        header('Location: ../pages/login.php');
        
        session_destroy();
        exit;
    } else {
        die ('Erro ao alterar dados : ' . mysql_error());
    }
?>



























<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register</title>
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
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Registro de Usuário</h1>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dl">
                            <div class="panel panel-default">
                                <div class="panel-body-padd">
                                    <form role="form" action="../inc/registerDo.php" method="POST" onload="return onLoadPage();"
                                          onsubmit="return validateForm();">
                                        <div class="form-group">
                                            <label>Usuário</label><div id="checkAvailabilityUser" class="text-info"></div>
                                            <input type="hidden" id="txtRegisterUserId" name="txtRegisterUserId">
                                            <input class="form-control" id="txtRegisterUsername" name="txtRegisterUsername" autocomplete="off"
                                                   onkeydown="return checkAccessUser();" onfocus="return checkAccessUser();"/>
                                            <span id="txtRegisterUsernameError" class="spanerr"></span>
                                        </div>

                                        <div class="form-group">
                                            <label>E-mail</label><div id="checkAvailabilityEmail" class="text-info"></div>
                                            <input class="form-control" id="txtRegisterEmail" name="txtRegisterEmail" autocomplete="off"
                                                   onkeydown="return checkAccessEmail();" onfocus="return checkAccessEmail();"/>
                                            <span id="txtRegisterEmailError" class="spanerr"></span>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Senha</label><label class="text-info">Mínimo 8 dígitos</label>
                                            <input type="password" class="form-control" id="txtRegisterPassword" name="txtRegisterPassword"
                                                onkeyup="return checkPass();"/>
                                            <span id="txtRegisterPasswordError" class="spanerr"></span>
                                        </div>

                                        <div class="form-group">
                                            <label>Repetir Senha</label>
                                            <input type="password" class="form-control" id="txtRegisterSetPassword" name="txtRegisterSetPassword"
                                                onkeyup="return checkPass();"/>
                                            <span id="confirmMessage" class="spanerr"></span>
                                        </div>

                                        <ol class="breadcrumb">
                                            <li>
                                                <button type="submit" class="btn btn-default">Confirma</button>
                                                <button type="button" class="btn btn-default" onclick="goRedirect();">Retorna</button>
                                            </li>
                                        </ol>
                                    </form>
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
        window.onload = function onLoadPage() {
            document.getElementById('txtRegisterUsername').focus();
        };
    </script>
</body>
</html>