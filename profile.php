<?php include 'inc/header.php'; ?>
    <main>
        <section class="problem-section ">
            <section
                class=" problem-container d-block mb-5 border-none d-flex flex-column justify-content-center align-items-center">
                <section>
                    <div class="text-center pb-5">
                        <h2>Profile</h2>
                    </div>

                </section>
                <section class=" border w-50  fw-bolder">
                    <div class="pb-2 border-bottom bg-primary bg-opacity-75">
                        <div class="text-center">Information</div>
                    </div>
					<?php
						if(!isset($_GET['id']) || $_GET['id']==NULL){
						echo "something wrong";
						} else{
							$id = $_GET['id'];
						}
						$query = "select * from user where id=$id";
						$post= $db->select($query);
						if($post)
						{
							$i=0;
							while($result= $post->fetch_assoc()){
								$i++;
					?>
                    <div class="pb-2 border-bottom bg-success bg-opacity-50 p-2"> Name: <?php echo $result['firstname']." ".$result['lastname']; ?></div>
                    <div class="pb-2 border-bottom bg-primary bg-opacity-50 p-2">Email : <?php echo $result['email']; ?></div>
                    <div class="pb-2 border-bottom bg-warning bg-opacity-50 p-2">Contact : <?php echo $result['contact']; ?></div>
					<div class="pb-2 border-bottom bg-primary bg-opacity-50 p-2">Gender : <?php echo $result['gender']; ?></div>
                    <div class="pb-2 border-bottom bg-warning bg-opacity-50 p-2">Division : <?php echo $result['division']; ?></div>
                    <div class="pb-2 border-bottom bg-success bg-opacity-50 p-2"><a href="">Edit Profile</a></div>
                    <div class="pb-2 border-bottom bg-warning bg-opacity-50 p-2"><a href="">Submissions</a></div>
					<?php } } ?>	
                </section>
            </section>
            <?php include 'inc/sidebar.php'; ?>

        </section>
    </main>
</body>
<?php include 'inc/footer.php'; ?>