
var root = document.getElementsByClassName("root");
var firstStep = document.getElementsByClassName("firstStep");
var i;

root.addEventListener("click", function() {
    if (firstStep.style.maxHeight) {
        firstStep.style.maxHeight = null;
    } else {
        firstStep.style.maxHeight = firstStep.scrollHeight + "px";
    } 
});