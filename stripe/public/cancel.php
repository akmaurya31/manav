<script src="https://cdn.tailwindcss.com"></script>
<?php
// Include database connection or ORM
include('../../dbConnection.php');  // Replace with your actual DB connection code
echo '<img src="./images/sign.jpeg" class="block w-full " />';
echo '<div class=" flex flex-col items-center justify-center mt-5">';
// Log or process the cancellation, you may want to update the database as well
if (isset($_GET['transaction_id'])) {
    $transaction_id = $_GET['transaction_id'];
    
    // You can log the cancellation in the database, or take other actions
    // For instance, updating the transaction as 'cancelled'
    $query = "UPDATE transactions SET status = 'cancelled' WHERE transaction_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$transaction_id]);
   
    if ($stmt->rowCount() > 0) {
       // echo "Payment was cancelled. Transaction ID: " . $transaction_id;
        echo '<div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4" role="alert">';
        echo '<strong class="font-bold">Cancelled!</strong>';
        echo '<span class="block sm:inline">Payment was cancelled. Transaction ID: ' . $transaction_id . '</span>';
        echo '</div>';
    } else {
        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">';
        echo '<strong class="font-bold">Error!</strong>';
        echo '<span class="block sm:inline">Failed to update cancellation status.</span>';
        echo '</div>';
    }
} else {
   
    echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">';
    echo '<strong class="font-bold">Error! </strong>';
    echo '<span class="block sm:inline"> Transaction ID is missing. Please verify and try again.</span>';
    echo '</div>';
    
}

echo '</div>';

$frl=$fullUrl."/pay.php";

echo '<div class="flex items-center justify-center ">'; // Flex container for centering
echo '<a href="'.$frl.'" class="flex items-center bg-[#462602] text-white font-bold py-2 px-4 rounded shadow hover:bg-[#333] transition duration-200">';
echo '<span class="mr-2">🔙</span>';  
echo 'Back';
echo '</a>';
echo '</div>';
?>
