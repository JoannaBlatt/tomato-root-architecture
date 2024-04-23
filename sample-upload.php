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
    <script>
        localStorage.setItem('baseFolder', "sampleInputData/");
        localStorage.setItem('uploadName', "065_3_S_day2");
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
    <script src="slider.js"></script>
</body>
</html>