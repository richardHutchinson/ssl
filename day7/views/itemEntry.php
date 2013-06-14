<!--add html-->

<?php
	foreach($data as $post){
		echo("
			<p>
				<h2>".$post["title"]."</h2>
				<span>".$post["detail"]."</span>
			</p>
		");
	}
?>

<a href="?controller=post">Back</a> | 
<a href="authentication.php?action=logout">Logout</a>