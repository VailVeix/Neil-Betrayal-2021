<?php

require_once 'vendor/autoload.php';
$guildID = 1;

$db_link = new PDO('mysql:host=localhost;dbname=vailveix_neil_betrayal_2021', "vailveix_maine", "e5l=QVfC]gOA");

// Assist Functions
    function characterInfoNameParse($link){
        $last = strrpos($link, "/");
        $link = substr($link, $last+1);
        $link = explode("?", $link);
        return $link[0];
    }

// Client Setup & Connect
    // Create a new Blizzard client with Blizzard API key and secret
    $client = new \BlizzardApi\BlizzardClient('1302d1b8a0fd4362b9943c763a67229c', '8j14aWZw0KWfBAC8UbBIwWqnfHP8uk8h');

    // Create a new World Of Warcraft service with configured Blizzard client
    $wow = new \BlizzardApi\Service\WorldOfWarcraft($client);

    $accessToken = $client->getAccessToken();

// Get Guild's Roster's' Equipment

$query = "select icon from classes where 1";
$classInfo = $db_link->query($query)->fetchAll(\PDO::FETCH_ASSOC);

$query = "select * from raiders left join raiderInfo on raiders.blizzardID=raiderInfo.id where guildID=$guildID";
$raiders = $db_link->query($query)->fetchAll(\PDO::FETCH_ASSOC);

foreach ($raiders as $guildKey => $guildie) {
    $character = new \WoW\Character($guildie['name'], $guildie['blizzardID'], $guildie['race'], $guildie['class'], $guildie['spec'], $guildID, $guildie['realmSlug'], $guildie['nameSlug']);
    $character->setClassIcon($classInfo[$guildie['class']-1]['icon']);

    $characterEquipment = $wow->getCharacterEquipment($guildie['realmSlug'], $guildie['nameSlug'], ['namespace' => 'profile-us', 'access_token' => $accessToken]);

    foreach ($characterEquipment['equipped_items'] as $key => $item) {
        $imageInfo = $wow->getItemPic($item['media']['id'], ['namespace' => 'static-us', 'access_token' => $accessToken]);
        $equipment = new \WoW\Equipment($item['name'], $item['level']['value'], $item['armor']['value'], $item['item_subclass']['id'], $imageInfo['assets'][0]['value']);
        $character->equipmentImport($equipment, $item);
    }

    $db_link->exec($character->saveEquipment());
}

?>