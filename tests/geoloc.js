// Get User's Coordinate from their Browser
window.onload = function() {
  // HTML5/W3C Geolocation
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(UserLocation);
  }
  // Default to Washington, DC
  else
    NearestCity(38.8951, -77.0367);
}

// Callback function for asynchronous call to HTML5 geolocation
function UserLocation(position) {
  NearestCity(position.coords.latitude, position.coords.longitude);
}


// Convert Degress to Radians
function Deg2Rad(deg) {
  return deg * Math.PI / 180;
}

function PythagorasEquirectangular(lat1, lon1, lat2, lon2) {
  lat1 = Deg2Rad(lat1);
  lat2 = Deg2Rad(lat2);
  lon1 = Deg2Rad(lon1);
  lon2 = Deg2Rad(lon2);
  var R = 6371; // km
  var x = (lon2 - lon1) * Math.cos((lat1 + lat2) / 2);
  var y = (lat2 - lat1);
  var d = Math.sqrt(x * x + y * y) * R;
  return d;
}

var lat = 20; // user's latitude