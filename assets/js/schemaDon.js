
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

var sangNode = document.getElementsByClassName("sangNode")[0];
var triple = sangNode.getElementsByClassName("tripleItem")[0];
var centerSang = sangNode.getElementsByClassName("center")[0];
var centerLink = centerSang.getElementsByClassName("link")[0];
var centerHorizontal = centerSang.getElementsByClassName("horizontalLink")[0];
var deltaSang = sangNode.getElementsByClassName("deltaSang")[0];
var deltaLink = deltaSang.getElementsByClassName("link")[0];
var deltaHorizontal = deltaSang.getElementsByClassName("horizontalLink")[0];


var itemLeft = triple.getElementsByClassName("itemLeft")[0];
itemLeft.addEventListener("click", function() {
    var activeCenter = centerSang.getElementsByClassName("activeLink")[0];
    debugger
    if (activeCenter) {
        centerLink.classList.remove('activeLink')
        centerHorizontal.classList.remove('activeLink')
        deltaLink.classList.remove('activeLink')
        deltaHorizontal.classList.remove('activeLink')
    } else {
        centerLink.classList.add('activeLink')
        centerHorizontal.classList.add('activeLink')
        deltaLink.classList.add('activeLink')
        deltaHorizontal.classList.add('activeLink')
    }
});