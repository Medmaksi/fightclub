<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'characters.php';
include '../connection/con.php';
class Model {

    public function creation()
    {
        $rand1= rand(30,100);
        $rand2= rand(1,10);

        $create= new crud;
        $create->insert('valuz',['hp' => 100,'dmg' =>5,'turn'=>1]);
        $create->insert('valuz',['hp' => $rand1,'dmg' =>$rand2,'turn'=>1]);

       return array(
           'monster' => new Monster($rand1,$rand2),
           'character' => new Human(100,5)
       );


    }

    public function fighting($admg,$dhp){

        if($dhp-$admg!==0){
            return $dhp-$admg;
        } else {
            return 'Öldürüldü!';
        }


    }

    public function selecting($datab){
        $read= new crud;
        $readx= $read->wread($datab);
        return $readx;
    }

    /*public function __destruct()
    {
       echo 'Karakterler yaratıldı.';
    }*/

    /*$databaseConnect = new DatabaseConnect();
        $pdo = $databaseConnect->getPdo();
        $query= $pdo->prepare('INSERT INTO valuz(hp,dmg,turn) VALUES (:hp,:dmg,1)');
        $query->bindParam(':hp',$rand1);
        $query->bindParam(':dmg',$rand2);
        $query->execute();*/

}

