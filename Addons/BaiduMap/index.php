<?php 
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$url = "http://api.map.baidu.com/geocoder/v2/?ak=lGZpwjoakBCOa6cGut0HbCMF&location={$latitude},{$longitude}&output=json&pois=1";

$data = file_get_contents($url);

echo $data;


 ?>