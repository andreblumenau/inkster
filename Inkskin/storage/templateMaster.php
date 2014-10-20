<?php

class TemplateMaster {
    public final function indexHeader($ih_settings, $ih_values) {
        $ih_header = file_get_contents("../templates/header.php");
        $ih_count = 0;

        foreach ($ih_settings as $ih_setting) {
            $ih_header = str_replace('{' . $ih_setting . '}', $ih_values[$ih_count], $ih_header);
            $ih_count++;
        }
        print($ih_header);
    }

    public final function navigation_element() {
        $h_file = file_get_contents("../templates/navigation.php");
        print($h_file);
    }
    
    public final function center_elements() {
        // Eine Array für die zugelassenen Seiten herstellen
        $allowedPages = array(
            'index',
            'register',
            'profile',
            'settings',
            'myaccount',
            'accountChange');
        $selectPage = "home";
        
        // Wird die Seiten Variabeln eingesetzt und überprüft, ob die
        // zugelassene Seiten in Array sind.
        if (isset($_GET['view']) && in_array($_GET['view'], $allowedPages)) {
            // Erst überprüfen, ob es Seiten gibt.
            if (file_exists($_GET['view'] . '.php')) {
                include_once($_GET['view'] . '.php');
            } else {
                print('Nenhum arquivo encontrado');
            }
        } else {
            if (file_exists($selectPage . '.php')) {
                // include the main.php page;
                include_once($selectPage . '.php');
            } else {
                print('A página atual não está disponível');
            }
        }
    }
}
