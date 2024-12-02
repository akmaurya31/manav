<?php 
require_once("headerk.php");

if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {

} else if (isset($_SESSION['role']) && $_SESSION['role'] == 'sale') {

}else if (isset($_SESSION['role']) && $_SESSION['role'] == 2) {

} else {
    header("Location: dashboard.php");
    exit();
}
?>

<div class="container mb-4 mx-auto max-w-[1350px] pt-5">
    <h3 class="text-center text-2xl font-bold py-2">🧑 All Sale List 🧑</h3>

    <form action="export.php" method="post">
        <button type="submit" name="export" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
            Export User Data to CSV
        </button>
    </form>

    <!-- Search Form -->
    <div class="mx-auto max-w-[1350px]">
        <form method="GET" class="mb-4 flex justify-center">
            <input type="text" name="search" placeholder="Search by name, email, or phone..." class="border border-gray-300 p-2 rounded-l w-[50%]" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-r px-4">Search</button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-100 text-black">
                <tr>
                    <th class="px-6 py-3">No.</th>
                    <th class="px-6 py-3">Religion</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Phone</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Location</th>
                    <th class="px-6 py-3">Business</th>
                    <th class="px-6 py-3">Product</th>
                    <th class="px-6 py-3">Seller</th>
                    <th class="px-6 py-3">Payment Type</th>
                    <th class="px-6 py-3">Payment Mode</th>
                    <th class="px-6 py-3">Amount Paid</th>
                    <th class="px-6 py-3">Amount Pending</th>
                    <th class="px-6 py-3">Tickets</th>
                    <th class="px-6 py-3">Remark</th>
                    <th class="px-6 py-3">Payment ID</th>
                    <th class="px-6 py-3">PaySlip Photo</th>
                    <th class="px-6 py-3">GST Applicable</th>
                    <th class="px-6 py-3">GST Percentage</th>
                    <th class="px-6 py-3">GST Amount</th>
                    <th class="px-6 py-3">GST Slip</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php
                require_once("dbConnection.php");

                $users_per_page = 10;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $users_per_page;

                $search = isset($_GET['search']) ? $mysqli->real_escape_string($_GET['search']) : '';

                // Fetch users with search and pagination
                $sellerid=$_SESSION['idd'];
                $sql = "SELECT * 
                        FROM customer_info 
                        WHERE seller_id = '$sellerid' 
                        AND (name LIKE '%$search%' 
                            OR email LIKE '%$search%' 
                            OR phone LIKE '%$search%') 
                        LIMIT $users_per_page 
                        OFFSET $offset";
                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='px-6 py-4 font-bold'>{$row['id']}</td>";
                        echo "<td class='px-6 py-4'>{$row['religion']}</td>";
                        echo "<td class='px-6 py-4'>{$row['name']}</td>";
                        echo "<td class='px-6 py-4'>{$row['phone']}</td>";
                        echo "<td class='px-6 py-4'>{$row['email']}</td>";
                        echo "<td class='px-6 py-4'>{$row['location']}</td>";
                        echo "<td class='px-6 py-4'>{$row['business']}</td>";
                        echo "<td class='px-6 py-4'>{$row['product']}</td>";
                        echo "<td class='px-6 py-4'>{$row['seller']}</td>";
                        echo "<td class='px-6 py-4'>{$row['payment_type']}</td>";
                        echo "<td class='px-6 py-4'>{$row['payment_mode']}</td>";
                        echo "<td class='px-6 py-4'>{$row['amount_paid']}</td>";
                        echo "<td class='px-6 py-4'>{$row['amount_pending']}</td>";
                        echo "<td class='px-6 py-4'>{$row['tickets']}</td>";
                        echo "<td class='px-6 py-4'>{$row['remark']}</td>";
                        echo "<td class='px-6 py-4'>{$row['payment_id']}</td>";
                        echo "<td class='px-6 py-4'><img src='{$row['screenshot_path']}' alt='Screenshot' class='w-16 h-16'></td>";
                        echo "<td class='px-6 py-4'>{$row['gst_applicable']}</td>";
                        echo "<td class='px-6 py-4'>{$row['gst_percentage']}</td>";
                        echo "<td class='px-6 py-4'>{$row['gst_amount']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='17' class='text-center px-6 py-4'>No users found</td></tr>";
                }

                // Total pages for pagination
                $total_users_sql = "SELECT COUNT(*) as total_users FROM customer_info WHERE 
                    name LIKE '%$search%' 
                    OR email LIKE '%$search%' 
                    OR phone LIKE '%$search%'";
                $total_users_result = $mysqli->query($total_users_sql);
                $total_users_row = $total_users_result->fetch_assoc();
                $total_users = $total_users_row['total_users'];

                $total_pages = ceil($total_users / $users_per_page);

                $mysqli->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination flex justify-center mt-4">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>&search=<?php echo $search; ?>" class="px-4 py-2 bg-gray-200 rounded-l">Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>" class="px-4 py-2 bg-gray-200 <?php echo $i == $page ? 'bg-blue-500 text-white' : ''; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
            <a href="?page=<?php echo $page + 1; ?>&search=<?php echo $search; ?>" class="px-4 py-2 bg-gray-200 rounded-r">Next</a>
        <?php endif; ?>
    </div>
</div>

<?php require_once("footer.php"); ?>
