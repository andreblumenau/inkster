<?php
    //error_reporting(0);
    session_start();
    
    //include_once ('../inc/SessionBean.php');
    include_once ('../inc/Database.php');

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    $activeKeyGen = generateRandomString();
    
    $timestamp = mktime(date("H")-3);
    $datetime = gmdate("Y-m-d H:i:s", $timestamp);
    
    $id_set_user = $_POST['txtRegisterUserId'];
    $email_set_user = $_POST['txtRegisterEmail'];
    
    $arrDatenUser = array(
        'user_name'         => $_POST['txtRegisterUsername'],
        'user_email'        => $email_set_user,
        'user_level'        => 1,
        'user_password'     => $_POST['txtRegisterPassword'],
        'include_date'      => $datetime,
        'approved'          => 0,
        'activation_code'   => $activeKeyGen,
        'banned'            => 0
    );

    $db_include = new Database();
    
    $_SESSION['getKeyGen'] = $activeKeyGen;
    $_SESSION['email_user'] = $email_set_user;
    
    if (!$id_set_user) {

        $db_include->insert_additive('users', $arrDatenUser);

        header('location: ../account/emailValidation.php');
    } else {
        die ('Erro ao armazenar dados : ' . mysql_error());
    }