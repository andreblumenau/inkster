<?php
    session_start();

    error_reporting(0);

    include_once ('../inc/Database.php');
    include_once ('../inc/dbAccount.php');
    include_once ('../inc/Session.php');

    $dbRecord = new Database();
    
    unset($_SESSION['users']);

    $msgError = array();
    
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
        if ($num > 0 && !$msgError) {
            list($id, $pwd, $user_level, $approves) = mysql_fetch_row($result);

            if (!$approves) {
                //$msg = urlencode("Account not activated. Please check your email for activation code");
                $msgError[] = "Verifique o código de ativação em seu E-mail.";
                exit();

                //header("Location: login.php?msg=$msg");
                //exit();
            }
            if ($pwd === PwdHash($pass, substr($pwd, 0, 9))) {
                if (empty($msgError)) {

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
                header("Location: ../inc/accountChange.php");
                exit();
            }
        } else {
            $msgError[] = "Erro - A Senha informada é inválida.";
            header("Location: ../pages/account.php");
            exit();
        }
    }
?>