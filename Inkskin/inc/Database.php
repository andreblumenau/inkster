<?php
/**
 * Umgebung Datenbank stellt Verbindungsmodulen fest.
 *
 * @author Administrator
 */
class Database {

    private $verbindung = null;
    private $root = "localhost:3306";
    private $user = "root";
    private $psw = "mysql";

    public final function __construct() {
        
        $this->verbindung = mysql_connect($this->root, $this->user, $this->psw);
        mysql_select_db('form', $this->verbindung);
        
        if (!$this->verbindung) {
            exit('Erro ao conectar com a Base de Dados : ' . mysql_error());
        }
    }
    
    public final function createDatabase() {
        $sql = "CREATE DATABASE IF NOT EXISTS announce";
        
        if (mysqli_query($this->verbindung, $sql)) {
            echo "Base de Dados announce criado com sucesso";
        } else {
            echo "Erro ao criar Base de Dados : " . mysqli_error($this->verbindung);
        }
    }

    public final function rs_manager($strWert) {
        return mysql_query($strWert, $this->verbindung);
    }

    public final function insert_additive($strView, $strArray) {
        $sql = "INSERT INTO " . $strView;
        $sql.= " (" . implode(',', array_keys($strArray)).")";
        $sql.= " VALUES ('" . implode("','", array_values($strArray))."')";

        $this->rs_manager($sql);
    }
    
    public final function select_additive($strView, $strArray) {
        $sql = "SELECT * FROM " . $strView;
        $sql.= " WHERE " . implode("', '", array_values($strArray)) . ";";
        
        $this->rs_manager($sql);
    }

    public final function update_additive($strView, $strArray, $strWhere) {
        $sql = "UPDATE " . $strView." SET ";    

        $firstSet = true;
        foreach ($strArray as $key => $value) {
            if (!$firstSet) {
                $sql.= ",";
            }

            if ($value)
            {
                $sql .= " ".$key." = '".$value."'";   
            } else {
                $sql .= " ".$key." = null";
            }

            $firstSet = false;
        }

        $sql.= " WHERE 1";

        foreach ($strWhere as $key => $value) {
            $sql.= " AND ".$key." = '".$value."'";
        }

        $this->rs_manager($sql);
    }
}