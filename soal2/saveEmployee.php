<?php 
    if (isset($_POST['save'])) {
        
        require_once "crudClass.php";
        $crud = new crudClass();
        
            // ------------tampung data yang dikirim dengan variabel array---------
            $arrData = [
                'name'      => $_POST['name'],
                'age'       => $_POST['age'],
                'devision'  => $_POST['devision'],
                'salary'    => $_POST['salary'],
            ];

        //---------simpan data dengan method/function store---------
            $result = $crud->store('employee',$arrData);

            if ($result) {
                echo "<script>window.location='index.php';alert('Success')</script>";
            }else{
                echo "<script>window.location='index.php';alert('Failed')</script>";
            }

    }else{
        echo "<script>window.location='index.php';</script>";
    }
?>