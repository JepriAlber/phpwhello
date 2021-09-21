<?php 
    if (isset($_GET['employee'])) {
        
        require_once "crudClass.php";
        $crud           = new crudClass(); 
        $employee       = $_GET['employee'];

            $result = $crud->delete('employee','employee_id',$employee);
            //---------jika nilai baliknya true maka beri pesan success------
            if ($result) {
                echo "<script>window.location='index.php';alert('Success')</script>";
            }else{
                echo "<script>window.location='index.php';alert('Failed')</script>";
            }

    }else{
        echo"<script>window.location='index.php';</script>";
    }
?>