// Defining map type, api key & some settings
let my_map = new L.Map('my-map', {
    key: 'web.K3nGDbuB16tzqNkiTzVkhxtwc9fCDtnHaiVm7j2H',
    maptype: 'dreamy-gold',
    poi: true,
    traffic: true,
    maxZoom: 19,
    attribution: "Amirreza Jananfar"
});

// Definig map view base on user's location
const default_zoom = 18; // Defining a default map zoom
let current_user_location, current_user_accuracy;
// Defining a function to declare what should happen after location found event
my_map.on('locationfound', function (e) {
    // Checking if user's location set
    if (current_user_location) {
        my_map.removeLayer(current_user_location);
        my_map.removeLayer(current_user_accuracy);
    }
    // Defining approximate user's location
    let radius = Math.floor(e.accuracy);
    // Adding a pin marker on user's location
    current_user_location = L.marker(e.latlng).addTo(my_map)
        .bindPopup("شما در فاصله " + radius + " متری این محدوده قرار دارید.").openPopup();
    // Adding a circle around the user's location pin
    current_user_accuracy = L.circle(e.latlng, radius).addTo(my_map);
});
// Defining a function for handling problems while getting user's location
my_map.on('locationerror', function (e) {
    console.log(e.message);
});
// Definig a function to get user's location & set map view
function user_location() {
    my_map.locate({ setView: true, maxZoom: default_zoom });
}
// Calling user location function
user_location();

// Getting view bound
let north_line = my_map.getBounds().getNorth();
let south_line = my_map.getBounds().getSouth();
let west_line = my_map.getBounds().getWest();
let east_line = my_map.getBounds().getEast();
