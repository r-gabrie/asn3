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

    $cid = $_GET["cid"];
    $query = "DELETE FROM customer WHERE customerid = \"{$cid}\"";
    if (!mysqli_query($connection, $query)) {
        die("Error: delete failed" . mysqli_error($connection));
    }
    echo "<h1>Customer deleted successfully!</h1>";
    mysqli_close($connection);
?>
<br>


</body>

<br>
<form action="main.php">
<input type="submit" value="Back">
</form>

</html>

