<script src="https://cdn.tailwindcss.com"></script>
<?php
require_once("dbConnection.php");
echo '<img src="./images/signen.jpeg" class="block w-full " />';
echo '<div class=" flex flex-col items-center justify-center mt-5">'; // Flex container for centering

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Perform validation (you might want to do more robust validation)
    if (!empty($username) && !empty($password)) {
        // Connect to the MySQL database
        // $mysqli = new mysqli("localhost", "username", "password", "database_name");

        // Check connection
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Prepare and execute the SQL statement
        // $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $sql = "SELECT * FROM sales_team WHERE (email = '$username' OR mobile = '$username') AND password = '$password'";
        $stmt = $mysqli->prepare($sql);
        // $stmt->bind_param("ss", $username, $password);
        // $stmt->bind_param("ssss", $username, $username, $password);

        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows == 1) {
              $row = $result->fetch_assoc();
              // Store user details in session
              $_SESSION['idd'] = trim($row['id']); // Assuming 'id' is another field in your 'users' table
              $_SESSION['email'] = trim($row['email']);
              $_SESSION['mobile'] = trim($row['mobile']);
              $_SESSION['name'] = trim($row['name']);
              $_SESSION['city'] = trim($row['city']);
              $_SESSION['state'] = trim($row['state']);
              $_SESSION['yourbusiness'] = trim($row['yourbusiness']);
              $_SESSION['role'] = trim($row['role']);
              $_SESSION['visiblity'] = trim($row['visiblity']);
              $_SESSION['teamtype'] = trim($row['teamtype']);
              $_SESSION['is_login'] = true;
              $_SESSION['current_balance'] = trim($row['current_balance']);

             // $_SESSION['seller'] = trim($row['current_balance']);


              $_SESSION['backLogin'] = 1;

              $teamtype = $mysqli->real_escape_string($_SESSION['teamtype']);
              $query = "SELECT access_field FROM teamtype WHERE nametype = '$teamtype'";  // Insert the sanitized teamtype directly into the query
              $result = $mysqli->query($query);
              if ($result && $row1 = $result->fetch_assoc()) {
                  $_SESSION['access_fields'] = explode(',', $row1['access_field']);
              } else {
                  $_SESSION['access_fields'] = [];
              }
              
              $stmt->close();
            // echo "User logged in successfully!";
 

            if($row['role']==2){
                header("Location: saleForm.php");
            }
            //  if($row['current_balance']<0){
            //     header("Location: pay.php");
            //  }else if($row['current_balance']>0){
            //     header("Location: video.php");
            //  }else{
            //     header("Location: pay.php");
            //  }
              exit;
            // Do something with the user data

        } else {
            // User does not exist or password is incorrect
            // Redirect to login.php after one second
                    
            echo '<div class="  bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">';
            echo '<strong class="font-bold">Failed!</strong>';
            echo '<span class="block sm:inline">Incorrect username or password.</span>';
            echo '</div>';
            
            //echo '<p class="block">You will be redirected to the login page in 1 second...</p>';
            // Using flex to arrange items in a row
            echo '<div class="flex flex-row items-center mt-4">'; 
            // Here, 'items-center' aligns items vertically in the center, you can adjust as needed
            echo '<button onclick="window.location.href=\'backlogin.php\'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Go Back</button>';
           // echo '<span class="text-sm">You can also click the button to go back</span>'; // Additional message
            echo '</div>'; // Close flex container
            
            echo '<script>
                    function goBack() {
                        window.history.back();
                    }
                    setTimeout(function() {
                        window.location.href = "backlogin.php";
                    }, 1000); // Redirect after 1 second
                  </script>';
        }

        // Close the database connection
        $mysqli->close();
    } else {
        echo "Please enter both username and password.";
    }
}
?>
