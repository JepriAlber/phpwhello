<?php 
require_once "data.php";

$employeeId = $_GET['employee'];
// -------ambil data dengan id yang di ingin kan--------
$em     = Employee::findEmployee($employees,$employeeId);

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Soal Satu</title>
  </head>
  <body>
    
  
    <div class="container">
        <h3 class="mt-4">List Employee</h3>
            <div class="card" style="width: 18rem;">
            <div class="card-header">
                Name    : <?=$em->getname();?>
            </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Age         : <?=$em->getAge();?> </li>
                    <li class="list-group-item">Devision         : <?=$em->getDevision();?> </li>
                    <li class="list-group-item">Salery         : Rp.<?=number_format($em->getSalery(), 0, ",", ".");?> </li>
                    <li class="list-group-item"><a href="index.php" class="btn btn-warning btn-sm">Back</a></li>
                </ul>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


  </body>
</html>