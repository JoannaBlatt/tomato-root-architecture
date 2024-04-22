function getImage(systemPath, paretoPath) {
    var systemDisplay = document.getElementById('systemDisplay');
    systemDisplay.src = systemPath;
    systemDisplay.class = "samplegraph";

    var paretoDisplay = document.getElementById('paretoDisplay');
    paretoDisplay.src = paretoPath;
    paretoDisplay.class = "samplegraph";
}

//const basePath = localStorage.getItem('baseFolder');    //passed variable containing the path
//var uploadedFile = basePath.substring(75); // contains the
//var drawingPath = basePath.substring(56) + 'pareto-front-drawings/';
//var pdfFolder = drawingPath + uploadedFile + uploadedFile.slice(0, -1);
const basePath = localStorage.getItem('baseFolder');
const uploadName = localStorage.getItem('uploadName');
var drawingPath = basePath + 'pareto-front-drawings/';
var pdfFolder = drawingPath + uploadName + '/' + uploadName;


//var originalSystem = drawingPath + uploadedFile + uploadedFile.slice(0, -1) + '.pdf';
//var originalFront = drawingPath + uploadedFile + uploadedFile.slice(0, -1) + '-pareto-front.pdf';
var originalSystem = pdfFolder + '.pdf';
var originalFront = pdfFolder + '-pareto-front.pdf'; 

document.getElementById('systemHeader').textContent = originalFront;


const slider = document.getElementById('file-num');

getImage(originalSystem, originalFront);

slider.addEventListener('input', () => {
const value = slider.value;
if (value < 10) {
        newSys = pdfFolder + '-alpha=0.0' + value + '.pdf';
}else if (value < 100) {
        newSys = pdfFolder + '-alpha=0.' + value + '.pdf';
}else{
        newSys = pdfFolder +'-alpha=1.00.pdf';
}

getImage(newSys, originalFront);

});