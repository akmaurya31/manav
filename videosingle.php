<?php include("headerk.php"); 

$id = $_REQUEST['id'];

$international_vyapaar_topics = [
    1 => [
        "title" => "Why To Do International Vyapaar",
        "description" => "Learn the benefits of expanding your business globally, including access to larger markets, increased profits, and opportunities to grow your brand internationally.",
        "link"=>"https://publictpeg.s3.ap-south-1.amazonaws.com/ibiv/241006IBIVVideo1WhytodoInternationalBusiness.mp4"
    ],
    2 => [
        "title" => "How To Do International Vyapaar",
        "description" => "Get step-by-step guidance on establishing your international business, from finding buyers to setting up supply chains and handling logistics efficiently.",
         "link"=>"https://publictpeg.s3.ap-south-1.amazonaws.com/ibiv/241006IBIVVideo2HowtodoInternationalBusiness.mp4" 
    ],
    3 => [
        "title" => "International Vyapaar - Government Rules and Compliances",
        "description" => "Understand the essential export-import regulations, compliance requirements, and legal frameworks to ensure smooth international trading.",
        "link"=>"https://publictpeg.s3.ap-south-1.amazonaws.com/ibiv/24-09-26IBIVVideo3-Governmentrulescomplnces.mp4.mp4"
    ],
    4 => [
        "title" => "How TPEG Helps You in Doing International Vyapaar",
        "description" => "Explore how TPEG provides tailored support for Indian SMEs through buyer connections, market access, and end-to-end trade solutions.",
        "link"=>"https://publictpeg.s3.ap-south-1.amazonaws.com/ibiv/241006IBIVVideo4HowTPEGHELPSyouindoinginternationalvyapaar.mp4"
    ],
    5 => [
        "title" => "How to Start International Vyapaar in Dubai – UAE",
        "description" => "Unlock the potential of Dubai as a global business hub, and learn the specific steps to establish your presence in the UAE’s thriving international trade market.",
        "link"=>"https://publictpeg.s3.ap-south-1.amazonaws.com/ibiv/241006IBIVVideo5HowtoStartInternationalvyapaarindubaiuae.mp4"
    ]
];

 



// $ro=getCurWallet($mysqlii,$_SESSION['idd']);
// $roinc=0;
// if(isset($ro->current_balance) && $ro->current_balance>0){
//   $roinc=$ro->current_balance;
// }


$sql = "SELECT * FROM users WHERE mobile='" . $_SESSION['mobile'] . "' ORDER BY id DESC LIMIT 1";
$ro = $mysqlii->query($sql);
$roinc = 0;

if ($ro && $ro->num_rows > 0) {
    // Fetch the row from the result set
    $row = $ro->fetch_assoc();

    // Check if the `current_balance` exists in the row and is greater than 0
    if (isset($row['current_balance']) && $row['current_balance'] > 0) {
        $roinc = $row['current_balance'];
    }
}

if($roinc<=0){

    echo '<div class="flex flex-col w-[1025px]" >
    <div class="bg-red-100 border   border-red-400 mt-5 text-red-700 px-4 py-3 rounded relative mx-auto" role="alert">
    <strong class="font-bold">!!</strong>
    <span class="block sm:inline">Please Contact to administrator.</span>
</div><div>';

echo '<div class="flex justify-center mt-4 space-x-2">
    <a href="pay.php" class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <span>🔄</span>
        <span class="ml-2">PayNow</span>
    </a>
    <a href="#" class="inline-flex items-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        <span>🔑</span>
        <span class="ml-2">Contact to Admin</span>
    </a>
</div>';
  die("...");

}

 
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

// AWS_ACCESS_KEY_ID="AKIAVRUVUXHFXPCKVFE5"
// AWS_SECRET_ACCESS_KEY="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"
// AWS_REGION="us-west-1"
// S3_BUCKET_NAME="publicluxs3"
// BACEKND_URL = "https://be.luxyaragroup.io"

// Set up the S3 client with your credentials
// $s3Client = new S3Client([
//     'version' => 'latest',
//     'region' => 'us-west-1', // Change region if different
//     'credentials' => [
//         'key' => 'AKIAVRUVUXHFXPCKVFE5',    // Replace with your AWS access key
//         'secret' => 'SU7eRTohUMxL5yB18CMy9tpd9R2zxMYXV1TmXaNk', // Replace with your AWS secret key
//     ],
// ]);


$s3Client = new S3Client([
  'version' => 'latest',
  'region' => 'ap-south-1', // Change region if different
  'credentials' => [
      'key' => 'AKIASVLKCUHG33LZRNZZ',    // Replace with your AWS access key
      'secret' => 'DOMh/y9zEucmLxxU8DAHR3v3Yw7/GfiaL94ggR6t', // Replace with your AWS secret key
  ],
]);


// $bucket = 'publicluxs3';
// $key = 'manav/24-09-26IBIVVideo3-Governmentrulescomplnces.mp4.mp4';


$bucket = 'publictpeg';
$key = 'ibiv/24-09-26IBIVVideo3-Governmentrulescomplnces.mp4.mp4';


// https://publicluxs3.s3.us-west-1.amazonaws.com/manav/24-09-26IBIVVideo3-Governmentrulescomplnces.mp4.mp4
// https://publicluxs3.s3.us-west-1.amazonaws.com/manav/24-09-26IBIVVideo3-Governmentrulescomplnces.mp4.mp4?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAVRUVUXHFXPCKVFE5%2F20241010%2Fus-west-1%2Fs3%2Faws4_request&X-Amz-Date=20241010T010121Z&X-Amz-SignedHeaders=host&X-Amz-Expires=1200&X-Amz-Signature=eb332e01c8af7c14ece31fcdd6bf0642783d3e7ea8788aa177f580e9c08858f3

