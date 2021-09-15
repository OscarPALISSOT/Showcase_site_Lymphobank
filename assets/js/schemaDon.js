
var root = document.getElementsByClassName("root")[0];



//illumine un chemin
function highlight(path){
    for(let i = 0; i < path.length; i++){
        path[i].classList.add('activeLink')
    }
}

//illumine un chemin array div
function highlightArray(path){
    for(let i = 0; i < path.length; i++){
        path[i].forEach(item => {
            item.classList.add('activeLink')
        });
    }
}

//éteint un chemin
function shutDown(path){
    for(let i = 0; i < path.length; i++){
        path[i].classList.remove('activeLink')
    }
}

//éteint un chemin array div
function shutdownArray(path){
    for(let i = 0; i < path.length; i++){
        path[i].forEach(item => {
            item.classList.remove('activeLink')
        });
    }
}
//variable partie haute
var sangNode = document.getElementsByClassName("sangNode")[0];
var cordonNode = document.getElementsByClassName("cordonNode")[0];
var left = document.getElementsByClassName("left")[0];
var right = document.getElementsByClassName("right")[0];
var firstLink = [];
firstLink.push(document.getElementsByClassName("firstLink")[0]);
var pathTopLeft = [];
pathTopLeft.push(left.getElementsByClassName("link"));
pathTopLeft.push(left.getElementsByClassName("horizontalLink"));
var pathTopRight = [];
pathTopRight.push(right.getElementsByClassName("link"));
pathTopRight.push(right.getElementsByClassName("horizontalLink"));


//varible partie gauche
var triple = sangNode.getElementsByClassName("tripleItem")[0];
var centerSang = sangNode.getElementsByClassName("center")[0];
var deltaSang = sangNode.getElementsByClassName("deltaSang")[0];
var tripleLink = sangNode.getElementsByClassName("tripleLink")[0];
var pathSangCommon = [];
pathSangCommon.push(centerSang.getElementsByClassName("link")[0]);
pathSangCommon.push(centerSang.getElementsByClassName("horizontalLink")[0]);
pathSangCommon.push(deltaSang.getElementsByClassName("link")[0]);

// variable chemin item gauche partie gauche
var pathSangLeftItem = [];
pathSangLeftItem.push(deltaSang.getElementsByClassName("horizontalLinkLeft")[0]);
pathSangLeftItem.push(tripleLink.getElementsByClassName("leftLink")[0]);

// variable chemin item milieu partie gauche
var pathSangMiddleItem = [];
pathSangMiddleItem.push(tripleLink.getElementsByClassName("middleLink")[0]);

// variable chemin item droite partie gauche
var pathSangRightItem = [];
pathSangRightItem.push(deltaSang.getElementsByClassName("horizontalLinkRight")[0]);
pathSangRightItem.push(tripleLink.getElementsByClassName("rightLink")[0]);

//varible partie droite
var double = cordonNode.getElementsByClassName("doubleItem")[0];
var centerCordon = cordonNode.getElementsByClassName("center")[0];
var deltaCordon = cordonNode.getElementsByClassName("deltaCordon")[0];
var doubleLink = cordonNode.getElementsByClassName("doubleLink")[0];
var pathCordonCommon = [];
pathCordonCommon.push(centerCordon.getElementsByClassName("link")[0]);
pathCordonCommon.push(centerCordon.getElementsByClassName("horizontalLink")[0]);
pathCordonCommon.push(deltaCordon.getElementsByClassName("link")[0]);

// variable chemin item gauche partie droite
var pathCordonLeftItem = [];
pathCordonLeftItem.push(deltaCordon.getElementsByClassName("horizontalLinkLeft")[0]);
pathCordonLeftItem.push(doubleLink.getElementsByClassName("leftLink")[0]);

// variable chemin item droite partie droite
var pathCordonRightItem = [];
pathCordonRightItem.push(deltaCordon.getElementsByClassName("horizontalLinkRight")[0]);
pathCordonRightItem.push(doubleLink.getElementsByClassName("rightLink")[0]);

