function vendorSales(){

    const ctx = document.getElementById('vendorsales');

    new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            'Jannuary',
            'February',
            'April',
            'May'
          ],
          datasets: [{
            label: 'Overall Revenue',
            data: [200, 50, 100, 80],
            backgroundColor: [
              'rgb(255, 86, 86)',
              'rgb(255, 213, 86)',
              'rgb(86, 255, 125)',
              'rgb(86, 230, 255)'
            ],
            borderWidth: 1,
          }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
}
vendorSales()