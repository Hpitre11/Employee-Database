<html>

<style>

    table, th, td {
        border: 1px solid black;
    }
    
    th, td {
        padding: 3px;
    }
    
</style>
    
<body>
    
<h1>Which employee would you like to calculate payments for?</h1>
<form action="calculations.php" method="POST" id="individual">
    <label></label>
    <input type='text' name='name' placeholder='Employee Name'>
    <input type='date' name='start_date'>
    <input type='date' name='end_date'>
    <label></label>  
    <button type="submit" id="submit">Calculate Payment</button>
</form>
    
<?php

  $host = 'localhost';
  $user = 'root';
  $password = '';
  $dbname = 'employees';

  //Set DSN
  $dsn = 'mysql:host='. $host .';dbname='. $dbname;

  // Create a PDO instance

  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    
  $sql = "SELECT * FROM directory";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $offense = $stmt->fetchAll();

echo "<table id='boxes'>";
echo "<tr>";
    echo "<th>Employee</th>";
    echo "<th>Pay Type</th>";
    echo "<th>Pay Amount</th>";
    echo "<th>Start Date</th>";
    echo "<th>Pay Frequency</th>";
echo "</tr>";
    foreach($offense as $post){
        echo "<tr>";
        echo "<td style='color:#333; text-align: center;'>".$post->name."</td>";
        echo "<td style='color:#333; text-align: center;'>".$post->pay_type."</td>";
        echo "<td style='color:#333; text-align: center;'>$".$post->pay_amount."</td>";
        echo "<td style='color:#333; text-align: center;'>".$post->start_date."</td>";
        echo "<td style='color:#333; text-align: center;'>".$post->pay_frequency."</td>";
        echo "</tr>";
     }

echo "</table>";
    
?>
    
<form action="all.php" method="POST" id="individual">
    <br>
    <label></label>
    <input type='date' name='start_date'>
    <input type='date' name='end_date'>
    <label></label>  
    <button type="submit" id="submit">Calculate All Salaries</button>
</form>
    
<br>
<a href='index.php'>Back to Home</a>
<br>
<a href='edit.php'>Edit Employees</a>

</body>


</html>