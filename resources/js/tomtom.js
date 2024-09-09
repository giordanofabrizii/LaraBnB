import tt from '@tomtom-international/web-sdk-maps';
import { services } from '@tomtom-international/web-sdk-services';
import SearchBox from '@tomtom-international/web-sdk-plugin-searchbox';

// Map and searchBox initialization when the DOM is ready
document.addEventListener('DOMContentLoaded', function () {

    const map = tt.map({
        key: "9ndAiLQMA0GuE3FRyeJN3u42T2H4UMvU",
        container: "map",
        center: [12.4964, 41.9028],
        zoom: 8,
    });

    // SearchBox
    const searchOptions = {
        key: "9ndAiLQMA0GuE3FRyeJN3u42T2H4UMvU",
        language: "it-IT",
        limit: 10,
    };

    // Searchbox initialization
    const searchBox = new SearchBox(services, {
        searchOptions: searchOptions,
        placeholder: "Cerca una posizione",
    });

    // Add the SearchBox to the map
    map.addControl(searchBox, 'top-left');

    const markers = [];

    searchBox.on('tomtom.searchbox.resultsfound', function (data) {
        const results = data.data.results.fuzzySearch.results;
        if (results.length > 0) {
            const firstResult = results[0];
            map.flyTo({
                center: firstResult.position,
                zoom: 14,
            });

            markers.forEach(marker => marker.remove());

            markers.length = 0;

            // Marker setting on map
            const marker = new tt.Marker()
                .setLngLat(firstResult.position)
                .setPopup(new tt.Popup({ offset: 5 }).setHTML(`
                    <h1>${firstResult.address.municipality || 'Località'}</h1>
                    <p>${firstResult.address.countrySubdivision || ''} ${firstResult.address.countrySecondarySubdivision || ''}</p>
                `))
                .addTo(map);

                markers.push(marker);

            // Save the address to the form
            document.getElementById('address').value = firstResult.address.freeformAddress || '';
            document.getElementById('latitude').value = firstResult.position.lat;
            document.getElementById('longitude').value = firstResult.position.lng;
        } else {
            console.log("Nessun risultato trovato.");
        }
        });


    // No results event
    searchBox.on('tomtom.searchbox.noresults', function () {
        console.log("Nessun risultato trovato per questa ricerca.");
    });

    // Error management
    searchBox.on('tomtom.searchbox.error', function (error) {
        console.error("Errore durante la ricerca:", error);
    });
});
