const basePath = localStorage.getItem('baseFolder');
const uploadName = localStorage.getItem('uploadName');
var drawingPath = basePath + 'pareto-front-drawings/';
var pdfFolder = drawingPath + uploadName + '/' + uploadName;

var originalSystem = pdfFolder + '.pdf';
var originalFront = pdfFolder + '-pareto-front.pdf';

function getImage(systemPath, paretoPath) {
    var systemDisplay = document.getElementById('systemDisplay');
    systemDisplay.src = systemPath;
    systemDisplay.class = "samplegraph";

    var paretoDisplay = document.getElementById('paretoDisplay');
    paretoDisplay.src = paretoPath;
    paretoDisplay.class = "samplegraph";
}

//portions of this were ai generated
function zipFolder(folderPath) {
  var zip = new JSZip();
  var zipFileName = uploadName + '-pareto-optimal-drawings';

  // Add a single file to the ZIP archive
  function addFileToZip(zip, filePath, fileName) {
    return fetch(filePath)
      .then(function (response) {
        if (response.ok) {
          return response.blob();
        } else {
          throw new Error('Error fetching file: ' + response.status);
        }
      })
      .then(function (blob) {
        zip.file(fileName, blob);
      })
      .catch(function (error) {
        console.error('An error occurred:', error);
      });
  }

  // Add multiple files to the ZIP archive
  function addFilesToZip(zip, files) {
    var promises = [];
    files.forEach(function (file) {
      promises.push(addFileToZip(zip, file.filePath, file.fileName));
    });
    return Promise.all(promises);
  }

  // Start zipping of front and system
  var files = [
    { filePath: originalFront, fileName: originalFront },
    { filePath: originalSystem, fileName: originalSystem }
  ];
  for (var i = 1; i<=100; i++){
        var fileName = pdfFolder;
        var nameName = i;
        if(i < 10){
                nameName = 'alpha=0.0' + i + '.pdf';
                fileName = pdfFolder + '-' + nameName;
        }else if (i < 100) {
                nameName = 'alpha=0.' + i + '.pdf';
                fileName = pdfFolder + '-' + nameName;
        }else{
                nameName = 'alpha=1.00.pdf';
                fileName = pdfFolder +'-'+nameName;
        }
files.push({filePath: fileName, fileName: fileName});
}

// Add files to the ZIP archive
addFilesToZip(zip, files)
.then(function () {
// Generate the ZIP file asynchronously
return zip.generateAsync({ type: 'blob' });
})
.then(function (content) {
// Create a download link
var downloadLink = document.createElement('a');
downloadLink.href = URL.createObjectURL(content);
downloadLink.download = zipFileName;

// Trigger the download
downloadLink.click();

// Clean up the object URL
URL.revokeObjectURL(downloadLink.href);
})
.catch(function (error) {
console.error('An error occurred while generating the ZIP file:', error);
});
}

const slider = document.getElementById('file-num');
const sliderOut = document.getElementById('slider-out');

getImage(originalSystem, originalFront);

slider.addEventListener('input', () => {
const value = slider.value;
sliderOut.textContent = 'Alpha = ' + value;
if (value < 10) {
newSys = pdfFolder + '-alpha=0.0' + value + '.pdf';
}else if (value < 100) {
newSys = pdfFolder + '-alpha=0.' + value + '.pdf';
}else{
newSys = pdfFolder +'-alpha=1.00.pdf';
}

getImage(newSys, originalFront);

});

const originalSample = document.getElementById('originalSample');

originalSample.addEventListener('click', () => {
slider.value = 50;
sliderOut.textContent = 'Original Sample';
getImage(originalSystem, originalFront);
});

downloadButton.addEventListener('click', () => {
zipFolder(drawingPath.split(0,-1));
});