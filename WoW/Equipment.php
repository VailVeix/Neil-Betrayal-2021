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
        $this->armorInput = $armorInput;
        $this->armorTypeInput = $armorTypeInput;
        $this->imageLink = $imageLink;
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