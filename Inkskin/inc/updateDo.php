<?php
    //error_reporting(0);
    session_start();
    
    //include_once ('../inc/SessionBean.php');
    include_once('../inc/Database.php');
    include_once '../inc/Image.php';

    $timestamp = mktime(date("H")-3);
    $datetime = gmdate("Y-m-d H:i:s", $timestamp);

    $id_upd_user = $_POST['txtProfileUpdId'];
    
    $arrUpdUser = array(
        'full_name'         => strtoupper($_POST['txtProfileUpdFullname']),
        'user_name'         => $_POST['txtProfileUpdUsername'],
        'user_email'        => strtolower($_POST['txtProfileUpdEmail']),
        'user_level'        => 2,
        'address'           => strtoupper($_POST['txtProfileUpdAddress']),
        'city'              => strtoupper($_POST['txtProfileUpdCity']),
        'state'             => strtoupper($_POST['selProfileUpdStates']),
        'country'           => strtoupper($_POST['txtProfileUpdCountry']),
        'telephone'         => $_POST['txtProfileUpdTelephone'],
        'cellphone'         => $_POST['txtProfileUpdCellphone'],
        'presentation'      => $_POST['areProfileUpdPresentation'],
        'update_date'      => $datetime
    );

    $fileImgUpd = $_FILES['file'];
    
    if ($fileImgUpd['name']) {
        $arrUpdUser['image'] = Image::move($fileImgUpd, '../img/user/', rand(1,9999).'-'.md5(time()).'.jpg');
    }
    
    $db_update = new Database();
    
    if ($id_upd_user) {
        $db_update->update_additive('users', $arrUpdUser, array('id' => $id_upd_user));

        //$_SESSION['msgDisplay'] = 'Salvo com sucesso!';
    
       header('location: ../pages/profile.php');
    } else {
        die ('Erro ao alterar dados : ' . mysql_error());
    }
    mysql_close();