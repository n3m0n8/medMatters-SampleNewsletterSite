let weatherBox = document.querySelector('.weather-popout');
weatherBox.style.visibility = 'hidden';
function weatherStatus() {
        if (weatherBox.style.visibility === 'hidden'){
            weatherBox.style.visibility = 'visible';
        }
        else {
            weatherBox.style.visibility = 'hidden';
        }
    }