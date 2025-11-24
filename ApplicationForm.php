<?php
require_once 'conn.php';

// Validate mobile number pattern
// $mobRegx = "/^[6-9][0-9]{9}$/";

// Validate email pattern
$emailRegex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

// Regular expression for username and password
$usernamePattern = "/^[a-zA-Z0-9_]{5,20}$/"; // 5 to 20 characters, alphanumeric and underscores only
$passwordPattern = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,20}$/"; // At least 1 letter, 1 number, 6-20 characters

if (isset($_POST['submit'])) {
    // Validate mobile number
    // if (!preg_match($mobRegx, $_POST['mob'])) {
    //     echo "<script>alert('Invalid mobile number!');</script>";
    //     exit;
    // }

    // Validate email
    if (!preg_match($emailRegex, $_POST['email'])) {
        echo "<script>alert('Invalid email address!');</script>";
        exit;
    }

    // Validate username
    if (!preg_match($usernamePattern, $_POST['uname'])) {
        echo "<script>alert('Invalid username! Must be 5-20 characters with letters, numbers, and underscores.');</script>";
        exit;
    }

    // Validate password
    if (!preg_match($passwordPattern, $_POST['pass'])) {
        echo "<script>alert('Invalid password! Must be 6-20 characters with at least 1 letter and 1 number.');</script>";
        exit;
    }

    // Check if required fields are filled
    if (empty($_POST['fname']) || empty($_POST['mob']) || empty($_POST['email']) || empty($_POST['pass'])) {
        echo "<script>alert('Please fill in all required fields!');</script>";
        exit;
    }

    // Regular expression for file type validation (only jpg)
    $allowedExtensions = ['jpg'];
$maxFileSize = 2 * 1024 * 1024; // 2MB

function uploadMarksheet($fileInputName, $folderName) {
    global $allowedExtensions, $maxFileSize;

    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES[$fileInputName];
        $fileName = basename($file['name']);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Check file extension
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "<script>alert('Only JPG files allowed for $fileInputName!');</script>";
            exit;
        }

        // Check file size
        if ($file['size'] > $maxFileSize) {
            echo "<script>alert('File too large for $fileInputName (max 2MB)!');</script>";
            exit;
        }

        // Make sure folder exists
        if (!is_dir($folderName)) {
            mkdir($folderName, 0777, true);
        }

        // Final path
        $targetPath = $folderName . "/" . $fileName;

        // Move file
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $fileName;
        } else {
            echo "<script>alert('Error moving $fileInputName!');</script>";
            exit;
        }
    } else {
        return ''; // empty if not uploaded
    }
}

// --- UPLOAD EACH FILE SEPARATELY ---
$marksheet1 = uploadMarksheet('marksheetname1', 'marksheet1');
$marksheet2 = uploadMarksheet('marksheetname2', 'marksheet2');
$marksheet3 = uploadMarksheet('marksheetname3', 'marksheet3');
$marksheet4 = uploadMarksheet('marksheetname4', 'marksheet4');
$marksheet5 = uploadMarksheet('marksheetname5', 'marksheet5');
$marksheet6 = uploadMarksheet('marksheetname6', 'marksheet6');
$marksheet7 = uploadMarksheet('marksheetname7', 'marksheet7');
$marksheet8 = uploadMarksheet('marksheetname8', 'marksheet8');
$marksheet9 = uploadMarksheet('marksheetname9', 'marksheet9');

// --- FORM DATA ---
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$standard = $_POST['standard'];
$mob = $_POST['mob'];
$cschool = $_POST['cschool'];
$grno = $_POST['grno'];
$email = $_POST['email'];
$pname = $_FILES['pname']['name'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];

// --- INSERT INTO DATABASE ---
$sql = "INSERT INTO student(
    fname, mname, lname, standard, mob, cschool, grno, email, pname,
    marksheet1, marksheet2, marksheet3, marksheet4, marksheet5, marksheet6, marksheet7, marksheet8, marksheet9,
    uname, pass
) VALUES (
    :fname, :mname, :lname, :standard, :mob, :cschool, :grno, :email, :pname,
    :marksheet1, :marksheet2, :marksheet3, :marksheet4, :marksheet5, :marksheet6, :marksheet7, :marksheet8, :marksheet9,
    :uname, :pass
)";

$query = $conn->prepare($sql);

$query->bindParam(':fname', $fname);
$query->bindParam(':mname', $mname);
$query->bindParam(':lname', $lname);
$query->bindParam(':standard', $standard);
$query->bindParam(':mob', $mob);
$query->bindParam(':cschool', $cschool);
$query->bindParam(':grno', $grno);
$query->bindParam(':email', $email);
$query->bindParam(':pname', $pname);

