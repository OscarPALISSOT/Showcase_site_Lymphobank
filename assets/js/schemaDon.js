
var root = document.getElementsByClassName("root")[0];


root.addEventListener("click", function() {
    const sangCordonBtn = document.getElementsByClassName("sangNode")[0];
    const cordonBtn = document.getElementsByClassName("cordonNode")[0];
    const firstStep = this.nextElementSibling;
    if (firstStep.style.maxHeight) {
        firstStep.style.maxHeight = null;
        sangCordonBtn.style.maxHeight = null;
        cordonBtn.style.maxHeight = null;
    } else {
        firstStep.style.maxHeight = firstStep.scrollHeight + "px";
    } 
});

var sangCordonBtn = document.getElementsByClassName("sangCordonBtn")[0];
sangCordonBtn.addEventListener("click", function() {
    const sangCordonBtn = document.getElementsByClassName("sangNode")[0];
    const cordonBtn = document.getElementsByClassName("cordonNode")[0];
    if (sangCordonBtn.style.maxHeight) {
        sangCordonBtn.style.maxHeight = null;
    } else {
        sangCordonBtn.style.maxHeight = sangCordonBtn.scrollHeight + "px";
        cordonBtn.style.maxHeight = null;
    } 
});


var cordonBtn = document.getElementsByClassName("cordonBtn")[0];
cordonBtn.addEventListener("click", function() {
    const cordonBtn = document.getElementsByClassName("cordonNode")[0];
    const sangCordonBtn = document.getElementsByClassName("sangNode")[0];
    if (cordonBtn.style.maxHeight) {
        cordonBtn.style.maxHeight = null;
    } else {
        cordonBtn.style.maxHeight = cordonBtn.scrollHeight + "px";
        sangCordonBtn.style.maxHeight = null;
    } 
});