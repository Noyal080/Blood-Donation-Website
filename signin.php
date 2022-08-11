<?php 

	//include header file
	include ('include/header.php');
	if(isset($_POST['signin']))
	{
		include './include/connect.php';
	
		$gemail = $_POST['email'];
		$password = $_POST['password'];
		if (empty($gemail) || empty($password)){
			header("Location: signin.php?error=fields_are_empty");
			exit();
		}

	else{
		$query = "SELECT * FROM `register` WHERE email =?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $query)) {
				header("Location: signin.php?error=prepared statement error");
				exit();
			}
		else {
				mysqli_stmt_bind_param($stmt, "s", $gemail);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if ($row = mysqli_fetch_assoc($result)) {
					$validatepassword = password_verify($password, $row['password']);

					if ($validatepassword == false ){
						header("Location: signin.php?error=password_incorrect");
						exit();
					}
					else {
						session_start();
						
						$_SESSION['gemail'] = $row['email'];
						
						header("Location: index.php?action=login successfully");
						exit();
					}
				}

		}

	}

}



?>

<style>
	.size{
		min-height: 0px;
		padding: 60px 0 60px 0;

	}
	h1{
		color: white;
	}
	.form-group{
		text-align: left;
	}
	h3{
		color: #3c7be7;
		text-align: center;
	}
	.red-bar{
		width: 25%;
		align-items: center;
	}
	.form-container{
		background-color: white;
		border: .5px solid #eee;
		border-radius: 5px;
		padding: 20px 10px 20px 30px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		-moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
	}
</style>
 <div class="container-fluid red-background size">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h1 class="text-center">SignIn</h1>
			<hr class="white-bar">
		</div>
	</div>
</div>
<div class="conatiner size ">
	<div class="row">
		<div class="col-md-6 offset-md-3 form-container">
		<h3>SignIn</h3>
		<hr class="red-bar">
		<form action="" method="post" >
		
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" placeholder="Email" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" placeholder="Password" required class="form-control">
				</div>
				<div class="form-group">
					<button class="btn btn-danger btn-lg center-aligned" type="submit" name="signin">SignIn</button>
				</div>
				<div class="signup">Don't have an account?
                    <a href="signin.php">Sign up</a></div>
               
            </div>
			</form>
		</div>
	</div>
</div>

<?php
 include 'include/footer.php'
  ?>