$query->bindParam(':marksheet1', $marksheet1);
$query->bindParam(':marksheet2', $marksheet2);
$query->bindParam(':marksheet3', $marksheet3);
$query->bindParam(':marksheet4', $marksheet4);
$query->bindParam(':marksheet5', $marksheet5);
$query->bindParam(':marksheet6', $marksheet6);
$query->bindParam(':marksheet7', $marksheet7);
$query->bindParam(':marksheet8', $marksheet8);
$query->bindParam(':marksheet9', $marksheet9);

$query->bindParam(':uname', $uname);
$query->bindParam(':pass', $pass);

// Execute
if ($query->execute()) {
    echo "<script>alert('Record Inserted Successfully.'); window.location.href='signin.php';</script>";
} else {
    echo "<script>alert('Error inserting record!');</script>";
}
}

?>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Application form</title>
	<link rel="stylesheet" href="bootstrap-5.3.2-dist\css\bootstrap.min.css">
	<style>
		.h1{
			margin-left:35%;
			color:blue;
		}	
	</style>
	</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="Admin.php">
                <img src="logo.PNG" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
            </a>
            <h3 class="text-light">MY EDUCATION & SECURITY SUPPORT</h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.php" class="btn ms-auto p-2 text-light bd-highlight">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="Signin.php" class="btn ms-auto p-2 text-light bd-highlight">Login</a>
                    </li>
                    <?php if (!empty($_SESSION)) { ?>
                        <li class="nav-item">
                            <a class="btn btn-danger text-light ms-2" href="logout.php">Logout</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
	<div class="imaged">
<div class="container my-5">
	<div class="card shadow-lg p-3 mb-5 bg-body rounded">
		<div class="card-body">
			<h1 class="h1">Application form</h1><br>
			<form method="post"  enctype="multipart/form-data">

				<div class="row">
					<div class="col-md-4 col-12 mb-3">
						<input type="text" class="form-control" name="fname" placeholder="first name" required>
					</div>
					<!-- <div class="col-sm-2"></div> -->
					<div class="col-md-4 col-12 mb-3">
						<input type="text" class="form-control" name="mname" placeholder="midal name" required>
					</div>
					<!-- <div class="col-sm-2"></div> -->
					<div class="col-md-4 col-12 mb-3">
						<input type="text" class="form-control" name="lname" placeholder="last name" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 col-12 mb-3">
						<input type="text" class="form-control" name="standard" placeholder="standard" required>
					</div>
					<!-- <div class="col-sm-2"></div> -->
					<div class="col-md-4 col-12 mb-3">
					<input type="number" class="form-control" name="mob" pattern="^[6-9][0-9]{9}$" placeholder="mobile number" required>
					</div>
					<!-- <div class="col-sm-2"></div> -->
					<div class="col-md-4 col-12 mb-3">
					<input type="text" class="form-control" name="cschool" 
					<?php 
					if (!empty($_SESSION['role']) && $_SESSION['role'] === 'school' && !empty($_SESSION['firstname'])) {
						?>
						value="<?php 
						echo htmlspecialchars($_SESSION['firstname']);
						}?>" 
						placeholder="Current School Name" required>
					</div>
				</div>

				<!-- <div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<input type="text" name="standard" placeholder="standard">
					</div>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<input type="number" name="mob" placeholder="mobile number">
					</div>
				</div><br>

				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<input type="text" name="cschool" placeholder="Current School Name">
					</div>
				</div><br> -->

				<div class="row">
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3">
						<input type="number" class="form-control" name="grno" placeholder="G.R. NO." required>
					</div>
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3"> 
						<input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
					</div>
				</div>

				<div class="row">
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3">
						 <div>
							  <label for="formFileLg" class="form-label text-primary">passport size photo</label>
							  <input name="pname" class="form-control" type="file" placeholder="uploda" required>
						</div>
					</div>
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3">
						<div>
  							<label for="formFileLg" class="form-label text-primary">marksheet std.: 1</label>
  							<input name="marksheetname1" class="form-control" type="file" placeholder="uploda" required>
						</div>
					</div>
				</div>

				<div class="row">
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3">
						 <div>
							  <label for="formFileLg" class="form-label text-primary">marksheet std.: 2</label>
							  <input name="marksheetname2" class="form-control" type="file" placeholder="uploda" required>
						</div>
					</div>
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3">
						<div>
  							<label for="formFileLg" class="form-label text-primary">marksheet std.: 3</label>
  							<input name="marksheetname3" class="form-control" type="file" placeholder="uploda" required>
						</div>
					</div>
				</div>

				<div class="row">
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3">
						 <div>
							  <label for="formFileLg" class="form-label text-primary">marksheet std.: 4</label>
							  <input name="marksheetname4" class="form-control" type="file" placeholder="uploda" required>
						</div>
					</div>
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3">
						<div>
  							<label for="formFileLg" class="form-label text-primary">marksheet std.: 5</label>
  							<input name="marksheetname5" class="form-control" type="file" placeholder="uploda" required>
						</div>
					</div>
				</div>

				<div class="row">
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3">
						 <div>
							  <label for="formFileLg" class="form-label text-primary">marksheet std.: 6</label>
							  <input name="marksheetname6" class="form-control" type="file" placeholder="uploda" required>
						</div>
					</div>
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3">
						<div>
  							<label for="formFileLg" class="form-label text-primary">marksheet std.: 7</label>
  							<input name="marksheetname7" class="form-control" type="file" placeholder="uploda" required>
						</div>
					</div>
				</div>

				<div class="row">
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3">
						 <div>
							  <label for="formFileLg" class="form-label text-primary">marksheet std.: 8</label>
							  <input name="marksheetname8" class="form-control" type="file" placeholder="uploda" required>
						</div>
					</div>
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3">
						<div>
  							<label for="formFileLg" class="form-label text-primary">marksheet std.: 9</label>
  							<input name="marksheetname9" class="form-control" type="file" placeholder="uploda" required>
						</div>
					</div>
				</div>

				<div class="row">
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3">
						<input type="text" class="form-control" name="uname" placeholder="User id" required>
					</div>
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3">
						<input type="text" class="form-control" name="pass" placeholder="At least 1 letter, 1 number, 6-20 characters" required>
					</div>
				</div>

				<div class="row">
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3">
						<a href="#" name="t&c" required>Terms& Conditions apply</a>
					</div>
					<!-- <div class="col-sm-1"></div> -->
					<div class="col-md-6 col-12 mb-3">
						<input type="checkbox" name="Aggr" value="Aggr" id="aggr" required> I agree this terms and conditions
					</div>
				</div>

				<div class="row"> 
					<!-- <div class="col-sm-2"></div> -->
					<div class="col-md-6 col-12 mb-3">
						<input type="submit" class="btn btn-primary" name="submit" value="submit">
					</div>
					<!-- <div class="col-sm-2"></div> -->
					<div class="col-md-6 col-12 mb-3">
						<input class="btn btn-primary" type="reset" name="reset" value="reset"></div></div>
					</div>
				</div>

 			</form>
 		</div>
	</div>
</div>
</div>
<footer class="bg-primary text-white py-4">
    <div class="container">
        <div class="row">
            <!-- Logo and Contact -->
            <div class="col-md-3 text-center">
                <a class="navbar-brand" href="Admin.php">
                    <img src="logo.PNG" alt="Logo" width="50" height="50" class="d-block mx-auto">
                </a>
                <p class="mt-3">Contact Us</p>
                <p>Privacy Policy</p>
            </div>
            
            <!-- Site Map -->
            <div class="col-md-3">
                <h5 class="mb-3">Site Map</h5>
                <ul class="list-unstyled">
                    <li><a href="Index.php" class="text-white" style="text-decoration: none;">Home</a></li>
                    <li><a href="Signin.php" class="text-white" style="text-decoration: none;">Sign In</a></li>
                    <li><a href="Signup.php" class="text-white" style="text-decoration: none;">Sign Up</a></li>
                    <li><a href="Admin.php" class="text-white" style="text-decoration: none;">Admin</a></li>
                    <li><a href="UserDetails.php" class="text-white" style="text-decoration: none;">User Details</a></li>
                    <li><a href="Admin_Read.php" class="text-white" style="text-decoration: none;">Admin Details</a></li>
                </ul>
            </div>
            
            <!-- Social Media -->
            <div class="col-md-3">
                <h5 class="mb-3">Follow Us</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white" style="text-decoration: none;">Instagram</a></li>
                    <li><a href="#" class="text-white" style="text-decoration: none;">WhatsApp</a></li>
                    <li><a href="#" class="text-white" style="text-decoration: none;">Facebook</a></li>
                    <li><a href="#" class="text-white" style="text-decoration: none;">Twitter</a></li>
                    <li><a href="#" class="text-white" style="text-decoration: none;">YouTube</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="col-md-3">
                <h5 class="mb-3">Contact</h5>
                <ul class="list-unstyled">
                    <li>Email: mess@gmail.com</li>
                    <li>Phone: 8542639854</li>
                </ul>
            </div>
        </div>
        
        <!-- Feedback Form -->
        <div class="row mt-4">
            <div class="col-md-6 mx-auto">
                <form method="post" class="d-flex">
                    <input type="text" name="feedback" id="feedback" placeholder="Your Feedback" class="form-control">
                    <button type="submit" class="btn btn-danger ms-2">Submit</button>
                </form>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="text-center mt-4">
            <p>&copy; 2025 Pranav Shinde. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
