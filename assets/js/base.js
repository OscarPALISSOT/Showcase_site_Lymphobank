

    //btn menu burger and no-scroll
    const menuBtn  = document.querySelector('.menu-btn');
    const body  = document.querySelector('.body');
    let menuOpen = false;
    document.querySelector('#NavToggle').addEventListener('change', ()=> {
        if(!menuOpen){
            menuBtn.classList.add('open');
            body.classList.add('no-scroll');
            menuOpen = true;
        } else {
            menuBtn.classList.remove('open');
            body.classList.remove('no-scroll');
            menuOpen = false;
        }
    });
    // fin btn menu burger


    //taille logo

    document.body.addEventListener('scroll',()=>{
        if( window.innerWidth > 1200){
            scrollFunction()
        }
    })

    function scrollFunction() {
        var logo = document.getElementById("logo");
        if (document.body.scrollTop > 90 || document.documentElement.scrollTop > 90) {
            logo.style.height = "40px";
            logo.style.width = "40px";
        } else {
            logo.style.height = "100px";
            logo.style.width = "100px";
        }
    }