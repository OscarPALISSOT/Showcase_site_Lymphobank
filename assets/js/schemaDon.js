
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
    const left = document.getElementsByClassName("left")[0];
    const linkLeft = left.getElementsByClassName("link");
    const horizontaLinkLeft = left.getElementsByClassName("horizontalLink");
    const right = document.getElementsByClassName("right")[0];
    const linkRight = right.getElementsByClassName("link");
    const horizontaLinkRight = right.getElementsByClassName("horizontalLink");
    if (sangCordonBtn.style.maxHeight) {
        sangCordonBtn.style.maxHeight = null;
        linkLeft.forEach(linkLeft => {
            linkLeft.classList.remove('activeLink')
        });
        horizontaLinkLeft.forEach(horizontaLinkLeft => {
            horizontaLinkLeft.classList.remove('activeLink')
        });
    } else {
        sangCordonBtn.style.maxHeight = sangCordonBtn.scrollHeight + "px";
        cordonBtn.style.maxHeight = null;
        linkLeft.forEach(linkLeft => {
            linkLeft.classList.add('activeLink')
        });
        horizontaLinkLeft.forEach(horizontaLinkLeft => {
            horizontaLinkLeft.classList.add('activeLink')
        });
        linkRight.forEach(linkRight => {
            linkRight.classList.remove('activeLink')
        });
        horizontaLinkRight.forEach(horizontaLinkRight => {
            horizontaLinkRight.classList.remove('activeLink')
        });
    } 
});


var cordonBtn = document.getElementsByClassName("cordonBtn")[0];
cordonBtn.addEventListener("click", function() {
    const cordonBtn = document.getElementsByClassName("cordonNode")[0];
    const sangCordonBtn = document.getElementsByClassName("sangNode")[0];
    const left = document.getElementsByClassName("left")[0];
    const linkLeft = left.getElementsByClassName("link");
    const horizontaLinkLeft = left.getElementsByClassName("horizontalLink");
    const right = document.getElementsByClassName("right")[0];
    const linkRight = right.getElementsByClassName("link");
    const horizontaLinkRight = right.getElementsByClassName("horizontalLink");
    if (cordonBtn.style.maxHeight) {
        cordonBtn.style.maxHeight = null;
        linkRight.forEach(linkRight => {
            linkRight.classList.remove('activeLink')
        });
        horizontaLinkRight.forEach(horizontaLinkRight => {
            horizontaLinkRight.classList.remove('activeLink')
        });
    } else {
        cordonBtn.style.maxHeight = cordonBtn.scrollHeight + "px";
        sangCordonBtn.style.maxHeight = null;
        linkRight.forEach(linkRight => {
            linkRight.classList.add('activeLink')
        });
        horizontaLinkRight.forEach(horizontaLinkRight => {
            horizontaLinkRight.classList.add('activeLink')
        });
        linkLeft.forEach(linkLeft => {
            linkLeft.classList.remove('activeLink')
        });
        horizontaLinkLeft.forEach(horizontaLinkLeft => {
            horizontaLinkLeft.classList.remove('activeLink')
        });
    } 
});