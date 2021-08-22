var acc = document.getElementsByClassName("accordion");
var title = document.getElementsByClassName("accordionTitle");
var i;


window.onload = resize;

function resize () {
    for (i = 0; i < acc.length; i++) {
        const size = title[i].offsetHeight;
        if (size > 50 ){
            const bottom = size - 50
            const resize = Math.ceil((bottom)/30)
            acc[i].style.minHeight = 50 + (resize * 30) + 'px'
        }
    }
};
