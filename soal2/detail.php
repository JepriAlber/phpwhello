<?php 
// ---------jika user membuka halaman detail tanpa mengetahui id employee maka kembalikan ke halaman awal------
if (!isset($_GET['employee'])) {
    echo "<script>window.location='index.php';</script>";
}

require_once "model/CrudClass.php"; 
// --------untuk mengambil function tambahan yang ingin digunakan--------
require_once "helpers/helper.php";
// -------simpan data yang di kirim divariaber $employeeId-------
$employeeId = $_GET['employee'];
// --------instance kan class crudClass dengan variabel crud-------
$crud       = new CrudClass();
// --------ambil data yang sesui dengan id diinginkan-------
$employees  = $crud->getData('employee','employee_id',$employeeId);
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
      body {
              background-color: powderblue;
          }
    </style>
    <title>Soal Satu</title>
  </head>
  <body>
    
  
    <div class="container">
        <div class="row justify-content-center mt-5">
            
            <?php foreach($employees as $em): ?>
                <div class="card shadow" style="width: 28rem;">
                <div class="card-header">
                <h4>Detail Employee</h4>
                </div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name        : <?=$crud->getFullName($em->first_name,$em->last_name);?></li>
                        <li class="list-group-item">First Name         : <?=$em->first_name;?></li>
                        <li class="list-group-item">Last Name         : <?=$em->last_name;?></li>
                        <li class="list-group-item">Age         : <?=$em->age;?> </li>
                        <li class="list-group-item">Devision    : <?=$em->devision;?> </li>
                        <li class="list-group-item">Salary      : Rp.<?=rupiah($em->salary);?> </li>
                        <li class="list-group-item"><a href="index.php" class="btn btn-warning btn-sm">Back</a></li>
                    </ul>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


  </body>
</html>