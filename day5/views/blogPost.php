<!--add html-->

<?php
	foreach($data as $post){
		echo('<p>'.$post["title"].'</p><p>'.$post["detail"].'</p>');
	}
?>
<span>
	<a href="?controller=post">Back</a> | 
	<a href="authentication.php?action=logout">Logout</a>
</span>