// Defining map type, api key & some settings
const default_location = [35.699733399159, 51.33806419367]; //Defining a default location
const default_zoom = 15; // Defining a default map zoom
let my_map = L.map('my-map'); // getting map as a variable
my_map.setView(default_location, default_zoom); // Setting a default view
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: '<a href="https://github.com/rezajananfar">Amirreza Jananfar</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    maxZoom: 19
}).addTo(my_map);

// Getting view bound
let north_line = my_map.getBounds().getNorth();
let south_line = my_map.getBounds().getSouth();
let west_line = my_map.getBounds().getWest();
let east_line = my_map.getBounds().getEast();

// Definig map view base on user's location
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
// user_location();

// Calling submit location modal form
my_map.on('dblclick', function (e) {
    // Adding pin to selected point
    L.marker(e.latlng).addTo(my_map);
    // Opening modal
    $('#submit-location-modal').modal('show');
    // Getting selected point's lat & lng
    $('#lat-display').val(e.latlng.lat);
    $('#lng-display').val(e.latlng.lng);
    // Resetting form inputs
    $('#location-type').val(0);
    $('#location-name').val('');
});

$(document).ready(function () {
    // Sending submitted data from location form to the server via ajax
    $('form#add-location-form').submit(function (e) {
        e.preventDefault(); // Preventing default form submitting
        let form = $(this);
        let result = form.find('#result');
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function (response) {
                result.html(response);
                // Resetting form inputs
                form.find('input#location-name').val('');
                form.find('select#location-type').val(0);
            }
        });
    });
});