<?php include 'inc/header.php';?>
<style>
.pagination{
	display: block; 
	font-size: 20px; 
	margin-top:10px; 
	padding: 10px; 
	text-align: center; 
}
.pagination a{
	background:#969393 none repeat scroll 0 0;
	border: 1px solid #5c5959;
	border-radius: 3px;
	color: #333;
	margin-left:3px;
	padding: 2px 10px; 
	text-decoration: none; 
}
.pagination a:hover{
	background:#272727 none repeat scroll 0 0;
	color: #fff;
}

</style>
    

    <section class="problem-section">
        <section class="problem-container border rounded-top mb-5">

            <table class="w-100" style=" text-align : center; ">
                <tr class="py-2">
                    <th class="border py-2">ID</th>
                    <th class="border py-2">Name</th>
                </tr>
				
				<!---pagination-->
					<?php
						$per_page = 3;
						if(isset($_GET["page"]))
						{
							$page = $_GET["page"];
						}
						else
						{
							$page = 1;
						}
						$start_for = ($page-1) * $per_page;
					?>
				<!---pagination-->
				
				<?php
					$query = "select * from user limit $start_for, $per_page";
					$post= $db->select($query);
					if($post)
					{
						while($result= $post->fetch_assoc()){
				?>
				
                <tr class="py-2">
                    
                    <th class="border py-2"><a href="profile.php?id=<?php echo $result['id']; ?>"><?php echo $result['id']; ?></th>
                    <th class="border py-2"><a href="profile.php?id=<?php echo $result['id']; ?>"><?php echo $result['handle']; ?></th>
                </tr>
                
				<?php } } ?>
				
            </table>

        </section>
		 <?php include 'inc/sidebar.php';?>
    </section>
	
   <!---pagination-->
			<?php 
				$query = "select * from user";
				$result = $db->select($query);
				$total_rows = mysqli_num_rows($result);
				$total_pages = ceil($total_rows/$per_page);

				echo "<span class ='pagination' ><a href='userlist.php?page=1'>".'First Page'."</a>" ;
				for($i=1; $i<=$total_pages; $i++)
				{
					echo "<a href='userlist.php?page=".$i."'> ".$i." </a>";
				};
				echo "<a href='userlist.php?page=$total_pages'>".'Last Page'."</a></span>"
			?>
	<!---pagination-->
		
        

    <?php include 'inc/footer.php';?>   