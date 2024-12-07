
<section class="sidebar-container mb-5">
	<div class="border w-100 rounded-top py-2 mb-5">
		<div class="border-bottom text-start">
			<h4 class="ps-3 " style="color: #3b5998;"> →Pay attention</h4>
		</div>
		<div class="text-center px-3 py-3">
			<span style="color: #3b5998;" class="fs-4 fw-1">
                <h4>Upcoming Contest</h4>
            </span>
			<?php
			$query = "select * from contest where date='2022-12-06' ";
			$post = $db->select($query);
			if($post)
			{
				while($result = $post->fetch_assoc())
				{
				
			?>
			<div>
				<h5><a class="text-primary" href="contestlist.php?id=<?php echo $result["id"];?>"><?php echo $result["name"];?></a></h5>
				<h5><?php echo $fm->formatDate($result["date"]);?></a></h5>
			</div>
			<div>
				<h5><a class="text-primary" href="register.php?id=<?php echo $result["id"];?>">Register Now</a></h5>
			</div>
			<?php 
					}
				}
			?>
		</div>
			  <!--  <a class="text-primary" href="#">BuJudge contest-1</a><br>
				<a class="text-primary" href="">Register Now</a>
		
	</div>
	<div class="border w-100 rounded-top py-2 mb-5">
		<div class="border-bottom text-start">
			<h2 class="">->Pay attention</h1>
		</div>
		<div class="text-center px-3 py-3">
			<h4>Upcoming Contest</h1>
				<a class="text-primary" href="#">BuJudge contest-1</a><br>
				<a class="text-primary" href="">Register Now</a>
		</div>-->
	</div>
	
</section>