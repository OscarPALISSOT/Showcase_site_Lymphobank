var acc = document.getElementsByClassName("accordion");
var title = document.getElementsByClassName("accordionTitle");
var i;


    window.onload = rezize;

    function rezize () {
        for (i = 0; i < acc.length; i++) {
            const size = title[i].offsetHeight;
            if (size > 50 && size < 75){
                acc[i].style.minHeight = 75 + 'px'
            }
            if (size > 75 && size < 110){
                acc[i].style.minHeight = 110 + 'px'
            }
            if (size > 110 && size < 145){
                acc[i].style.minHeight = 145 + 'px'
            }
            if (size > 145 && size < 170){
                acc[i].style.minHeight = 170 + 'px'
            }
        }
    };
