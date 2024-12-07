<?php 
	include 'lib/session.php';
	session::init();
?>

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
				<?php
						if($_SERVER['REQUEST_METHOD'] == 'POST'){
							
							$email= $fm->validation($_POST['email']);
							$email = mysqli_real_escape_string($db->link, $email);
							if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
								echo "<span style='color:red;font-size:18px;'> Invaild Email Address !!..</span>";
							} else {
								$mailquery= "select * from user where email='$email' limit 1";
								$mailcheck = $db->select($mailquery);
								if($mailcheck!= false){
									while($value = $mailcheck->fetch_assoc()){
										$id = $value['id'];
										$handle = $value['handle'];
									}
									$text = substr($email, 0, 3);
									$rand = rand(10000, 99999);
									$newpass = "$text$rand";
									$password = md5($newpass);
									$upquery = "update tbl_user set password='$password' where id='$id'";
									$updated_rows = $db->update($upquery);
									
									$to = $email;
									$from = "sourav.cse6.bu@gmail.com";
									
									$headers = "From: $from\n";
									$headers =	'MIME-Version: 1.0' . "\r\n" ;
									$headers .=	'Content-type: text/html; charset=iso-8859-1' . "\r\n";
									$subject = "Your Password:";
									$message = "Your handle is ".$handle." and Your new Password is ".$newpass." Please Visit the Website for Login";
									$sendmail = mail($to, $subject, $message, $headers);
									if($sendmail){
										echo "<span style='color:red;font-size:18px;'> Please check Your Email for new Password !!..</span>";
									} else {
										echo "<span style='color:red;font-size:18px;'> Email not Exist !!..</span>";
									}
									
								} else {
									echo "<span style='color:red;font-size:18px;'> Email not Exist !!..</span>";
								}
							}
						}
					?>
					<form action="" method="post">
                    <h1>Password Recovery</h1>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text">@</span>
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control" id="floatingInputGroup1" placeholder="Enter Valid Email">
                            <label for="floatingInputGroup1">Email</label>
                        </div>
                    </div>
                    
					
					


                    
                    <input type="submit" value="Sent Mail" class="btn btn-dark btn-lg px-5">
					</form>
                </div>
            </section>
        </section>
    </main>


  <?php include 'inc/footer.php';?>   
