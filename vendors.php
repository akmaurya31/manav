<?php
include('dbconn.php');
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$category_id = $_GET['category_id'];

// Fetch vendors for the category
$sql = "SELECT * FROM vendors WHERE category_id = $category_id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendors</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold text-center mb-6">Vendors</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                    <h3 class="text-lg font-semibold"><?= $row['name']; ?></h3>
                    <p class="text-sm text-gray-600">City: <?= $row['city']; ?>, State: <?= $row['state']; ?></p>
                    <p class="text-sm text-gray-600">Address: <?= $row['address']; ?></p>
                    <p class="text-sm text-gray-600">Delivery Time: <?= $row['delivery_time']; ?></p>
                    <a href="items.php?vendor_id=<?= $row['id']; ?>" class="mt-2 inline-block bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-600">View Items</a>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>
