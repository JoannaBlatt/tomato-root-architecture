
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
                <h1 class="title">Tomato Root Architecture</h1> <br />
                <div class="menu">
                    <a href = "home.html"><h3 class="menu-button cur-page">Home</h3></a>
                    <a href = "about.html"><h3 class="menu-button">About</h3></a>
                    <a href = "help.html"><h3 class="menu-button">Help</h3></a>
            </th>
        </tr></table>
    </div>
    <div class = "home-body">
        <table class = "samples">
            <tr class = "sample-titles">
                <th class="img-title" id="systemHeader">Original System</th>
                <th class="img-title">Pareto Front Curve Plot</th>
            </tr>
            <tr class = "sample-images">
                <td class="graph">image</td>
                <td class="graph">image</td>
            </tr>
        </table>
    </div>
    <div class="upload-button-container">
        <input type="range" min="1" max="100" value="50" class="fileSlider" id="file-num">
        <button class = "upload">Upload Again</button>
        <button class = "upload" id = "reset">Reset to Original</button>
    </div>
    <div class="footer-bar">
        <h1 class = "footer-text">Dev info here</h1>
    </div>


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
$location = "/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/temp/bk_".$_FILES["testingfileupload"]["name"];  #This saves the file with name bk -- this should be changed later
echo "<BR>loacation: ".$location."<br>";
echo "<BR>";


if ( copy($_FILES['testingfileupload']["tmp_name"], $location) ) { 

  echo 'Success'; 
} else { 
  echo 'Failure'; 
  print_r(error_get_last());
}

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
