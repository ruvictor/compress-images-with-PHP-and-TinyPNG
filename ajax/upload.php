<?php
/*
=====================================================
 Upload - by Victor Rusu
-----------------------------------------------------
 http://ruvictor.com
-----------------------------------------------------
 Copyright (c) 2017
=====================================================
*/
define('AJAX_REQUEST', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!AJAX_REQUEST) {die('Hello!');}

// function to compress images
function compress_image($source_url, $destination_url, $quality){
	$info = getimagesize($source_url);
	if ($info['mime'] == 'image/jpeg')
		$image = imagecreatefromjpeg($source_url);
	elseif ($info['mime'] == 'image/gif')
		$image = imagecreatefromgif($source_url);
	elseif ($info['mime'] == 'image/png')
		$image = imagecreatefrompng($source_url);
	imagejpeg($image, $destination_url, $quality);
	return $destination_url;
}

// get data about our file
$name = time().'-'.$_FILES['file']['name'];
$name = str_replace(' ', '', $name);
$extension = strtolower(substr($name, strpos($name, '.') + 1));
$type = $_FILES['file']['type'];
$size = $_FILES['file']['size'];
$max_size = 20971520;
$tmp_name = $_FILES['file']['tmp_name'];
if(isset($name)){
	if(!empty($name)){
		if(strlen($_FILES['file']['name'])<300){
			if(($extension=='jpg'||$extension=='jpeg')&&($type=='image/jpeg'||$type='image/jpg')&&$size<=$max_size){
				$name = time().'.jpg';
				// where the image will be saved
				$location = '../uploads/'.$name;
				compress_image($tmp_name, $location, 70);
				echo '<img src="/uploads/'.$name.'" width=100 />';
			}else{
				echo "We accept only jpg/jpeg images, less than 20 MB!";
			}
		}else{
			echo "The image name must contain less than 300 characters!";
		}
	} else {
		echo "Please, choose a file!";
	}
}else{
	echo "Error!";
}
?>