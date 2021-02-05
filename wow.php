<?php
require_once 'vendor/autoload.php';

//$guildID = $_GET['id'];
$guildID = 1;

// DB LINKAGE
// TODO : PORT TO OTHER FILE- CLASS
    $bal_username = 'vailveix_maine';
    $bal_password = "e5l=QVfC]gOA";
    $bal_host = 'localhost';
    $admin_database = 'vailveix_neil_betrayal_2021';

    global $db_link;
    $db_link = new mysqli($bal_host, $bal_username, $bal_password, $admin_database);

    if($db_link->connect_errno > 0){
        exit();
    }

//$armorTypes = ["", "", "", "Mail"];

// TODO PORT TO OTHER FILE
//CONFIG FUCNTION
    function beepdata_master($query, $db_link){
        if(!$result = $db_link->query($query)){
            echo $err=$db_link->real_escape_string($db_link->error);
            die('An error has occurred !');
        }
        else{
            return $result->fetch_assoc();
        }
    }

// WoW API Requests
    function getCharacterEquipmentRequest($accessToken, $realmSlug, $characterName){
    // Use API method for getting specific data
        $response = $wow->getCharacterEquipment($realmSlug, $characterName, ['namespace' => 'profile-us', 'access_token' => $accessToken]);
        return $characterInfo;
    }

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

$query = "select * from guilds where id=$guildID";
$guildInfo = beepdata_master($query, $db_link);

$guildRoster = $wow->getGuildRoster($guildInfo['realmSlug'], $guildInfo['name'], ['namespace' => 'profile-us', 'access_token' => $accessToken]);

/*echo "<pre>";
print_r($guildRoster);
echo "</pre>";*/

$members = array();

foreach ($guildRoster['members'] as $key => $guildie) {
    $characterInfo = $wow->getCharacterEquipment($guildie['character']['realm']['slug'], characterNameParse($guildie['character']['key']['href']), ['namespace' => 'profile-us', 'access_token' => $accessToken]);

    $character = new \WoW\CharacterEquipment($characterInfo);
    array_push($members, $character);
}

echo "<pre>";
print_r($members);
echo "</pre>";


?>