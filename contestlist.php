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
                    <th class="border py-2">Contest No.</th>
                    <th class="border py-2" colspan="2" id="cell23">Contest Name</th>
                    <th class="border py-2">Organizer</th>
                    <th class="border py-2">No of Problems</th>
					<th class="border py-2">Duration</th>
					<th class="border py-2">Date</th>
                </tr>
				
				<!---pagination-->
					<?php
						$per_page = 5;
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
					$query = "select * from contest order by id desc limit $start_for, $per_page";
					$post= $db->select($query);
					if($post)
					{
						$i=0;
						while($result= $post->fetch_assoc()){
							$i++;
				?>
                <tr class="py-2">
                    <th class="border py-2"> <a class="text-primary" href="contestset.php?cid=<?php echo $result['id'];?>"><?php echo $i; ?></a></th>
                    <th class="border py-2 text-start ps-2" colspan="2" id="cell23"><a href="contestset.php?cid=<?php echo $result['id'];?>"><?php echo $result['name']; ?></a></th>
                    <th class="border py-2"><a class="text-primary" href="#"><?php echo $result['organizer'];?></a> </th>
                    <th class="border py-2 "> <a class="text-primary" href="contestset.php?cid=<?php echo $result['id'];?>"><?php echo $result['No_of_Problem']; ?></a> </th>
					<th class="border py-2 "><?php echo $result['length']; ?></th>
					<th class="border py-2 "> <?php echo $result['date']; ?></th>
                </tr>
                
                
                <?php } } ?>	

            </table>


        </section>
        <?php include 'inc/sidebar.php';?> 
    </section>

   <!---pagination-->
			<?php 
				$query = "select * from contest";
				$result = $db->select($query);
				$total_rows = mysqli_num_rows($result);
				$total_pages = ceil($total_rows/$per_page);

				echo "<span class ='pagination' ><a href='userlist.php?page=1'>".'First Page'."</a>" ;
				for($i=1; $i<=$total_pages; $i++)
				{
					echo "<a href='contestlist.php?page=".$i."'> ".$i." </a>";
				};
				echo "<a href='contestlist.php?page=$total_pages'>".'Last Page'."</a></span>"
			?>
	<!---pagination-->

    <?php include 'inc/footer.php';?>   