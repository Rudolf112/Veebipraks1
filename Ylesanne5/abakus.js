window.onload = function() {
    var target = document.getElementsByClassName('bead');
        
    for (var i = 0; i < target.length; i++) {
    target[i].onclick = function () {
        changeFloat(this);
        }
    }
 
     function changeFloat(bead) {
         if (window.getComputedStyle(bead).getPropertyValue("float") == "left"){
             bead.style.cssFloat = "right";
         } else {
             bead.style.cssFloat = "left";
        }
     }
    };