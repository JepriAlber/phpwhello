<?php 

    class ConnectionClass
    {
        private $host   = "localhost";
        private $user   = "root";
        private $pass   = "";
        private $db     = "phpwhello";

            protected $conn;

        public function __construct()
        {
            if (!isset($this->conn)) {
                $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
            }
            
            if ($this->conn->connect_errno) {
                echo"connection failed";
            }

            return $this->conn;
        }
    }

?>