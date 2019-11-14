<?php

class Human {

    public $hp;
    public $dmg;

    public function __construct($hp,$dmg)
    {
        $this->hp=$hp;
        $this->dmg=$dmg;
    }

}

class Monster {

    public $mhp;
    public $mdmg;

    public function __construct($mhp,$mdmg)
    {
        $this->mhp=$mhp;
        $this->mdmg=$mdmg;
    }

}