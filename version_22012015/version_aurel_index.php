<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/*$sql = "INSERT INTO service (name, email_address)
VALUES ('service2', 'email2')";*/

$sql = "select * from service";
$result = mysqli_query($conn, $sql);

/*if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo "<select>";
    while($row = mysqli_fetch_assoc($result)) {
       // echo "Name: " . $row["name"]. " - Email: " . $row["email_address"]. "<br>";
				  echo "<option value=". $row["name"]. ">". $row["name"]. "</option>";			
    }
	echo "</select>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

</body>
</html>