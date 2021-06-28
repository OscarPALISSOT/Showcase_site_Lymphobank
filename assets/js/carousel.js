
class Carousel {

    constructor (element, options ={}){
        this.element = element
        this.options = Object.assign({}, {
            slideToScroll: 1,
            slideVisibles: 1
        }, options)
    
        let children = [].slice.call(element.children)
        let root = this.createDivWithClass('carousel')
        this.container = this.createDivWithClass('carousel__container')
        root.appendChild(this.container)
        this.element.appendChild(root)
        this.items = children.map((child) => {
            let item = this.createDivWithClass('carousel__item')
            item.appendChild(child)
            this.container.appendChild(item)
            return item
        })
        this.setStyle()
    }

    setStyle () {
        let ratio = this.items.length / this.options.slideVisibles
        this.container.style.width = (ratio * 100) + "%"
        this.items.forEach(item => item.style.width = ((100 / this.options.slideVisibles) / ratio) + "%")
    }
    
    createDivWithClass(className) {
        let div = document.createElement('div')
        div.setAttribute('class', className)
        return div
    }
}




new Carousel(document.querySelector('#temoignage'),{
    slideToScroll: 1,
    slideVisibles: 1
})
