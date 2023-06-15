<?php

    class EmpServiceImpl implements EmpService{
        public function saveEmpolyee(EmpBean $empBean):String{
            $status="";
                $empDao=EmpDaoFactory::getEmpDao();
                $status=$empDao->insert($empBean);
            return $status;
        }
    }
?>