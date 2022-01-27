var map = L.map('map').setView([-34.6280916, -58.4218086], 19);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([-34.6280916, -58.4218086]).addTo(map)
    .bindPopup('Quintino Bocayuya 1241, CABA.')
    .openPopup();