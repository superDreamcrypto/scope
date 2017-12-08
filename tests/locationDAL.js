
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    lat = position.coords.latitude;
    long = position.coords.longitude;
    location = lat = long;
    // $url = '../pages/userHome.php';
    // $.get($url,{lat:lat,long:long});
    return location;
}