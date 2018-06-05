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

<h1>Which employee would you like to edit?</h1>
    
<form action="updated.php" method="POST" id="individual">
    <label></label>
    <input type='text' name='initial' placeholder='Employee to Update'>
    <br>
    <br>
    <input type="text" name="name" id="dropdown" placeholder='Employee Name'>
    <select name='pay_type'>
        <option value='hourly'>Hourly</option>
        <option value='salary'>Salary</option>
    </select>
    <input type='number' name='pay_amount' placeholder='Payment Amount'>
    <input type='date' name='start_date'>
    <select name='pay_frequency'>
        <option value='weekly'>Weekly</option>
        <option value='bi-weekly'>Bi-Weekly</option>
        <option value='monthly'>Monthly</option>
    </select>
    <label></label>  
    <button type="submit" id="submit">Update Employee</button>
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
    
<br>
<a href='index.php'>Back to Home</a>
<br>
<a href='payment.php'>Calculate Payments</a>
    
</body>

</html>
