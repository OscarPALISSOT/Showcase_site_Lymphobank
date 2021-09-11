// bouton card

var btnCard = document.getElementsByClassName("btnCard");

var i;

for (i = 0; i < btnCard.length; i++) {
btnCard[i].addEventListener("click", function() {
    this.classList.toggle("activeCard");
    var panelCard = this.nextElementSibling;
    var card = this.parentElement;
    if (panelCard.style.maxHeight) {
    panelCard.style.maxHeight = null;
    card.style.maxHeight = null;
    } else {
    panelCard.style.maxHeight = panelCard.scrollHeight + "px";
    card.style.maxHeight = card.scrollHeight + panelCard.scrollHeight + "px";
    }
});
}
// fin bouton card