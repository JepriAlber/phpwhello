<?php 
// ---------jika user membuka halaman detail tanpa mengetahui id employee maka kembalikan ke halaman awal------
if (!isset($_GET['employee'])) {
    echo"<script>window.location='index.php'</script>";
}

require_once "crudClass.php"; 

$employeeId = $_GET['employee'];

$crud       = new crudClass();
// --------ambil data yang sesui dengan id diinginkan-------
$employees  = $crud->allData('employee',$employeeId);
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
        <div class="row justify-content-center">
        <h3 class="mt-4">List Employee</h3>
            <?php foreach($employees as $em): ?>
                <div class="card" style="width: 28rem;">
                <div class="card-header">
                    Name    : <?=$em->name;?> 
                </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Age         : <?=$em->age;?> </li>
                        <li class="list-group-item">Devision    : <?=$em->devision;?> </li>
                        <li class="list-group-item">Salery      : Rp.<?=number_format($em->salery, 0, ",", ".");?> </li>
                        <li class="list-group-item"><a href="index.php" class="btn btn-warning btn-sm">Back</a></li>
                    </ul>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


  </body>
</html>