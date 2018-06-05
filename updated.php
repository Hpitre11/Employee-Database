<html>
    
<body>

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
  $initial = $_POST['initial'];
  $name = $_POST['name'];
  $pay_type = $_POST['pay_type'];
  $pay_amount = $_POST['pay_amount'];
  $start_date = $_POST['start_date'];
  $pay_frequency = $_POST['pay_frequency'];

  // Positional Parameters

  //$sql = "UPDATE directory SET name=?, pay_type=?, pay_amount=?, start_date=?, pay_frequency=? WHERE name=?";
    
    $sql = "UPDATE directory
            SET name=?,
                pay_type=?,
                pay_amount=?,
                start_date=?,
                pay_frequency=?
            WHERE name=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $pay_type, $pay_amount, $start_date, $pay_frequency, $initial]);
    $offense = $stmt->fetchAll();
    
          


  echo "Employee Updated";
  echo "<br>";

?>
    
<br>
<a href='index.php'>Back to Home</a>
<br>
<a href='edit.php'>Edit Employees</a>
<br>    
<a href='payment.php'>Calculate Payments</a>
    
</body>

</html>