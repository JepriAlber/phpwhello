<?php 

    class Employee{

        private $employeeId;
        private $name;
        private $age;
        private $devision;
        private $salery;

            public function __construct($employeeId, $name, $age, $devision, $salery)
            {
                $this->employeeId   = $employeeId;
                $this->name         = $name;
                $this->age          = $age;
                $this->devision     = $devision;
                $this->salery       = $salery;
            }

            public function getEmployeeID()
            {
                return $this->employeeId;
            }   
            public function getName()
            {
                return $this->name;
            }   

            public function getAge()
            {
                return $this->age;
            }

            public function getDevision()
            {
                return $this->devision;
            }

            public function getSalery()
            {
                return $this->salery;
            }

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