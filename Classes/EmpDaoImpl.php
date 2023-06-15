<?php
    spl_autoload_register(function($classname){
        include($classname.".php");
    });

    class EmpDaoImpl implements EmpDao{
        public function insert(EmpBean $empBean):String{
            $status="";
                $sno=$empBean->getSno();
                $empId=$empBean->getEmpId();
                $empName=$empBean->getEmpName();
                $dob=$empBean->getDob();
                $dept=$empBean->getDept();
                $desg=$empBean->getDesg();
                $salary=$empBean->getSalary();
                $mobile=$empBean->getMobile();
                $email=$empBean->getEmail();
                $addr=$empBean->getAddr();
                $query="INSERT INTO empolyee VALUES($sno,'$empId','$empName','$dob','$dept','$desg',$salary,$mobile,'$email','$addr')";
                $con=DBConnection::getConnection();
                try{
                    $res=$con->query($query);

                    if($res==true){
                        $status="SUCCESS";
                    }else{
                        $status="FAILURE";
                    }
                }catch(Exception $e){
                    $e->getMessage();
                }
            return $status;
        }
        public function get(){
            $query="SELECT * FROM empolyee";
            $con=DBConnection::getConnection();
            $result=$con->query($query);
            
            return $result;
        }
    }
?>