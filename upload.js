document.addEventListener("DOMContentLoaded", function() {
    var slider = document.getElementById("fileslider");
    var header = document.getElementById("systemHeader");
  
    // Update the header text on slider value change
    slider.addEventListener("input", function() {
      header.textContent = "System number: " + slider.value;
    });
  });