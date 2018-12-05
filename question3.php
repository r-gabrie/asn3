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

<h1> Insert a new purchase </h1>

<form action="question3b.php" method="get">
<?php
echo "Please select a customer: ";
$query = "SELECT * FROM customer ORDER BY lastname";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}

echo '<select name="customer">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="';
    echo $row["customerid"];
    echo '">' . $row["firstname"] . " " . $row["lastname"] . "-" . $row["customerid"] . "</option>" .  "<br>";
}
echo '</select>';
mysqli_free_result($result);
?>




<br>
<?php
echo "Please select a product: ";
$query = "SELECT * FROM product";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}

echo '<select name="product">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="';
    echo $row["productid"];
    echo '">' . $row["description"] . "-" . $row["productid"] . "</option>" .  "<br>";
}
echo '</select>';
mysqli_free_result($result);
?>

<br>
Please enter a quantity: <input type="number" name="quantity" min="1" value="1">
<br>
<input type="submit" value="Submit">
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

