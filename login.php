<?php 
	include 'lib/session.php';
	Session::checklogin() ;
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
					<?php
						if(isset($_GET['action']) && $_GET['action'] == "logout"){
							session::destroy();
						}
					?>
                        
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
						$handle= $fm->validation($_POST['handle']);
						$password= $fm->validation(md5($_POST['password']));
					
						$handle = mysqli_real_escape_string($db->link, $handle);
						$password = mysqli_real_escape_string($db->link, $password);
						
						$query = "select * from user where handle='$handle' and password='$password'";
						$result = $db->select($query);
						if($result!= false){
							$value = $result->fetch_assoc();
								session::set("login", true);
								session::set("handle", $value['handle']);
								session::set("id", $value['id']);
								echo "<script>window.location = 'index.php';</script>"; 
							
						} else {
							echo "<span style='color:red;font-size:18px;'> handle or password Invalid !!..</span>";
						}
					}
				?>
					<form action="login.php" method="post">
                    <h1>Login</h1>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text">@</span>
                        <div class="form-floating">
                            <input type="text" name="handle" class="form-control" id="floatingInputGroup1" placeholder="Handle">
                            <label for="floatingInputGroup1">Handle</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3 mt-3 fs-5">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
					
					<h5 id="inline"><a href="forgetpass.php">Forget Password?</a></h5>


                    <br>
					<h2 id="inline">Don't Have account?</h2>
                    <a href="signup.php">Sign Up</a><br><br>
                    <input type="submit" value="login" class="btn btn-dark btn-lg px-5">
					</form>
                </div>
            </section>
        </section>
    </main>


  <?php include 'inc/footer.php';?>   
