<!--add html-->

<?php
	$entries = simplexml_load_file("http://www.theregister.co.uk/software/developer/headlines.atom");
	foreach($entries->entry as $entry){
		echo("<p>".$entry->title."</p>");
	}
?>

<a href="?controller=post">Back</a> | 
<a href="authentication.php?action=logout">Logout</a>