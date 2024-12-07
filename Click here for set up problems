<?php include 'inc/header.php';?>

    <main>
       <section class="problem-section">
	   <section class="problem-container border rounded-top mb-5">
			<div id="login">
                    <h1>Problem No</h1>
					<?php
						if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$name = $fm->validation($_POST['name']);
							$rating = $fm->validation($_POST['rating']);
							$description = $fm->validation($_POST['description']);
							$input     = $fm->validation($_POST['input']);
							$output     = $fm->validation($_POST['output']);
							$ck     = $fm->validation($_POST['ck']);
							$setter     = $fm->validation($_POST['setter']);
						
							$name = mysqli_real_escape_string($db->link, $name);
							$rating = mysqli_real_escape_string($db->link, $rating);
							$description = mysqli_real_escape_string($db->link, $description);
							$input     = mysqli_real_escape_string($db->link, $input);
							$output = mysqli_real_escape_string($db->link, $output);
							$ck = mysqli_real_escape_string($db->link, $ck);
							$setter     = mysqli_real_escape_string($db->link, $setter);
							
							if(empty($name) || empty($rating) || empty($description) || empty($input) || empty($output) || empty($setter)){
								echo "<span class='error'>Field must not be empty !!</span>";
							} else {
								$query= "select * from problemset where name='$name' limit 1";
								$post= $db->select($query);
								if($post!=false){
									echo "<span class='error'>Problem name already exist  !!</span>";
								}  else{
								if($ck==0){
								$query = "insert into problemset(name, rating, description,  input, output,  cid, setter, ck) values('$name', '$rating', '$description', '$input', '$output', '0', '$setter', '$ck')";
								$userinsert = $db->insert($query);
								if($userinsert){
									echo "<span style='color:green;font-size:18px;'>Problem Set Successfully !!</span>";
								} else {
									echo "<span style='color:red;font-size:18px;'>Problem not Set Successfully  !!</span>";
								}
								}
								else {
									$query = "insert into prbcontest(name, rating, description,  input, output, setter, ck) values('$name', '$rating', '$description', '$input', '$output', '$setter', '$ck')";
								$usinsert = $db->insert($query);
								if($usinsert){
									echo "<span style='color:green;font-size:18px;'>Problem Set Successfully !!</span>";
								} else {
									echo "<span style='color:red;font-size:18px;'>Problem not Set Successfully  !!</span>";
								}
								}
								}
							}
						}
					 ?>
					 <form action="" method="post">
                    <div class="row">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Problem name</span>
                            <input type="text" name="name" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Rating</span>
                            <input type="number" name="rating" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                        <input type="text" name="description" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Input</span>
                        <input type="text" name="input" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
					
					<div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Output</span>
                        <input type="text" name="output" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
					
                    <!-- <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Contest Name</span>
                        <select id="select" name="con">
							<option>Select Contest name</option>
							<?php
								$query = "select * from contest";
								$category = $db->select($query);
								if($category){
									while($result = $category->fetch_assoc()){
							?>
							<option value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
							<?php } } ?>
						</select> 
                    </div> -->
					
					<div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Setter</span>
                        <input type="text" name="setter" readonly value="<?php echo session::get('handle'); ?>" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Check</span>
                        <select id="select" name="ck">
							
							<option value="1">For contest</option>
							<option value="0">For Practice</option>
						
						</select>
                    </div>

                
                    <input type="Submit" class="btn btn-dark btn-lg px-5">
					</form>
                </div>
			
	   </section>
	   
	
	   </section>
    </main>


  <?php include 'inc/footer.php';?>   