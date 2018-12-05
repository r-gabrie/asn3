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

    $fname = $_GET["fname"];
    $lname = $_GET["lname"];
    $city = $_GET["city"];
    $phone = $_GET["phone"];
    $agent = $_GET["agent"];

    $query1= 'SELECT max(customerid) AS maxid FROM customer';
    $result=mysqli_query($connection,$query1);
    if (!$result) {
    die("database max query failed.");
    }
    $row=mysqli_fetch_assoc($result);
    $newkey = intval($row["maxid"]) + 1;
    $cid = (string)$newkey;
    $query = 'INSERT INTO customer values("' . $cid . '","' . $fname . '","' . $lname . '","' . $city . '","' . $phone . '","' . $agent . '")';
    if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
    echo "<h1> New customer was added! </h1>";
    mysqli_close($connection);
?>
<br>


</body>

<br>
<form action="main.php">
<input type="submit" value="Back">
</form>

</html>

