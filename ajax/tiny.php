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

require_once("tiny/vendor/autoload.php");
\Tinify\setKey("API_KEY");

// get data about our file
$kind = isset($_GET['kind']) ? $_GET['kind'] : '';
$path = 'www.'.$_SERVER['SERVER_NAME'];
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
				//tinypng
				$source = \Tinify\fromFile($tmp_name);
				$source->toFile("../uploads/".$name);
				echo '<img src="/uploads/'.$name.'" width=100 />';
			}else{
				echo "We accept only jpg/jpeg images, less than 20 MB!";
			}
		}else{
			echo "Image name must contain less than 300 characters!";
		}
	} else {
		echo "Please, choose a file!";
	}
}else{
	echo "Error!";
}
?>