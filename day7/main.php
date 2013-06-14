<?php
	include "models/Views.php";
	include "helpers/db.php"; //must be above the Post.php - order of operation
	include "models/Posts.php";
	include "models/Users.php";
	include "models/Image.php";
	include "models/Items.php";
	
	$myview = new Views();
	//$posts = new Posts();
	$image = new Image();
	$items = new Items();
	
	session_start();
	$captchaString = md5(microtime());
	$randomCaptcha = substr($captchaString,0,6);
	$image->msg($randomCaptcha);
	$_SESSION["captcha"] = $randomCaptcha;

	$myview->getView("views/header.html",array());
	
	if(!empty($_GET["controller"])){
		header("Location: controllers/post.php");
	}else{

?>
<div id="content">
	<?php
		//$myview->getView("views/formLogin.html");
		//$myview->getView("views/formRegister.html");
		
		//echo("<hr />");
		
		class Items2 extends db {
			public function getEntry($entryId){
				$sql = "select * from newsitem where id =\"".$entryId."\"";
				$result = $this->dbcon->prepare($sql);
				$result->execute();
				$data = $result->fetch();
				
				return $data;
			}
		}
		
		$items2 = new Items2();
		
		// use simplexml_load_file(); due to most rss feeds returning xml
		$entries = simplexml_load_file("http://www.theregister.co.uk/software/developer/headlines.atom");
		
		// $entry = $entries->id;
		// var_dump($entry."<br />");
		foreach($entries->entry as $entry){ // entry is from the xml file ex: <entry>
			$data = $items2->getEntry($entry->id);
			
			//$dataArray = count($data) > 0;
			
			// if nothing is in database insert value
			if(!$data){
				echo("<strong>no entry</strong>: ".$entry->id."<br />----<br />");
				$items->saveEntries($entry->id,$entry->title,$entry->summary,$entry->updated);
				
				continue;
			}
			
			// look into chron for windows or equivilent
			
			//date(); may also work
			$date = new DateTime($entry->updated);
			$dateResult = $date->format('Y-m-d H:i:s');
			
			$update = false;
			
			if($data["newsTitle"] != $entry->title){
				echo("<em>newsTitle is not the same</em><br />");
				$update = true;
			}elseif($data["newsDetail"] != $entry->summary){
				echo("<em>newsDetail is not the same</em><br />");
				$update = true;
			}elseif($data["newsDate"] != $dateResult){
				echo("<em>newsDate is not the same</em><br />");
				$update = true;
			}
			
			if($update == true){
				echo("Update: ".$entry->id."<br />");
				// run update function
				$items->updateEntries($entry->id,$entry->title,$entry->summary,$dateResult);
			}else{
				echo("<strong>Same</strong>: <em>No updates where needed</em><br /><br />");
			}
			
			// add delete - may need to delete based on current time minus two days (create a variable with the hours in a day - may need to create variables for seconds, minutes and hours)
			
			echo(
				"<strong>Id</strong>: ".$entry->id."<br />
				<strong>Title</strong>: ".$entry->title."<br />".
				$entry->summary."<br /><hr /><br />"
			);
		}
		
		//var_dump($entries);
	?>
</div>
<?php
	}
	$myview->getView("views/footer.html",array());
?>