<?php
// require 'vendor/autoload.php';

// use Aws\S3\S3Client;
// use Aws\Exception\AwsException;
// use Dotenv\Dotenv;
// $dotenv = Dotenv::createImmutable(__DIR__);
// $dotenv->load();
// $region = $_ENV['AWS_REGION'];
// $AWS_ACCESS_KEY_ID = $_ENV['AWS_ACCESS_KEY_ID'];
// $AWS_SECRET_ACCESS_KEY = $_ENV['AWS_SECRET_ACCESS_KEY'];
// $S3_BUCKET_NAME = $_ENV['S3_BUCKET_NAME'];

 



include('dbconn.php');

// Open a new connection to the MySQL server
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

try {
    $pdo = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUsername, $databasePassword);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


function getCurrentBal($mysqli,$user_id) {
    $current_balance = 0;
   $sql = "SELECT current_balance FROM wallet where user_id='$user_id' order by id desc limit 0,1";
  $result = $mysqli->query($sql);
  if ($result) {
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
               $current_balance = $row["current_balance"]; // Store the current_balance value
          }
      } else {
          // echo "No records found.";
      }
  } else {
      // echo "Error executing query: " . $mysqli->error;
  }
  return  $current_balance;
  }


  function ReqDownload($mysqli, $user_id, $ration_id) {
    $sql = "SELECT count(*) as cnt FROM ration_download WHERE user_id = '$user_id' AND ration_id = '$ration_id' ORDER BY id DESC LIMIT 1";
    $result = $mysqli->query($sql);
    $cnt=0;
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cnt = $row["cnt"];
        return $cnt;
    } else {
        return 0;  // Return null or any other value you prefer when no records are found
    }
}




function downloadAvl($mysqli, $user_id, $ration_id) {
    $sql = "SELECT count(*) as cnt FROM ration_download WHERE user_id = '$user_id' AND ration_id = '$ration_id' ORDER BY id DESC LIMIT 1";
    $result = $mysqli->query($sql);
    $cnt=0;
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cnt = $row["cnt"];
        return $cnt;
    } else {
        return 0;  // Return null or any other value you prefer when no records are found
    }
}


function getUserHeader($mysqli,$userId) {
    $sql = "SELECT * FROM users WHERE id='" . $userId . "'";
    $result = $mysqli->query($sql);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $userDataObj = new stdClass();
      $userDataObj->id = $row['id'];
      $userDataObj->current_balance = $row['current_balance'];
      $userDataObj->email = $row['email'];
      $userDataObj->contact_number = $row['contact_number'];
      $userDataObj->username = $row['username'];
      return $userDataObj;
  } else {
      return null; // Return null if no user found
  }
}






function numberToWords($number) {
    $ones = array(
        1 => "one",
        2 => "two",
        3 => "three",
        4 => "four",
        5 => "five",
        6 => "six",
        7 => "seven",
        8 => "eight",
        9 => "nine"
    );

    $tens = array(
        10 => "ten",
        11 => "eleven",
        12 => "twelve",
        13 => "thirteen",
        14 => "fourteen",
        15 => "fifteen",
        16 => "sixteen",
        17 => "seventeen",
        18 => "eighteen",
        19 => "nineteen",
        20 => "twenty",
        30 => "thirty",
        40 => "forty",
        50 => "fifty",
        60 => "sixty",
        70 => "seventy",
        80 => "eighty",
        90 => "ninety"
    );

    if ($number < 10) {
        return ucfirst($ones[$number]);
    } elseif ($number < 20) {
        return ucfirst($tens[$number]);
    } elseif ($number < 100) {
        $unit = $number % 10;
        $ten = $number - $unit;
        return ucfirst($tens[$ten] . ($unit ? "-" . $ones[$unit] : ""));
    } else {
        return "Number out of range";
    }
}

// // Test the function
// for ($i = 1; $i <= 99; $i++) {
//     echo $i . " => " . numberToWords($i) . "\n";
// }




function uploadFileToS3($file1) {
        global $AWS_ACCESS_KEY_ID;
        global $AWS_SECRET_ACCESS_KEY;
        global $region;
        global $S3_BUCKET_NAME;

        $file=$file1['pdfUpload'];
        $bucketName=$S3_BUCKET_NAME;               // S3 bucket name
        $folderName='luxyara/uploadcards';       // Folder path inside the bucket
        $region=$region;              // S3 region
        $accessKey= $AWS_ACCESS_KEY_ID;      // AWS Access Key
        $secretKey=$AWS_SECRET_ACCESS_KEY;  // AWS Secret Key
        if (isset($file) && $file['error'] == 0) {
            
        // Retrieve file details
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = 'file_' . uniqid() . '.' . $extension;
        
        // AWS S3 configuration
        $key = $folderName . '/' . $newFileName;  // Path in the S3 bucket
       
        // Create an S3 client
        $s3 = new S3Client([
            'region' => $region,
            'version' => 'latest',
            'credentials' => [
                'key' => $accessKey,
                'secret' => $secretKey,
            ],
        ]);

       

        try {
            // Upload the file to S3
            $result = $s3->putObject([
                'Bucket' => $bucketName,
                'Key' => $key,
                'SourceFile' => $fileTmpName,  // Temporary file path
                'ACL' => 'public-read',  // Permissions for the file
                'ContentType' => mime_content_type($fileTmpName),  // File MIME type
            ]);
        
            // The result contains details of the uploaded file
            return [
                'status' => 'success',
                'url' => $result['ObjectURL'],
            ];

        } catch (AwsException $e) {
            // Catch an S3 specific exception.
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    } else {
        return [
            'status' => 'error',
            'message' => 'No file uploaded or file upload error.',
        ];
    }
}

function uploadPDFToServer($filePath, $extension) {
    // Check if the file exists
    if (!file_exists($filePath)) {
        return "File not found!";
    }

    // Get the directory and original file name
    $pathInfo = pathinfo($filePath);
    $newFilePath = $pathInfo['dirname'] . '/' . $pathInfo['filename'] . '.' . $extension;

    // Rename the file from .tmp to .pdf (or whatever extension you pass)
    if (!rename($filePath, $newFilePath)) {
        return "Error renaming the file!";
    }

    $curl = curl_init();

    // Set cURL options
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://be.luxyaragroup.io/api/php/add_product', // Your API endpoint
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('pdf_upload' => new CURLFILE($newFilePath)), // Renamed file to upload
    ));

    // Execute the request
    $response = curl_exec($curl);

    // Close the cURL session
    curl_close($curl);

    // Return the response
    return $response;
}

 