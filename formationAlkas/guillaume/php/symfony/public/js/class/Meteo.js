export default class Meteo {

    openWeather = 'https://api.openweathermap.org/data/2.5/weather?lat=43.610769&lon=3.876716&appid=9750eb1e8e72455ad3eddb38b8628101&lang=fr&units=metric'

    icon = 'https://openweathermap.org/img/wn/'
    constructor(elPage)
    {
        this.elPage = elPage
    }
    ajax()
    {
        fetch(this.openWeather).then((reponse) => {
            if (reponse.ok) {
                reponse.json().then(data => this.meteo(data)
                )
            }
        })

    }

    meteo(data)
    {
        // let data = localStorage.getItem('meteo')

        // data.name, main.temp, main.temp_min, main.temp_max
        // main.pressure, main.humidity, wind.speed, wind.deg

        this.elPage.innerHTML = `
<div class="d-flex justify-content-between">
    <span>
        Météo ${data.name}<br>
        ${data.sys.country}, ${data.coord.lon} / ${data.coord.lat}
    </span>
    
    <span>
        <img src="${this.icon + data.weather[0
            ].icon}.png" alt=""> ${data.main.temp} °C<br>
        ${data.wind.speed} km/h
    </span>
</div>
`
    }

    init()
    {
        this.ajax()
    }

}