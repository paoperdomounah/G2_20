<?php
    class Conectar{
     
        protected $dbh;

           protected funtion Conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:host=20.216.41.245;dbname=g2_20","G2_20","KNptsf7k");
                return $conectar;

            }catch (Exception $e){
                print "Error DB!: " . $e->getMessage() . "<br/>";
                die(); 
            }

        }

        public function set_names(){
           return $this->dbh->query("SET NAMES 'utf8'");
        }

    }

?>
