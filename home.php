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
                    <a href = "home.html"><h3 class="menu-button cur-page">Home</h3></a>
                    <a href = "about.html"><h3 class="menu-button">About</h3></a>
                    <a href = "help.html"><h3 class="menu-button">Help</h3></a>
            </th>
            <th class = "spacer"></th>
        </tr></table>

    </div>
    <div id="content" class="home-body">
        <table class="samples">
            <tr class="sample-titles">
                <th class="img-title">Sample Upload</th>
                <th class="img-title">Pareto Front Curve Plot</th>
            </tr>
            <tr class="sample-images">
                <td class="graph"><img class="samplegraph" src="Images/sample-root.jpg"></td>
                <td class="graph"><img class="samplegraph" src="Images/sample-pareto.jpg"></td>
            </tr>
            <tr>

                <td class="center-button"><form action="uploadFramework.php" method="post" enctype="multipart/form-data" name="userFileUpload">
                        <?php
                    $sessID = uniqid();
                     echo '<input type="hidden" id="sessionID" name="sessionID" value="'.$sessID.'">';
                     ?>
                        <label for="userFileUploadInput" class="upload">
                        <input id="userFileUploadInput" accept=".csv" type="file" name="userFileUploadInput" onchange="this.form.submit(); loadingPikmin(); "/>
                        Upload File
                    </label>
                </form></td>
                <td class="center-button"><form id="fakeButton" action="sample-upload.php" method="post">
                <a href="sample-upload.php">
                <label for="sampleFileUpload" class = "upload">
                        Use Sample File
                </label>
                </a>
                </form></td>
            </tr>
        </table>
    </div>
    <div id="loading-screen" class="loading-screen">
        <h1 class="loading">Loading</h1>
        <img class="pikmin" src="Images/pikmin.gif" />
    </div>
    <div class="footer-bar">
        <h1 class="footer-text">Backend by Dr. Arjun Chandrasekhar, UI Developed by Joanna Lewis and Zekkie McCormick</h1>
    </div>
    <script>
                function loadingPikmin() {
                        var loadingScreen = document.getElementById('loading-screen');
                        var content = document.getElementById('content');

                        loadingScreen.style.display = 'block';
                        loadingScreen.style.width = '100%';
                        loadingScreen.style.height = '100%';
                        content.style.display = 'none';
                }
    </script>
</body>
</html>