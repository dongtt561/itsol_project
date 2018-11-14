<?php
session_start();

if(!defined('ROOT_PATH')){
	define('ROOT_PATH', __DIR__);
}
if(!defined('HOME_PATH')){
	define('HOME_PATH', 'http://news-dev.com');
}


$params = $_REQUEST;
if(isset($params['controller'])){
	$c = $params['controller'];
}else{
	$c = 'home';
}
if(isset($params['action'])){
	$action = $params['action'];


}else{
	$action = 'home';
}
include('controllers/'.$c.'Controller.php');
$c2 = ucfirst($c.'Controller');
$control = new $c2;

echo $control->{$action}();

?>