<?php
//Create the request with cUrl
$connect_url = 'https://api.openbrewerydb.org/breweries';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $connect_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$error = curl_errno($ch);

//Get the json body
$response = json_decode($response, true);
curl_close($ch);


//We insert all new breweries
foreach ($breweries as $brewery) {
	$command = "wp post create --post_type=brewery --post_title'" . $brewery['name'] . "' --post_date=" . $brewery['created_at'];
	echo "\n$command\n" . shell_exec($command);
}
