<?php
    session_start();
    spl_autoload_register(function($classname){
        include("Classes/".$classname.".php");
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
    <!--Fevicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="Fevicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Fevicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Fevicon/favicon-16x16.png">
    <link rel="manifest" href="Fevicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!--google awasome font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Css Link For Styling the Page-->
    <link rel="stylesheet" href="CSS/style.css">
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 div col-md-4">
                <button type="button" class="btn btn-primary d-block w-100" data-bs-toggle="modal" data-bs-target="#importExcel">Click Here To Import Excel</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 div col-md-4">
                <button type="button" class="btn btn-primary d-block w-100 my-2">
                    <a href="View/viewempolyee.php" target="_blank" class="text-decoration-none text-light">View Empolyee</a>
                </button>
            </div>
        </div>
    </div>
    <div class="modal" id="importExcel">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h2 class="modal-title">Welcome To Import and Inserting Excel Sheet Into Mysql</h2>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body bg-info">
                    <form action="Classes/insertexceldata.php" method="post" enctype="multipart/form-data">
                        <label for="excelFile" class="form-label text-primary">Choose Your Excel File :</label>
                        <input type="file" name="excelFile" id="excelFile" class="form-control">

                        <button type="submit" class="btn btn-success mt-3 d-block w-100" name="saveExcelBtn">Upload</button>
                    </form>
                </div>
                <div class="modal-footer bg-warning">
                <?php
                if(isset($_SESSION['succmsg'])){

                    ?>
                    <table>
                        <tr>
                            <th><h2 class="text-info">Status : </h2></th>
                        </tr>
                        <tr>
                            <th><h3 class="text-success"><?php echo $_SESSION['sucrow']; ?></h3></th>
                        </tr>
                        <tr>
                            <th><h3 class="text-danger"><?php echo $_SESSION['failrow']; ?></h3></th>
                        </tr>
                        <tr>
                            <th><h3 class="text-success"><?php echo $_SESSION['succmsg']; ?></h3></th>
                        </tr>
                            <?php 
                                unset($_SESSION['succmasg']);
                                
                             }
                            ?>
                            <?php 
                            if(isset($_SESSION['failmsg'])){ 
                            ?>
                        <tr>
                            <th><h3 class="text-danger"><?php echo $_SESSION['failmsg']; ?></h3></th>
                        </tr>
                            <?php
                                unset($_SESSION['failmsg']);
                                
                            }
                            session_destroy();
                            ?>
                        </tr>
                    </table>

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
                </div>
            </div>
        </div>
    </div>

    

    
    
<!--Bootstrap 5-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>