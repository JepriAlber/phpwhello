<?php 
    if (isset($_POST['save'])) {
        
        require_once "../model/crudClass.php";
        $crud = new crudClass();
        
            // ------------tampung data yang dikirim dengan variabel array---------
            $arrData = [
                'name'      => $_POST['name'],
                'age'       => $_POST['age'],
                'devision'  => $_POST['devision'],
                'salary'    => $_POST['salary'],
            ];

        //---------simpan data dengan method/function store---------
            $result = $crud->setStore('employee',$arrData);
            //---------jika nilai baliknya true maka beri pesan success------
            if ($result) {
                echo "<script>window.location='../index.php';alert('Success')</script>";
            }else{
                echo "<script>window.location='../index.php';alert('Failed')</script>";
            }

    }else if(isset($_POST['edit'])){

        require_once "../model/crudClass.php";
        $crud = new crudClass();
        
            $data = [
                'name'      => $_POST['name'],
                'age'       => $_POST['age'],
                'devision'  => $_POST['devision'],
                'salary'    => $_POST['salary']
            ];

        $employeeId = $_POST['id'];
         //---------update data dengan method/function set update---------
        $result     = $crud->setUpdate('employee', $data,'employee_id', $employeeId);
        //---------jika nilai baliknya true maka beri pesan success------
        if ($result) {
            echo "<script>window.location='../index.php';alert('Success')</script>";
        }else{
            echo "<script>window.location='../index.php';alert('Failed')</script>";
        }
        

    }else if (isset($_GET['employeeDelete'])) {
        
        require_once "../model/crudClass.php";
        $crud           = new crudClass(); 
        $employee       = $_GET['employeeDelete'];

            $result = $crud->delete('employee','employee_id',$employee);
            //---------jika nilai baliknya true maka beri pesan success------
            if ($result) {
                echo "<script>window.location='../index.php';alert('Success')</script>";
            }else{
                echo "<script>window.location='../index.php';alert('Failed')</script>";
            }

    }else{
        echo"<script>window.location='../index.php';</script>";
    }
?>