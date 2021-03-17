function getWeather(lat, lon, exclude) {
    var key = "36eaed58845c2395a80bca5286dc1e82";
    fetch(`https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lon}&exclude=${exclude}&appid=${key}`)
    .then(function(resp) { return resp.json() })
    .then(function(data) {
        console.log(data);
        drawWeather(data);
    })
}


getWeather("33.441792", "-94.037689", "minutely");

function drawWeather(wether) {
	

    for(let i = 0; i < 7; i++) {
        let date = new Date(wether.daily[i].dt * 1000).toUTCString();
        let month = date.split(" ")[1];
        let day = date.split(" ")[2];

        document.querySelector(".day" + (i + 1) + " .date").innerHTML = day + " " + month;

        var celcius = Math.round(parseFloat(wether.daily[i].temp.day)-273.15);
        if(celcius > 0) {
            document.querySelector(".day" + (i + 1) + " .temperature").innerHTML = "+" + celcius + "°";
        }
        else {
            document.querySelector(".day" + (i + 1) + " .temperature").innerHTML = celcius + "°";
        }

        if(wether.daily[i].clouds > 50) {
            document.querySelector(".day" + (i + 1) + " .image").setAttribute("src", "assets/images/clouds.jpg");
        }
        else if (wether.daily[i].rain > 50) {
            document.querySelector(".day" + (i + 1) + " .image").setAttribute("src", "assets/images/rain.jpg");
        }
        else {
            document.querySelector(".day" + (i + 1) + " .image").setAttribute("src", "assets/images/sun.jpg");
        }

    }
}