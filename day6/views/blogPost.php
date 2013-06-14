<!--add html-->
<div id="content">
	<?php
		foreach($data as $post){
			echo('<p>'.$post["title"].'</p><p>'.$post["detail"].'</p>');
		}
	?>
	<span>
		<!--?controller=post-->
		<a href="?controller=post&action=getAll">Back</a> | 
		<a href="logout.php?action=logout">Logout</a>
	</span>
</div>