<?php

namespace WoW;

class Equipment{
    //public $itemID;
	public $name;
	public $itemLevel;
	public $armor;
	public $armorType;
	public $intellect;
	public $agility;
	public $stamina;
	public $haste;
	public $mastery;
    public $versatility;
    public $avoidance;
    public $strength;
    public $sturdiness;
    public $speed;
    public $lifesteal;
    public $corruptionResistance;
    public $imageLink;

	public function __construct($nameInput, $itemLevelInput, $armorInput, $armorTypeInput, $imageLink){
        $this->name = $nameInput;
        $this->itemLevel = $itemLevelInput;
        $this->armor = $armorInput;
        $this->armorType = $armorTypeInput;
        $this->imageLink = $imageLink;
    }

    public function save(){
        return $this->name . "|" . $this->itemLevel  . "|" . $this->armor  . "|" . $this->armorType . "|" . $this->intellect . "|" . $this->agility . "|" . $this->stamina . "|" . $this->haste . "|" . $this->mastery . "|" . $this->versatility . "|" . $this->avoidance . "|" . $this->strength . "|" . $this->sturdiness . "|" . $this->speed  . "|" . $this->lifesteal . "|" . $this->corruptionResistance . "|" . $this->imageLink;
    }

    public function load($item){
        $item = explode("|", $item);
        
        $this->name = $item[0];
        $this->itemLevel = $item[1];
        $this->armor = $item[2];
        $this->armorType = $item[3];
        $this->intellect = $item[4];
        $this->agility = $item[5];
        $this->stamina = $item[6];
        $this->haste = $item[7];
        $this->mastery = $item[8];
        $this->versatility = $item[9];
        $this->avoidance = $item[10];
        $this->strength = $item[11];
        $this->sturdiness = $item[12];
        $this->speed = $item[13];
        $this->lifesteal = $item[14];
        $this->corruptionResistance = $item[15];
        $this->imageLink = $item[16];
    }

    public function setIntellect($intellectInput){
        $this->intellect = $intellectInput;
    }

    public function setAgility($agilityInput){
        $this->agility = $agilityInput;
    }

    public function setStamina($staminaInput){
        $this->stamina = $staminaInput;
    }

    public function setHaste($hasteInput){
        $this->haste = $hasteInput;
    }

    public function setMastery($masteryInput){
        $this->mastery = $masteryInput;
    }

    public function setVerse($verseInput){
        $this->versatility = $verseInput;
    }

    public function setAvoid($avoidInput){
        $this->avoidance = $avoidInput;
    }

    public function setStrength($strengthInput){
        $this->strength = $strengthInput;
    }

    public function setSturdy($sturdyInput){
        $this->sturdiness = $sturdyInput;
    }

    public function setSpeed($speedInput){
        $this->speed = $speedInput;
    }

    public function setLifesteal($lifestealInput){
        $this->lifesteal = $lifestealInput;
    }

    public function setCorptResist($corruptInput){
        $this->corruptionResistance = $corruptInput;
    }

    public function setImage($imageInput){
        $this->imageLink = $imageInput;
    }
}


?>