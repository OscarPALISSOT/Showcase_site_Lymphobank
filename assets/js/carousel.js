
class Carousel {

    //construit un carousel
    constructor (element, options ={}){
        this.element = element
        this.options = Object.assign({}, {
            slideToScroll: 1,
            slideVisibles: 1,
            pagination: false
        }, options)
    
        let children = [].slice.call(element.children)
        this.isMobile = false
        this.currentItem = 0

        //modif du dom
        this.root = this.createDivWithClass('carousel')
        this.container = this.createDivWithClass('carousel__container')
        this.root.setAttribute('tabindex', '0')
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
        if (this.options.pagination){
            this.createPagination()
        }
        
        //événement
        this.onWindowResize()
        window.addEventListener('resize', this.onWindowResize.bind(this))
        this.root.addEventListener('keyup', (e) => {
            if (e.key === 'ArrowRight'){
                this.next()
            } else if (e.key === 'ArrowLeft') {
                this.prev()
            }
        })
    }

    //définit la width des item et du carousel selon les options
    setStyle () {
        let ratio = this.items.length / this.slideVisibles
        this.container.style.width = (ratio * 100) + "%"
        this.items.forEach(item => item.style.width = ((100 / this.slideVisibles) / ratio) + "%")
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

    //crée la pagination
    createPagination() {
        let pagination = this.createDivWithClass('carousel__pagination')
        let buttons = []
        this.root.appendChild(pagination)
        for (let i = 0; i < this.items.length; i = i + this.options.slideToScroll) {
            let button = this.createDivWithClass('carousel__pagination__button')
            button.addEventListener('click', () => this.gotoItem(i))
            pagination.appendChild(button)
            buttons.push(button)
        }
    }

    //responsive
    onWindowResize () {
        let mobile = window.innerWidth < 800
        if(mobile !== this.isMobile) {
            this.isMobile = mobile
            this.setStyle
        }
    }

    next () {
        this.gotoItem(this.currentItem + this.slideToScroll)
    }

    prev () {
        this.gotoItem(this.currentItem - this.slideToScroll)
    }

    get slideToScroll () {
        return this.isMobile ? 1 : this.options.slideToScroll
    }

    get slideVisibles () {
        return this.isMobile ? 1 : this.options.slideVisibles
    }

    //déplace le carousel sur un item ciblé
    gotoItem (index) {
        if (index < 0) {
            index = this.items.length - this.options.slideVisibles
        } else if (index >= this.items.length ||  (this.items[this.currentItem + this.options.slideVisibles] === undefined) && index > this.currentItem) {
            index = 0
        }
        let translateX = index * -100 / this.items.length
        this.container.style.transform = 'translate3d(' + translateX + '%, 0, 0)'
        this.currentItem = index
    }
}


//carousel témoignage
new Carousel(document.querySelector('#temoignage'),{
    slideToScroll: 1,
    slideVisibles: 1,
    pagination:true
})
