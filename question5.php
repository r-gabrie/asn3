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

<h1> Update a customers phone number </h1>

<form action="question5b.php" method="get">
<?php
echo "Please select a customer: ";
$query = "SELECT * FROM customer ORDER BY lastname";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}

echo '<select name="cid">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="';
    echo $row["customerid"];
    echo '">' . $row["customerid"] . "-" . $row["firstname"] . " " . $row["lastname"] . "-" . $row["phonenumber"] . "</option>" .  "<br>";
}
echo '</select>';
mysqli_free_result($result);
?>
<br>
Phone (Format: [000-0000]): <input type="tel" name="newphone" pattern="[0-9]{3}-[0-9]{4}" minlength="8" maxlength="8" required>
<br>
<input type="submit" value="Update">
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
