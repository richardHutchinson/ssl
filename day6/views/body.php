<!--add html-->
<div id="content">
	<h2>Posts:</h2>
	
	<?php
		foreach($data as $post){
			echo('<p><a href="post.php?action=readPost&postId='.$post["postId"].'">'.$post["title"].'</a> | <a href="post.php?action=updatePost&postId='.$post["postId"].'">Edit</a> | <a href="post.php?action=deletePost&postId='.$post["postId"].'">Delete</a>');
		}
	?>
	
	<form action="?action=createPost" method="post">
		<h3>Add New Post</h3>
		<p>
			<label for="title">Title: </label>
			<input type="text" name="title" />
		</p>
		<p>
			<label for="detail">Detail: </label>
			<textarea name="detail" cols="47" rows="5"></textarea>
		</p>
		<p>
			<input type="submit" value="Add Post" />
		</p>
	</form>
	
	<a href="?controller=post">Back</a> | 
	<a href="logout.php?action=logout">Logout</a>
</div>