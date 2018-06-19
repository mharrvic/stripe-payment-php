<?php
require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Student_Payment.php');
require_once('models/Student_Transaction.php');


\Stripe\Stripe::setApiKey('sk_test_JnkWNxEWg6as6TitCesXrfte');

// Sanitize POST array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$amount = $POST['amount'];
$token = $POST['stripeToken'];

// Create Student in Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));

// Charge Student
$charge = \Stripe\Charge::create(array(
  "amount" => $amount,
  "currency" => "usd",
  "description" => "Reload Balance Account",
  "customer" => $customer->id
));

// Payment Data
$paymentData = [
  'id' => $charge->customer,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'email' => $email,
  'amount' => $amount
];

// Instantiate Student
$Student_Payment = new Student_Payment();

// Add StudentPayment to DB
$Student_Payment->addPayment($paymentData);


// Transaction Data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $charge->customer,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status,
];

// Instantiate Transaction
$Student_Transaction = new Student_Transaction();

// Add StudentTransaction to DB
$Student_Transaction->addTransaction($transactionData);

// Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description.'&amount='.$charge->amount);