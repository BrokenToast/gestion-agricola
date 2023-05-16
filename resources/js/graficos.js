import Chart from 'chart.js/auto';

new Chart($grafica, {
    type: 'line',// Tipo de gráfica
    data: {
        labels: [],
        datasets: [
            datosVentas2020,
            // Aquí más datos...
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});
