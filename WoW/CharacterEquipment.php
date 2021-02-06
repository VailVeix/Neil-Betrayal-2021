<?php

namespace WoW;

use WoW\Equipment;

class CharacterEquipment{

	public $characterName;
	public $head;
	public $neck;
	public $shoulder;
	public $chest;
	public $waist;
	public $legs;
	public $feets;
	public $wrist;
	public $hands;
	public $finger1;
	public $finger2;
	public $trinket1;
	public $trinket2;
	public $back;
	public $mainWeapon;
	public $shield;

    public function equipmentImport($characterInfo){
        foreach ($characterInfo['equipped_items'] as $key => $item) {
            $equipment = new Equipment($item['name'], $item['level']['value'], $item['armor']['value'], $item['item_subclass']['id']);

            if($item['slot']['type'] == "SHIRT" || $item['slot']['type'] == "TABARD"){
                continue;
            }

            if(isset($item['stats'])){
                foreach ($item['stats'] as $key => $stat) {
                    switch ($stat['type']['type']) {
                        case 'INTELLECT':
                            $equipment->setIntellect($stat['value']);
                            break;
                        case 'AGILITY':
                            $equipment->setAgility($stat['value']);
                            break;
                        case 'STRENGTH':
                            $equipment->setStrength($stat['value']);
                            break;
                        case 'STAMINA':
                            $equipment->setStamina($stat['value']);
                            break;
                        case 'HASTE_RATING':
                            $equipment->setHaste($stat['value']);
                            break;
                        case 'MASTERY_RATING':
                            $equipment->setMastery($stat['value']);
                            break;
                        case 'CRIT_RATING':
                            $equipment->setMastery($stat['value']);
                            break;
                        case 'VERSATILITY':
                            $equipment->setVerse($stat['value']);
                            break;
                        case 'COMBAT_RATING_AVOIDANCE':
                            $equipment->setAvoid($stat['value']);
                            break;
                        case 'COMBAT_RATING_STURDINESS':
                            $equipment->setSturdy($stat['value']);
                            break;
                        case 'COMBAT_RATING_SPEED':
                            $equipment->setSpeed($stat['value']);
                            break;
                        case 'COMBAT_RATING_LIFESTEAL':
                            $equipment->setLifesteal($stat['value']);
                            break;
                        case 'CORRUPTION_RESISTANCE':
                            $equipment->setCorptResist($stat['value']);
                            break;
                        default:
                            echo "new stat, or error " . $stat['type']['type'] . "</br>";
                            break;
                    }
                }
            }
            
            switch ($item['slot']['type']) {
                case 'HEAD':
                    $this->setHead($equipment);
                    break;
                case 'NECK':
                    $this->setNeck($equipment);
                    break;
                case 'SHOULDER':
                    $this->setShoulder($equipment);
                    break;
                case 'CHEST':
                    $this->setChest($equipment);
                    break;
                case 'WAIST':
                    $this->setWaist($equipment);
                    break;
                case 'LEGS':
                    $this->setLegs($equipment);
                    break;
                case 'FEET':
                    $this->setFeets($equipment);
                    break;
                case 'WRIST':
                    $this->setWrist($equipment);
                    break;
                case 'HANDS':
                    $this->setHands($equipment);
                    break;
                case 'FINGER_1':
                    $this->setFinger1($equipment);
                    break;
                case 'FINGER_2':
                    $this->setFinger2($equipment);
                    break;
                case 'TRINKET_1':
                    $this->setTrinket1($equipment);
                    break;
                case 'TRINKET_2':
                    $this->setTrinket2($equipment);
                    break;
                case 'BACK':
                    $this->setBack($equipment);
                    break;
                case 'MAIN_HAND':
                    $this->setMainWeapon($equipment);
                    break;
                case 'OFF_HAND':
                    $this->setShield($equipment);
                    break;
                case 'SHIRT':
                    break;
                case 'TABARD':
                    break;
                default:
                    echo "new item, or error" . $item['slot']['type'] . "</br>";
                    break;
            }
        }
    }

	public function __construct($name){
        $this->characterName = $name;
    }

    public function setHead($headInput){
    	$this->head = $headInput;
    }

    public function setNeck($neckInput){
    	$this->neck = $neckInput;
    }

    public function setShoulder($shoulderInput){
    	$this->shoulder = $shoulderInput;
    }

    public function setChest($chestInput){
    	$this->chest = $chestInput;
    }

    public function setWaist($waistInput){
    	$this->waist = $waistInput;
    }

    public function setLegs($legsInput){
    	$this->legs = $legsInput;
    }

    public function setFeets($feetsInput){
    	$this->feets = $feetsInput;
    }

    public function setWrist($wristInput){
    	$this->wrist = $wristInput;
    }

    public function setHands($handsInput){
    	$this->hands = $handsInput;
    }

    public function setFinger1($fnger1Input){
    	$this->finger1 = $fnger1Input;
    }

    public function setFinger2($finger2Input){
    	$this->finger2 = $finger2Input;
    }

    public function setTrinket1($trinket1Input){
    	$this->trinket1 = $trinket1Input;
    }

    public function setTrinket2($trinket2Input){
    	$this->trinket2 = $trinket2Input;
    }

    public function setBack($backInput){
    	$this->back = $backInput;
    }

    public function setMainWeapon($mainWeaponInput){
    	$this->mainWeapon = $mainWeaponInput;
    }

    public function setShield($shieldInput){
    	$this->shield = $shieldInput;
    }

    public function saveCharacter($type){

    }
}

?>