<?php require_once("headerk.php");

// print_r($_SESSION);
// die("sdfa");

if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
}else{
  header("Location: dashboard.php");
  exit();
}
?>

<div class="container mb-4 mx-auto max-w-[1350px] pt-5">
    <h3 class="text-center text-2xl font-bold py-2">🧑All User List🧑</h3>

    <!-- Search Form -->
    <div class="mx-auto max-w-[1350px]">
    <form method="GET" class="mb-4 flex justify-center">
        <input type="text" name="search" placeholder="Search by name or email..." class="border border-gray-300 p-2 rounded-l border p-2 w-[50%]" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded-r px-4">Search</button>
    </form>
</div>

    <div class="overflow-x-auto">
        <table id="" class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-100 text-black">
                <tr>
                    <th class="px-6 py-3">No.</th>
                    <th class="px-6 py-3">Name/Email</th>
                    <th class="px-6 py-3">Address</th>
                    <th class="px-6 py-3">Contact Name</th>
                    <th class="px-6 py-3">Pay Status</th>
                    <th class="px-6 py-3">Transaction ID / UTR</th>
                    <th class="px-6 py-3">Current Balance</th>
                    <th class="px-6 py-3">Pay Date</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php
                require_once("dbConnection.php");

                $users_per_page = 10;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $users_per_page;

                $search = isset($_GET['search']) ? $mysqli->real_escape_string($_GET['search']) : '';

                // Modify query for search functionality
                $sql = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%'  OR mobile LIKE '%$search%' LIMIT $users_per_page OFFSET $offset";
                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $rs = getCurWallet($mysqli, $row['id']);
                        $rscurr = isset($rs->current_balance) && $rs->current_balance > 0 ? $rs->current_balance : 0;
                ?>
                        <tr>
                            <td class="px-6 py-4 font-bold"><?php echo $row['id']; ?></td>
                            <td class="px-6 py-4 font-bold"><?php echo $row['name']; ?>
                            <br /><?php echo $row['email']; ?></td>
                            <td class="px-6 py-4 font-bold"><?php echo $row['city']; ?><?php echo $row['state']; ?></td>
                            <td class="px-6 py-4 font-bold text-green-700"><?php echo $row['mobile']; ?><br/><?php echo $row['password']; ?></td>
                            <td class="px-6 py-4 font-bold text-color-red"><?php if($row['pstatus']){ echo ucfirst($row['pstatus']); } ?></td>
                            <td class="px-6 py-4 font-bold"><?php echo $row['transaction_id']; ?></td>
                            <td class="px-6 py-4 font-bold"><?php echo $row['pay']; ?></td>
                            <td class="px-6 py-4 font-bold"><?php echo $row['edate']; ?></td>
                            <td class="px-6 py-4 flex flex-col space-y-2">
                                <button class="neditButton bg-green-500 text-white py-1 px-2 rounded" data-toggle="modal" data-target="#myModal" data-userid="<?php echo $row['id']; ?>" 
                                data-modal-target="myModal" data-modal-toggle="myModal">ProfileEdit</button>

                                <button class="rechargeedit bg-purple-500 text-white py-1 px-2 rounded" data-toggle="modal" data-target="#myModal_recharge" data-userid="<?php echo $row['id']; ?>"
                                data-modal-target="myModal_recharge" data-modal-toggle="myModal_recharge">Paid</button>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='11' class='text-center px-6 py-4'>No users found</td></tr>";
                }

                // Calculate total pages
                $total_users_sql = "SELECT COUNT(*) as total_users FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR mobile LIKE '%$search%'";
                $total_users_result = $mysqli->query($total_users_sql);
                $total_users_row = $total_users_result->fetch_assoc();
                $total_users = $total_users_row['total_users'];

                $total_pages = ceil($total_users / $users_per_page);

                $mysqli->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination flex justify-center mt-4">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>&search=<?php echo $search; ?>" class="px-4 py-2 bg-gray-200 rounded-l">Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>" class="px-4 py-2 bg-gray-200 <?php echo $i == $page ? 'bg-blue-500 text-white' : ''; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
            <a href="?page=<?php echo $page + 1; ?>&search=<?php echo $search; ?>" class="px-4 py-2 bg-gray-200 rounded-r">Next</a>
        <?php endif; ?>
    </div>
</div>

<div id="myModal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
   <!-- Modal -->
    <div class="  inset-0 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-4 border-b">
                <h2 class="text-xl font-bold">Update User</h2>
                <button type="button" class="text-gray-600 hover:text-gray-800" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="p-4">
                <form id="userForm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" id="nname" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                <input type="hidden" id="nuid" name="uid" />
                            </div>
                            <div class="mb-4">
                                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                <input type="text" id="username" name="username" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="nemail" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label for="contactDetail" class="block text-sm font-medium text-gray-700">Contact Detail</label>
                                <input type="text" id="ncontactDetail" name="contactDetail" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                            </div>
                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="text" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-2 mb-4">
                             <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                          <textarea id="address" name="address" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        </div>
                    </div>
                    <button type="submit" id="s1" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700">Submit</button>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end p-4 border-t">
                <button type="button" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-400" data-dismiss="modal" onclick="document.getElementById('myModal').classList.add('hidden');">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="myModal_plan" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
