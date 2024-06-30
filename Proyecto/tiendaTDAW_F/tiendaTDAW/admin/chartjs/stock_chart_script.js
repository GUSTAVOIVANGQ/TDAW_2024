var ctx1 = document.getElementById('stockChart').getContext('2d');

var chartColors = [
    'rgba(255, 99, 132, 0.8)',
    'rgba(54, 162, 235, 0.8)',
    'rgba(255, 206, 86, 0.8)',
    'rgba(75, 192, 192, 0.8)',
    'rgba(153, 102, 255, 0.8)',
    'rgba(255, 159, 64, 0.8)',
    'rgba(199, 199, 199, 0.8)',
    'rgba(83, 102, 255, 0.8)',
    'rgba(40, 159, 64, 0.8)',
    'rgba(210, 105, 30, 0.8)'
];

var chart = new Chart(ctx1, {
    type: 'pie',
    data: {
        labels: productsData,
        datasets: [{
            data: stocksData,
            backgroundColor: chartColors,
            borderColor: 'rgba(255, 255, 255, 0.8)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'right',
            },
            title: {
                display: true,
                text: 'Stock Disponible por Producto'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        var label = context.label || '';
                        var value = context.parsed || 0;
                        var sum = context.dataset.data.reduce((a, b) => a + b, 0);
                        var percentage = Math.round((value / sum) * 100);
                        return label + ': ' + value + ' unidades (' + percentage + '%)';
                    }
                }
            }
        }
    }
});