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
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];

  // Positional Parameters
  $date1 = date_create($start_date);
  $date2 = date_create($end_date);
  $diff = $date1->diff($date2);
  
  $sql = "SELECT * FROM directory";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $offense = $stmt->fetchAll();
    
  echo "Start date chosen is: " . $date1->format("Y-m-d") . "<br>";
  echo "End date chosen is: " . $date2->format("Y-m-d") . "<br><br>";
    
  foreach($offense as $post){
        $v1 = $post->name;
        $v2 = $post->pay_type;
        $v3 = $post->pay_amount;
        $v4 = $post->start_date;
        $v5 = $post->pay_frequency;
        
        $vdate = date_create($v4);

        if($date1 < $vdate){
            $diff = $vdate->diff($date2);
        }else{
            $diff = $date1->diff($date2);
        }
    
    
      //Calculate money earned if they are paid by the hour.
      if(strcmp($v2,"hourly") == 0) {
          echo "This is the data for employee " . $v1 . ".";
          echo '<br>';
          echo "They are paid hourly.";
          echo "<br>";
          $weeks = ($diff->days)/7;
          echo "Number of weeks worked: " . $weeks;
          echo "<br>";

          if(strcmp($v5,"weekly") == 0){ //Employees who are paid weekly.
              $totalWeeks = floor($weeks);
              echo "They have worked a total of " . $totalWeeks . " complete weeks.";
              echo "<br>";
              echo "They will be getting paid for " . $totalWeeks . " total weeks because they are paid weekly.";
              echo "<br>";
          }elseif(strcmp($v5,"bi-weekly") == 0){ //Employees who are paid bi-weekly.
              $floor = floor($weeks);
              
              if($floor%2 == 1){
                  $totalWeeks = $floor - 1;
              }
              
              echo "They have worked a total of " . $floor . " complete weeks.";
              echo "<br>";
              echo "They will be getting paid for " . $totalWeeks . " total weeks because they are paid bi-weekly.";
              echo "<br>";
          }else{ //Employees who are paid monthly.
              $floor = floor($weeks);
              
              if($floor%4 != 0){
                  $totalWeeks = $floor - ($floor%4);
              }else{
                  $totalWeeks = $floor;
              }
              
              echo "They have worked a total of " . $floor . " complete weeks.";
              echo "<br>";
              echo "They will be getting paid for " . $totalWeeks . " total weeks because they are paid monthly (1 month = 4 weeks).";
              echo "<br>";
          }

          $hours = $totalWeeks*40;
          echo "Number of hours worked: " . $hours;
          echo "<br>";
          $money = $hours*$v3;
          $rounded = round($money, 2);
          echo "Amount of money earned: $" . $rounded;
      }
      //Calculate money earned if they are salaried.
      else{
          echo "This is the data for employee " . $v1 . ".<br>";
          echo "They are salaried.<br>";
          $weeks = ($diff->days)/7;
          echo "Number of weeks worked: " . $weeks . "<br>";
          
          if(strcmp($v5,"weekly") == 0){
              $floor = floor($weeks);
              $percentage = $floor/52;
              echo "They will be getting paid for " . $floor . " total weeks because they are paid weekly.<br>";
          }elseif(strcmp($v5,"bi-weekly") == 0){
              $floor = floor($weeks);
              
              if($floor%2 == 1){
                  $floor = $floor-1;
              }
              
              $percentage = $floor/52;
              echo "They will be getting paid for " . $floor . " total weeks because they are paid bi-weekly.<br>";
          }else{
              $floor = floor($weeks);
              
              if($floor%4 != 0){
                  $floor = $floor - ($floor%4);
              }
              
              $percentage = $floor/52;
              echo "They will be getting paid for " . $floor . " total weeks because they are paid monthly (1 month = 4 weeks).<br>";
          }
          
          $earned = $percentage*$v3;
          $rounded = round($earned, 2);
          echo "Total salary earned: $" . $rounded;
      }

      echo '<br>';
      echo "Difference between dates is " . $diff->days . " days ";
      echo '<br>';
      echo '<br>';
      
  }

?>
    
<br>
<a href='index.php'>Back to Home</a>
<br>
<a href='edit.php'>Edit Employees</a>
<br>
<a href='payment.php'>Calculate Payments</a>    
    
</body>

</html>