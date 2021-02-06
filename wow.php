<?php
require_once 'vendor/autoload.php';

//$guildID = $_GET['id'];
$guildID = 1;

$db_link = new PDO('mysql:host=localhost;dbname=vailveix_neil_betrayal_2021', "vailveix_maine", "e5l=QVfC]gOA");

//$armorTypes = ["", "", "", "Mail"];

// Assist Functions
    function characterNameParse($link){
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

// Raid bosses & item drops & stuff

$itemInfo = $wow->getItem(182993, ['namespace' => 'static-us', 'access_token' => $accessToken]);

/*echo "<pre>";
print_r($itemInfo);
echo "</pre>";*/

// Get Guild's Roster & Equipment

$query = "select * from guilds where id=$guildID";
$guildInfo = $db_link->query($query)->fetch();

$guildRoster = $wow->getGuildRoster($guildInfo['realmSlug'], $guildInfo['name'], ['namespace' => 'profile-us', 'access_token' => $accessToken]);

$members = array();

foreach ($guildRoster['members'] as $key => $guildie) {
    $characterInfo = $wow->getCharacterEquipment($guildie['character']['realm']['slug'], characterNameParse($guildie['character']['key']['href']), ['namespace' => 'profile-us', 'access_token' => $accessToken]);

    echo "<pre>";
    print_r($characterInfo);
    echo "</pre>";

    $character = new \WoW\CharacterEquipment($characterInfo['character']['name']);
    $character->equipmentImport($characterInfo);
    array_push($members, $character);
}

/*echo "<pre>";
print_r($members);
echo "</pre>";*/


?>