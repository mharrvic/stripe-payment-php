<?php
  if(!empty($_GET['tid'] && !empty($_GET['product']) && !empty($_GET['amount']))) {
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    $tid = $GET['tid'];
    $product = $GET['product'];
    $amount = $GET['amount'];

  } else {
    header('Location: index.php');
  }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <title>Thank You</title>
</head>
<body>
  <div class="container mt-4">
    <h2>Thank you for <?php echo $product; ?></h2>
    <hr>
    <p>You Paid <strong><?php echo $amount; ?></strong></p>
    <p>Your transaction ID is <strong><?php echo $tid; ?></strong></p>
    <p>Check your email for more info</p>
    <p><a href="index.php" class="btn btn-light mt-2">Go Back</a></p>
  </div>
  
</body>
</html>