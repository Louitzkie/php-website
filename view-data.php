<?php include('config/database_connection.php'); ?>
<!DOCTYPE html>
<head>
    <?php include('head.html'); ?>
</head>
<body>

<h1 class="mt-4">View data</h1>

<?php 
// Create a query to select all data from the tbl_user table
$query = "SELECT * FROM tbl_user";
$result = $dbConn->query($query);

if ($result && $result->num_rows > 0) {
    // Add Bootstrap table classes
    echo '<div class="table-responsive">';
    echo '<table class="table table-striped table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Username</th>';
    echo '<th>First Name</th>';
    echo '<th>Last Name</th>';
    echo '<th>Date of Birth</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Output data rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['INFO_USERID'] . '</td>';
        echo '<td>' . $row['INFO_USERNAME'] . '</td>';
        echo '<td>' . $row['INFO_FNAME'] . '</td>';
        echo '<td>' . $row['INFO_LNAME'] . '</td>';
        echo '<td>' . $row['INFO_DOB'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo 'No data found in the tbl_user table.';
}

// Close the database connection
$dbConn->close();
?>
</div>

</body>
</html>
