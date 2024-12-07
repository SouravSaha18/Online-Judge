<?php include 'helpers/format.php';?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>

<?php 
	$db=new Database();
	$fm=new format();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate"); 
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000"); 
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/6d22a805e6.js" crossorigin="anonymous"></script>
</head>

<body class="container">
    <header>
        <!-- start logo -->
        <div class=" content">
            <div>
                <i class="fa-solid fa-laptop-code fs-2"></i>
                <a class="navbar-brand fs-1 fw-bold" href="#"><span class="text-warning">BU</span>Judge</a>
            </div>
            <div>
                <form>
                    <!-- <button class="btn btn-outline-primary fw-bold py-2 px-4">ProfileName</button> -->
                    <section class="d-flex fs-4">
					
                        
                    </section>
                </form>
            </div>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button> -->

        </div>
        <!-- start navbar -->
        <section>
            <nav class="navbar navbar-expand-lg border rounded-2 bg-trasparent mt-4 mb-4">
                <div class="container-fluid ">


                    <div class="collapse navbar-collapse navbar-menubuilder" id="navbarSupportedContent">
                        <ul class="nav navbar-nav me-auto mb-2 mb-lg-0 fs-6 fw-semibold ms-5">
                            <li class="nav-item pe-5">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item pe-5">
                                <a class="nav-link" href="problemset.php">Problems</a>
                            </li>
                            <li class="nav-item pe-5">
                                <a class="nav-link" href="contest.php">Contests</a>
                            </li>
                            <li class="nav-item pe-5">
                                <a class="nav-link" href="rating.php">Rating</a>
                            </li>
                            <li class="nav-item pe-5">
                                <a class="nav-link" href="tutorials.php">Tutorials</a>
                            </li>
                            <li class="nav-item pe-5">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>

                        </ul>


                    </div>
                    <div>
                        <form>
                            <!-- <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="search" name="" id="" placeholder=""> -->
                            <input type="text" class="icon" value placeholder="Search">
                        </form>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                </div>
            </nav>
        </section>
    </header>

    <main>
        <section class="section-container text-center">
            <section class="section-container box-shadow">
			
                <div id="login">
                    <h1>Registration Form</h1>
					<?php
						if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$firstname = $fm->validation($_POST['fname']);
							$lastname = $fm->validation($_POST['lname']);
							$handle = $fm->validation($_POST['handle']);
							$email     = $fm->validation($_POST['email']);
							$password= $fm->validation(md5($_POST['pass']));
							$contact     = $fm->validation($_POST['con']);
							$gender     = $fm->validation($_POST['gender']);
							$division     = $fm->validation($_POST['div']);
						
							$firstname = mysqli_real_escape_string($db->link, $firstname);
							$lastname = mysqli_real_escape_string($db->link, $lastname);
							$handle = mysqli_real_escape_string($db->link, $handle);
							$email     = mysqli_real_escape_string($db->link, $email);
							$password = mysqli_real_escape_string($db->link, $password);
							$contact = mysqli_real_escape_string($db->link, $contact);
							$gender = mysqli_real_escape_string($db->link, $gender);
							$division     = mysqli_real_escape_string($db->link, $division);
							
							if(empty($firstname) || empty($lastname) || empty($handle) || empty($email) || empty($password) || empty($contact)){
								echo "<span class='error'>Field must not be empty !!</span>";
							} else {
								$query= "select * from user where email='$email' limit 1";
								$post= $db->select($query);
								$query1= "select * from user where handle='$handle' limit 1";
								$post1= $db->select($query1);
								if($post!=false){
									echo "<span class='error'>Email already exist  !!</span>";
								} else if($post1!=false){
									echo "<span class='error'>Handle already exist  !!</span>";
								}  else{
								$query = "insert into user(firstname, lastname, handle,  email, password,  contact, gender, division) values('$firstname', '$lastname', '$handle', '$email', '$password',  '$contact', '$gender', '$division')";
								$userinsert = $db->insert($query);
								if($userinsert){
									echo "<span style='color:green;font-size:18px;'>Resistration Successfully !!</span>";
								} else {
									echo "<span style='color:red;font-size:18px;'>Resistration Successfully  !!</span>";
								}
								}
							}
						}
					 ?>
					 <form action="" method="post">
                    <div class="row">
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
                    </div>
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
					
					<div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Contact</span>
                        <input type="text" name="con" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
					
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                        <input type="password" name="pass" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>


                    <fieldset class="row mb-3">
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
                    </fieldset>

                
                    <input type="Submit" class="btn btn-dark btn-lg px-5">
					</form>
                </div>
            </section>
        </section>

        </div>
    </main>


    
  <?php include 'inc/footer.php';?>   