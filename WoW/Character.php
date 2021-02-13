<?php

namespace WoW;

use WoW\Equipment;

class Character{

	private $characterName;
	private $nameSlug;
    private $id;
    private $guildID;
    private $realmSlug;

    private $race;
    private $class;
    private $spec;
    private $classIcon;

    // Equipment
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

	public function __construct($name, $id, $race, $class, $spec, $guildID, $realmSlug, $nameSlug){
        $this->characterName = $name;
        $this->id = $id;
        $this->race = $race;
        $this->class = $class;
        $this->spec = $spec;
        $this->guildID = $guildID;
        $this->realmSlug = $realmSlug;
        $this->nameSlug = $nameSlug;

        $this->head = new \WoW\Equipment("none", 0, 0, 0, "");
        $this->neck = new \WoW\Equipment("none", 0, 0, 0, "");
        $this->shoulder = new \WoW\Equipment("none", 0, 0, 0, "");
        $this->chest = new \WoW\Equipment("none", 0, 0, 0, "");
        $this->waist = new \WoW\Equipment("none", 0, 0, 0, "");
        $this->legs = new \WoW\Equipment("none", 0, 0, 0, "");
        $this->feets = new \WoW\Equipment("none", 0, 0, 0, "");
        $this->wrist = new \WoW\Equipment("none", 0, 0, 0, "");
        $this->hands = new \WoW\Equipment("none", 0, 0, 0, "");
        $this->finger1 = new \WoW\Equipment("none", 0, 0, 0, "");
        $this->finger2 = new \WoW\Equipment("none", 0, 0, 0, "");
        $this->trinket1 = new \WoW\Equipment("none", 0, 0, 0, "");
        $this->trinket2 = new \WoW\Equipment("none", 0, 0, 0, "");
        $this->back = new \WoW\Equipment("none", 0, 0, 0, "");
        $this->mainWeapon = new \WoW\Equipment("none", 0, 0, 0, "");
        $this->shield = new \WoW\Equipment("none", 0, 0, 0, "");
    }

    // Set Items

        public function setClassIcon($classIcon){
            $this->classIcon = $classIcon;
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

    public function equipmentImport($equipment, $item){
        if($item['slot']['type'] == "SHIRT" || $item['slot']['type'] == "TABARD"){
            return;
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

    public function saveCharacter($type){
        if($type == 1){
            $query = "insert into raiders (blizzardID, Name, guildID, realmSlug, nameSlug) values (" . $this->id . ", '" . $this->characterName . "', " . $this->guildID . ", '" . $this->realmSlug . "', '" . $this->nameSlug . "');" . 
            "insert into raiderInfo (id, race, class, spec) values (" . $this->id . ", " . $this->race['id'] . ", " . $this->class['id'] . ", " . $this->spec['id'] . ");";
        }
        else{
            $query = "update raiders set realmSlug='" . $this->realmSlug . "', nameSlug='" . $this->nameSlug . "' where blizzardID=" . $this->id . ";" . 
            "update raiderInfo set race=" . $this->race['id'] . ", class=" . $this->class['id'] . ", spec=" . $this->spec['id'] . " where id=" . $this->id . ";";
        }

        return $query;
    }

    public function saveEquipment(){
        return 'update raiderInfo set equipment="' . $this->head->save() . ',' . $this->neck->save() . ',' . $this->shoulder->save() . ',' . $this->chest->save() . ',' . $this->waist->save() . ',' . $this->legs->save() . ',' . $this->feets->save() . ',' . $this->wrist->save() . ',' . $this->hands->save() . ',' . $this->finger1->save() . ',' . $this->finger2->save() . ',' . $this->trinket1->save() . ',' . $this->trinket2->save() . ',' . $this->back->save() . ',' . $this->mainWeapon->save() . ',' . $this->shield->save() . '," where id=' . $this->id . ';';
    }

    public function loadEquipment($equipment){
        $equipment = explode(",", $equipment);
        
        $this->head->load($equipment[0]);
        $this->neck->load($equipment[1]);
        $this->shoulder->load($equipment[2]);
        $this->chest->load($equipment[3]);
        $this->waist->load($equipment[4]);
        $this->legs->load($equipment[5]);
        $this->feets->load($equipment[6]);
        $this->wrist->load($equipment[7]);
        $this->hands->load($equipment[8]);
        $this->finger1->load($equipment[9]);
        $this->finger2->load($equipment[10]);
        $this->trinket1->load($equipment[11]);
        $this->trinket2->load($equipment[12]);
        $this->back->load($equipment[13]);
        $this->mainWeapon->load($equipment[14]);
        $this->shield->load($equipment[15]);
    }

    public function quickPrint(){
        return '{"id":"' . $this->id . '", "characterName":"' . $this->characterName . 
            '", "headLevel":"' . $this->head->itemLevel . '", "neckLevel":"' . $this->neck->itemLevel . 
            '", "headImage":"' . $this->head->imageLink . '", "neckImage":"' . $this->neck->imageLink . 
            '", "shoulderLevel":"' . $this->shoulder->itemLevel . '", "chestLevel":"' . $this->chest->itemLevel . 
            '", "shoulderImage":"' . $this->shoulder->imageLink . '", "chestImage":"' . $this->chest->imageLink . 
            '", "waistLevel":"' . $this->waist->itemLevel . '", "legsLevel":"' . $this->legs->itemLevel . 
            '", "waistImage":"' . $this->waist->imageLink . '", "legsImage":"' . $this->legs->imageLink . 
            '", "feetsLevel":"' . $this->feets->itemLevel . '", "wristLevel":"' . $this->wrist->itemLevel . 
            '", "feetsImage":"' . $this->feets->imageLink . '", "wristImage":"' . $this->wrist->imageLink . 
            '", "handsLevel":"' . $this->hands->itemLevel . '", "finger1Level":"' . $this->finger1->itemLevel . 
            '", "handsImage":"' . $this->hands->imageLink . '", "finger1Image":"' . $this->finger1->imageLink . 
            '", "finger2Level":"' . $this->finger2->itemLevel . '", "trinket1Level":"' . $this->trinket1->itemLevel . 
            '", "finger2Image":"' . $this->finger2->imageLink . '", "trinket1Image":"' . $this->trinket1->imageLink . 
            '", "trinket2Level":"' . $this->trinket2->itemLevel . '", "backLevel":"' . $this->back->itemLevel . 
            '", "trinket2Image":"' . $this->trinket2->imageLink . '", "backImage":"' . $this->back->imageLink . 
            '", "mainWeaponLevel":"' . $this->mainWeapon->itemLevel . '", "shieldLevel":"' . $this->shield->itemLevel .
            '", "mainWeaponImage":"' . $this->mainWeapon->imageLink . '", "shieldImage":"' . $this->shield->imageLink . 
            '", "classIcon":"' . $this->classIcon . '"}';
    }
}

?>