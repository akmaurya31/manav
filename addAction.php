<html>
<head>
    <title>Add Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <img src="./images/sign.jpeg" class="w-full h-[30%]" />

<?php
// Include the database connection
require_once("dbConnection.php");

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Sanitize user inputs to avoid SQL injection
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $mobile = mysqli_real_escape_string($mysqli, $_POST['mobile']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $city = mysqli_real_escape_string($mysqli, $_POST['city']);
    $state = mysqli_real_escape_string($mysqli, $_POST['state']);
    $yourbusiness = mysqli_real_escape_string($mysqli, $_POST['business']);

    // Check for empty fields
    if (empty($name) || empty($mobile) || empty($email) || empty($password)) {
        if (empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        if (empty($mobile)) {
            echo "<font color='red'>Mobile field is empty.</font><br/>";
        }
        if (empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // Check if the email or mobile already exists
        $checkQuery = "SELECT * FROM users WHERE email='$email' OR mobile='$mobile'";
        $checkResult = mysqli_query($mysqli, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Show error if the email or mobile already exists
            echo '<div class="bg-red-100 border max-w-[1325px] border-red-400 mt-5 text-red-700 px-4 py-3 rounded relative mx-auto" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">Email or contact number already registered.</span>
                </div>';

            echo '<div class="flex justify-center mt-4 space-x-2">
                    <a href="index.php" class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <span>🔄</span>
                        <span class="ml-2">Go to Signup</span>
                    </a>
                    <a href="login.php" class="inline-flex items-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        <span>🔑</span>
                        <span class="ml-2">Login</span>
                    </a>
                </div>';
        } else {
            // Insert user data into the database
            $result = mysqli_query($mysqli, "INSERT INTO users (`name`, `mobile`, `email`,`password`,`city`,`state`,`yourbusiness`) VALUES ('$name', '$mobile', '$email','$password','$city','$state','$yourbusiness')");

           

            // Show success message and auto-submit login form
            echo '<div class="flex justify-center items-center">
                    <div class="bg-green-100 border max-w-[1325px] border-green-400 mt-5 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold text-2xl">Success!</strong>
                        <span class="block sm:inline text-2xl">Your account has been created successfully.</span>
                         <img src="./images/Fountain.gif" />
                    </div>
                </div>';
            
            // Auto-submit the login form using the registered mobile and password
            echo '
            <form action="addLogin" method="post" name="add" id="loginForm" class="">
                <input type="hidden" name="username" id="username" value="'.$mobile.'" />
                <input type="hidden" name="password" id="password" value="'.$password.'" />
            </form>
            <script>
                window.onload = function() {
                    document.getElementById("loginForm").submit(); // Submit the form automatically
                };
            </script>';
        }
    }
}
?>

</body>
</html>
