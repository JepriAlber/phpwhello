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

        public function store($table, $data)
        {
            $columns        = implode(", ",array_keys($data));
            $escapedValues  = array_values($data);
                foreach ($escapedValues as $key => $data) {
                    $escapedValues[$key] = "'".$this->conn->real_escape_string($data)."'";
                } 
            $values         = implode(",",$escapedValues); 

            $query          = "INSERT INTO $table ($columns) VALUES ($values)";
            $result         = $this->conn->query($query);
                
                if ($result) {
                    return True;
                }else{
                    return False;
                }
        }

    }


?>