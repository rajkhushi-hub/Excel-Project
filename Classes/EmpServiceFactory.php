<?php
    spl_autoload_register(function($classname){
        include($classname.".php");
    });

    class EmpServiceFactory{
        private static EmpService $empService;

        public static function getEmpService(){
            self::$empService=new EmpServiceImpl();

            return self::$empService;
        }
    }
?>