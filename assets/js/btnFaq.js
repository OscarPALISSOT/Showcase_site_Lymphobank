var acc = document.getElementsByClassName("accordion");
var title = document.getElementsByClassName("accordionTitle");
var i;


    window.onload = rezize;

    function rezize () {
        for (i = 0; i < acc.length; i++) {
            if (title[i].offsetHeight > 50) {
                acc[i].style.minHeight = 70 + 'px'
            }
        }
    };
