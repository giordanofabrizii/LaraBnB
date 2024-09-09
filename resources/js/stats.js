import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', async function() {
    try {
        const response = await fetch('/api/statistics');
        const data = await response.json();
        const graphEl = document.getElementsByClassName('graph');

        data.forEach(apartment => {
            // console.log(apartment);
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
                        }
                    });
                }
            }
        })
    } catch (error) {
        console.error('Errore durante il recupero dei dati:', error);
    }
});



