<?php include 'inc/header.php';?>

	<section class="section-container text-center">
		<section class="section-container box-shadow">
		
			<div id="login">
				<h1>Registration</h1>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						$handle = $fm->validation($_POST['handle']);
						$email     = $fm->validation($_POST['email']);
						$password= $fm->validation(md5($_POST['pass']));

					
						
						$handle = mysqli_real_escape_string($db->link, $handle);
						$email     = mysqli_real_escape_string($db->link, $email);
						$password = mysqli_real_escape_string($db->link, $password);
						
						
						if(empty($handle) || empty($email) || empty($password))
						{
							echo "<span class='error'>Field must not be empty !!</span>";
						} 
						else 
						{
							$query = "insert into user(handle,  email, password) values('$handle', '$email', '$password')";
							$userinsert = $db->insert($query);
							if($userinsert)
							{
								echo "<span style='color:green;font-size:18px;'>Resistration Successfully !!</span>";
							} 
							else 
							{
								echo "<span style='color:red;font-size:18px;'>Resistration Successfully  !!</span>";
							}
						}
						
					}
				 ?>
				 <form action="" method="post">
				<!--<div class="row">
					<div class="input-group mb-3">
						<span class="input-group-text" id="inputGroup-sizing-default">First name</span>
						<input type="text" name="fname" class="form-control" aria-label="Sizing example input"
							aria-describedby="inputGroup-sizing-default">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="inputGroup-sizing-default">Last name</span>
						<input type="text" name="lname" class="form-control" aria-label="Sizing example input"
							aria-describedby="inputGroup-sizing-default">
					</div>
				</div>-->
				<div class="input-group mb-3">
					<span class="input-group-text" id="inputGroup-sizing-default">Handle</span>
					<input type="text" name="handle" class="form-control" aria-label="Sizing example input"
						aria-describedby="inputGroup-sizing-default">
				</div>

				<div class="input-group mb-3">
					<span class="input-group-text" id="inputGroup-sizing-default">Email</span>
					<input type="email" name="email" class="form-control" aria-label="Sizing example input"
						aria-describedby="inputGroup-sizing-default">
				</div>
				
				<!--<div class="input-group mb-3">
					<span class="input-group-text" id="inputGroup-sizing-default">Contact</span>
					<input type="text" name="con" class="form-control" aria-label="Sizing example input"
						aria-describedby="inputGroup-sizing-default">
				</div>-->
				
				<div class="input-group mb-3">
					<span class="input-group-text" id="inputGroup-sizing-default">Password</span>
					<input type="password" name="pass" class="form-control" aria-label="Sizing example input"
						aria-describedby="inputGroup-sizing-default">
				</div>


				<!--<fieldset class="row mb-3">
					<legend class="col-form-label col-sm-2 pt-0">Gender</legend>
					<div class="col-sm-10">
						<div class="form-check">
							<input class="form-check-input" name="gender" type="radio" name="gridRadios" id="gridRadios1"
								value="Male" checked>
							<label class="form-check-label" for="gridRadios1">
								Male
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" name="gender" type="radio" name="gridRadios" id="gridRadios2"
								value="Female">
							<label class="form-check-label" for="gridRadios2">
								Female
							</label>
						</div>
					</div>
				</fieldset>
				<fieldset class="row mb-3">
					<legend class="col-form-label col-sm-2 pt-0">Division</legend>
					<div class="div-half-width">
						<select id="select" name="div">
							<option value="Barishal">Barishal</option>
							<option value="Chittagong">Chittagong</option>
							<option value="Dhaka">Dhaka</option>
							<option value="Dinajpur">Dinajpur</option>
							<option value="Khulna">Khulna</option>
							<option value="Maymansingh">Maymansingh</option>
							<option value="Rajshahi">Rajshahi</option>
							<option value="Rangpur">Rangpur</option>
						</select>

					</div>
				</fieldset>-->

			
				<input type="Submit" class="btn btn-dark btn-lg px-5">
				</form>
			</div>
		</section> 
</section>



<?php include 'inc/footer.php';?>   