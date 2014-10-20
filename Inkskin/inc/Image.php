<?php

/**
 * Description of Image
 *
 * @author Administrator
 */
class Image {
    public static final function move($prFormFile, $prDirectory, $prFileName) {
        if (!$prFormFile['name']) {
            return;
        }

        if (!is_dir($prDirectory)) {
            mkdir($prDirectory, 0775, true);
            chmod($prDirectory, 0775);
        }

        if (move_uploaded_file($prFormFile['tmp_name'], $prDirectory . $prFileName)) {
            return $prFileName;
        } else {
            exit("<div style='color:#8b0000;font-weight:bold;'>Erro ao mover arquivo:</div>" . $prFileName .
                "<div style='color:#8b0000;font-weight:bold;'>para diretorio:</div>" . $prDirectory);
        }
    }
}
