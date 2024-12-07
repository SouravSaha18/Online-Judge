<?php 
	include 'lib/session.php';
	session::checkSession();
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
                <a class="navbar-brand fs-1 fw-bold" href="index.php"><span class="text-warning">BU</span>Judge</a>
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
                        <div>
                            <a href="profile.php?id=<?php echo session::get('id'); ?>"><?php echo session::get('handle');?></a>
                        </div>
                        <div>
                            <p> || </p>
                        </div>
                        <div> <a onclick="return confirm('Are you sure to LOG OUT??');" href="?action=logout">Logout</a>
                        </div>
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
                            <li class="nav-item pe-5 table-hover">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item pe-5">
                                <a class="nav-link " href="problemset.php">Problems</a>
                            </li>
                            <li class="nav-item pe-5">
                                <a class="nav-link" href="contestlist.php">Contests</a>
                            </li>
                            <li class="nav-item pe-5">
                                <a class="nav-link" href="">Rating</a>
                            </li>
                            <li class="nav-item pe-5">
                                <a class="nav-link" href="tutorials.php">Tutorials</a>
                            </li>
							<li class="nav-item pe-5">
                                <a class="nav-link" href="userlist.php">Userlist</a>
                            </li>
                            

                        </ul>


                    </div>
                    <div>
                        <form action="search.php" method="get">
                            <!-- <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="search" name="" id="" placeholder=""> -->
                            <input type="text" name="search" class="icon" value placeholder="Search">
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