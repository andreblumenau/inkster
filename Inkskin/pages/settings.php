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
                            <li class="active">
                                <i class="fa fa-file"></i><a href="../pages/profile.php"> Perfil</a>
                            </li>
                            <li>
                                <i class="fa fa-gear"></i> Configurações
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <script type="text/javascript" src="../js/jquery-1.11.1.min.js" language="javascript"></script>
                    <script type="text/javascript" language="javascript">
                        window.onload = function onLoadPage() {
                            document.getElementById('txtProfileUpdFullname').focus();
                        };
                        
                        var abc = 0;
                        
                        $(document).ready(function() {
                            $('#add_more').click(function(){
                                $(this).before($('', {
                                    id: 'setImageProfile'
                                }).fadeIn('slow').append($('', {
                                    name: 'file',
                                    type: 'file',
                                    id: 'file'
                                }), $('')));
                            });
                            
                            $('body').on('change', '#file', function() {
                                if (this.files && this.files[0]) {
                                    abc += 1;
                                    //var z = abc - 1;
                                    //var x = $(this).parent().find('#previewimg' + z).remove();
                                    $(this).before("<img id='previewimg" + abc + "' src='' title='Image de Perfil' alt='Adicione uma imagem'/>");
                                    var reader = new FileReader();
                                    reader.onload = imageIsLoaded;
                                    reader.readAsDataURL(this.files[0]);
                                    //$(this).hide();
                                    $(abc).append($('', {
                                        id: 'img',
                                        src: 'x.png',
                                        alt: 'delete'
                                    }).click(function() {
                                        $(this).parent().parent().remove();
                                    }));
                                }
                            });
                            
                            function imageIsLoaded(e) {
                                $('#previewimg' + abc).attr('src', e.target.result);
                            };
                            
                            $('#submitFormnSettings').click(function(e) {
                                var name = $(':file').val();
                                if (!name) {
                                    alert('Image must be selected');
                                    e.preventDefault();
                                }
                            });
                        });
                        
                        function setState(){
                            document.getElementById("txtProfileUpdState").value = document.getElementById("selProfileUpdStates").value;
                            return true;
                        }
                    </script>
                    
                    <?php
                    if (isset( $_SESSION['logged'])) {
                        include_once ('../inc/Database.php');

                        $dbRecordsUsr = new Database();

                        $rsContentsUser = $dbRecordsUsr->rs_manager(
                            "SELECT ".
                                "id, " .
                                "full_name, " .
                                "user_name, " .
                                "user_email, " .
                                "address, " .
                                "city, " .
                                "state, " .
                                "country, " .
                                "telephone, " .
                                "cellphone, " .
                                "presentation " .
                            "FROM " .
                                "users " .
                            "WHERE " .
                                "ID='" . $_SESSION['idi'] . "'");

                        $dbRecordsSta = new Database();

                        $rsContentsState = $dbRecordsSta->rs_manager(
                            "SELECT ".
                                "STATE, " .
                                "DESCRIPTION " .
                            "FROM " .
                                "states " .
                            "WHERE " .
                                "LAND_ID='55'");
                    ?>
                    
                    <div class="col-lg-6">
                        <?php
                            if (mysql_num_rows($rsContentsUser) == 0) {
                                print('<label>Nenhum registro encontrado</label>');
                            } else {
                                while ($rowValuesIndexUsr = mysql_fetch_assoc($rsContentsUser)) {
                        ?>
                        <!-- ../inc/updateDo.php -->
                        <form role="form" action="../inc/updateDo.php" method="POST" onsubmit=""
                              enctype="multipart/form-data" onload="return onLoadPage();">
                            
                            <div class="form-group">
                                <label>Imagem de Perfil</label>
                                <div class="panel-body">    
                                    <div class="col-md-6">
                                        <div class="panel panel-default">
                                            <div id="setImageProfile" class="panel-body">
                                                <input type="file" name="file" id="file"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Nome Completo</label>
                                <input type="hidden" id="txtProfileUpdId" name="txtProfileUpdId"
                                    value="<?php print($rowValuesIndexUsr['id']); ?>"/>
                                <input class="form-control" id="txtProfileUpdFullname" name="txtProfileUpdFullname"
                                    value="<?php print($rowValuesIndexUsr['full_name']); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>E-mail</label>
                                <input class="form-control" id="txtProfileUpdEmail" name="txtProfileUpdEmail"
                                    value="<?php print($rowValuesIndexUsr['user_email']); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Endereço e Número</label>
                                <input class="form-control" id="txtProfileUpdAddress" name="txtProfileUpdAddress"
                                    value="<?php print($rowValuesIndexUsr['address']); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Cidade</label>
                                <input class="form-control" id="txtProfileUpdCity" name="txtProfileUpdCity"
                                    value="<?php print($rowValuesIndexUsr['city']); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Estado</label>
                                <input class="form-control" id="txtProfileUpdState" name="txtProfileUpdState"
                                    value="<?php print($rowValuesIndexUsr['state']); ?>" disabled>
                                <div class="form-group"></div>
                                <select class="form-control" id="selProfileUpdStates" name="selProfileUpdStates" onchange="return setState();">
                                    <option>Selecione um Estado</option>
                                <?php
                                if (mysql_num_rows($rsContentsState) == 0) {
                                    print("<label style='color:#8b0000;font-weight:bold;'>" .
                                          "Nenhum registro encontrado</label>");
                                } else {
                                    while ($rowValuesIndexSta = mysql_fetch_assoc($rsContentsState)) {
                                ?>
                                <?php   
                                        print("<option value='" . $rowValuesIndexSta['DESCRIPTION'] . "'>");
                                        print($rowValuesIndexSta['DESCRIPTION'] . "</option>"); ?>
                                <?php
                                    }
                                }
                                ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>País</label>
                                <input class="form-control" id="txtProfileUpdCountry" name="txtProfileUpdCountry"
                                    value="<?php print($rowValuesIndexUsr['country']); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Telefone</label>
                                <input class="form-control" id="txtProfileUpdTelephone" name="txtProfileUpdTelephone"
                                    value="<?php print($rowValuesIndexUsr['telephone']); ?>"/>
                            </div>
                            
                            <div class="form-group">
                                <label>Celular</label>
                                <input class="form-control" id="txtProfileUpdCellphone" name="txtProfileUpdCellphone"
                                    value="<?php print($rowValuesIndexUsr['cellphone']); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Apresentação Pessoal</label>
                                <textarea class="form-control" rows="6" id="areProfileUpdPresentation" name="areProfileUpdPresentation"><?php print($rowValuesIndexUsr['presentation']); ?></textarea>
                                <p class="help-block">Breve apresentação das qualidades e características</p>
                            </div>
                            
                            <div class="form-group">
                                <label>Usuário</label>
                                <input class="form-control" id="txtProfileUpdUsername" name="txtProfileUpdUsername"
                                    value="<?php print($rowValuesIndexUsr['user_name']); ?>">
                            </div>
                            
                            <ol class="breadcrumb">
                                <button type="submit" class="btn btn-default" id="submitFormnSettings">Confirma Atualização</button>
                                <button type="button" class="btn btn-default" onclick="goReturn();">Retorna</button>
                            </ol>
                        </form>
                        <?php
                                }
                            }
                            mysql_close();
                        }
                        ?>
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
    
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/loaders/jquery.maskedinput-1.2.2.min.js"></script>
    <script src="../js/jquery-1.11.0.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/loaders/jquery.maskedinput-1.2.2.min.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $('#txtProfileUpdTelephone').mask('(99) 9999-9999');
            $('#txtProfileUpdCellphone').mask('(99) 9999-9999');
        });
    </script>
    <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
    
    <!-- Input Temple Validator -->
    <script type="text/javascript" src="../js/loaders/valitade-inputs.js"></script>
    <script type="text/javascript" src="../js/plugins/truster/general-validate-function.js"></script>
    <script type="text/javascript" src="../js/plugins/truster/jquey-validate-min.js"></script>
    
    <!-- Javascrpts and jQuery on page loading -->
    <script type="text/javascript" src="../js/loaders/auto-loader.js"></script>
</body>
</html>