<?php

class HumanBeing {

    public $eyesColor;
    public $height;
    public $weight;
    public static $planet = 'Terra';

    public static function whatIsMyPlanet() {
        return self::$planet;
    }

}

var_dump(HumanBeing::$planet);

$mario = new HumanBeing();
$mario->eyesColor = 'castani';
$mario->height = 180;
$mario->weight = 80;

var_dump($mario);

$francesca = new HumanBeing();
$francesca->eyesColor = 'azzurri';
$francesca->height = 170;
$francesca->weight = 55;

var_dump($francesca);

class Animal {

    public $name;
    public $habitat;
    private $godCode;   // Le proprietà ed i metodi privati non vengono ereditati e non sono visibili dall'esterno della classe
    protected $legsNumber;   // Le proprietà ed i metodi protected vengono ereditati, ma non sono visibili dall'esterno della classe

    function __construct(
        $name,
        $habitat
    ) {
        if (is_string($name) && strlen($name) >= 3) {
            $this->name = $name;
        }
        $this->habitat = $habitat;
    }
    
    public function getFullAnimal() {
        return $this->name.' - '.$this->habitat;
    }

    public function getGodCode() {
        return $this->godCode;
    }

    public function setGodCode($godCode) {
        $this->godCode = $godCode;
    }

    public function getLegsNumber() {
        return $this->legsNumber;
    }

    public function setLegsNumber($legsNumber) {
        $this->legsNumber = $legsNumber;
    }

}

class Mammal extends Animal {

    public $childrenPerBirth;

    function __construct(
        $name,
        $habitat,
        $childrenPerBirth
    ) {
        parent::__construct($name, $habitat);
        $this->childrenPerBirth = $childrenPerBirth;
    }

    public function setOtherGodCode($godCode) {
        $this->godCode = $godCode;  // Non possono utilizzare godCode dalla classe Mammal perché è private
    }

    public function setOtherLegsNumber($legsNumber) {
        $this->legsNumber = $legsNumber;    // Posso utilizzare legsNumber dalla classe Mammal perché è protected
    }
    
    public function getFullMammal() {
        return $this->name.' - '.$this->habitat.' - '.$this->childrenPerBirth;
    }
    
    public function getFullAnimal() {
        return parent::getFullAnimal().' - '.$this->childrenPerBirth;
    }

}

$anAnimal = new Animal('Leone', 'Giungla');
// $anAnimal->habitat = 'Giungla';
$anAnimal->setGodCode('1234ABCD');
$anAnimal->setLegsNumber(4);

$aMammal = new Mammal(
    'Orso polare',
    'Polo',
    3
);
// $aMammal->name = 'Orso polare';
// $aMammal->habitat = 'Polo';
// $aMammal->setGodCode('DCBA4321');
$aMammal->setOtherGodCode('DCBA4321');
$aMammal->setOtherLegsNumber(4);


var_dump($anAnimal);
var_dump($aMammal);
var_dump($aMammal->getFullAnimal());
var_dump($aMammal->getFullMammal());

var_dump($anAnimal->getGodCode());
var_dump($aMammal->getGodCode());

var_dump($anAnimal->getLegsNumber());
var_dump($aMammal->getLegsNumber());