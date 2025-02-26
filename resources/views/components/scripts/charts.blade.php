<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('expensesChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            // labels: {!! json_encode($chartLabels) !!},
            datasets: [{
                label: 'Dépenses',
                // data: {!! json_encode($chartData) !!},
                borderColor: '#2563eb',
                backgroundColor: '#2563eb10',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: true,
                        drawBorder: false,
                        color: '#f1f5f9'
                    },
                    ticks: {
                        callback: function(value) {
                            return value + ' DH';
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
});
</script>