var ctx = document.getElementById('globalIncomeChart').getContext('2d');

var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: datesData,
        datasets: [{
            label: 'Ingresos Diarios',
            data: incomesData,
            fill: true,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            pointRadius: 3,
            pointBackgroundColor: 'rgba(75, 192, 192, 1)',
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        scales: {
            x: {
                type: 'time',
                time: {
                    unit: 'day',
                    displayFormats: {
                        day: 'MMM d'
                    }
                },
                title: {
                    display: true,
                    text: 'Fecha'
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Ingresos ($)'
                }
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Ingresos Globales Diarios'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        var label = context.dataset.label || '';
                        if (label) {
                            label += ': ';
                        }
                        if (context.parsed.y !== null) {
                            label += new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'USD' }).format(context.parsed.y);
                        }
                        return label;
                    }
                }
            }
        }
    }
});