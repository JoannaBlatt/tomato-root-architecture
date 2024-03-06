var slider = document.getElementById("fileSlider");
var header = document.getElementById("systemHeader");
var reset = document.getElementById("reset");
  
    // Update the header text on slider value change
    slider.addEventListener("input", function() {
      header.textContent = "System number: " + slider.value;
    });

    reset.onclick = function(){
      slider.value = 0;
    }