<?php 

	//include header file
	include ('include/header.php');

?>


<div class="container-fluid header-img">
				<div class="row">
					<div class="col-md-6 offset-md-3">

						<div class="header">
							<h1 class="text-center">Donate the blood</h1>
						<p class="text-center">Be the reason for someone's heartbeat.</p>
						</div>


						<h1 class="text-center">Search The Donors</h1>
						<hr class="white-bar text-center">

						<form action="#" method="get" class="form-inline text-center" style="padding: 40px 0px 0px 5px;">
							<div class="form-group text-center justify-content-center">
							
								<select style="width: 220px; height: 45px;" name="city" id="city" class="form-control demo-default" required>
								<label for="city">City</label>
								
									<option value="">select city</option>
									<optgroup title="Ktm" label="&raquo; Kathmandu"></optgroup>
									<option value="Balaju" >Balaju</option>
									<option value="Banasthali" >Banasthali</option>
									<option value="Kritipur" >Kritipur</option>
								</select>
							</div>
							<div class="form-group center-aligned">
								<select name="blood_group" id="blood_group" style="padding: 0 20px; width: 220px; height: 45px;" class="form-control demo-default text-center margin10px">
								<option value="">select blood grp</option>
									<option value="A+">A+</option>
									<option value="A-">A-</option>
									<option value="B+">B+</option>
									<option value="B-">B-</option>
									<option value="AB+">AB+</option>
									<option value="AB-">AB-</option>
									<option value="O+">O+</option>
									<option value="O-">O-</option>

								</select>
							</div>
							<div class="form-group center-aligned">
								<button type="submit" class="btn btn-lg btn-danger">Search</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- header ends -->

			<!-- donate section -->
			<div class="container-fluid red-background">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center"  style="color: white; font-weight: 700;padding: 10px 0 0 0;">Donate The Blood</h1>
						<hr class="white-bar">
						<p class="text-center pera-text">
						Eliminate blood scarcity in NEPAL
						</p>
						<a href="#" class="btn btn-default btn-lg text-center center-aligned">Save life, Be a Hero</a>
					</div>
				</div>
			</div>
			<!-- end doante section -->
			

			


			<!-- end aboutus section -->


<?php
//include footer file
include ('include/footer.php');
 ?>