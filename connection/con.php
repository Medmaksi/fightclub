<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class crud {

    private $db;
    private $dbhost='localhost';
    private $dbuser='root';
    private $dbpass='MyNewPass';
    private $dbname='calculator';


    function __construct() {

        try {

            $this->db=new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname.';charset=utf8',$this->dbuser,$this->dbpass);

            // echo "Bağlantı Başarılı";

        } catch (Exception $e) {

            die("Bağlantı Başarısız:".$e->getMessage());
        }

    }

    public function addValue($argse) {

        $values=implode(',',array_map(function ($item){
            return $item.'=?';
        },array_keys($argse)));

        return $values;
    }


    public function insert($table,$values) {

        try {

            // echo "<pre>";
            // print_r($values);
            // exit;

            $stmt=$this->db->prepare("INSERT INTO ". $table . " SET " . $this->addValue($values));
            $stmt->execute(array_values($values));

            return ['status' => TRUE];

        } catch (Exception $e) {

            return ['status' => FALSE, 'error' => $e->getMessage()];
        }

    }

    public function wread($table) {


        try {

            $stmt=$this->db->prepare("SELECT * FROM $table");
            $stmt->execute();
            $stmtx= $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $stmtx;

        } catch (Exception $e) {

            return ['status' => FALSE, 'error' => $e->getMessage()];
        }
    }

    public function update($table,$values,$columns,$type='tur') {


        try {

            foreach ($values as $key => $value) {

                $stmt = $this->db->prepare("UPDATE $table SET $columns=? WHERE $type=?");
                $stmt->execute([$key,$value]);

            }

            return ['status' => TRUE];

        } catch(PDOException $e) {
            echo $e->getMessage();
            return ['status' => FALSE,'error'=> $e->getMessage()];

        }
    }


}
?>