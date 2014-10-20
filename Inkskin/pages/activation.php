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
<?php
error_reporting(0);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();

    include_once ('../inc/Database.php');

    unset($_SESSION['users']);

    $authError = array();
    $authSuccess = array();

    if ($_POST['doActivation'] == 'Confirma') {
        /** Recupera a senha */
        $insAuthValidate = $_POST['txtActivationCode'];

        /** Inicia o mysql */
        $mysqlAssembly = new Database();

        /** Busca o usuário na base */
        $results = $mysqlAssembly->rs_manager(
            "SELECT " .
                //"id, " .
                "activation_code " .
            "FROM " .
                "users " .
            "WHERE " .
                "BINARY " .
                "activation_code=BINARY'" . $insAuthValidate . "'" .
            " AND approved='0'");

        /** Se não achou */
        if (mysql_num_rows($results) == 0) {
            //header('location: ../pages/account.php');
            $authError[] = "Código Inválido. Por favor, digite o Código de Ativação.";
        } else {
            /** Guarda em um array os dados do usuário */
            $rowAuth = mysql_fetch_assoc($results);

            /** Salva na sessão o array */
            $_SESSION['users'] = $rowAuth;
            $_SESSION['cKeyActive'] = $insAuthValidate;
            
             $authSuccess[] = "Código ativado com sucesso!";
            
            /** Envia ao início/dashboard */
            header('Location: ../account/activationDo.php');
        }
    }
    //mysql_close($results);
}
?>
    
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">Ativação de Conta</h1>
                        <p class="text-center">Digite abaixo o Código de Ativação</p><br/>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dl">

                            <?php
                            if($authError) {
                                if (!empty($authError)) {
                                    print("<div class='msg'>");
                                    foreach($authError as $errs) {
                                        print("$errs <br/>");
                                    }
                                    print("</div>");
                                }
                             } else {
                                if (!empty($authSuccess)) {
                                    print("<div class='auth'>");
                                    foreach($authSuccess as $succ) {
                                        print("$succ <br/>");
                                    }
                                    print("</div>");
                                }
                            }
                            ?>
                            
                            <div class="panel panel-default">
                                <div class="panel-body-padd">
                                    <form role="form" method="POST" onload="return onLoadPage();">
                                        <div class="form-group">
                                            <label>Código de Ativação</label><div id="checkAvailabilityUser" class="text-info"></div>
                                            <input type="password" class="form-control" id="txtActivationCode" name="txtActivationCode" autocomplete="off"/>
                                        </div>

                                        <ol class="breadcrumb">
                                            <li>
                                                <input type="submit" class="btn btn-default" value="Confirma" id="doActivation" name="doActivation"/>
                                                <input type="button" class="btn btn-default" onclick="goRedirect();" value="Retorna"/>
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
            document.getElementById('txtActivationCode').focus();
        };
    </script>
</body>
</html>