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
    <div class="home-body">
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

                <td><form action="upload.php" method="post" enctype="multipart/form-data" name="test">
                    <label for="testfileupload" class="upload">
                        <input id="testfileupload" type="file" name="testingfileupload" onchange="this.form.submit();" />
                        Upload File
                    </label>
                </form></td>
                <td><form action="upload.html">
                    <button class ="upload">Use Sample File</button>
                </form></td>

            </tr>
        </table>

    </div>
    <div class="footer-bar">
        <h1 class="footer-text">Dev info here</h1>
    </div>
    <script>
    </script>
</body>
</html>