// Defining map type & API key
let my_map = new L.Map('my-map', {
    key: 'web.K3nGDbuB16tzqNkiTzVkhxtwc9fCDtnHaiVm7j2H',
    maptype: 'dreamy-gold',
    poi: true,
    traffic: true,
    maxZoom: 19
});

// Definig map view
const default_center = [35.699732, 51.33806];
const default_zoom = 15;
my_map.setView(default_center, default_zoom);

// Adding pin marker to map
let marker = L.marker(default_center).addTo(my_map).bindPopup("میدان آزادی").openPopup();

// Getting view bound
let north_line = my_map.getBounds().getNorth();
let south_line = my_map.getBounds().getSouth();
let west_line = my_map.getBounds().getWest();
let east_line = my_map.getBounds().getEast();

