<?php
require_once 'vendor/autoload.php';

class CharacterEquipment{

	public $characterName;

	public function __construct($name){
        $this->characterName = $name;
    }
}

// Create a new Blizzard client with Blizzard API key and secret
$client = new \BlizzardApi\BlizzardClient('1302d1b8a0fd4362b9943c763a67229c', '8j14aWZw0KWfBAC8UbBIwWqnfHP8uk8h');

// Create a new World Of Warcraft service with configured Blizzard client
$wow = new \BlizzardApi\Service\WorldOfWarcraft($client);

$accessToken = $client->getAccessToken();

$headers = [
    'Authorization' => 'Bearer ' . $accessToken,        
];
$query = [
	'Namespace' => 'profile-us'
];

// Use API method for getting specific data
$response = $wow->getCharacterEquipment('rivendare', 'mooanna', ['namespace' => 'profile-us', 'access_token' => $accessToken]);

// Accessing response status code
$response->getStatusCode();

// Accessing response headers
$response->getHeaders();

$body = $response->getBody()->getContents();

echo "hi";
//print_r($body);

//echo $body['character']['name'];

$decode = json_decode(json_encode($body));

echo $decode;

//echo gettype($response->getBody());

// Show response body
//print_r($response);
//$character = new CharacterEquipment($response['character']['name']);

//print_r($character);

?>