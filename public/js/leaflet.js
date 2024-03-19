var address = "15 Av. Carnot, 30100 Alès";
var zoomLevel = 15;

function initializeMap() {
    // Si une carte existe déjà, no la supprime.
    if (window.mapInstance) {
        window.mapInstance.remove();
    }

    // Réinitialisation du conteneur de la carte
    var container = L.DomUtil.get('map');
    if (container != null) {
        container._leaflet_id = null;
    }

    // Obtenir les coordonnées de l'adresse
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${address}`)
        .then(response => response.json())
        .then(data => {
            if (data && data.length) {
                let latitude = parseFloat(data[0].lat);
                let longitude = parseFloat(data[0].lon);

                // Initialisation de la carte avec les coordonnées obtenues
                window.mapInstance = L.map('map').setView([latitude, longitude], zoomLevel);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    // attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                    maxZoom: 19,
                }).addTo(window.mapInstance);

                // Ajout d'un marqueur à la position spécifiée
                L.marker([latitude, longitude]).addTo(window.mapInstance);
            } else {
                console.log("Adresse non trouvée");
            }
        })
        .catch(error => {
            console.error("Erreur lors de la récupération des coordonnées:", error);
        });
}

document.addEventListener("DOMContentLoaded", function() {
    initializeMap();
});