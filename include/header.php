<!DOCTYPE html>
	<head>
		<title>Egov Project</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Blood Donation Website name OneBLood">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
        <script src="https://kit.fontawesome.com/6ea87cb186.js" crossorigin="anonymous"></script>
	</head>
<body>
<nav id="mainNav" class="navbar fixed-top navbar-default navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./index.php">ONEBLOOD</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      
    </ul>
    
    <ul class="navbar-nav  my-2 my-lg-0 mr-auto">

    <li class="nav-item">
        <a class="nav-link" href="index.php"> Home </a>
      </li>

      
      
      <li class="nav-item">
        <a class="nav-link" href="reqblood.php"> Request Blood</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="about.php">About Us</a>
      </li>
    <?php if(!isset($_SESSION['email'])) { ?>
        <li class="nav-item">
        <a class="nav-link" href="donate.php"> Be a Donor </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="signin.php">Signin</a>
      </li>
      <?php }
      else {
        ?>
         <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          User<!-- Donor Name -->
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          
          <a class="dropdown-item" href="profile.php"> Profile</a>

          <a class="dropdown-item" href="update.php"> Update Profile</a>

          <a class="dropdown-item" href="logout.php"> Logout</a>
          </div>
      </li>  
     
    
        <?php }?>
     


    </ul>
  </div>
</nav>