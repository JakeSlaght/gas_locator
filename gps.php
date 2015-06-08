<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" \>
<?php
//the headers below are used to auto-cache the page for loading purposes.
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

//include 'mobile.php'; //This will check if the system is a mobile device or not

$streetErr = "";
$cityErr="";
$stateErr="";
$zipcodeErr="";
$radiusErr="";

$street= "";
$state= "";
$city= "";
$zipcode= "";
$address="";
$radius="";
$errors_exist = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 if (empty($_POST["street"])) {
     $streetErr = "A Street is required";
	 $errors_exist=true;
	}
	else
	{
		$street=($_POST["street"]);
	}
	 if (empty($_POST["city"])) {
     $cityErr = "A City is required";
	 $errors_exist=true;
	}
	else
	{
		$city=($_POST["city"]);
	}
	 if (empty($_POST["state"])) {
     $stateErr = "A State is required";
	 $errors_exist=true;
	}	 
	else
	{
		$state=($_POST["state"]);
	}
	 if (empty($_POST["zipcode"])) {
     $zipcodeErr = "A Zip Code is required";
 	 $errors_exist=true;}	 
	else
	{
		$zipcode=($_POST["zipcode"]);
	}
		if (empty($_POST["radius"])) {
			$radius=1;
		}
		else
		{
			$radius=($_POST["radius"]);
		}
	
	}

?>

</head>
<body>
<h1>Gas Station Locator</h1>
<span class="form-body">
<div id="errors">
<?php
 if($errors_exist) {
	 echo $streetErr ." , ". $cityErr ." , ". $stateErr ." , ". $zipcodeErr;
 }
 else
 {
	echo "Asterisks (*) are required fields! ";
 }

?>
</div>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
<tr><td>Street *: </td><td> <input type="text" name="street"></td></tr>
<tr><td>City *: </td><td> <input type="text" name="city"></td></tr>
<tr><td>State *: </td><td> <input type="text" name="state"></td></tr>
<tr><td>Zip Code *: </td><td> <input type="text" name="zipcode"></td></tr>
<tr><td>Radius: </td><td><input type="text" name="radius"></td></tr>
<tr><td><input type="checkbox" name="checkGas" value="gsCheck">Check for Gas Stations</td></tr>
		<tr><td><input type="submit"></td></tr>
</table></form>
</span>
<div id="outcome">
<?php
    if(isset($_POST["checkGas"]))
    {
			$address= $street." ".$city.",".$state." ".$zipcode;
			include 'gas_station_findme.php';
	}
?></span>
</body>
</html>