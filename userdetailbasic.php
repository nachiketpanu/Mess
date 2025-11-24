<?php 
// require_once 'conn.php';

// if(empty($_SESSION)){
//     header("location:login.php");
// }

// $fname = $_SESSION['userid'];

// echo $fname;

// $sql = "select * from student  where fname = :fname";

// $query = $conn -> prepare($sql);

// $query -> bindParam(':fname',$fname);

// if($query -> execute()){
//     $row = $query -> fetchAll(PDO::FETCH_ASSOC);
//     foreach($row as $result){
//         $mname = $result['mname'];
//         $lname = $result['lname'];
//         $standard = $result['standard'];
//         $mob = $result['mob'];
//         $cschool = $result['cschool'];
//         $aschool = $result['aschool'];
//         $grno =$result['grno'];
//         $email = $result['email'];
//     }
// }else{
//     echo "Record is not found";
// }
//     echo $fname;
//     echo $mname;
//     echo $lname;
//     echo $standard;
//     echo $mob;
//     echo $cschool;
//     echo $aschool;
//     echo $grno;
//     echo $email;
?>
<?php
require_once 'conn.php';

if(isset($_POST['submit'])){

    $userid = $_POST['userid'];
    $pass = $_POST['pass'];

    if(!empty($userid) && !empty($pass)){

        $sql = "select * from student where userid = :userid";

        if($sql){
            
            $query = $conn -> prepare($sql);

            $query -> bindParam(':userid', $userid, PDO::PARAM_STR);

            $query->execute();

            $row = $query -> fetchAll(PDO::FETCH_ASSOC); 
            if ($row) { 

				if ($password == $row['pass']) {
					$_SESSION['userid'] = $row['fname'];
					echo "<script>alert('Login Success! Welcome " . $_SESSION['userid'] . "');
                    window.location.href='UserDetails.php';</script>";
				} else if($sql2 = "select * from school where userid = :userid") {

					$query2 = $conn -> prepare($sql2);

            		$query2 -> bindParam(':userid', $userid, PDO::PARAM_STR);

            		$query2->execute();

            		$row2 = $query2 -> fetchAll(PDO::FETCH_ASSOC); 

            		if ($row2) {
						if ($password == $row['pass']) {
							$_SESSION['userid'] = $row2['fname'];
							echo "<script>alert('Login Success! Welcome " . $_SESSION['userid'] . "');
                    		window.location.href='UserDetails.php';</script>";
						} else {
							echo "<script>alert('Login Failed! Incorrect password of school.');</script>";
            			}
            		}else if($sql3 = "select * from developer where userid = :userid"){
                		$query3 = $conn -> prepare($sql3);

            			$query3 -> bindParam(':userid', $userid, PDO::PARAM_STR);

            			$query3->execute();

            			$row = $query3 -> fetchAll(PDO::FETCH_ASSOC); 

            			if ($row) {
							if ($password == $row['pass']) {
							$_SESSION['userid'] = $row['fname'];
							echo "<script>alert('Login Success! Welcome " . $_SESSION['userid'] . "');
                    		window.location.href='UserDetails.php';</script>";
						} else {
							echo "<script>alert('Login Failed! Incorrect password of developer.');</script>";
            			}
            		}else{
                		echo "<script>alert('Login Failed! developer not found.');</script>";
            		}
						
            	}else{
					echo "<script>alert('Login Failed! School not found.');</script>";
				}    
			}else{
				echo "<script>alert('Login Failed! Incorrect password of user.');</script>";
			}
		}else{
			echo "<script>alert('Login Failed! User not found.');</script>";
		}
          
    }else{
		echo "<script>alert('Please Fill Filed!');</script>";
	}
}
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login page</title>
	<link rel="stylesheet" href="bootstrap-5.3.2-dist\css\bootstrap.min.css">
	<style>
		.h1{
			color:blue;
		}
	</style>
</head>
<body class="img"> 
	<div class="bg-primary">
        <img src="bird2.png" style="height:10%; width:10%;">
        <img src="img2.jfif" style="margin-left: 80%; height: 10%; width: 5%;">
    </div>
	
	<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4 mx-5 my-5">
	<div class="card">
	<form class="blure" method="post">
	<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<h1 class="h1">Login</h1></div><div class="col-sm-4"></div></div><br><br>
		<label class="mx-5">User Name:-</label>
		<input type="text" name="userid"><br><br>
		<label class="mx-5"> Password :- </label>
		<input type="password" name="pass"><br><br>
		<a href="ApplicationForm.php" class="mx-5">if you not ragistions</a><br><br>
		<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
		<input class="d-grid gap-2 col-6 mx-5 btn btn-primary" name="submit" type="submit" value="submit"></div><div class="col-sm-4"></div></div><br><br>
	</form>
</div>
</div>
</div><div class="col-sm-4"></div>
</body>		
</html>