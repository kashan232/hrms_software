<script>
    // Dynamic expense data from backend
    var expenseData = {
        paid: {{ $expenseData['paid'] }},
        pending: {{ $expenseData['pending'] }},
        rejected: {{ $expenseData['rejected'] }}
    };

    // ApexCharts configuration for a bar chart
    var options = {
        chart: {
            type: 'bar',
            height: 250
        },
        series: [{
            name: 'Expense Status',
            data: [expenseData.paid, expenseData.pending, expenseData.rejected] // Amounts for Paid, Pending, Rejected
        }],
        xaxis: {
            categories: ['Paid', 'Pending', 'Rejected'], // Labels
            title: {
                text: 'Status'
            }
        },
        yaxis: {
            title: {
                text: 'Amount'
            }
        },
        colors: ['#4ba064', '#ffc107', '#dc3545'], // Colors for each status
        legend: {
            position: 'top'
        },
        tooltip: {
            y: {
                formatter: function(value) {
                    return '₹' + value.toLocaleString(); // Show formatted currency
                }
            }
        }
    };

    // Render the chart
    var chart = new ApexCharts(document.querySelector("#expenseBarChart"), options);
    chart.render();
</script>