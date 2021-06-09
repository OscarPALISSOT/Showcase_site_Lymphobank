//map


let $map = document.querySelector('#map');


class LeafLetMap{

    async load(element){
        return new Promise((resolve, reject)=>{
            L.map(element)
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1Ijoib3NjYXJwYWxpc3NvdCIsImEiOiJja3BwYm5mNTIwMG56Mndtb2lrenVrcWoxIn0.HvwYKSdJZreA4PSf1N2FNA'
            }).addTo(map)
            resolve()
        })
    }

    addMarker(lat, lon, text){

    }
}

const initMap = async function () {
    let map = new LeafLetMap()
    await map.load($map);
}

if ($map !== null){
    initMap();
}

let map = L.map('map').setView([47.25 , 6.0333], 6);




L.popup()
    .setLatLng([47.25 , 6.0333])
    .setContent('<p>Hello world!<br />This is a nice popup.</p>')
    .openOn(map);