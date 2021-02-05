<?php
require_once 'vendor/autoload.php';

class CharacterEquipment{

	public $characterName;
	public $head;
	public $neck;
	public $shoudler;
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
}

class Equipment{
	public $name;
	public $itemLevel;
	public $armor;
	public $armorType;
	public $intellect;
	public $agility;
	public $stamina;
	public $haste;
	public $mastery;

    private $armorTypes = ["", "", "", "Mail"];

	public function __construct($nameInput, $itemLevelInput, $armorInput, $armorTypeInput){
        $this->name = $nameInput;
        $this->itemLevel = $itemLevelInput;
        $this->armorInput = $armorInput;
        $this->armorTypeInput = $armorTypeInput;
    }

    public setIntellect($intellectInput){
        $this->intellect = $intellectInput;
    }

    public setAgility($agilityInput){
        $this->agility = $agilityInput;
    }

    public setStamina($staminaInput){
        $this->stamina = $staminaInput;
    }

    public setHaste($hasteInput){
        $this->haste = $hasteInput;
    }

    public setMastery($masteryInput){
        $this->mastery = $masteryInput;
    }

}

// Create a new Blizzard client with Blizzard API key and secret
$client = new \BlizzardApi\BlizzardClient('1302d1b8a0fd4362b9943c763a67229c', '8j14aWZw0KWfBAC8UbBIwWqnfHP8uk8h');

// Create a new World Of Warcraft service with configured Blizzard client
$wow = new \BlizzardApi\Service\WorldOfWarcraft($client);

$accessToken = $client->getAccessToken();

// Use API method for getting specific data
$response = $wow->getCharacterEquipment('rivendare', 'mooanna', ['namespace' => 'profile-us', 'access_token' => $accessToken]);

// Accessing response status code
$response->getStatusCode();

// Accessing response headers
$response->getHeaders();

$body = $response->getBody()->getContents();

$characterInfo = json_decode($body, true);

echo "<pre>";
print_r($characterInfo);
echo "</pre>";

$character = new CharacterEquipment($characterInfo['character']['name']);

//print_r($character);

/*foreach ($characterInfo['equipped_items'] as $key => $item) {
    $equipment = new Equipment($item['name'], $item['level']['value'], $item['armor']['value'], $item['item_subclass']['id']);

    foreach ($item['stats'] as $key => $stat) {
        switch ($stat['type']['type']) {
            case 'INTELLECT':
                $equipment->setIntellect($stat['value'])
                break;
            case 'AGILITY':
                $equipment->setAgility($stat['value'])
                break;
            case 'STAMINA':
                $equipment->setStamina($stat['value'])
                break;
            case 'HASTE_RATING':
                $equipment->setHaste($stat['value'])
                break;
            case 'MASTERY_RATING':
                $equipment->setMastery($stat['value'])
                break;
            default:
                echo "new stat, or error";
                break;
        }
    }
	
    switch ($item['slot']['type']) {
        case 'HEAD':
            $character->setHead($equipment);
            break;
        case 'NECK':
            $character->setNeck($equipment);
            break;
        case 'SHOULDER':
            $character->setShoulder($equipment);
            break;
        case 'SHOULDER':
            $characdter->setShoulder($equipment);
            break;
        case 'SHOULDER':
            $character->setShoulder($equipment);
            break;
        case 'SHOULDER':
            $character->setShoulder($equipment);
            break;
        case 'SHOULDER':
            $character->setShoulder($equipment);
            break;
        case 'SHOULDER':
            $character->setShoulder($equipment);
            break;
        case 'SHOULDER':
            $character->setShoulder($equipment);
            break;
        case 'SHOULDER':
            $character->setShoulder($equipment);
            break;

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
        
        default:
            # code...
            break;
    }
}*/

?>