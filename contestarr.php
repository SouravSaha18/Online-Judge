<?php include 'inc/header.php';?>

    <main>
       <section class="section-container text-center">
            <section class="section-container box-shadow">
			
                <div id="login">
                    <h1>Contest Discription</h1>
					<?php
						if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$name  = mysqli_real_escape_string($db->link, $_POST['name']);
							$organizer    = mysqli_real_escape_string($db->link, $_POST['organizer']);
							$No_of_Problem   = mysqli_real_escape_string($db->link, $_POST['No_of_Problem']);
							$length   = mysqli_real_escape_string($db->link, $_POST['length']);
							$date = mysqli_real_escape_string($db->link, $_POST['date']);
							
							
							
							if($name == "" || $organizer == "" || $No_of_Problem == "" || $length == "" || $date == ""){
								echo "<span class='error'>Field must not be empty !!</span>";
							}else{
								$query= "select * from contest where name='$name' limit 1";
								$post= $db->select($query);
								if($post!=false){
									echo "<span style='color:red;font-size:18px;'>Contest name already exist  !!</span>";
								} else{
								
									$query = "INSERT INTO contest(name, organizer, No_of_Problem, length, date) VALUES('$name', '$organizer', '$No_of_Problem', '$length', '$date')";
									$inserted_rows = $db->insert($query);
									$query = "select * from contest where name='$name'";
									$category = $db->select($query);
									if ($inserted_rows) {
										while($result = $category->fetch_assoc()){
											?>
									<a href="problemselect.php?id=<?php echo $result['id']; ?>">Click here to set up a problem</a> 
									<?php 
										}
									} else {
										echo "<span style='color:red;font-size:18px;'>Something Went Wrong !</span>";
									}
								}
							}
						}
					?>	
					
					<form action="" method="post">
                    <div class="row">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Contest Title</span>
                            <input type="text" name="name" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Organizer</span>
                            <input type="text" name="organizer" readonly value="<?php echo session::get('handle'); ?>" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">No of Problem</span>
                        <input type="number" name="No_of_Problem" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Length</span>
                        <input type="text" name="length" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
					
					
					
					<!--<div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Problem Set</span>
                        <select class="select" name="pb">
							<option>Select Problem</option>
							<?php
								$query = "select * from prbcontest";
								$category = $db->select($query);
								if($category){
									while($result = $category->fetch_assoc()){
							?>
							<option value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
							<?php } } ?>
						</select> 
                    </div> -->
					
					<div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Date</span>
                        <input type="datetime-local" name="date" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
					
                    

                    <input type="submit" name="submit" Value="Save" class="btn btn-dark btn-lg px-5">
					</form>
					
                </div>
            </section>
        </section>
    </main>


  <?php include 'inc/footer.php';?> 