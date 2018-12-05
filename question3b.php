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



<?php
    
    $cid = $_GET["customer"];
    $pid = $_GET["product"];
    $quant = $_GET["quantity"];
    $query = "UPDATE purchase SET quantity = quantity + {$quant} WHERE customerid = \"{$cid}\" AND productid = \"{$pid}\"";
    mysqli_query($connection, $query);
    $test = mysqli_affected_rows($connection);

    if ($test == -1) {
    $query = "INSERT INTO purchase VALUES(\"{$pid}\",\"{$cid}\",{$quant})";
        echo "<h1> Success: New purchase inserted!</h1> <br>";
        mysqli_query($connection, $query);
    }
    echo "<h1> Success: Quantities updated! </h1>";
    $query = "UPDATE product SET quantity = quantity - {$quant} WHERE productid = \"{$pid}\"";
    mysqli_query($connection, $query);

?>
<br>


<?php
   mysqli_close($connection);
?>
</body>

<br>
<form action="main.php">
<input type="submit" value="Back">
</form>

</html>
