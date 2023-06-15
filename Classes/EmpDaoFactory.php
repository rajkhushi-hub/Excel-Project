<?php
    spl_autoload_register(function($classname){
        include($classname.".php");
    });

    class EmpDaoFactory{
        private static EmpDao $empDao;

        public static function getEmpDao(){

            self::$empDao=new EmpDaoImpl();

            return self::$empDao;
        }
    }
?>