//variable text item gauche
var itemSang = sangNode.getElementsByClassName("item");
var textItemArraySang = sangNode.getElementsByClassName("textItem");

//varible text item droite
var itemCordon = cordonNode.getElementsByClassName("item");
var textItemArrayCordon = cordonNode.getElementsByClassName("textItem");

//active premiere étape ou enroule tout schéma
root.addEventListener("click", function() {
    const firstStep = this.nextElementSibling;
    if (firstStep.style.maxHeight) {
        firstStep.style.maxHeight = null;
        sangNode.style.maxHeight = null;
        cordonNode.style.maxHeight = null;
        textItemArrayCordon.forEach(item => {
            item.style.maxHeight = null;
        });
        textItemArraySang.forEach(item => {
            item.style.maxHeight = null;
        });
        shutDown(firstLink)
        shutDown(pathSangMiddleItem)
        shutDown(pathSangLeftItem)
        shutDown(pathSangCommon)
        shutDown(pathSangRightItem)
        shutdownArray(pathTopLeft)
        shutdownArray(pathTopRight)
        shutDown(pathCordonCommon)
        shutDown(pathCordonRightItem)
        shutDown(pathCordonLeftItem)
    } else {
        firstStep.style.maxHeight = firstStep.scrollHeight + "px";
    } 
});

//active partie gauche et illumine chemin
var sangCordonBtn = document.getElementsByClassName("sangCordonBtn")[0];
sangCordonBtn.addEventListener("click", function() {
    if (sangNode.style.maxHeight) {
        sangNode.style.maxHeight = null;
        textItemArrayCordon.forEach(item => {
            item.style.maxHeight = null;
        });
        textItemArraySang.forEach(item => {
            item.style.maxHeight = null;
        });
        shutDown(firstLink)
        shutdownArray(pathTopLeft)
    } else {
        sangNode.style.maxHeight = sangNode.scrollHeight + "px";
        cordonNode.style.maxHeight = null;
        highlight(firstLink)
        highlightArray(pathTopLeft)
        shutdownArray(pathTopRight)
        shutDown(pathSangMiddleItem)
        shutDown(pathSangLeftItem)
        shutDown(pathSangCommon)
        shutDown(pathSangRightItem)
    } 
});

//active partie droite et illumine chemin
var cordonBtn = document.getElementsByClassName("cordonBtn")[0];
cordonBtn.addEventListener("click", function() {
    if (cordonNode.style.maxHeight) {
        cordonNode.style.maxHeight = null;
        textItemArrayCordon.forEach(item => {
            item.style.maxHeight = null;
        });
        textItemArraySang.forEach(item => {
            item.style.maxHeight = null;
        });
        shutDown(firstLink)
        shutdownArray(pathTopRight)
    } else {
        cordonNode.style.maxHeight = cordonNode.scrollHeight + "px";
        sangNode.style.maxHeight = null;
        highlight(firstLink)
        highlightArray(pathTopRight)
        shutdownArray(pathTopLeft)
        shutDown(pathSangMiddleItem)
        shutDown(pathSangLeftItem)
        shutDown(pathSangCommon)
        shutDown(pathSangRightItem)
    } 
});


//active chemin item gauche partie gauche
var itemLeft = triple.getElementsByClassName("itemLeft")[0];
itemLeft.addEventListener("click", function() {
    var activePath = tripleLink.getElementsByClassName("leftLink")[0];
    if (activePath.classList.contains('activeLink')) {
        shutDown(pathSangCommon)
        shutDown(pathSangLeftItem)
    } else {
        highlight(pathSangCommon)
        highlight(pathSangLeftItem)
        shutDown(pathSangMiddleItem)
        shutDown(pathSangRightItem)
    }
});

