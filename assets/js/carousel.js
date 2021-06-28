
class Carousel {

    //construit un carousel
    constructor (element, options ={}){
        this.element = element
        this.options = Object.assign({}, {
            slideToScroll: 1,
            slideVisibles: 1
        }, options)
    
        let children = [].slice.call(element.children)
        this.currentItem = 0
        this.root = this.createDivWithClass('carousel')
        this.container = this.createDivWithClass('carousel__container')
        this.root.appendChild(this.container)
        this.element.appendChild(this.root)
        this.items = children.map((child) => {
            let item = this.createDivWithClass('carousel__item')
            item.appendChild(child)
            this.container.appendChild(item)
            return item
        })
        this.setStyle()
        this.createNavigation()
    }

    //définit la width des item et du carousel selon les options
    setStyle () {
        let ratio = this.items.length / this.options.slideVisibles
        this.container.style.width = (ratio * 100) + "%"
        this.items.forEach(item => item.style.width = ((100 / this.options.slideVisibles) / ratio) + "%")
    }
    
    //crée une div avec une classe
    createDivWithClass(className) {
        let div = document.createElement('div')
        div.setAttribute('class', className)
        return div
    }

    //crée les fleches et la nav
    createNavigation() {
        let nextButton = this.createDivWithClass('carousel__next')
        let prevButton = this.createDivWithClass('carousel__prev')
        this.root.appendChild(nextButton)
        this.root.appendChild(prevButton)
        nextButton.addEventListener('click', this.next.bind(this))
        prevButton.addEventListener('click', this.prev.bind(this))
    }

    next () {
        this.gotoItem(this.currentItem + this.options.slideToScroll)
    }

    prev () {
        this.gotoItem(this.currentItem - this.options.slideToScroll)
    }

    //déplace le carousel sur un item ciblé
    gotoItem (index) {
        let translateX = index * -100 / this.items.length
        this.container.style.transform = 'translate3d(' + translateX + '%, 0, 0)'
        this.currentItem = index
    }
}


//carousel témoignage
new Carousel(document.querySelector('#temoignage'),{
    slideToScroll: 1,
    slideVisibles: 1
})
