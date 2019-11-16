<?php



include '../model/model.php';


$action= $_POST['action'];


class Controller{

    public $characters;

    public function create(){

    $characters = new Model;
    $characters = $characters->creation();
    print_r($characters);


    /*$player= $characters['character'];
    $monster= $characters['monster'];


    echo 'Player HP: ' . $player->hp;
    echo 'Player DMG: ' . $player->dmg;

    echo '<br>';
    echo 'Monster HP: ' . $monster->mhp;
    echo 'Monster DMG: ' . $monster->mdmg;*/
    }

    public function selection(){
            $selectall= new Model;
            $selectall=$selectall->selecting('valuz');
            return $selectall;
    }

    public function fight($human,$monster,$turn){

        switch ($turn) {

            case 0:
            echo 'Character is attacking';
            $cid='M';
            $attackp= $human['dmg'];
            $healthp= $monster['hp'];

            $fighting= new Model;
            $result= $fighting->fighting($attackp,$healthp,$cid);
            echo '<br>';
            echo 'Monster: '. $result;
            break;

            case 1:
            echo 'Monster is attacking';
            $cid='H';
            $attackp= $monster['dmg'];
            $healthp= $human['hp'];

            $fighting= new Model;
            $result= $fighting->fighting($attackp,$healthp,$cid);
            echo '<br>';
            echo 'Character: '. $result;
            break;

        }
    }


}

switch ($action) {

    case 'create':
        $controller = new Controller;
        $controller->create();
        break;

    case 'fight':

        $selectturn= rand(0,1);
        $controller= new Controller;
        $controllerx= $controller->selection();

        $char= $controllerx[0];
        $mons= $controllerx[1];

        $fc= $controller->fight($char,$mons,$selectturn);
        break;

}

