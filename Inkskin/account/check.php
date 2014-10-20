<?php

include_once ('../inc/Database.php');
$sourceDB = new Database();

if (isset($_POST['txtRegisterUsername'])) {
    $valueUsername = mysql_real_escape_string($_POST['txtRegisterUsername']);
    $uniqueQuery = $sourceDB->rs_manager(
        "SELECT " .
            "user_name " .
        "FROM " .
            "users " .
        "WHERE " .
            "user_name='" .
            $valueUsername .
            "'");
    
    $selectRow = mysql_num_rows($uniqueQuery);
    if ($selectRow == 0) {
        echo "<span class='available'>Usuário livre</span>";
    } else {
        echo "<span class='unavailable'>Usuário já existe</span>";
    }
}
if (isset($_POST['txtRegisterEmail'])) {
    $valueUseremail = mysql_real_escape_string($_POST['txtRegisterEmail']);
    $uniqueQuery = $sourceDB->rs_manager(
        "SELECT " .
            "user_email " .
        "FROM " .
            "users " .
        "WHERE " .
            "user_email='" .
            $valueUseremail .
            "'");
    
    $selectRow = mysql_num_rows($uniqueQuery);
    if ($selectRow == 0) {
        echo "<span class='available'>E-mail livre</span>";
    } else {
        echo "<span class='unavailable'>E-mail já existe</span>";
    }
}

?>