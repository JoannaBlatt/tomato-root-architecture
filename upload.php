
<HTML>

<head>
        <script>
const uploadInput = document.getElementById("testingfileuplaod");

</script>
        </head>
<body>
<?php
echo "hello<br>";

/* Get the name of the uploaded file */
$filename = $_FILES['file']['name'];

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
echo "<br>get request data test: ";
echo getRequestData("testingfileupload");
echo "<br>end of vardump code section<br><br>";

/* Choose where to save the uploaded file */
$location = "temp/";
echo "<BR>loacation: ".$location."<br>";
echo $location;
echo "<BR>";
echo "file name: ".$filename."<br>";
echo $filename;
echo "<BR>";

/* Save the uploaded file to the local filesystem */
/*if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) { 
  echo 'Success'; 
} else { 
  echo 'Failure'; 
}*/
/*echo $_REQUEST['testingfileupload']*/
if ( move_uploaded_file($_REQUEST['testingfileupload'], $location) ) { 
  echo 'Success'; 
} else { 
  echo 'Failure'; 
}


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

?>
</body>
</HTML>