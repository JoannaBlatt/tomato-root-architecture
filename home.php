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
                <th class="img-title">Pareto Front Curve Plot</th>
                <th class="img-title">Sample Upload</th>
            </tr>
            <tr class = "sample-images">
                <td class="graph"><img class="samplegraph" src="Images/sample-pareto.jpg"></td>
                <td class="graph"><img class="samplegraph" src="Images/sample-root.jpg"></td>
            </tr>
        </table>
        <button class = "upload" id="file-upload-button" onclick="handleFileUpload()">Upload File</button>
        <input id="file-upload" type="file" style="display: none;" />
        <div>
            <h2>Testing html form version</h2>
            <?php
echo "hello";
?>
            <!-- <form
                action="http://sturdy-tribble-45v494w5rwwhq99x-8080.app.github.dev/home.html" <!-- This sends it to backend handler-->
                <!-- action="http://sturdy-tribble-45v494w5rwwhq99x-8080.app.github.dev/home.html" -->

                <!-- method="post"
                enctype="multipart/form-data"
            >
                <label for="file" >File</label>
                <input type="file" name="upload-file">
                <button class="upload">Submit Testing</button>
            </form> -->
            <input id="fileupload" type="file" name="fileupload" /> 
            <button id="upload-button" onclick="uploadFile()"> Upload </button>
        </div>
    </div>
    <div class="footer-bar">
        <h1 class = "footer-text">Dev info here</h1>
    </div>
    <!-- <script src="script.js"></script> to be used with scripting implementation-->
    <!-- portions of the below code originated as ai generated-->
    <script>
        function handleFileUpload() {
          document.getElementById('file-upload').click();
        }

        document.getElementById('file-upload').addEventListener('change', function() {
          var file = this.files[0];

          if (file.type !== 'text/csv') {
            alert('Please upload a CSV file.');
            return;
        }

          window.location.href = "upload.html";
        });
        async function uploadFile() {
        console.log("testing testing");
        let formData = new FormData(); 
        formData.append("file", fileupload.files[0]);
        await fetch('upload.php', {
            method: "POST", 
            body: formData
        }); 
        alert('The file has been uploaded successfully.');
        }
    </script>
</body>
</html>