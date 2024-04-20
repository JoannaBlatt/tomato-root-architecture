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
        <table class="header"><tr>
            <th class="sprout-image"><img src="Images/Sprout.png"></th>
            <th class="header-text">
                <h1 class="title">Tomato Root Architecture: upload-framework.php</h1> <br />
                <div class="menu">
                    <a href = "home.html"><h3 class="menu-button cur-page">Tomato Home</h3></a>
                    <a href = "about.html"><h3 class="menu-button">About</h3></a>
                    <a href = "help.html"><h3 class="menu-button">Help</h3></a>
                    <a href = "."><h3 class="menu-button cur-page">Home</h3></a>
                    <a href = "File-upload-testing.html"><h3 class="menu-button">File-upload-testing</h3></a>
            </th>
        </tr></table>
    </div>
    <div>

<?php
echo "<hr><br> var_dump section<br>";
echo "<br> testing request var_dump<br>";
var_dump($_REQUEST);

echo "<br>vardump files<br>";
var_dump($_FILES);
echo "<br><br>getting files using name field<br>";
echo $_FILES["userFileUploadInput"]["name"];
echo "<br>testing FILES['userFileUploadInput']['temp_name'] =";
echo $_FILES['userFileUploadInput']["tmp_name"];
echo "<br>";
echo "<br>get request data test: ";
echo getRequestData("userFileUploadInput");

echo "<br>var_dump get then post:<br>";
var_dump($_GET);
echo "<br>";
var_dump($_POST);
echo "<br>end of vardump code section<br><br>";


/*
 


upload.php:  
saves file to appropriate subdirectory  
passes sessionid/file-path to shell script

shell script:  
passes sessionId and filepath to automated_pipeline  

Automated_pipeline:  
processes the files by passing the sessionId/path to appropriate functions  
(will need to modify functions to make use of this)  

upload.php  
Shows images that were produced using the slider  
  (since upload.php already knows the sessionId and paths, this should be passed to js in upload.php)  
has extra buttons  

upload.php:  
delete files when user leaves page  
delete files after 30 minutes  

upload.php javascript:  
must grab images to display with slider
alert when user has left the page

session timer? Not sure where this should go or be implemented. I think it should probably be server side though.
*/
# section 1 : Create SessionID variable
echo "<br><hr><br>section 1: create sessionID variable<BR>";
$sessID = uniqid();
echo "id created is: ".$sessID;

# section 2: Create file path using the sessionID and filename
$filename = $_FILES["userFileUploadInput"]["name"];
$trimmedFileName = rtrim($filename, '.csv')
$pathPrefix = $sessID."_file_".$filename;
echo "<br>Path prefix: ".$pathPrefix;
echo "<br><hr><br>";

# section 3: Pass path prefix to makeDirectories.sh which passes to makeDir.py which makes the directories needed
echo "<br>section 3: pass pathPrefix to makeDir and make directories";

echo '<BR>/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/makeDirectories.sh '.$pathPrefix;
$output = shell_exec('/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/makeDirectories.sh '.$pathPrefix);

#section 4: save file to appropriate directory
echo "<br><br>getRequestData file_path: ";
echo getRequestData("file_path");
echo "<br>set file path and now it is: ";
$file_path = '/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/makeDirectories.sh '.$pathPrefix;
$_REQUEST["file_path"] = $file_path;
echo $_REQUEST["file_path"];
if ( copy($_FILES['userFileUploadInput']["tmp_name"], $file_path) ) { 
  echo 'Success'; 
} else { 
  echo 'Failure'; 
  print_r(error_get_last());
}


echo '<br><br><br>';
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

 </div>
</body>
</html>