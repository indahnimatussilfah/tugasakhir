document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('penyakitChart');

    if (ctx) {
        const labels = JSON.parse(ctx.dataset.labels);
        const data = JSON.parse(ctx.dataset.data);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Kasus',
                    data: data,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    }
});
