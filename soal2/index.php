<?php 
require_once "model/crudClass.php"; 
$crud       = new crudClass();
$employees  = $crud->getData('employee');

// -----------cek apakah data yang individual yang di inginkan------------
if (isset($_GET['employeeEdit'])) {

        $employeeGet    = $crud->getData('employee','employee_id',$_GET['employeeEdit']);
        $employeeId     = $employeeGet[0]->employee_id;
        $firtsName      = $employeeGet[0]->first_name;
        $lastName       = $employeeGet[0]->last_name;
        $age            = $employeeGet[0]->age;
        $devision       = $employeeGet[0]->devision;
        $salary         = $employeeGet[0]->salary;
        $button         = "edit";
        
}else{
    $firtsName      = "";
    $lastName       = "";
    $age            = "";
    $devision       ="";
    $salary         ="";
    $button         ="save";
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Soal Dua</title>
  </head>
  <body>
    
  
    <div class="container">
        
        <div class="row mt-5">
            <div class="col-6">
                
                <div class="card shadow">
                    <div class="card-header">
                        <h3>Add Employee</h3>
                    </div>
                    <div class="card-body">

                        <form class="row g-3" method="POST" action="controller/employeeController.php">
                        <div class="col-6">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?=$firtsName;?>" autofocus="on" required>
                        </div>
                        <div class="col-6">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?=$lastName;?>" autofocus="on" required>
                        </div>
                        <div class="col-12">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" class="form-control" id="age" name="age" value="<?=$age;?>" required>
                        </div>
                        <div class="col-12">
                            <label for="devision" class="form-label">Devision</label>
                            <input type="text" class="form-control" id="devision" name="devision" value="<?=$devision;?>" required>
                        </div>
                        <div class="col-12">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="text" class="form-control" id="salary" name="salary" value="<?=$salary;?>" required>
                        </div>
                        <div class="col-12">
                            <a href="index.php" class="btn btn-secondary">Reset</a>
                            <?php if(isset($employeeId)): ?>
                                <input type="hidden" name="id" value="<?=$employeeId;?>">
                            <?php endif ?>
                            <button type="submit" name="<?=$button;?>" class="btn btn-primary" onclick="return confirm('Are You Sure?')">Save</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-6">

                <div class="card shadow">
                    <div class="card-header">
                        <h3>List Employees</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Name</td>
                                        <td>Age</td>
                                        <td align="center">Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no =1; 
                                    foreach($employees as $em): ?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$crud->getFullName($em->first_name,$em->last_name);?></td>
                                            <td><?=$em->age;?></td>
                                            <td align="center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="detail.php?employee=<?=$em->employee_id;?>" class="btn btn-info btn-sm">Detail</a>
                                                <a href="index.php?employeeEdit=<?=$em->employee_id;?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="controller/employeeController.php?employeeDelete=<?=$em->employee_id;?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')">Delete</a>
                                            </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  </body>
</html>