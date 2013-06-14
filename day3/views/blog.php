<?php
	echo $data;
	var_dump($data);
	echo "<p>this is the blog view</p>";
	
	foreach($data as $post){
		echo($post["title"]."<br />a");
		echo($post["detail"]."<br /><br />");
		/*if(!empty($post)){
			
		}else{
			echo("nothing to post");
		}*/
	}
?>