<?php 
  //include header file
  include ('include/header.php');
  if(isset($_POST['submit']))
  {
	include_once ('./include/connect.php');
	$name = $_POST['name'];
	$email= $_POST['email'];
	$phone= $_POST['phone'];
	$gender= $_POST['gender'];
	$city= $_POST['city'];
	$blood_group= $_POST['blood_group'];
	$password= $_POST['password'];
	$c_password = $_POST['c_password'];
	$date= $_POST['dob'];


	if((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^[a-zA-Z0-9]*$/", $email)))
	{
		header("Location: donate.php? error=email_is_not_valid");
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../register.php?error=email is not valid");
        exit();
    }
	elseif($password != $c_password)
	{
		header("Location: donater.php?error=password doesnt match");
        exit();
	}
	else
	{
		$query = "SELECT email FROM register WHERE email =?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: donate.php?error=prepared statement error");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt); // if you need to access the information of data from data base
            $checkresult = mysqli_stmt_num_rows($stmt);

            if ($checkresult > 0) {
                header("Location: donate.php?error=user already registered");
                exit();
            }
            else{

                $query = "INSERT INTO register (name, email, phone, gender , city, blood_group, password, dob) VALUES (?, ?, '$phone' ,'$gender', '$city', '$blood_group',?,'$date')";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    header("Location: donate.php?errror=prepared statement error 2");
                    exit();
                }
                else{
                    $encpassword = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $encpassword);
                    mysqli_stmt_execute($stmt);
                    // mysqli_stmt_store_result($stmt); // not necessary
                    header("Location: signin.php?action=registration completed successfully");
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
		padding: 60px 0 40px 0;
		
	}
	.form-container{
		background-color: white;
		border: .5px solid #eee;
		border-radius: 5px;
		padding: 20px 10px 20px 30px;
		
	}
	.form-group{
		text-align: left;
	}
	h1{
		color: white;
	}
	h3{
		color: #3c7be7;
		text-align: center;
	}
	.red-bar{
		width: 25%;
	}
</style>

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>         Only donate blood once in 3 month. Take rest</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="container-fluid red-background size">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h1 class="text-center">Donate</h1>
			<hr class="white-bar">
		</div>
	</div>
</div>
<div class="container size">
	<div class="row">
		<div class="col-md-6 offset-md-3 form-container">
					<h3>SignUp</h3>
					<hr class="red-bar">
					
          <!-- Error Messages -->

				<form class="form-group" action="" method="post">
					<div class="form-group">
						<label for="fullname">Full Name</label>
						<input type="text" name="name" id="fullname" placeholder="Full Name" required pattern="[A-Za-z/\s]+" title="Only lower and upper case and space" class="form-control">
					</div><!--full name-->
					<div class="form-group">
              <label for="name">Blood Group</label><br>
              <select class="form-control demo-default" id="blood_group" name="blood_group" required>
                <option value="">---Select Your Blood Group---</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O+</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
              </select>
            </div><!--End form-group-->
					<div class="form-group">
				              <label for="gender">Gender</label><br>
				              		Male<input type="radio" name="gender" id="male" value="Male" style="margin-left:10px; margin-right:10px;" checked>
				              		Female<input type="radio" name="gender" id="female" value="Female" style="margin-left:10px;">
				    </div><!--gender-->
				    <div class="form-inline">
					<label for="date" style="display: block ;" >Date of Birth</label>

			<input type="date" id="start" name="dob" placeholder="YYYY-MM-DD">
            </div><!--End form-group-->
				    <div class="form-group">
						<label for="fullname">Email</label>
						<input type="text" name="email" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please write correct email" class="form-control">
					</div>
					<div class="form-group">
              <label for="contact_no">Contact No</label>
              <input type="text" name="phone" value="" placeholder="+977" class="form-control" required pattern="^\d{10}$" title="10 numeric characters only" maxlength="10">
            </div><!--End form-group-->
					<div class="form-group">
              <label for="city">City</label>
              <select name="city" id="city" class="form-control demo-default" required>
			  
									<option value="">select </option>
									<optgroup title="Ktm" label="&raquo; KAthmandu"></optgroup>
									<option value="Balaju" >Balaju</option>
									<option value="Banasthali" >Banasthali</option>
									<option value="Kritipur" >Kritipur</option>
								</select>
	
            </div><!--city end-->

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" value="" placeholder="Password" class="form-control" required pattern="{6,}">
            </div><!--End form-group-->

            <div class="form-group">
              <label for="password">Confirm Password</label>
              <input type="password" name="c_password" value="" placeholder="Confirm Password" class="form-control" required pattern="{6,}">
            </div><!--End form-group-->

            <div class="form-inline">
              <input type="checkbox" name="term" value="true" required style="margin-left:10px;">
              <span style="margin-left:10px;"><b>I agree all above condition</b></span>
            </div><!--End form-group-->
			
					<div class="form-group">
						<button id="submit" name="submit" type="submit" class="btn btn-lg btn-danger center-aligned" style="margin-top: 20px;">SignUp</button>
					</div>
					<div class="signin">Already have an account?
                    <a href="signin.php">Sign in</a></div>
				</form>
		</div>
	</div>
</div>
