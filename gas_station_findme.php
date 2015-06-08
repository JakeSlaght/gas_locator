<?php

$gasStationsURL="http://api.mygasfeed.com/";
	
$address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
 
$response = file_get_contents($url);
 
$json = json_decode($response,TRUE); //generate array object from the response from the web

$lat= $json['results'][0]['geometry']['location']['lat'];
$long= $json['results'][0]['geometry']['location']['lng'];

$gasstations=file_get_contents($gasStationsURL ."stations/radius/".$lat."/".$long."/". $radius ."/reg/distance/qouyn1fmy5.json");
$listOfGS = (array)json_decode($gasstations,JSON_PRETTY_PRINT);

if(is_array($listOfGS))
{
?>
<table>
<tbody><tr><th>Station</th><th>Address</th><th>Distance Away</th></tr>
<?php
	foreach($listOfGS['stations'] as $value)
	{
		if(is_array($value))
		{
			$station_name = $value['station'];
			$address=$value['address'];
			$state=$value['region'];
			$city=$value['city'];
			$distance=$value['distance'];
			$zip=$value['zip'];
			
        echo "<tr>\n"
        ."<td>{$station_name}</td>\n"
        ."<td>{$address} {$city} , {$state} {$zip}</td>\n"
        ."<td> {$distance}</td>\n"
        ."</tr>\n";
		}
	}
?>
<?php
}
else
{
		echo "<tr><td>There is no Gas Stations within specified radius.</td></tr>";	
}
?>
</tbody></table>
