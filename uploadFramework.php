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
# section 1 : Grab SessionID variable passed from upload button
//echo "<br><hr><br>section 1: Grab sessionID variable<BR>";
$sessID = $_POST["sessionID"];      #important
//echo "session id passed variable: ".$sessID;

# section 2: Create file path using the sessionID and filename
//echo "<br><hr><br>section 2: create file path for saving the file<br>";
$filename = $_FILES["userFileUploadInput"]["name"]; # the name of the file
$trimmedFileName = rtrim($filename, '.csv');    # the name of the file without .csv
$pathPrefix = $sessID."_file_".$trimmedFileName;    # the sessionID added with the trimmed filename
//echo "<br>Path prefix: ".$pathPrefix;

# section 3: Pass path prefix to makeDirectories.sh which passes to makeDir.py which makes the directories needed
//echo "<br>section 3: pass pathPrefix to makeDir and make directories";

# future TODO: reverse the if statement so that there isn't a blank code block
if (file_exists('/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/'.$pathPrefix)) {
   //echo "<BR>page was reloaded<BR>";
    //echo "<br>file_path: ".$_REQUEST["file_path"];
} else {
#first time upload code: section 3f
    #section 3f.1: make directories using pathPrefix
    $output = shell_exec('/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/makeDirectories.sh '.$pathPrefix);

    #section 3f.2: save file to appropriate directory
    //echo "<hr><br>section 3f.2: save file to appropriate directory<br>getRequestData file_path: ";
    $file_path = '/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/'.$pathPrefix."/arbor-reconstructions/".$filename;    # important
    $_REQUEST["file_path"] = $file_path;

# important code block, actually saves the file with the appropriate name to the appropriate place
# section 3f.3: save file using file name and $file_path (contains the path and name of file as a single string)
    if ( copy($_FILES['userFileUploadInput']["tmp_name"], $file_path) ) {
        //echo 'Success'; 
    } else {
        # future TODO: add error message and handle on website
        //echo 'Failure'; 
        //print_r(error_get_last());
    }

    # section 3f.4: call shell script to process data and pass the sessionId and filename.
    //echo "Section 3f.4: run automated pipeline<br>";
    //echo "command used: ''/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/runAutomatedPipeline.sh '.$pathPrefix)";
    shell_exec('/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/runAutomatedPipeline.sh '.$pathPrefix); #important

}
#end of section 3 / 3f
# end of else section where it is first time upload page


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