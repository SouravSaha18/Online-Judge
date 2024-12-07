<?php include 'inc/header.php';?>
    <main>
        <section class="width mb-5 mt-3">
		<form action="submit.php" method="post">
            <section class="text-center">
			<?php
				if(!isset($_GET['id']) || $_GET['id']==NULL){
						echo "something wrong";
					} else{
						$id = $_GET['id'];
					}
					$query = "select * from problemset where id=$id";
					$post= $db->select($query);
					if($post)
					{
						while($result= $post->fetch_assoc()){
				?>
                <div>
                    <h2><?php echo $result['name']; ?></h2>


                </div>
				
                <div>
                    <p><?php echo $result['setter']; ?></p>
                    <p>Time limit:199923923</p>
                </div>
            </section>
            <section>
                <div>
                    <p><?php echo $result['description']; ?></p>
                </div>
            </section>
            <section>
                <h5>Example</h5>
                <section class="border ps-2 ">
                    <div class="border-bottom">
					<pre>
						<h5>Input</h5>
                        <h5><?php echo $result['input']; ?></h5>
						</pre>
                    </div>
                    
                    <div class="border-bottom">
					<pre>
					<h5>Output</h5>
                        <h4><?php echo $result['output']; ?></h4>
						</pre>
                    </div>
                    
					
					<?php } } ?>
					
                </section>
            </section>
            <div class="my-3">
                <button class="btn btn-lg btn-primary px-5">Submit</button>
            </div>
			</form>
        </section>
		
    </main>

	
    <?php include 'inc/footer.php';?> 