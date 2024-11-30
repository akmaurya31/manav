<?php 
require_once("dbConnection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pay_date = $_POST['r_pay_date'];
    $amount =$_POST['r_amount'];
    $user_id = $_POST['r_id'];
    $transaction_id = $_POST['r_transaction_id'] == '' ? '11111111111' : $_POST['r_transaction_id'];
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

//echo $sql = "INSERT INTO wallet (user_id, used, service, amt_type, details,prev_balance,current_balance,recharge,transaction) VALUES ('$user_id', '$used', '$service', '$amt_type', '$details','$prev_balance','$Tcurrent_balance','$recharge','$transaction_id')";


$sql = "UPDATE users 
        SET 
            pay = $amount, 
            pay_date = NOW(), 
            current_balance = $amount, 
            transaction_id = $transaction_id, 
            paid =  $amount, 
            pstatus = 'Completed', 
            updated_at = NOW()
        WHERE id = $user_id";

// r_id: 9
// r_amount: 490
// r_transaction_id: 11111111111111
// r_pay_date: 2024-10-22

// id	name	email	mobile	password	city	state	yourbusiness	role	pay	pay_date	current_balance	transaction_id	pcurrency	paid	pstatus	edate	created_at	updated_at
//  edit	1	Avinash Maurya

if ($mysqli->query($sql) === TRUE) {
    echo "User information inserted successfully.";
} else {
    echo "Error inserting record: " . $mysqli->error;
}
$mysqli->close();
?>