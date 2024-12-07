<?php include 'inc/header.php';?>

<?php
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		echo "<script>window.location = 'contestsrr.php';</script>"; 
		
	} else {
		$postid = $_GET['id'];
	}
?>

    <main>
       <section class="problem-section">
	   <section class="problem-container border rounded-top mb-5">
			<div id="login">
                    <h1>Problem No</h1>
					<?php
						if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
							
							$con = $fm->validation($_POST['con']);
							
							$con = mysqli_real_escape_string($db->link, $con);
							$query= "select * from prbcontest where id='$con'";
								$post= $db->select($query);
								while($result= $post->fetch_assoc()){
									$name = $result['name'];
									$rating = $result['rating'];
									$description = $result['description'];
									$input = $result['input'];
									$output = $result['output'];
									$setter = $result['setter'];
									
								$query = "insert into problemset(name, rating, description,  input, output,  cid, setter, ck) values('$name', '$rating', '$description', '$input', '$output', '$postid', '$setter', '1')";
								$userinsert = $db->insert($query);
								if($userinsert){
									echo "<span style='color:green;font-size:18px;'>Problem Set Successfully !!</span>";
								} else {
									echo "<span style='color:red;font-size:18px;'>Problem not Set Successfully  !!</span>";
								}
								}
						}
							
						
					 ?>
					<?php
					$query= "select * from contest where id='$postid' order by id desc";
					$post= $db->select($query);
					while($postresult= $post->fetch_assoc()){
				?>
					 <form action="" method="post">
                    <div class="row">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Contest name</span>
                            <input type="text" name="name" readonly value="<?php echo $postresult['name'] ?>" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                    

					
					
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Problem</span>
                        <select id="select" name="con">
							<option>Select Problem no</option>
							<?php
								$query = "select * from prbcontest";
								$category = $db->select($query);
								if($category){
									while($result = $category->fetch_assoc()){
							?>
							<option value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
							<?php } } ?>
						</select> 
                    </div> 
					
					


                    

                
                    <input type="submit" name="submit" Value="Save" class="btn btn-dark btn-lg px-5">
					</form>
					<?php } ?>
                </div>
			
	   </section>
	   
	
	   </section>
    </main>


  <?php include 'inc/footer.php';?>   