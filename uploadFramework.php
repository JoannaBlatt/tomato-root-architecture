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
            <th class = "back-arrow"><a href="https://www.arjun-chandrasekhar-teaching.com"><h3 class="menu-button back-arrow">Exit</h3></a></th>
            <th class="sprout-image"><img src="Images/Sprout.png"></th>
            <th class="header-text">
                <h1 class="title">Tomato Root Architecture</h1> <br />
                <div class="menu">
                    <a href = "home.php"><h3 class="menu-button">Home</h3></a>
                    <a href = "about.html"><h3 class="menu-button">About</h3></a>
                    <a href = "help.html"><h3 class="menu-button">Help</h3></a>
            </th>
            <th class = "spacer"></th>
        </tr></table>
    </div>
    <div class="home-body">
        <table class="samples">
            <tr class="sample-titles">
                <th class="img-title" id="systemHeader"><h1 class="sysTitle">Root System</h1></th>
                <th class="img-title" id="frontHeader"><h1 class="sysTitle">Pareto Front Curve Plot</h1></th>
            </tr>
            <tr class="frame-images">
                <th><div class="frame"><iframe id="systemDisplay"></iframe></div></th>
                <th><div class="frame"><iframe id="paretoDisplay"></iframe></div></th>
            </tr>
        </table>
        <table class="upload-tray">
        <tr id="slider-container">
            <input type="range" min="1" max="100" value="50" class="fileSlider" id="file-num">
        </tr>
        <tr>
                <h1 id="slider-out" class="slider-out">Original Sample</h1>
        </tr>
        <tr>

                <td class="center-three-button"><form action="uploadFramework.php" method="post" enctype="multipart/form-data" name="userFileUpload">
                        <?php
                    $sessID = uniqid();
                     echo '<input type="hidden" id="sessionID" name="sessionID" value="'.$sessID.'">';
                     ?>
                        <label for="userFileUploadInput" class="upload">
                        <input id="userFileUploadInput" type="file" accept=".csv" name="userFileUploadInput" onchange="this.form.submit();"/>
                        Upload File
                    </label>
                </form></td>
                <td class="center-three-button"><form id="originalSample" action="sample-upload.php" method="post">
                <label for="sampleFileUpload" class = "upload">
                        Reset to Original
                </label>
                </form></td>
                <td class="center-three-button"><form id="downloadButton" action="sample-upload.php" method="post">
                <label for="sampleFileUpload" class = "upload">
                        Download Data
                </label>
                </form></td>
            </tr>
            </table>
    </div>
    <div class="footer-bar">
        <h1 class="footer-text">Backend by Dr. Arjun Chandrasekhar, UI Developed by Joanna Lewis and Zekkie McCormick</h1>
    </div>
<div>

<?php
//echo "<hr><br> var_dump section<br>";
//echo "<br> testing request var_dump<br>";
var_dump($_REQUEST);

//echo "<br>vardump files<br>";
var_dump($_FILES);
//echo "<br><br>getting files using name field<br>";
//echo $_FILES["userFileUploadInput"]["name"];
//echo "<br>testing FILES['userFileUploadInput']['temp_name'] =";
//echo $_FILES['userFileUploadInput']["tmp_name"];
//echo "<br>";
//echo "<br>get request data test: ";
//echo getRequestData("userFileUploadInput");

//echo "<br>var_dump get then post:<br>";
var_dump($_GET);
//echo "<br>";
var_dump($_POST);
//echo "<br>end of vardump code section<br><br>";


# section 1 : Create SessionID variable
//echo "<br><hr><br>section 1: create sessionID variable<BR>";
#$sessID = uniqid();
#echo "id created is: ".$sessID;
$sessID = $_POST["sessionID"];      #important
//echo "session id passed variable: ".$sessID;

# section 2: Create file path using the sessionID and filename
//echo "<br><hr><br>section 2: create file path for saving the file<br>";
$filename = $_FILES["userFileUploadInput"]["name"]; #important
$trimmedFileName = rtrim($filename, '.csv');    #important
$pathPrefix = $sessID."_file_".$trimmedFileName;    #important
//echo "<br>Path prefix: ".$pathPrefix;
//echo "<br><hr><br>";

# section 3: Pass path prefix to makeDirectories.sh which passes to makeDir.py which makes the directories needed
//echo "<br>section 3: pass pathPrefix to makeDir and make directories";


//echo '<BR>/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/makeDirectories.sh '.$pathPrefix;
#need to make this a not and reverse the if else sections
if (file_exists('/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/'.$pathPrefix)) {
   //echo "<BR>page was reloaded<BR>";
    //echo "<br>file_path: ".$_REQUEST["file_path"];
} else {
#first time upload code
$output = shell_exec('/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/makeDirectories.sh '.$pathPrefix);    #important

#section 4: save file to appropriate directory
//echo "<hr><br>section 4: save file to appropriate directory<br>getRequestData file_path: ";
//echo getRequestData("file_path");
//echo "<br>set file path and now it is: ";
$file_path = '/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/'.$pathPrefix."/arbor-reconstructions/".$filename;    # important
$_REQUEST["file_path"] = $file_path;
//echo $_REQUEST["file_path"];
//echo "<br>";
# important code block
if ( copy($_FILES['userFileUploadInput']["tmp_name"], $file_path) ) {
  //echo 'Success'; 
} else {
  //echo 'Failure'; 
  //print_r(error_get_last());
}

//echo '<br><hr><br>';

# section 5: call shell script to process data and pass the sessionId and filename.
# this should use path prefix and maybe file name. $pathPrefix
//echo "Section 5: run automated pipeline<br>";
//echo "command used: ''/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/runAutomatedPipeline.sh '.$pathPrefix)";
shell_exec('/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/runAutomatedPipeline.sh '.$pathPrefix); #important

}
# end of else section where it is not a reloaded page
//echo '<br><hr><br>';

# section 6: slider and Images
# this is where the slider and image stuff should go
//echo "<br>Section 6: images and slider";

//echo '<br><hr><br>';

# section 7: Download button
# creates a zip file and sends it to user
//echo "<BR>Section 7: download button<BR>";
//echo '<button id="downloadButton">Download Zip File</button>';
$vars = array('pathPrefix' => $pathPrefix, 'test' => "test");
$querystring = http_build_query($vars);
$url = 'downloadFile.php?' . $querystring;



//echo '<br><br><br>';
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
 <script>
 //chat gpt suggested the below solution
 // Function to execute after 30 minutes
  function executeAfterDelay() {
    // Send an asynchronous request to the server-side script
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/cleanup.php?pathPrefix=<?php echo urlencode($pathPrefix); ?>', true);
    xhr.send();
  }

  // Call executeAfterDelay function after 30 minutes
  setTimeout(executeAfterDelay, 2 * 60 * 1000); // 30 minutes in milliseconds

  window.addEventListener('beforeunload', function (event) {
    // Prevent the default dialog box from showing (optional)
    event.preventDefault();
    
    // Send an asynchronous request to the server-side script
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'cleanup.php?pathPrefix=<?php echo urlencode($pathPrefix); ?>', true);
    xhr.send();
  });
  var path = "<?php echo $pathPrefix; ?>" + '/';
  var fileName = "<?php echo $trimmedFileName; ?>";

  localStorage.setItem('baseFolder', path);
  localStorage.setItem('uploadName', fileName);

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
<script src="slider.js"></script>
</body>
</html>