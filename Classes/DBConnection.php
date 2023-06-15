<?php

    class DBConnection{
        private static $con;

        public static function getConnection(){
            $dbHost='localhost';
            $dbUser='root';
            $dbPass="";
            $dbName='exceldb';
            
            self::$con=new mysqli($dbHost,$dbUser,$dbPass,$dbName);
           
            return self::$con;
        }
    }
?>