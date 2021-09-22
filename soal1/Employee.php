<?php 

    class Employee{

        private $employeeId;
        private $firstName;
        private $lastName;
        private $age;
        private $devision;
        private $salery;

            public function __construct($employeeId, $firstName, $lastName, $age, $devision, $salery)
            {
                $this->employeeId   = $employeeId;
                $this->firstName    = $firstName;
                $this->lastName     = $lastName;
                $this->age          = $age;
                $this->devision     = $devision;
                $this->salery       = $salery;
            }

            // ------------method/function untuk mengambil id employee---------
            public function getEmployeeID()
            {
                return $this->employeeId;
            }  

            // ------------method/function untuk mengambil first name employee--------- 
            public function getFirstName()
            {
                return $this->firstName;
            }

            // ------------method/function untuk mengambil last name employee--------- 
            public function getLastName()
            {
                return $this->lastName;
            }

            // ------------method/function untuk mengambil name lengkap---------
            public function getFullName()
            {
                $fullName = $this->firstName." ".$this->lastName;
                return $fullName;
            }   

            // ------------method/function untuk mengambil usia employee---------
            public function getAge()
            {
                return $this->age;
            }

            // ------------method/function untuk mengambil devisi employee---------
            public function getDevision()
            {
                return $this->devision;
            }

            // ------------method/function untuk mengambil gaji employee---------
            public function getSalery()
            {
                return $this->salery;
            }

            // -----------method/fungsi untuk mengambil data employee berdasarkan id yang di ingikan---------
            public static function findEmployee($employees, $employeeId){
                
                foreach ($employees as $em) {
                        // -----------jika id yang dipilih yang sudah dihash sama dengan id data yang sudah di hash maka kirimkan datanya-----------------
                        if (sha1($em->getEmployeeID()) == $employeeId) {
                            return $em;
                        }

                }

            }

    }
    
?>