<?php
	include('db_login.php');
	session_start();
	$connection = mysqli_connect($db_host, $db_username, $db_password, $db_name);
	if (!$connection) {
		die("Could not connect to the database: <br />" . mysqli_connect_error());
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Round Table Seating</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .hall {
            display: flex;
            flex-wrap: wrap;
            gap: 50px;
            justify-content: center;
        }

        .table-container {
            position: relative;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: #f9c74f;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .table-center {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #f3722c;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
        }

        .seat {
            position: absolute;
            width: 40px;
            height: 40px;
            background-color: #232522;
            border-radius: 50%;
            color: white;
            text-align: center;
            line-height: 40px;
            font-size: 14px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Positions for seats around the table */
        .seat1 { transform: translate(50%, -50%) rotate(0deg) translate(73px) rotate(0deg); }
        .seat2 { transform: translate(115%, -131%) rotate(60deg) translate(96px) rotate(-60deg); }
        .seat3 { transform: translate(-50%, -50%) rotate(143deg) translate(92px) rotate(-144deg); }
        .seat4 { transform: translate(-50%, -50%) rotate(180deg) translate(80px) rotate(-180deg); }
        .seat5 { transform: translate(-50%, -50%) rotate(274deg) translate(-111px) rotate(-271deg); }
        .seat6 { transform: translate(203%, 2%) rotate(300deg) translate(-108px) rotate(-300deg); }
    </style>
</head>
<body>

<h1>Round Table Seating Arrangement</h1>
<div class="screen">SCREEN</div>
<div class="hall">
    <?php
    // Total number of tables
    $totalTables = 10; // Adjust this for more tables
    $seatCounter = 1;

    for ($table = 1; $table <= $totalTables; $table++) {
        echo "<div class='table-container'>";
        echo "<div class='table-center'>Table $table</div>";

        // Generate 6 seats around the table
        for ($i = 1; $i <= 6; $i++) {
            //echo "<div class='seat seat$i'>S" . $seatCounter . "<input type='checkbox' name='ch" . $i . "'/></div>";
            echo "<div class='seat seat$i'><input type='checkbox' name='ch" . $i . "'/></div>";
            $seatCounter++;
        }
        echo "</div>";
    }
    ?>
</div>
<div class="cinema-container">
				<div class="span101">

<form action="book.php" method="POST" onsubmit="return validateCheckBox();">
						<ul class="thumbnails">
						<?php
							 // Retrieve and sanitize the date from the POST request
$date = strip_tags(utf8_decode($_POST['doj']));
$query = "SELECT * FROM seat WHERE date = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $date);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// for ($i = 1; $i <= 11; $i++) {
//     if ($i == 6) { // Add gap at the midpoint
// 		echo "<li class='seatGap'></li>";
//     }
//     echo "<li class='span1'>$i</li>";
// 	if ($i == 11) {
// 		echo "<br/>";
// 	}
// }


if (mysqli_num_rows($result) == 0) {
    // If no seats are booked, show all seats as available

	

  
} else {
    // Initialize the seat array (0 = available, 1 = booked)
    $seats = array_fill(0, 55, 0);

    // Fetch booked seats and update the seat array
    while ($row = mysqli_fetch_assoc($result)) {
        $pnr = explode("-", $row['PNR']);
        $pnrIndex = intval($pnr[3]) - 1; // Convert seat number to array index
        $seats[$pnrIndex] = 1;
    }

    
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($connection);
						?>
						</ul>
						<center>
							<label>Date of Journey</label>
							<?php
								echo "<input type='text' class='span2' name='doj' value='". $date ."' readonly/>";
							?>
							<br><br>
							<button type="submit" class="btn btn-info">
								<i class="icon-ok icon-white"></i> Submit
							</button>
							<button type="reset" class="btn">
								<i class="icon-refresh icon-black"></i> Clear
							</button>
							<a href="./index.php" class="btn btn-danger"><i class="icon-arrow-left icon-white"></i> Back </a>
						</center>
					</form>
 
<h1 class='note'>This is a visual representation only and does not ensure your seating arrangement. It simply illustrates the layout of the hall or banquet.</h1> 
<style>
    .screen {
      background-color: #e0e0e0; /* Light grey for screen background */
      color: #000; /* Black text */
      font-size: 1.5rem; /* Large text */
      font-weight: bold; /* Bold text */
      text-align: center;
      border-radius: 10px;
      width: 100%;
      padding: 20px;
      margin: 0 auto;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow for effect */
      margin-bottom:20px;
    }
    .cinema-container {
      display: flex;
      justify-content: center;
      align-items: center;
       /* Full viewport height */
     /* Dark background for cinema */
	  margin-bottom: 20px;
    }

	.seatGap {
      width: 20px; /* Width of the blank space */
      height: 20px;
      background-color: transparent; /* Invisible gap */
    }

	h1.note {
        margin-top: 50px;
      text-align: center;
      background-color: #f8d7da; /* Soft red background */
      color: #721c24; /* Dark red text color */
      font-size: 24px;
      font-weight: bold;
      padding: 20px;
      border-radius: 10px;
      border: 2px solid #f5c6cb; /* Light red border */
      margin-bottom: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Light shadow for effect */
      max-width: 80%; /* Limit the width */
      margin-left: auto;
      margin-right: auto;
  }
 

  
input[type=checkbox] {
    width:0px;
    margin-right:18px;
}

input[type=checkbox]:before {
    content: "";
    width: 15px;
    height: 15px;
    display: inline-block;
    vertical-align:middle;
    text-align: center;
    box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
    background-color:#ccc;
}

input[type=checkbox]:checked:before {
    background-color:Green;
    font-size: 15px;
}

.cbooked {
  background-color:red !important;
  font-size: 15px;
}
   


  </style>


<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript">
			function validateCheckBox()
			{
				var c = document.getElementsByTagName('input');
				for (var i = 0; i < c.length; i++)
				{
					if (c[i].type == 'checkbox')
					{
						if (c[i].checked) 
						{
							return true;
						}
					}
				}
				alert('Please select at least 1 ticket.');
				return false;
			}
		</script>

</body>
</html>
