var ctx = document.getElementById('topProductsChart').getContext('2d');

var barColors = [
    'rgba(255, 99, 132, 0.8)',
    'rgba(54, 162, 235, 0.8)',
    'rgba(255, 206, 86, 0.8)',
    'rgba(75, 192, 192, 0.8)',
    'rgba(153, 102, 255, 0.8)'
];

var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: productsData,
        datasets: [{
            label: 'Cantidad Vendida',
            data: salesData,
            backgroundColor: barColors,
            borderColor: 'rgba(0, 0, 0, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Cantidad Vendida'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Productos'
                }
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Top 5 Productos Más Vendidos'
            },
            legend: {
                display: false
            }
        }
    }
});