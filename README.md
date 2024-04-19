User Interface for Dr. Chandrasekhar's Tomato Root Architecture
by: Joanna Lewis and Zekkie McCormick

This code is for a website that allows users to upload and interact with
Dr. Chandrasekhar's tomato root architecture 

Website workflow:
Home page is the page of entry.
Has header with links to exit back to Dr. Chandrasekhar's main page, Home page, About page, and Help page.
Contains example images of a root system and pareto front.
Underneath are buttons for uploading a file and looking at an example of output.

If uploading a file button is used:
this will take a file from the user
redirect to the upload.php page
  - passes the file
  - passes the variable for file-path

On upload.php:  
creates a sessionId variable  
passes sessionId variable to shell script  

Shell script:  
starts python virtualenv  
passes session id to makeDir.py  

makeDir.py:  
creates the base directory using passed sessionID  
creates the subdirectories needed using the ones listed in constantDirectories.py  

upload.php:  
saves file to appropriate subdirectory  
passes sessionid/file-path to shell script

shell script:  
passes sessionId and filepath to automated_pipeline  

Automated_pipeline:  
processes the files by passing the sessionId/path to appropriate functions  
(will need to modify functions to make use of this)  

upload.php  
Shows images that were produced using the slider  
  (since upload.php already knows the sessionId and paths, this should be passed to js in upload.php)  
has extra buttons  

upload.php:  
delete files when user leaves page  
delete files after 30 minutes  

upload.php javascript:  
must grab images to display with slider
alert when user has left the page

session timer? Not sure where this should go or be implemented. I think it should probably be server side though.
