<!--

<Ticket-Booking>
Copyright (C) <2013>  
<Abhijeet Ashok Muneshwar>
<openingknots@gmail.com>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
 any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

-->

<!DOCTYPE HTML>

<?php
	include('db_login.php');
	session_start();
	$connection = mysqli_connect($db_host, $db_username, $db_password, $db_name);
	if (!$connection) {
		die("Could not connect to the database: <br />" . mysqli_connect_error());
	}
?>

<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bus Ticket Booking</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	</HEAD>

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

	<BODY>
		<br /><br /><br />
		<div class="container">

	

			<div class="row well">

		
			<div class="cinema-container">
  <div class="screen">SCREEN</div>
</div>

<div class="cinema-container">
				<div class="span101">
					<form action="book.php" method="POST" onsubmit="return validateCheckBox();">
						<ul class="thumbnails">
						<?php
							 // Retrieve and sanitize the date from the POST request
$date = strip_tags(utf8_decode($_POST['doj']));

// Prepare the query
$query = "SELECT * FROM seat WHERE date = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $date);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

for ($i = 1; $i <= 11; $i++) {
    if ($i == 6) { // Add gap at the midpoint
		echo "<li class='seatGap'></li>";
    }
    echo "<li class='span1'>$i</li>";
	if ($i == 11) {
		echo "<br/>";
	}
}


if (mysqli_num_rows($result) == 0) {
    // If no seats are booked, show all seats as available

	

    for ($i = 1; $i <= 55; $i++) {
        echo "<li class='span1'>";
        echo "<a href='#' class='thumbnail' title='Available'>";
        echo "<img src='img/available.png' alt='Available Seat'/>";
        echo "<label class='checkbox'>";
        echo "<input type='checkbox' name='ch" . $i . "'/>1Seat" . $i;
        echo "</label>";
        echo "</a>";
        echo "</li>";

		if ($i == 6) { // Add gap at the midpoint
			echo "<li class='seatGap'></li>";
		}
    }
} else {
    // Initialize the seat array (0 = available, 1 = booked)
    $seats = array_fill(0, 55, 0);

    // Fetch booked seats and update the seat array
    while ($row = mysqli_fetch_assoc($result)) {
        $pnr = explode("-", $row['PNR']);
        $pnrIndex = intval($pnr[3]) - 1; // Convert seat number to array index
        $seats[$pnrIndex] = 1;
    }

    // Display the seats
    for ($i = 1; $i <= 55; $i++) {
        $j = $i - 1; // Adjust for array index
        if ($seats[$j] == 1) {
            echo "<li class='span1'>";
            echo "<a href='#' class='thumbnail' title='Booked'>";
            echo "<img src='img/occupied.png' alt='Booked Seat'/>";
            echo "<label class='checkbox'>";
            echo "<input type='checkbox' class='cbooked' name='ch" . $i . "' disabled/>S" . $i;
            echo "</label>";
            echo "</a>";
            echo "</li>";
        } else {
            echo "<li class='span1'>";
            echo "<a href='#' class='thumbnail' title='Available'>";
            echo "<img src='img/available.png' alt='Available Seat'/>";
            echo "<label class='checkbox'>";
            echo "<input type='checkbox' name='ch" . $i . "'/>S" . $i;
            echo "</label>";
            echo "</a>";
            echo "</li>";			 
        }

		if ($i % 11 == 5) {
			echo "<li class='seatGap'></li>";
		}
		if ($i % 10 == 1) { // This will trigger for 11, 21, 31, 41, etc.
			echo "<br/>";
		}
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
				</div>
			</div>
		</div>

		 <h1 class='note'>This is a visual representation only and does not ensure your seating arrangement. It simply illustrates the layout of the hall or banquet.</h1> 


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
	</BODY>
</HTML>