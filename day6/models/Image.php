<?php
	class Image{
		public function getGD(){
			return gd_info();
		}
		
		public function imageCopy($orgfile,$newfile){
			$newjpg = imagecreatefromjpeg($orgfile);
			imagejpeg($newjpg,$newfile);
			imagedestroy($newjpg);
		}
		
		public function imageResize($orgfile,$newfile,$imageHeight,$imageWidth){
			$newjpg = imagecreatefromjpeg($orgfile);
			$imageSize = getimagesize($orgfile);
			$orgWidth = $imageSize[0];
			$orgHeight = $imageSize[1];
			
			$createColor = imagecreatetruecolor($imageWidth,$imageHeight);
			imagecopyresampled($createColor,$newjpg,0,0,0,0,$imageWidth,$imageHeight,$orgWidth,$orgHeight);
			imagejpeg($createColor,$newfile,100);
			imagedestroy($newjpg);
		}
		
		public function msg($msg){
			$container = imagecreatefromjpeg('images/captcha_bg.jpg');
			$black = imagecolorallocate($container,0,0,0);
			//$white = imagecolorallocate($container,255,255,255);
			$font = 'fonts/acce.ttf';
			imagerectangle($container,0,0,200,100,$black);
			imagefttext($container,24,0,22,62,$black,$font,$msg); //can make a randomizer
			imagepng($container,'images/newCaptcha.jpg');
			imagedestroy($container);
		}
		
		public function fileUpload($file,$userName){
			$tmp_file = $file["tmp_name"];
			$dest_file = "profile".$userName.".".substr(strrchr($file["name"],'.'),1);
			$dest_dir = "./images/user_thumbs2";
			move_uploaded_file($tmp_file,$dest_dir."/".$dest_file);
		}
	}
?>