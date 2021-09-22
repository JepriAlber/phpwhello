<?php 

require_once "connectionClass.php";

    class crudClass extends connectionClass{

        public function __construct()
        {
            parent::__construct();
        }

        public function getData($table, $id = null, $valueId = null)
        {
            // ------cek apakah data yang ingin ditampilkan 1 data atau semua data----------
                if ($id == null&&$valueId == null) {
                    $query      = "SELECT * FROM ".$table;
                }else{
                    $query      = "SELECT * FROM ".$table." WHERE $id ='".$valueId."'";
                }

                    $result     = $this->conn->query($query);
                    $rows       = [];

                        while ($row = $result->fetch_object()) {
                            $rows[] = $row;
                        }
            
            return $rows;
        }

        public function setStore($table, $data)
        {
            // -----ambil key array untuk dijadikan nama kolom pata tabel yang ingin di inputkan-----
            $columns        = implode(", ",array_keys($data));

            $tempValues  = array_values($data);

                foreach ($tempValues as $key => $data) {
                    // ----pastikan data yang akan disimpan aman---------
                    $tempValues[$key] = "'".$this->conn->real_escape_string($data)."'";
                } 

            $values         = implode(", ",$tempValues); 

            $query          = "INSERT INTO $table ($columns) VALUES ($values)";
            // ------eksekusi query yang sudah di inginkan----
            $result         = $this->conn->query($query);
                // ------cek dan beri nilai bali apakah true atau false--------
                if ($result) {
                    return True;
                }else{
                    return False;
                }
        }

        public function setUpdate($table, $data, $id, $valueId)
        {
            $query  = "UPDATE $table SET ";
            foreach ($data as $key => $value) {
                // ----pastikan data yang akan disimpan aman dan sesuiakan dengan format key='value'---------
                $temArrayData[] = $key."='".$this->conn->real_escape_string($value)."'";
            } 
            $query  .= implode(", ",$temArrayData);
            $query  .= " WHERE $id='".$valueId."'";
                // ------eksekusi query yang sudah di inginkan----
                $result = $this->conn->query($query);
                // ------cek dan beri nilai bali apakah true atau false--------
                if ($result) {
                    return True;
                }else{
                    return False;
                }
        }

        public function delete($table,$id,$valueId)
        {
            $query      = "DELETE FROM $table WHERE $id='".$valueId."'";
            $result     = $this->conn->query($query);
               // ------cek dan beri nilai bali apakah true atau false--------
                if ($result) {
                    return True;
                } else {
                    return False;
                }
        }

    }

?>