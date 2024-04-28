<!-- this file creates a zip of all the files from the user folder and then lets the user download it. -->
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$pathPrefix = $_GET['pathPrefix'];
#$pathPrefix = realpath($_GET['pathPrefix']);
if (file_exists($pathPrefix)) {
    echo "File exists";
} else {
    echo "path prefix file does not exist: ".$pathPrefix;
}
$zip = new ZipArchive;
if ($zip->open('/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/'.$pathPrefix.'.zip', ZipArchive::CREATE) === TRUE)
{
    if ($handle = opendir($pathPrefix))
    {
        // Add all files inside the directory
        while (false !== ($entry = readdir($handle)))
        {
            echo "<br>inside while loop";
            if ($entry != "." && $entry != ".." && !is_dir('demo_folder/' . $entry))
            {
                echo "<br>inside if statement to add entry";
                $zip->addFile('demo_folder/' . $entry);
            }
        }
        closedir($handle);
    }
 
    $zip->close();
    echo '<br>ZIP file created successfully. Location: ' . $pathPrefix.'.zip';
} else {
    // ZIP archive failed to open
    echo '<br>Failed to open ZIP archive. Error code: ' . $zip->status;
}
if (file_exists('/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/'.$pathPrefix.'.zip')) {
    echo "File exists";
} else {
    echo "<br>the zip file does not exist";
}

echo "<br><hr><br>end of zip creation. Path prefix=".$pathPrefix;
/*
if (isset($_GET['download']) && $_GET['download'] == 'true') {
    $zipFilename = $pathPrefix.'.zip';

    // Check if the file exists
    if (file_exists($zipFilename)) {
        // Set headers to force download
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . basename($zipFilename) . '"');
        header('Content-Length: ' . filesize($zipFilename));

        // Send the file to the browser
        readfile($zipFilename);
        exit;
    } else {
        // Handle the case if the file does not exist
        echo 'Error: File not found.';
    }
}
*/
?>