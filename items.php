<?php
include('dbconn.php');
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Get vendor ID from URL
$vendor_id = $_GET['vendor_id'];

// Fetch items for the vendor
$sql = "SELECT * FROM items WHERE vendor_id = $vendor_id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold text-center mb-6">Items</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                    <img src="img/<?= $row['image_url']; ?>" alt="<?= $row['name']; ?>" class="w-full h-32 object-cover rounded-lg mb-4">
                    <h3 class="text-lg font-semibold"><?= $row['name']; ?></h3>
                    <p class="text-sm text-gray-600 mb-2"><?= $row['description']; ?></p>
                    <p class="text-md font-bold text-gray-800 mb-2">$<?= $row['price']; ?></p>
                    <p class="text-sm text-gray-600 mb-4">Stock: <?= $row['stock_quantity']; ?></p>
                    <button class="bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-600">Buy Now</button>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>
