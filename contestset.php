
<?php include 'inc/header.php';?>

    <main>
       <section class="problem-section">
	   <section class="problem-container border rounded-top mb-5">
			<table class="w-100" style=" text-align : center; ">
                <tr class="py-2">
                    <th class="border py-2">ID</th>
                    <th class="border py-2" colspan="2" id="cell23">Name</th>
                    <th class="border py-2">Rating</th>
                    <th class="border py-2">Setter</th>
                </tr>
				<?php
					if(!isset($_GET['cid']) || $_GET['cid']==NULL){
						echo "something wrong";
					} else{
						$cid = $_GET['cid'];
					}
					$query = "select * from problemset where cid=$cid";
					$post= $db->select($query);
					if($post)
					{
						$i=0;
						while($result= $post->fetch_assoc()){
							$i++;
				?>
                <tr class="py-2">
                    <th class="border py-2"> <a class="text-primary" href="ProblemDesk.php?id=<?php echo $result['id']; ?>"><?php echo $i; ?></a></th>
                    <th class="border py-2 text-start ps-2" colspan="2" id="cell23"><a href="ProblemDesk.php?id=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></th>
                    <th class="border py-2"><?php echo $result['rating']; ?></th>
                    <th class="border py-2 "> <a class="text-primary" href="ProblemDesk.php?id=<?php echo $result['id']; ?>"><?php echo $result['setter']; ?></a> </th>
                </tr>
				<?php } } ?>	
				
			</table>
	   </section>
	   
		
	   </section>
    </main>


  <?php include 'inc/footer.php';?>   