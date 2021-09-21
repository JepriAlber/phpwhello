<?php 

require_once "connectionClass.php";

    class crudClass extends connectionClass{

        public function __construct()
        {
            parent::__construct();
        }

        public function allData($table, $employeeId = null)
        {
            // ------cek apakah data yang ingin ditampilkan 1 data atau semua data----------
                if ($employeeId == null) {
                    $query      = "SELECT * FROM ".$table;
                }else{
                    $query      = "SELECT * FROM ".$table." WHERE employee_id=".$employeeId;
                }

                    $result     = $this->conn->query($query);
                    $rows       = [];

                        while ($row = $result->fetch_object()) {
                            $rows[] = $row;
                        }
            
            return $rows;
        }

    }


?>