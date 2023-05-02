<?php

	// Login
	
	if(isset($_POST['loginSubmit'])) { 
		session_start();
		$email1 = $_POST['emailvar'];
		$password1 = $_POST['passwordvar'];
		$conn = new mysqli('fdb1028.awardspace.net','3306','Yv3rd0nD3P3st@l0zz!','4299657_ydpbmsdatabase');
		if ($conn->connect_error) {
			echo "$conn->connect_error";
			die("Connection Failed : ". $conn->connect_error);
		}
		else {
			$stmt = $conn->prepare("select * from users where email = ? and password = ?");
			$stmt->bind_param("ss", $email1, $password1);
			$stmt->execute();
			$stmt_result = $stmt->get_result();
			if ($stmt_result->num_rows == 1) {
				header('Location: http://localhost/Testing%20Environment/YBMS-Main/Home.html');
			}
			else if ($stmt_result->num_rows == 0 && ($email1 != null || $password1 != null)) {
				echo '<script type="text/javascript">
					alert("The email or password is incorrect.");
				</script>';
			}
			$stmt->close();
			$conn->close();
			exit;
		}
	}
?>

<?php

	// Registration

	if(isset($_POST['registerSubmit'])) {
		$fname2 = $_POST['fname2'];
		$lname2 = $_POST['lname2'];
		$grade2 = $_POST['grade2'];
		$section2 = $_POST['section2'];
		$email2 = $_POST['email2'];
		$password2 = $_POST['password2'];
		$confirm2 = $_POST['confirm2'];
		$terms2 = $_POST['terms2'];
		$conn = new mysqli('fdb1028.awardspace.net','3306','Yv3rd0nD3P3st@l0zz!','4299657_ydpbmsdatabase');
		if ($conn->connect_error) {
			echo "$conn->connect_error";
			die("Connection Failed : ". $conn->connect_error);
		}
		else {
			if ($grade2 > 12 || $grade < 1) { 
				echo '<script type="text/javascript"> alert("The grade level is invalid."); </script>';
				exit;
			}
			$stmt = $conn->prepare("select email from users where email = ?"); 
			$stmt->bind_param("s", $email2); 
			$stmt->execute(); 
			$stmt_result = $stmt->get_result();
			if ($stmt_result->num_rows > 0) { 
				echo '<script type="text/javascript"> alert("Email is already used."); </script>';
				exit;
			}
			$stmt = $conn->prepare("select lname from users where fname = ? and lname = ?"); 
			$stmt->bind_param("ss", $fname2, $lname2); 
			$stmt->execute(); 
			$stmt_result = $stmt->get_result();
			if ($stmt_result->num_rows > 0) { 
				echo '<script type="text/javascript"> alert("The combination of names are already used."); </script>';
				exit;
			}
			$stmt = $conn->prepare("select password from users where password = ?"); 
			$stmt->bind_param("s", $password2); 
			$stmt->execute(); 
			$stmt_result = $stmt->get_result();
			if ($stmt_result->num_rows > 0) { 
				echo '<script type="text/javascript"> alert("Password is already used."); </script>';
				exit;
			}
			if ($password2 !== $confirm2) {
				echo '<script type="text/javascript">
					alert("The passwords are not matching.");
				</script>';
			}
			if (!empty($fname2 && $lname2 && $grade2 && $section2 && $email2 && $password2 && $confirm2)) {
				$stmt = $conn->prepare("insert into users(fname, lname, grade, section, email, password, isAdmin) values(?, ?, ?, ?, ?, ?, false)");
				$stmt->bind_param("ssisss", $fname2, $lname2, $grade2, $section2, $email2, $password2);
				$stmt->execute();
				echo '<script type="text/javascript">
					alert("Registration is successful. You may now log in using the details you gave.");
				</script>';
			}
			$stmt->close();
			$conn->close();
			exit;
		}
	}
?>