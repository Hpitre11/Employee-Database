<html>

<body>

<h1>Insert Employee</h1>
<form action="submitted.php" method="POST" id="individual">
    <label></label>
    <input type="text" name="name" id="dropdown" placeholder='Employee Name'>
    <select name='pay_type'>
        <option value='hourly'>Hourly</option>
        <option value='salary'>Salary</option>
    </select>
    <input type='number' name='pay_amount' placeholder='Payment Amount'>
    <input type='date' name='start_date' placeholder='start date'>
    <select name='pay_frequency'>
        <option value='weekly'>Weekly</option>
        <option value='bi-weekly'>Bi-Weekly</option>
        <option value='monthly'>Monthly</option>
    </select>
    <label></label>  
    <button type="submit" id="submit">Add Employee</button>
</form>
    
<br>
<a href='edit.php'>Edit Employees</a>
<br>
<a href='payment.php'>Calculate Payments</a>

</body>

</html>
