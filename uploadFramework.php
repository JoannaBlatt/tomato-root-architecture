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

echo "<br>var_dump get then post:";
var_dump($_GET);
var_dump($_POST);
echo "<br>end of vardump code section<br><br>";

echo "<hr>";
echo '<br>testing file path setting<br>';
$file_path = "/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/temp/testing_file_path_".$_FILES["userFileUploadInput"]["name"];

echo "<br><br>getRequestData file_path: ";
echo getRequestData("file_path");
echo "<br>set file path and now it is: ";
$_REQUEST["file_path"] = $file_path;
echo $_REQUEST["file_path"];

echo "<br><hr><br>section 1: create sessionID variable<BR>";
$sessID = uniqid();
echo "id created is: ".$sessID;
$filename = $_FILES["userFileUploadInput"]["name"];

echo "<br><hr><br>";

echo "<br>section 2: pass sessID to makeDir and make directories";

echo '<BR>/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/makeDirectories.sh '.$sessID;
$output = shell_exec('/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/makeDirectories.sh '.$sessID);

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