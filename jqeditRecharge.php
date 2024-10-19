<?php 
require_once("dbConnection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pay_date = $_POST['r_pay_date'];
    $amount =$_POST['r_amount'];
    $user_id = $_POST['r_id'];
    $transaction_id = $_POST['r_transaction_id'];
    // $sql = "UPDATE users SET pay='$amount',pay_date='$pay_date',transaction_id='$transaction_id' WHERE id=$user_id";
    // if ($mysqli->query($sql) === TRUE) {
    //     echo "User information updated successfully.";
    // } else {
    //     echo "Error updating user information: " . $mysqli->error;
    // }
}

$prev_balance=getCurrentBal($mysqli,$user_id);
$service = 'Recharge Plan';
$amt_type = 'cr';
$details = '';
$recharge=$amount;
$used=0;
$Tcurrent_balance=$prev_balance+$amount;

$sql = "INSERT INTO wallet (user_id, used, service, amt_type, details,prev_balance,current_balance,recharge,transaction) VALUES ('$user_id', '$used', '$service', '$amt_type', '$details','$prev_balance','$Tcurrent_balance','$recharge','$transaction_id')";

if ($mysqli->query($sql) === TRUE) {
    echo "User information inserted successfully.";
} else {
    echo "Error inserting record: " . $mysqli->error;
}
$mysqli->close();
?>