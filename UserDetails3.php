<?php
require_once 'conn.php';

if (empty($_SESSION)) {
    header("location:login.php");
}

$uname = $_SESSION['username'];

$sql = "SELECT * FROM student WHERE uname = :uname";
$query = $conn->prepare($sql);
$query->bindParam(':uname', $uname);

if ($query->execute()) {
    $result = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Bank of Credits</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .abc-card {
            background: #ff6b6b;
            color: white;
            padding: 15px;
            border-radius: 10px;
            text-align: left;
        }

        .credit-points {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .edit-icon {
            color: #007bff;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .profile-img {
                width: 80px;
                height: 80px;
            }
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-primary">📚 ACADEMIC BANK OF CREDITS</h2>
        <button class="btn btn-danger">Logout</button>
    </div>
    <p>Ministry of Education, Government of India</p>
        <div class="row"> 
    <div class=" d-flex">
        <img src="Upload/Passporsize.jpeg<?php //echo $pname; ?>" class="passport-photo mt-3 col-md-6 mb-4" alt="Passport Photo">   
        <div class="col-md-6 card shadow-lg p-3 mb-5 bg-body rounded gradient-card" style="margin-left: 10%; margin-top: 5%;">
            <div class="card-body">
                <div style="flex: content;">
                    <h4>Name: <?php echo $fname, " ", $mname, " ", $lname, " ";?><br><br>
                        Standard : <?php echo $standard;?>
                        Mobile Number : <?php echo $mob;?><br><br>
                        Current School Name: <?php echo $cschool;?><br><br>
                        Gr. Number : <?php echo $grno;?><br><br>
                        Email Id: <?php echo $email;?></h4><br><br>
                        <img src="Upload/Passporsize.jpeg<?php //echo $pname; ?>" class="passport-photo mt-3 col-md-6 mb-4" alt="Passport Photo">
                </div>
            </div>
        </div>
    </div>     
    </div>
    <div class="card p-4">
        <div class="d-flex align-items-center">
            <img src="Upload/Passporsize.jpeg" class="profile-img me-3" alt="Profile Image">
            <div>
                <h4>Hello, <strong><?php echo $result['fname'] . " " . $result['lname']; ?></strong></h4>
                <p class="credit-points text-primary">225</p>
                <small>Total Academic Credit Points</small>
            </div>
        </div>

        <!-- ABC ID Card -->
        <div class="abc-card mt-3">
            <h5>ACADEMIC BANK OF CREDITS</h5>
            <p>APAAR ID</p>
            <h3><?php echo $result['mob']; ?></h3>
            <p><?php echo $result['fname'] . " " . $result['lname']; ?></p>
        </div>
    </div>

    <div class="mt-4">
        <h5>Credit Points Accumulation</h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>S.No.</th>
                        <th>Academic Institution</th>
                        <th>Course</th>
                        <th>Session</th>
                        <th>Credit Points</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>VEER NARMAD SOUTH GUJARAT UNIVERSITY, SURAT</td>
                        <td>BACHELOR OF COMPUTER APPLICATION</td>
                        <td>2022-2023</td>
                        <td>752</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>VEER NARMAD SOUTH GUJARAT UNIVERSITY, SURAT</td>
                        <td>BACHELOR OF COMPUTER APPLICATION</td>
                        <td>2023-2024</td>
                        <td>184</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        <h5>Credit Points Transfer History</h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>S.No.</th>
                        <th>Request Date</th>
                        <th>Transfer Date</th>
                        <th>Beneficiary Institution</th>
                        <th>Redeemer Institution</th>
                        <th>Credit Points</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" class="text-center">No Records Found</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
