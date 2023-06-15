<?php
    session_start();
    spl_autoload_register(function($classname){
        include("../Classes/".$classname.".php");
    });
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!--Datepicker-->
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!--google awasome font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
</head>
<body>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="bg-dark text-light text-center">
                        <th>SNO</th>
                        <th>Emp Id</th>
                        <th>Emp Name</th>
                        <th>DOB</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Salary</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $empDao=EmpDaoFactory::getEmpDao();
                        $result=$empDao->get();
                        if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['SNO']; ?></td>
                        <td><?php echo $row['EMPOLYEE ID']; ?></td>
                        <td><?php echo $row['EMPOLYEE NAME']; ?></td>
                        <td><?php echo $row['EMPOLYEE DOB']; ?></td>
                        <td><?php echo $row['DEPARTMENT']; ?></td>
                        <td><?php echo $row['DESIGNATION']; ?></td>
                        <td><?php echo $row['SALARY']; ?></td>
                        <td><?php echo $row['MOBILE']; ?></td>
                        <td><?php echo $row['EMAIL ID']; ?></td>
                        <td><?php echo $row['ADDRESS']; ?></td>
                    </tr>
                    <?php } }
                        else{
                            echo "No Result Found";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
<!--Bootstrap 5-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>