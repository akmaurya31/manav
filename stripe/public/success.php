<script src="https://cdn.tailwindcss.com"></script>
<?php

require_once '../vendor/autoload.php';
require_once '../secrets.php';
include('../../dbConnection.php');

session_start();

echo '<img src="./images/sign.jpeg" class="block w-full " />';
echo '<div class="flex flex-col items-center justify-center mt-5">'; // Flex container for centering

\Stripe\Stripe::setApiKey($stripeSecretKey); // Set your Stripe secret key
$session_id = $_GET['session_id'] ?? null;

if ($session_id) {
    try {
        // Retrieve the checkout session
        $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
        $payment_intent_id = $checkout_session->payment_intent;

        // Retrieve the payment intent
        $payment_intent = \Stripe\PaymentIntent::retrieve($payment_intent_id);
        $transaction_id = $payment_intent->id;
        $amount_received = $payment_intent->amount_received / 100;  // Convert from cents to dollars
        $currency = $payment_intent->currency;
        $status = $payment_intent->status;  // e.g., 'succeeded'
        
        // Assuming mobile is stored in session
        $idd = $_SESSION['idd'];  
        $current_balance = $amount_received; // Assuming current balance is same as amount received
        $pay = $amount_received; 
        $pstatus = 'succeeded';   
        $pcurrency = $currency;

      

        // Construct the SQL update query without bind//
          $sql = "UPDATE users 
                SET 
                    current_balance = $current_balance, 
                    pay = $pay, 
                    pstatus = '$pstatus', 
                    pcurrency = '$pcurrency', 
                    transaction_id = '$transaction_id' 
                WHERE 
                    id = '$idd'";

                   // print_r($_SESSION);

           // die("ASas");

        // Execute the SQL query directly
        if ($pdo->exec($sql)) {
            echo '<div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4">';
            echo '<strong class="font-bold">Success!</strong>';
            echo '<span class="block sm:inline">User payment information updated successfully!</span>';
            echo '</div>';

            echo '<div class="flex justify-center mt-5">';
            echo '<button onclick="window.location.href=\'https://tpeg-ibiv.com/video.php\'" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">';
            echo 'Go to Video Page';
            echo '</button>';
            echo '</div>';
        } else {
            echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">';
            echo '<strong class="font-bold">Error!</strong>';
            echo '<span class="block sm:inline">Error updating user\'s payment information.</span>';
            echo '</div>';

            echo '<div class="flex justify-center mt-5">';
            echo '<button onclick="window.location.href=\'https://tpeg-ibiv.com/pay.php\'" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">';
            echo 'Go to Pay';
            echo '</button>';
            echo '</div>';
        }
    } catch (Exception $e) {
        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">';
        echo '<strong class="font-bold">Error!</strong>';
        echo '<span class="block sm:inline">Error retrieving payment details: ' . htmlspecialchars($e->getMessage()) . '</span>';
        echo '</div>';
        echo '<div class="flex justify-center mt-5">';
        echo '<button onclick="window.location.href=\'https://tpeg-ibiv.com/pay.php\'" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">';
        echo 'Go to Pay';
        echo '</button>';
        echo '</div>';
    }
} else {
    echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">';
    echo '<strong class="font-bold">Error!</strong>';
    echo '<span class="block sm:inline">Session ID not found!</span>';
    echo '</div>';

    echo '<button onclick="window.location.href=\'https://tpeg-ibiv.com/pay.php\'" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">';
    echo 'Go to Pay';
    echo '</button>';
    echo '</div>';

}
?>
