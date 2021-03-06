<?php require_once "data.php"; ?>

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
        <h3 class="mt-4">List Employee</h3>
        <?php foreach($employees as $em): ?>
            <div class="card" style="width: 18rem;">
            <div class="card-header">
                Name    : <?=$em->getFullName();?>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Age         : <?=$em->getAge();?></li>
                <!-- ---------------------------kirim id employee yang sudah di hash kan-------------- -->
                <li class="list-group-item">Detail? <a href="detail.php?employee=<?=sha1($em->getEmployeeID());?>">klik</a></li>
            </ul>
            </div>
        <?php endforeach ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  </body>
</html>