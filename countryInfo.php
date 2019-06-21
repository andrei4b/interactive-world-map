<?php

$servername = "fdb22.awardspace.net";
$username = "2873936_world";
$password = "awardspace40012";
$dbname = "2873936_world";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset( $conn, 'utf8');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$currentCountry = $_GET['country'];

$sql = "SELECT country.Name, country.Code2, country.Continent, country.Region, country.SurfaceArea, country.GovernmentForm, city.name as Capital FROM city JOIN country ON city.ID = country.capital WHERE country.Code2 = '" . $currentCountry . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
           echo "<br> <b>Name:</b> ". $row["Name"];
           echo "<br> <b>Code:</b> ". $row["Code2"];
           echo "<br> <b>Continent:</b> ". $row["Continent"];
           echo "<br> <b>Region:</b> ". $row["Region"];
           echo "<br> <b>Surface Area:</b> ". $row["SurfaceArea"];
           echo "<br> <b>Government Form:</b> ". $row["GovernmentForm"];
           echo "<br> <b>Capital:</b> ". $row["Capital"];
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 