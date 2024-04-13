
<!DOCTYPE html>
<html>
<head>
    <title>Tomato Root Architecture</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div>
<?php
//Copied code
echo "<br>session start<br>";
session_start();
$sessPath   = ini_get('session.save_path');
$sessCookie = ini_get('session.cookie_path');
$sessName   = ini_get('session.name');
$sessVar    = 'foo';
echo '<br>sessPath: ' . $sessPath;
echo '<br>sessCookie: ' . $sessCookie;
echo '<br>vardump sid:';
var_dump(defined('SID'));
session_start();
var_dump(defined('SID'));
echo '<hr>';
if( !isset( $_GET['p'] ) ){
    // instantiate new session var
    $_SESSION[$sessVar] = 'hello world';
}else{
    if( $_GET['p'] == 1 ){
        // printing session value and global cookie PHPSESSID
        echo $sessVar . ': ';
        if( isset( $_SESSION[$sessVar] ) ){
            echo $_SESSION[$sessVar];
        }else{
            echo '[not exists]';
        }
        echo '<br>' . $sessName . ': ';
        if( isset( $_COOKIE[$sessName] ) ){
        echo $_COOKIE[$sessName];
        }else{
            if( isset( $_REQUEST[$sessName] ) ){
            echo $_REQUEST[$sessName];
            }else{
                if( isset( $_SERVER['HTTP_COOKIE'] ) ){
                echo $_SERVER['HTTP_COOKIE'];
                }else{
                echo 'problem, check your PHP settings';
                }
            }
        }
    }else{
        // destroy session by unset() function
        unset( $_SESSION[$sessVar] );
        // check if was destroyed
        if( !isset( $_SESSION[$sessVar] ) ){
            echo '<br>';
            echo $sessName . ' was "unseted"';
        }else{
            echo '<br>';
            echo $sessName . ' was not "unseted"';
        }
    }
}

echo "<br><br>Session id?<br>";
var_dump($_SESSION);
echo "<br>session id?";
var_dump(defined('SID'));

?>
<?php
/*
echo "<br>Code for vardump section begin:<br>";
function var_dump_pre($mixed = null) {
  echo '<pre>';
  var_dump($mixed);
  echo '</pre>';
  return null;
}
*/
/*
echo var_dump_pre($_REQUEST['formData']);
echo "<br> testing another var_dump<br>";
var_dump($_REQUEST);

echo "<br>vardump files<br>";
var_dump($_FILES);
echo "<br><br>getting files using name field<br>";
echo $_FILES["testingfileupload"]["name"];
echo "<br>testing FILES['testingfileupload']['temp_name'] =";
echo $_FILES['testingfileupload']["tmp_name"];
echo "<br>";

echo "<br>get request data test: ";
echo getRequestData("testingfileupload");
echo "<br>end of vardump code section<br><br>";
*/
/* Choose where to save the uploaded file */
/*
$location = "/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/temp/bk_".$_FILES["testingfileupload"]["name"];  #This saves the file with name bk -- this should be changed later
echo "<BR>loacation: ".$location."<br>";
echo "<BR>";


if ( copy($_FILES['testingfileupload']["tmp_name"], $location) ) { 

  echo 'Success'; 
} else { 
  echo 'Failure'; 
  print_r(error_get_last());
}
*/
echo "<BR><BR> testing shell script<BR>";

$output = shell_exec('/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/testScript.sh');

/** Function: getRequestData()
 * Cleans any requested data by converting HTML entities
 * (to avoid cross scripting attacks) and trims white space
 * around strings.
 *
 * @param       string  $name   request data label name
 * @return      string          request data value
 */
function getRequestData($name){
        $result = "";
        if(array_key_exists($name, $_REQUEST)) {
                $result = trim(htmlentities($_REQUEST[$name]));
        }
        return $result;
}

function generateDir(int $n): string {
         $characters="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $dir = "";
        for($i = 0; $i<$n; $i++){
            $index = rand(0, strlen($characters)-1);
            $dir .= $characters[$index];
        }
        return $dir;
    }

?>

</body>
</html>
