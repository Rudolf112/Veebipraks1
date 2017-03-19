window.onload = function() {
    var target = document.getElementById('yks');

    target.onclick = function(){
        var position = Math.random()*300;
        target.style.left = position + "px";
        target.style.top = position + "px";
    }
};