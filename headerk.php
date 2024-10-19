<?php
include('dbconn.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<?php //include('meta.php');?>
<meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="./output.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
</head>
<?php
// Open a new connection to the MySQL server
$mysqlii = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 


if (!isset($_SESSION['is_login'])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}
// print_r($_SESSION);

function getUserDataById($mysqli,$userId) {
    $sql = "SELECT * FROM users WHERE id='" . $userId . "'";
  $result = $mysqli->query($sql);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $userDataObj = new stdClass();
      $userDataObj->id = $row['id'];
      $userDataObj->current_balance = $row['current_balance'];
      $userDataObj->email = $row['email'];
      return $userDataObj;
  } else {
      return null; // Return null if no user found
  }
}

 


function getCurWallet($mysqli,$userId) {
    $sql = "SELECT * FROM wallet WHERE user_id='" . $userId . "' order by id desc limit 0,1";
  $result = $mysqli->query($sql);
  //print_r($result);
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $userDataObj = new stdClass();
      $userDataObj->id = $row['id'];
      $userDataObj->current_balance = $row['current_balance'];
      return $userDataObj;
  } else {
      return null; // Return null if no user found
  }
}

?>



<body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <?php $dd='bg-white';
    
    if($_SESSION['role']=='admin'){ $dd='bg-red-500'; }  ?>


    

<nav class="<?php echo $dd; ?> fixed w-full top-0 start-0 border-b border-gray-200   ">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="images/logo1.webp" class="h-12" alt="">
      
      <!-- <span class="self-center text-2xl font-semibold whitespace-nowrap">.</span> -->
  </a>
  <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <a type="button" href="video" class="text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center"> <?php echo $_SESSION['name'] ?></a>
      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200   " aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white  ">
      <li>
        <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 " aria-current="page">  🎥<?php // print_r($_SESSION); ?> 
         <?php echo $_SESSION['mobile'] ?> <br/> </a>
      </li>
      <li>
        <a href="video.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0   ">  📩 Your Content</a>
      </li>

      <?php if($_SESSION['current_balance']<0) { ?>
 
      <li>
        <a href="pay.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0   ">  💰PayNow</a>
      </li>
      <?php } ?>

      <?php if($_SESSION['role']=='admin') { ?>
      <li>
        <a href="userList.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0   ">  📋User List</a>
      </li>
      <?php } ?>
     

       
      <li>
        <a href="logout.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0   ">  🚪 Logout</a>
      </li>


    </ul>
  </div>
  </div>
</nav>
  <div class="max-w-screen-xl flex flex-wrap items-center justify-center pt-20 mx-auto">
     
    <?php  include('secondmenu.php'); ?> </div>