//active chemin item milieu partie gauche
var itemMiddle = triple.getElementsByClassName("itemMiddle")[0];
itemMiddle.addEventListener("click", function() {
    var activePath = tripleLink.getElementsByClassName("middleLink")[0];
    if (activePath.classList.contains('activeLink')) {
        shutDown(pathSangCommon)
        shutDown(pathSangMiddleItem)
    } else {
        highlight(pathSangCommon)
        highlight(pathSangMiddleItem)
        shutDown(pathSangLeftItem)
        shutDown(pathSangRightItem)
    }
});

//active chemin item droite partie gauche
var itemRight = triple.getElementsByClassName("itemRight")[0];
itemRight.addEventListener("click", function() {
    var activePath = tripleLink.getElementsByClassName("rightLink")[0];
    if (activePath.classList.contains('activeLink')) {
        shutDown(pathSangCommon)
        shutDown(pathSangRightItem)
    } else {
        highlight(pathSangCommon)
        highlight(pathSangRightItem)
        shutDown(pathSangLeftItem)
        shutDown(pathSangMiddleItem)
    }
});

//active chemin item gauche partie droite
var itemLeft = double.getElementsByClassName("itemLeft")[0];
itemLeft.addEventListener("click", function() {
    var activePath = doubleLink.getElementsByClassName("leftLink")[0];
    if (activePath.classList.contains('activeLink')) {
        shutDown(pathCordonCommon)
        shutDown(pathCordonLeftItem)
    } else {
        highlight(pathCordonCommon)
        highlight(pathCordonLeftItem)
        shutDown(pathCordonRightItem)
    }
});


//active chemin item droite partie droite
var itemRight = double.getElementsByClassName("itemRight")[0];
itemRight.addEventListener("click", function() {
    var activePath = doubleLink.getElementsByClassName("rightLink")[0];
    if (activePath.classList.contains('activeLink')) {
        shutDown(pathCordonCommon)
        shutDown(pathCordonRightItem)
    } else {
        highlight(pathCordonCommon)
        highlight(pathCordonRightItem)
        shutDown(pathCordonLeftItem)
    }
});

//active item text sang
for(let i = 0; i < itemSang.length; i++){
    itemSang[i].addEventListener("click", function(){
        var textItem = itemSang[i].getElementsByClassName("textItem")[0];
        var currentItem = Array.prototype.slice.call(itemSang);
        currentTextItem = Array.prototype.slice.call(textItemArraySang);
        currentTextItem.splice(i, 1);
        currentItem.splice(i, 1);
        if (textItem.style.maxHeight) {
            textItem.style.maxHeight = null;
            itemSang[i].style.maxHeight = null;
        } else {
            textItem.style.maxHeight = textItem.scrollHeight + "px";
            itemSang[i].style.maxHeight = textItem.scrollHeight + itemSang[i].scrollHeight + "px";
            sangNode.style.maxHeight = sangNode.scrollHeight + itemSang[i].scrollHeight + "px";
            currentTextItem.forEach(item => {
                item.style.maxHeight = null;
            });
            currentItem.forEach(item => {
                item.style.maxHeight = null;
            });
        }
    })
}

//active item text 
for(let i = 0; i < itemCordon.length; i++){
    itemCordon[i].addEventListener("click", function(){
        var textItem = itemCordon[i].getElementsByClassName("textItem")[0];
        var currentItem = Array.prototype.slice.call(itemCordon);
        currentTextItem = Array.prototype.slice.call(textItemArrayCordon);
        currentTextItem.splice(i, 1);
        currentItem.splice(i, 1);
        if (textItem.style.maxHeight) {
            textItem.style.maxHeight = null;
            itemCordon[i].style.maxHeight = null;
        } else {
            textItem.style.maxHeight = textItem.scrollHeight + "px";
            itemCordon[i].style.maxHeight = textItem.scrollHeight + itemCordon[i].scrollHeight + "px";
            cordonNode.style.maxHeight = cordonNode.scrollHeight + itemCordon[i].scrollHeight + "px";
            currentTextItem.forEach(item => {
                item.style.maxHeight = null;
            });
            currentItem.forEach(item => {
                item.style.maxHeight = null;
            });
        }
    })
}