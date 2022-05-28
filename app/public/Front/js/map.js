// API carte openstreet map

 // On initialise les coordonnées du point qu'on veut voir center sur la carte
 let lat = 47.745429;
 let lon = -3.360740;
 let macarte = null;
 // Fonction d'initialisation de la carte
 function initMap() {
     // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
     macarte = L.map('geomap').setView([lat, lon], 17);
     // Nous devons préciser où nous souhaitons récuperer les cartes. Ici, openstreetmap.fr
     L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', 
     {
         // Il est toujours bien de laisser le lien vers la source des données
         attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
         minZoom: 1,
         maxZoom: 20
     }).addTo(macarte);
    //  créer un marker
     let marker = L.marker([lat, lon]).addTo(macarte);
 }
 window.onload = function()
 {
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    initMap(); 
 };

 