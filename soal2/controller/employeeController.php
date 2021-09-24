<?php 
    if (isset($_POST['save'])) {
        
        require_once "../model/CrudClass.php";
        // --------instance kan class crudClass dengan variabel crud-------
        $crud = new CrudClass();
        
            // ------------tampung data yang dikirim dengan variabel array---------
            $arrData = [
                'first_name'     => ucwords($_POST['first_name']),
                'last_name'      => ucwords($_POST['last_name']),
                'age'            => $_POST['age'],
                'devision'       => ucwords($_POST['devision']),
                'salary'         => $_POST['salary']
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

        require_once "../model/CrudClass.php";
        // --------instance kan class crudClass dengan variabel crud-------
        $crud = new CrudClass();
        
            $data = [
                'first_name'     => ucwords($_POST['first_name']),
                'last_name'      => ucwords($_POST['last_name']),
                'age'            => $_POST['age'],
                'devision'       => ucwords($_POST['devision']),
                'salary'         => $_POST['salary']
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
        
        require_once "../model/CrudClass.php";
        $crud           = new CrudClass(); 
        // --------instance kan class crudClass dengan variabel crud-------
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