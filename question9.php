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

<h1> View the revenue breakdown of a product</h1>

<form action="question9b.php" method="get">
<?php
echo "Please select the product you want to view the revenue of: ";
$query = "SELECT * FROM product";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}

echo '<select name="pid">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="';
    echo $row["productid"];
    echo '">' . $row["productid"] . "-" . $row["description"] . "-" . $row["cost"] . "</option>" .  "<br>";
}
echo '</select>';
mysqli_free_result($result);
?>
<br>
<input type="submit" value="Go">
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

