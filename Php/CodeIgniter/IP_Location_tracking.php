<?php
$ipaddress = $_SERVER['REMOTE_ADDR'];
$page = "http://".$_SERVER['HTTP_HOST']."".$_SERVER['PHP_SELF'];
$datetime = date("F j, Y, g:i a");
$useragent = $_SERVER['HTTP_USER_AGENT'];

$url = json_decode(file_get_contents('http://freegeoip.net/json/'.$_SERVER['REMOTE_ADDR']));

$country=$url->country_name;  // user country
$city=$url->city;       // city
$region=$url->region_name;   // regoin
$latitude=$url->latitude;    //lat and lon
$longitude=$url->longitude;
$data = array('ip'=>$ipaddress,
  'current_page'=>$page,
  'time'=>$datetime,
  'user_agent'=>$useragent,
  'country'=>$country,
  'city'=>$city,
  'region'=>$region,
  'latitude'=>$latitude,
  'langitude'=>$longitude,);
print_r($data)
?>