var ctx = document.getElementById('topCategoriesChart').getContext('2d');

var chartColors = [
    'rgba(255, 99, 132, 0.8)',
    'rgba(54, 162, 235, 0.8)',
    'rgba(255, 206, 86, 0.8)',
    'rgba(75, 192, 192, 0.8)',
    'rgba(153, 102, 255, 0.8)'
];

var chart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: categoriesData,
        datasets: [{
            data: salesData,
            backgroundColor: chartColors,
            borderColor: 'rgba(255, 255, 255, 0.8)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Top 5 Categorías Más Vendidas'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        var label = context.label || '';
                        var value = context.parsed || 0;
                        var sum = context.dataset.data.reduce((a, b) => a + b, 0);
                        var percentage = Math.round((value / sum) * 100);
                        return label + ': ' + value + ' (' + percentage + '%)';
                    }
                }
            }
        },
        cutout: '50%'
    }
});