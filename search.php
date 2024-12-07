<?php include "inc/header.php";?>
<?php 
	if(!isset($_GET['search']) || $_GET['search'] == NULL)
	{
		header("Location: 404.php");
	}
	else
	{
		$search = $_GET['search'];
	}
?>

<main>
   <section class="problem-section">
		<section class="problem-container border rounded-top mb-5">
			<?php
					$query = "select * from user where handle like '%$search%' ";
					$post = $db->select($query);
					if($post)
					{
						while($result = $post->fetch_assoc())
						{
						
			?>
				<div>
					<h3><a href="profile.php?id=<?php echo $result["id"];?>"><?php echo $result["handle"];?></a></h3>
					
						<!--<a href="profile.php?id=<?php echo $result["id"];?>">View Profile</a>-->
					
				</div>
				<?php 
						}
					}
					else 
					{
				?>
					<div class="text-danger">
					<h3> Your Search Query Not Found !! </h3>
					</div>
				<?php 
					} 
				?>
			</section>
	   
		<?php include 'inc/sidebar.php';?> 
	   </section>
    </main>


  <?php include 'inc/footer.php';?>   