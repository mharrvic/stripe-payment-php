<?php
  require_once('config/db.php');
  require_once('lib/pdo_db.php');
  require_once('models/Student_Transaction.php');
  // Instantiate Student
  $Student_Transaction = new Student_Transaction();
  // Get Student Payments
  $Student_Transactions = $Student_Transaction->getStudentTransactions();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <title>Student Transactions</title>
</head>
<body>
  <div class="container mt-4">
  <div class="btn-group" role="group">
    <a href="student_payment.php" class="btn btn-secondary">Payments</a>
    <a href="student_transaction.php" class="btn btn-primary">Transaction</a>
  </div>
  <hr>
   <h2>Transactions</h2>
   <table class="table table-striped">
    <thead>
      <tr>
        <th>Transaction ID</th>
        <th>Customer ID</th>
        <th>Product</th>
        <th>Amount</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($Student_Transactions as $x): ?>
        <tr>
          <td><?php echo $x->id; ?></td>
          <td><?php echo $x->customer_id; ?></td>
          <td><?php echo $x->product; ?></td>
          <td><?php echo sprintf('%.2f', $x->amount / 100); ?>
            <?php echo strtoupper($x->currency)?></td>
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