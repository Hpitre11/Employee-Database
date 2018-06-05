<html>
    
<style>

    table, th, td {
        border: 1px solid black;
    }
    
    th, td {
        padding: 3px;
    }
    
</style>

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

  // User input
  $name = $_POST['name'];
  $pay_type = $_POST['pay_type'];
  $pay_amount = $_POST['pay_amount'];
  $start_date = $_POST['start_date'];
  $pay_frequency = $_POST['pay_frequency'];

  // Positional Parameters

  

  $sql = "INSERT INTO directory (name, pay_type, pay_amount, start_date, pay_frequency) VALUES (?, ?, ?, ?, ?)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$name, $pay_type, $pay_amount, $start_date, $pay_frequency]);
  $offense = $stmt->fetchAll();

  echo "Employee added";
  echo "<br>";
 
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





<body>    

<br>
<a href='index.php'>Back to Home</a>
<br>
<a href='edit.php'>Edit Employees</a>
<br>
<a href='payment.php'>Calculate Payments</a>
    
</body>
    

</html>