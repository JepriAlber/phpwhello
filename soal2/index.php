<?php 
require_once "crudClass.php"; 
$crud       = new crudClass();
$employees  = $crud->allData('employee');

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

                        <form class="row g-3" method="POST" action="saveEmployee.php">
                        <div class="col-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" autofocus="on" required>
                        </div>
                        <div class="col-12">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" class="form-control" id="age" name="age" required>
                        </div>
                        <div class="col-12">
                            <label for="devision" class="form-label">Devision</label>
                            <input type="text" class="form-control" id="devision" name="devision" required>
                        </div>
                        <div class="col-12">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="text" class="form-control" id="salary" name="salary" required>
                        </div>
                        <div class="col-12 d-grid">
                            <button type="submit" name="save" class="btn btn-primary" onclick="return confirm('Are You Sure?')">Save</button>
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
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no =1; 
                                    foreach($employees as $em): ?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$em->name;?></td>
                                            <td><?=$em->age;?></td>
                                            <td><a href="detail.php?employee=<?=$em->employee_id;?>" class="btn btn-info btn-sm">Detail</a></td>
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