import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', async function() {
    try {
        const response = await fetch('/api/statistics');
        const contentType = response.headers.get("content-type");

        if (contentType && contentType.includes("application/json")) {
            const data = await response.json();
            // Elabora i dati JSON
            const labels = data.map(row => row.month);
            const counts = data.map(row => row.count);

            new Chart(document.getElementById('statsChart'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Views per month',
                        data: counts
                    }]
                }
            });
        } else {
            console.error("La risposta non è in formato JSON:", await response.text());
        }
    } catch (error) {
        console.error('Errore durante il recupero dei dati:', error);
    }
});

