<?php
  require_once('config/db.php');
  require_once('lib/pdo_db.php');
  require_once('models/Student_Payment.php');
  // Instantiate Student
  $Student_Payment = new Student_Payment();
  // Get Student Payments
  $Student_Payment = $Student_Payment->getStudentPayment();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <title>Student Payment</title>
</head>
<body>
  <div class="container mt-4">
  <div class="btn-group" role="group">
    <a href="student_payment.php" class="btn btn-primary">Payments</a>
    <a href="student_transaction.php" class="btn btn-secondary">Transaction</a>
  </div>
  <hr>
   <h2>Student Payments</h2>
   <table class="table table-striped">
    <thead>
      <tr>
        <th>Customer ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($Student_Payment as $x): ?>
        <tr>
          <td><?php echo $x->id; ?></td>
          <td><?php echo $x->first_name; ?> <?php echo $x->first_name; ?></td>
          <td><?php echo $x->email; ?></td>
          <td><?php echo $x->created_at; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
   </table>
   <br>
   <p><a href="index.php">Pay Page</a></p>
  </div>
</body>
</html>