<!-- Modal -->
    <div class="  inset-0 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl"> <!-- Max width set for large modal -->
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-4 border-b">
                <h4 class="text-xl font-bold">Update Plan</h4>
                <button type="button" class="text-gray-600 hover:text-gray-800" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="p-4">
                <form id="pform">
                    <div class="grid grid-cols-1 gap-4"> <!-- Adjusted to grid with one column -->
                        <!-- User Detail -->
                        <div class="mb-4">
                            <label for="pdetail" class="block text-sm font-medium text-gray-700">User Detail</label>
                            <input type="text" id="puid" name="puid" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" readonly>
                        </div>
                        
                        <!-- Choose Plan -->
                        <div class="mb-4">
                            <label for="plan" class="block text-sm font-medium text-gray-700">Choose Plan</label>
                            <select id="plan" name="plan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="" selected>Select plan</option>
                                <option value="400">400</option>
                                <!-- Other options -->
                                <!-- <option value="850">850 for 2 months</option>
                                <option value="1500">1500 for 3 months</option>
                                <option value="2500">2500 for 4 months</option> -->
                            </select>
                        </div>

                        <!-- Transaction ID -->
                        <div class="mb-4">
                            <label for="transaction_id" class="block text-sm font-medium text-gray-700">Transaction ID/UTR</label>
                            <input type="text" id="transaction_id" name="transaction_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Payment Date -->
                        <div class="mb-4">
                            <label for="pay_date" class="block text-sm font-medium text-gray-700">Payment Date</label>
                            <input type="date" id="pay_date" name="pay_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex justify-end pt-4 border-t">
                        <button type="button" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-400 mr-2" data-dismiss="modal">Close</button>
                        <button type="submit" id="s1" class="bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="myModal_recharge" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <!-- Recharge Modal -->
        <div class="  inset-0 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl"> <!-- Large modal size using max-w-4xl -->
                <!-- Modal Header -->
                <div class="flex justify-between items-center p-4 border-b">
                    <button type="button" class="text-gray-600 hover:text-gray-800" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="p-4">
                    <form id="rform">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> <!-- Two columns layout for medium screens and above -->
                            <!-- Hidden input for r_id -->
                            <input type="hidden" id="r_id" name="r_id" />

                            <!-- Amount -->
                            <div class="mb-4">
                                <label for="r_amount" class="block text-sm font-medium text-gray-700">Amount</label>
                                <input type="text" id="r_amount" name="r_amount" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <!-- Transaction ID / UTR -->
                            <div class="mb-4">
                                <label for="r_transaction_id" class="block text-sm font-medium text-gray-700">Transaction ID/UTR</label>
                                <input type="text" id="r_transaction_id" name="r_transaction_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <!-- Payment Date -->
                            <div class="mb-4">
                                <label for="r_pay_date" class="block text-sm font-medium text-gray-700">Date</label>
                                <input type="date" id="r_pay_date" name="r_pay_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="flex justify-end pt-4 border-t">
                            <button type="submit" id="s1" class="bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 mr-2">Submit</button>
                            <button type="button" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-400" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>


 

  <div id="myModal_recharge" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <!-- QR Code Modal -->
<div class="  inset-0 flex items-center justify-center z-50">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md"> <!-- Set modal width with max-w-md -->
    <!-- Modal Header -->
    <div class="flex justify-between items-center p-4 border-b">
      <h4 class="text-lg font-semibold">QR Code</h4>
      <button type="button" class="text-gray-600 hover:text-gray-800" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal Body -->
    <div class="p-4 flex justify-center">
      <img src="images/payment.jpeg" alt="QR Code" class="w-full max-w-xs rounded-md"> <!-- Responsive image with max-w-xs -->
    </div>

    <!-- Modal Footer -->
    <div class="flex justify-end p-4 border-t">
      <button type="button" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-400" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>


  <script>
    $('.neditButton').click(function() {
        var userId = $(this).data('userid');
            $.ajax({
                url: 'getUser',
                method: 'POST',
                data: { uid: userId },
                success: function(response1) {
                    var response = JSON.parse(response1);
                    $('#nname').val(response.name);
                    $('#nuid').val(userId);
                    $('#username').val(response.username);
                    $('#password').val(response.password);
                    $('#nemail').val(response.email);
                    $('#ncontactDetail').val(response.contact_number);
                    $('#pay_date').val(response.pay_date);
                    $('#address').val(response.address);
                    var status = response.pay;
                    $('#status').val(status);
                    $('#contactDetail').val(response.contactDetail);
                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch userId from the server:', error);
                }
            });
        });
    $(document).ready(function() {
        $('#userForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'jqeditUser',
                data: formData,
                success: function(response) {
                    console.log('API Response:', response);
                    swal("Success!", "Your request was successful.", "success");
                },
                            error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
 
    $('.planedit').click(function() {
        var userId = $(this).data('userid');
            $.ajax({
                url: 'getUser',
                method: 'POST',
                data: { uid: userId },
                success: function(response1) {
                    var response = JSON.parse(response1);
                    $('#puid').val(userId);
                    $('#pay_date').val(response.pay_date);
                    var status = response.pay;
                    $('#status').val(status);
                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch userId from the server:', error);
                }
            });
        });
    $(document).ready(function() {
        $('#pform').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'jqeditPlan',
                data: formData,
                success: function(response) {
                    console.log('API Response:', response);
                    swal("Success!", "Your request was successful.", "success");
                },
                            error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
 
    $('.rechargeedit').click(function() {
        var userId = $(this).data('userid');
            $.ajax({
                url: 'getUser',
                method: 'POST',
                data: { uid: userId },
                success: function(response1) {
                    var response = JSON.parse(response1);
                    $('#r_id').val(userId);
                    $('#pay_date').val(response.pay_date);
                    var status = response.pay;
                    $('#status').val(status);
                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch userId from the server:', error);
                }
            });
        });
    $(document).ready(function() {
        $('#rform').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'jqeditRecharge',
                data: formData,
                success: function(response) {
                    console.log('API Response:', response);
                    swal("Success!", "Your request was successful.", "success");
                },
                            error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
 
    // $(document).ready(function() {
    //     $('#ttble').DataTable();
    // });
</script>

  <?php require_once("footer.php");  ?>