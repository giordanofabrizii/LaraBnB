import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', async function() {
    try {
        const response = await fetch('/api/statistics');
        const data = await response.json();
        const graphEl = document.getElementsByClassName('graph');

        // Trova il numero massimo di visualizzazioni tra tutti gli appartamenti
        let maxViews = 0;
        data.forEach(apartment => {
            const maxForApartment = Math.max(...Object.values(apartment.views_by_month));
            if (maxForApartment > maxViews) {
                maxViews = maxForApartment;
            }
        });

        data.forEach(apartment => {
            for (let i = 0; i < graphEl.length; i++) {
                let el = graphEl[i];

                if (el['id'] == apartment['apartment_id']) {
                    const canvas = document.createElement('canvas');
                    el.appendChild(canvas);

                    new Chart(canvas, {
                        type: 'bar',
                        data: {
                            labels: Object.keys(apartment.views_by_month),
                            datasets: [{
                                label: `Views for ${apartment.apartment_name}`,
                                data: Object.values(apartment.views_by_month)
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true, // Partenza da 0 sull'asse y
                                    suggestedMax: maxViews // Imposta il massimo comune per l'asse y
                                }
                            }
                        }
                    });
                }
            }
        });

        removeLoader();

    } catch (error) {
        console.error('Errore durante il recupero dei dati:', error);
    }
});

async function removeLoader(){
    setTimeout(() => {
        document.querySelector('.graphs').classList.remove('off');
        document.querySelector('.loading').classList.remove('on');
    }, 1500);
}


