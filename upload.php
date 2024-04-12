
<HTML>

<head>
        <script>
const uploadInput = document.getElementById("testingfileuplaod");

</script>
        </head>
<body>
<?php

echo "<br>Code for vardump section begin:<br>";
function var_dump_pre($mixed = null) {
  echo '<pre>';
  var_dump($mixed);
  echo '</pre>';
  return null;
}

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

//Testing a basic script
$output = shell_exec('/home/dh_an3skk/arjun-chandrasekhar-teaching.com/testScript.sh');

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
</HTML>