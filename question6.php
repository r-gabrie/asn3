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

<h1> Delete a customer </h1>

<form action="question6b.php" method="get">
<?php
echo "Please select a customer to delete: ";
$query = "SELECT * FROM customer ORDER BY lastname";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}

echo '<select name="cid">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="';
    echo $row["customerid"];
    echo '">' . $row["customerid"] . "-" . $row["firstname"] . " " . $row["lastname"] . "</option>" .  "<br>";
}
echo '</select>';
mysqli_free_result($result);
?>
<br>
<input type="submit" value="Delete">
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




