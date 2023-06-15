<?php
session_start();
spl_autoload_register(function($classname){
    include($classname.".php");
});
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['saveExcelBtn']))
{
    $fileName = $_FILES['excelFile']['name'];
    $file_extension = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_extension = ['xls','csv','xlsx'];

    if(in_array($file_extension, $allowed_extension))
    {
        $fileNamePath = $_FILES['excelFile']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($fileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        $count = count($data);
        $rowCount=0;
        $rowFail=0;
        $msg=false;
        $status="";
        $empBean=new EmpBean();

        for($i=1;$i<$count;$i++){
                $sno=$data[$i][0];
                $empId=$data[$i][1];
                $empName=$data[$i][2];
                $dob=$data[$i][3];
                $dept=$data[$i][4];
                $desg=$data[$i][5];
                $salary=$data[$i][6];
                $mobile=$data[$i][7];
                $email=$data[$i][8];
                $addr=$data[$i][9];

                $empBean->setSno($sno);
                $empBean->setEmpId($empId);
                $empBean->setEmpName($empName);
                $empBean->setDob($dob);
                $empBean->setDept($dept);
                $empBean->setDesg($desg);
                $empBean->setSalary($salary);
                $empBean->setMobile($mobile);
                $empBean->setEmail($email);
                $empBean->setAddr($addr);
                
                $empservice=EmpServiceFactory::getEmpService();
                $status=$empservice->saveEmpolyee($empBean);
                
                if($status=='SUCCESS'){
                    $msg=true;
                    $rowCount++;
                   $_SESSION['sucrow']="row no -".$i." is successfully added"; 
                   $_SESSION['succmsg'] = "Total Successfully Inserted Row : ".$rowCount;
                    
                }
                else{
                    $msg=false;
                    $rowFail++;
                    $_SESSION['failrow']="row no-".$i." is not added";
                    $_SESSION['failmsg'] = "Total Unsuccessfully Inserted Row : ".$rowFail;
                    
                }
        }
        if(isset($msg))
        {
            header('Location: ../index.php');
            exit(0);
        }
        else
        {
            header('Location: ../index.php');
            exit(0);
        }

        
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: ../index.php');
        exit(0);
    }
}
?>