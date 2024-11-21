
<script>
    const expenseLabels = @json($expenseLabels);
    const expenseData = @json($expenseData);

    const expenseCtx = document.getElementById('expenseChart').getContext('2d');
    const expenseChart = new Chart(expenseCtx, {
        type: 'bar',
        data: {
            labels: expenseLabels, // Dates from the database
            datasets: [{
                label: 'Expenses',
                data: expenseData, // Total expenses from the database
                backgroundColor: '#007bff',
                borderColor: '#fff',
                borderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: '#000'
                    }
                },
                title: {
                    display: true,
                    text: 'Expense Overview',
                    color: '#000'
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#000',
                    },
                },
                x: {
                    ticks: {
                        color: '#000',
                    },
                }
            }
        }
    });
</script>