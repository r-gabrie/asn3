<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="matrix.css">
<body>

<h1> Welcome to Dream Land</h1>
<hr>
<?php
   include 'connecttodb.php';
?>


<!-- Welcome to my assignment. My student number is 250921157.
     I tried to keep the amount of files to submit low so some
     features are on the main. Also please excuse my lack of comments,
     most of the code is pretty straightforward. -->


<h2> Q1: Show customers and then their products purchased </h2>
<h3> Please choose a customer to see their purchases: </h3>
<form action="question1.php" method="get">
<?php
$query = "SELECT * FROM customer ORDER BY lastname";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}

while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="customer" method="GET" value="';
    echo $row["customerid"];
    echo '">' . $row["firstname"] . " " . $row["lastname"] . "<br>";
    echo "Customer ID: " . $row["customerid"] . "<br>";
    echo "City: " . $row["city"] . "<br>";
    echo "Phone number: " . $row["phonenumber"] . "<br>";
    echo "Agent ID: " . $row["agentid"] . "<br>";
}
mysqli_free_result($result);
?>
<?php
mysqli_close($connection);
?> 
<input type="submit" value="Get products purchased">
</form>
<hr>
<h2> Q2: List products in alphabetical order by description OR in order by price <h2>
<h3> Please choose how you would like to sort the list of products: </h3>
<form action="question2.php" method="get">

<select name="order">
  <option value="description">Alphabetical</option>
  <option value="cost">Price</option>
</select>

<select name="direction">
  <option value="ASC">Ascending</option>
  <option value="DESC">Descending</option>
</select>

<input type="submit" value="List products">
</form>
<hr>
<h2> Q3: Insert a purchase <h2>

<form action="question3.php" method="get">
<input type="submit" value="Insert purchase">
</form>
<hr>

<h2> Q4: Insert a new customer <h2>
<form action="question4.php" method="get">
<input type="submit" value="Insert new customer">
</form>

<hr>
<h2> Q5: Update phone number <h2>
<form action="question5.php" method="get">
<input type="submit" value="Update phone number">
</form>

<hr>
<h2> Q6: Delete customers<h2>
<form action="question6.php" method="get">
<input type="submit" value="Delete customers">
</form>

<hr>
<h2> Q7: List names of customers who bought more than a number of products<h2>
<h3> Select the minimum quantity of one product a customer must have bought: </h3>
<form action="question7.php" method="get">
<input type="number" name="quantity" min="1" value="1">
<input type="submit" value="List">
</form>

<h2> Q8: Unpurchased products<h2>
<form action="question8.php" method="get">
<input type="submit" value="Show unpurchased products">
</form>

<hr>
<h2> Q9: View revenue made from products <h2>
<form action="question9.php" method="get">
<input type="submit" value="Go">
</form>

<img src="https://vignette.wikia.nocookie.net/vsbattles/images/1/1b/Neo_Matrix.png/revision/latest?cb=20170226222907" alt="neo">

</body>
</html>

