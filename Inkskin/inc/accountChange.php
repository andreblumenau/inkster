<?php
    error_reporting(0);
    session_start();
    
    include_once ('../account/authenticateDo.php');
    include_once('../inc/Database.php');

    $timestamp = mktime(date("H")-3);
    $datetime = gmdate("Y-m-d H:i:s", $timestamp);

    $id_upd_user = $_SESSION["getId"];
    $usr_upd_user = $_SESSION["getPwd"];
    
    $arrUpdUser = array(
        'user_password'         => $usr_upd_user,
        'update_date'           => $datetime
    );

    $db_update = new Database();
    
    if ($id_upd_user) {
        $db_update->update_additive('users', $arrUpdUser, array('id' => $id_upd_user));

        //$_SESSION['msgDisplay'] = 'Salvo com sucesso!';
    
        //header('Location: http://' . $hostname . ($path == '/' ? '' : $path . '/' . 'profile.php'));
        header('Location: ../pages/profile.php');
    } else {
        die ('Erro ao alterar dados : ' . mysql_error());
    }
    mysql_close();