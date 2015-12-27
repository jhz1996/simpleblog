<?php
ob_start();
session_start();

//database credentials
define('DBHOST','localhost');
define('DBUSER','jeffz');
define('DBPASS','jz960612');
define('DBNAME','blog');
try{
$db = new PDO("mysql:host=".DBHOST.";port=8888;dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
}

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	
date_default_timezone_set('Europe/London');

//load classes as needed
function __autoload($class) {
   
   $class = strtolower($class);

	//if call from within assets adjust the path
   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	} 	
	
	//if call from within admin adjust the path
   $classpath = '../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	}
	
	//if call from within admin adjust the path
   $classpath = '../../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	} 		
	 
}

$user = new User($db); 

?>

