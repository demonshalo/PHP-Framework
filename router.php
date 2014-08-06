<?php
//TODO redefine for project
define('ROOT', dirname(__FILE__));
define('DEVELOPER', true);
define('SERVICE_DOMAIN', "");                   //The site domain
define('APPLICATION_NAME', "");                 //Application name to be used in various libraries

//Set error reporting mode for debugging
if(DEVELOPER){
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', '1');
}
else{
    ini_set('display_errors', '0');
    error_reporting(0);
}

//AUTOLOADER
function __autoload($class){
    $class = str_replace('_', DIRECTORY_SEPARATOR, $class).'.php';
    require_once $class;
}


//Database Handler in case DB connection is needed. Replace the current line with the commented one
$db = null;
#$db = new PDOExtension("mysql", "host", "db", "user", "password");

/*
Handle request via resource routing. Each param position associated with an ID according to the routing rule you enter below!
RAW RULE:             (/view/:view_id/:referrer/:api_key, "home@view")
Translated URI:       (www.asd.com/view/12345678/facebook/ABC123)
                      HomeController->ViewAction()
                      HomeController->params = array(view_id = 12345678, referrer => "facebook", ...)
*/
$request = new Core\requestHandler();
$request->route("/api", "home@api");
$request->route("/view","home@view");
$request->route("/view/:testparam","home@test");
$request->matchRoute();


//ResponseHandler compiles the response data into either a VIEW or API data via JSON/XML or JSONP
//ADD response codes if you need to use them for the API!
$response = new Core\ResponseHandler();
#$response->addResponseCodes(array("999" => "Some Error Msg!"));


//Initiate the request according to the parsed requested resource
$class = "Controllers\\" . $request->getController();
$controller = new $class($request->getParams(), $response, $db);
$controller->{$request->getAction()}();

