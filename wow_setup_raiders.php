<?php

require_once 'vendor/autoload.php';
$guildID = 1;

$db_link = new PDO('mysql:host=localhost;dbname=vailveix_neil_betrayal_2021', "vailveix_maine", "e5l=QVfC]gOA");

$raiders = array("Thelvadam", "Brøx", "Talvisota", "Zymandias", "Beardeddog", "Ketharion", "Shinoboo", "Nurfazzar", "Harprogue", "Grego", "Mariolemieux", "Mizukisama", "Fumino", "Ilidanshlong", "Mooanna", "Asta", "Eunwol", "Magnale", "Shelfonaelf", "Mahjarrat", "Fursoc", "Moumoku");

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

// Get Guild's Roster & Insert/Update

$query = "select * from guilds where id=$guildID";
$guildInfo = $db_link->query($query)->fetch();

$guildRoster = $wow->getGuildRoster($guildInfo['realmSlug'], $guildInfo['name'], ['namespace' => 'profile-us', 'access_token' => $accessToken]);

foreach ($guildRoster['members'] as $guildKey => $guildie) {
    $characterInfo = $wow->getCharacter($guildie['character']['realm']['slug'], characterNameParse($guildie['character']['key']['href']), ['namespace' => 'profile-us', 'access_token' => $accessToken]);

    if(!in_array($character['name'], $raiders)){
        continue;
    }

    $character = new \WoW\Character($characterInfo['name'], $characterInfo['id'], $characterInfo['race'], $characterInfo['character_class'], $characterInfo['active_spec'], $guildID, $guildie['character']['realm']['slug'], characterNameParse($guildie['character']['key']['href']));

    $query = "select id from raiders where guildID=$guildID and blizzardID=" . $characterInfo['id'];
    $exists = $db_link->query($query)->fetch();

    if($exists['id'] == NULL){
        $type = 1;
    }
    else{
        $type = 2;
    }   

    $db_link->exec($character->saveCharacter($type));
}

?>