try {
    // Generate a pre-signed URL to access the file
    $cmd = $s3Client->getCommand('GetObject', [
        'Bucket' => $bucket,
        'Key' => $key
    ]);

    $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');

    // Get the actual presigned URL
    $presignedUrl = (string) $request->getUri();

    // $presignedUrl ="https://publicluxs3.s3.us-west-1.amazonaws.com/manav/24-09-26IBIVVideo3-Governmentrulescomplnces.mp4.mp4";
    // $presignedUrl ="https://publictpeg.s3.ap-south-1.amazonaws.com/ibiv/24-09-26IBIVVideo3-Governmentrulescomplnces.mp4.mp4";
    $presignedUrl =$international_vyapaar_topics[$id]['link'];

    // Output HTML to embed video

//     <video id="myVideo" width="640" height="360" oncontextmenu="return false;" controlslist="nodownload" preload="none">
//     <source src="{$presignedUrl}" type="video/mp4">
//     Your browser does not support the video tag.
// </video>

//  oncontextmenu='return false;' controlslist='nodownload' preload='none'

    // echo "<video width='640' height='360' controls  oncontextmenu='return false;'  controlslist='nodownload'>
    //         <source src='{$presignedUrl}' type='video/mp4'>
    //         Your browser does not support the video tag.
    //       </video>";

} catch (AwsException $e) {
    // Output error message if something went wrong
    echo "Error: " . $e->getMessage();
}
?>



 
  <style>
    /* Custom animations */
    @keyframes float {
      0% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0); }
    }

    .floating2 {
      animation: float 3s ease-in-out infinite;
    }

    .highlight {
      /* background: linear-gradient(90deg, rgba(255,183,77,1) 0%, rgba(255,255,255,1) 50%, rgba(255,183,77,1) 100%); */
      background: #f8ddc1;
      background-size: 200% 100%;
      animation: shine 3s linear infinite;
    }

    @keyframes shine {
      0% { background-position: 0% 0%; }
      50% { background-position: 100% 0%; }
      100% { background-position: 0% 0%; }
    }
  </style>
 
 

 
  <!-- Main Content Section -->
  <section class="py-12 md:w-[900px]  mx-auto grid   gap-2">
    <!-- Video and About the Lesson -->
    <a href="video.php" class="back-button flex items-center bg-yellow-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        <span class="back-icon mr-2">⬅️</span>
        Back
    </a>
    <div class="lg:col-span-2">
      <!-- Video Section -->
       <!-- <h1 class="text-xl">  <?php echo $international_vyapaar_topics[$id]['title']; ?></h1> -->
      <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8">
        <video id="mainVideo" class="md:h-[500px]" controls>
          <source src="<?php echo $presignedUrl ?>" type="video/mp4"  oncontextmenu="return false;" controlslist="nodownload">
          Your browser does not support the video tag.
        </video>
        <div class="p-4 highlight">
          
          <p class="text-gray-700">
          <?php echo $international_vyapaar_topics[$id]['description']; ?>
          </p>
        </div>
      </div>
 
<div class="bg-white shadow-lg rounded-lg p-6 highlight">
  <h2 class="text-xl font-bold text-[#662406] mb-4">Meet the Coach</h2>
  <div class="flex items-center">
    <img class="w-16 h-16 rounded-full border-4 border-indigo-500 floating" src="./images/1724738738665.jpeg" alt="Coach Photo">
    <div class="ml-4">
      <p class="text-lg font-bold text-gray-900">Coach: Dr. Manav Ahuja</p>
      <p class="text-sm text-gray-500">Expert in Business Consulting & International Expansion</p>
    </div>
  </div>
  <p class="mt-4 text-gray-700">
    Dr. Manav Ahuja is the founder of TPEG International LLC, Dubai, guiding entrepreneurs across the UAE, GCC, and Asia.   
  </p>
  <p class="mt-4 text-[#662406] font-bold">Key Highlights:</p>
  <ul class="list-disc ml-6 text-gray-700">
    <li>Founder of TPEG International LLC, Dubai, guiding entrepreneurs across the UAE, GCC, and Asia.</li>
    <li>25+ years of expertise in business consulting, offering strategic solutions for growth and global expansion.</li>
    <li>Mentored 100+ global entrepreneurs and trained over 10,000 candidates in sales, business, and international trade.</li>
    <li>Board member of leading universities, contributing to academia and business education.</li>
    <li>Honored with a Doctorate in Human Psychology for his contribution to leadership and mentoring.</li>
    <li>On a Mission: Empower 10,000 Indian brands to thrive internationally by connecting SMEs to global buyers.</li>
    <li>Regularly conducts seminars in international markets to raise awareness and support international business growth.</li>
  </ul>
</div>
 

    </div>

   
  </section>

  <!-- JavaScript to Change Videos -->
  <script>
    function changeVideo(src) {
      const video = document.getElementById('mainVideo');
      video.src = src;
      video.play();
    }

    document.addEventListener("keydown", function(e) {
    if (e.key === "F12" || (e.ctrlKey && e.shiftKey && e.key === "I")) {
        e.preventDefault();
    }
});

document.addEventListener("contextmenu", function(e) {
    e.preventDefault();
});

  </script>

</body>
</html>
