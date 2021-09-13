
var root = document.getElementsByClassName("root");


for (i = 0; i < root.length; i++) {
    root[i].addEventListener("click", function() {
        const firstStep = this.nextElementSibling;
        if (firstStep.style.maxHeight) {
            firstStep.style.maxHeight = null;
        } else {
            firstStep.style.maxHeight = firstStep.scrollHeight + "px";
        } 
    });
}

var sangCordonBtn = document.getElementsByClassName("sangCordonBtn");
for (i = 0; i < sangCordonBtn.length; i++) {
    sangCordonBtn[i].addEventListener("click", function() {
        const sangCordonBtn = document.getElementsByClassName("sangNode");
        debugger
        /* if (firstStep.style.maxHeight) {
            firstStep.style.maxHeight = null;
        } else {
            firstStep.style.maxHeight = firstStep.scrollHeight + "px";
        }  */
    });
}
