<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="matrix.css">
<meta charset="utf-8">
</head>
<body>

<?php
include 'connecttodb.php';
?>

<form action="question4b.php" method="get">

Customer ID: (Automatically generated)
<br>
First Name: <input type="text" name="fname" required>
<br>
Last Name: <input type="text" name="lname" required>
<br>
City: <input type="text" name="city" required>
<br>
Phone (Format: [000-0000]): <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{4}" minlength="8" maxlength="8" required>
<br>
Agent:
<?php
	$query = "SELECT * FROM agent ORDER BY lastname";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		die("databases query failed.");
	}	

	echo '<select name="agent">';
	while ($row = mysqli_fetch_assoc($result)) {
    	echo '<option value="';
    	echo $row["agentid"];
    	echo '">' . $row["firstname"] . " " . $row["lastname"] . "-" . $row["agentid"] . "</option>";
	}
?>
<br>
<input type="submit" value="submit">
</form>


<?php
mysqli_close($connection);
?>

</body>

<br>
<form action="main.php">
<input type="submit" value="Back">
</form>

</html>
