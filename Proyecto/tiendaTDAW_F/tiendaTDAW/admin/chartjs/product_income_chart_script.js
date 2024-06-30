const categorySelector = document.getElementById('categorySelector');
const tx2 = document.getElementById('productIncomeChart').getContext('2d');
let incomeChart;

// Poblar el selector de categorías
categoryList.forEach(category => {
    const option = document.createElement('option');
    option.value = category.cat_id;
    option.textContent = category.cat_title;
    categorySelector.appendChild(option);
});

function updateChart(selectedCategoryId) {
    let filteredData = selectedCategoryId === 'all' 
        ? productRevenueData 
        : productRevenueData.filter(item => item.cat_id == selectedCategoryId);

    filteredData.sort((a, b) => b.revenue - a.revenue);
    const topProducts = filteredData.slice(0, 10);

    const labels = topProducts.map(item => item.product_title);
    const revenues = topProducts.map(item => parseFloat(item.revenue));

    if (incomeChart) {
        incomeChart.destroy();
    }

    incomeChart = new Chart(tx2, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Ingresos por Producto',
                data: revenues,
                backgroundColor: 'rgba(75, 192, 192, 0.8)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: `Top 10 Productos por Ingresos - ${selectedCategoryId === 'all' ? 'Todas las categorías' : categoryList.find(cat => cat.cat_id == selectedCategoryId).cat_title}`
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
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
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Ingresos ($)'
                    },
                    ticks: {
                        callback: function(value, index, values) {
                            return new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'USD' }).format(value);
                        }
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Productos'
                    },
                    ticks: {
                        callback: function(value, index, values) {
                            return this.getLabelForValue(value).substring(0, 15) + '...';
                        }
                    }
                }
            }
        }
    });
}

categorySelector.addEventListener('change', function() {
    updateChart(this.value);
});

// Inicializar el gráfico con todas las categorías
updateChart('all');