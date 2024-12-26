<?php
include('dbconn.php');
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="https://cdn.tailwindcss.com">
</head>
<body class="bg-gray-100">
    <!-- <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold text-center mb-6">Categories</h1>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <a href="vendors.php?category_id=<?= $row['id']; ?>" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                    <img src="<?= $row['image_url']; ?>" alt="<?= $row['name']; ?>" class="w-20 h-20 mx-auto rounded-lg mb-2">
                    <h3 class="text-lg font-semibold"><?= $row['name']; ?></h3>
                    <p class="text-sm text-gray-600"><?= $row['description']; ?></p>
                </a>
            <?php } ?>
        </div>
    </div> -->



   <div class="max-w-7xl mx-auto p-4 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-2">Category: Kitchen</h1>
        <h2 class="text-xl font-medium text-center text-gray-600 mb-8">Explore Our Products</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
            <a href="#rice" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Rice" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Rice</h3>
            </a>
            <a href="#spices" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Spices" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Spices</h3>
            </a>
            <a href="#lentils" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Lentils" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Lentils</h3>
            </a>
            <a href="#butter" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Butter" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Butter</h3>
            </a>
            <a href="#oil" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Oil" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Oil</h3>
            </a>
            <a href="#flour" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Flour" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Flour</h3>
            </a>
            <a href="#sugar" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Sugar" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Sugar</h3>
            </a>
            <a href="#tea" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Tea" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Tea</h3>
            </a>
        </div>
    </div>

</body>
</html>
<?php $conn->close(); ?>
