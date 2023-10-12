<?php include('config/database_connection.php'); ?>


<!DOCTYPE html>
<head>
<?php include('head.html'); ?> 
    
</head>
<body>
<?php include('menu.php'); ?> 
<?php include('sidebar.php'); ?> 


<?php 
$sequence3 = $dbConn->query('SELECT * FROM tbl_user order by ID DESC LIMIT 1');

if ($sequence3 && $sequence3->num_rows > 0) {
    $row = mysqli_fetch_array($sequence3);

    $month = date('m');
    $day = date ('d');
    $year = date ('Y');
    $info_userid = $row['ID'] + 1;
    $info_userid = 'USER' . $month . $day . $year . $info_userid;
}  else {
    $info_userid = 'USER' . date('mdY') . '1';
}


if(isset($_POST['save'])){
    $username  = strtoupper($_POST['txtusername']);
    $password  = strtoupper($_POST['txtpassword']);
    $fname  = strtoupper($_POST['txtfname']);
    $lname  = strtoupper($_POST['txtlname']);
    $dob  = $_POST['txtdob'];
    
    $query = 'INSERT INTO  tbl_user (INFO_USERID, INFO_USERNAME, INFO_PASSWORD, INFO_LNAME, INFO_FNAME, INFO_DOB) VALUES (?,?,?,?,?,?)';
    $stmt = $dbConn->prepare($query);
    $stmt->bind_param('ssssss', $info_userid, $username, $password, $lname, $fname, $dob);
    $stmt->execute();
    $stmt->close();
    echo "<script>window.location.href='registration.php';</script>";
} 
?>


<div class="container px-5 my-5">
    <form id="contactForm" method="post">

    <div class="form-row">
                <div class="col-lg-11">
                    <!-- Page Heading -->
                    <h4 class="mb-2 text-gray-800">Registration</h4>
                    <hr 999 />
                </div>
                <div class="d-flex scol-lg-1 mb-3">
                    <a href="#" class="mr-3 btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#addUser">
                        <i class="fas fa-user-plus fa-xs"></i>
                        Add Data
                    </a>
                    <a href="view-data.php" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#addUser">
                        <i class="fas fa-user-plus fa-xs"></i>
                        View Data
                    </a>
                    
                </div>
            </div>

        <div class="form-floating mb-3">
            <input class="border-left-primary text-capitalize form-control " id="username" name="txtusername" type="text" placeholder="Username:" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="username:required">Username is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="border-left-primary text-capitalize  form-control" id="password" name="txtpassword" type="password" placeholder="Password: " data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="password:required">Password is required.</div>
        </div>


        <div class="form-floating mb-3">
            <input class="border-left-primary text-capitalize  form-control" id="firstName" name="txtfname" type="text" placeholder="First Name" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="firstName:required">First Name is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="border-left-primary text-capitalize  form-control" id="lastName" name="txtlname" type="text" placeholder="Last Name" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="lastName:required">Last Name is required.</div>
        </div>
        <div class="form-floating mb-3">
            <label for="dateOfBirth">Date Of Birth</label>
            <input class="border-left-primary text-capitalize  form-control" id="dateOfBirth" name="txtdob" type="date" placeholder="Date Of Birth" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="dateOfBirth:required">Date Of Birth is required.</div>
        </div>
        <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                <p>To activate this form, sign up at</p>
                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
        </div>
        <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <div class="d-grid">
            <button class="btn btn-outline-primary btn-lg " name="save" id="submitButton" type="submit">Submit</button>
        </div>
    </form>

    <?php include('view-data.php'); ?>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>