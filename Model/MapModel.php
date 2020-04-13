<?php
require_once("../Config/Conexion.php");
class MapModel{

    public function MapModel(){
        
        // Select all the rows in the markers table
        $query = "SELECT * FROM markers WHERE 1";
        $result = mysql_query($query);
        echo $result;
        if (!$result) {
            die('Invalid query: ' . mysql_error());
        }

    }
}