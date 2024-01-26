
function renderSales(){

    const ctx = document.getElementById('barchart');

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
renderSales()

function renderTopProducts(){

    const ctx = document.getElementById('topProdChart');    
    

    new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            'Mushroom Chips',
            'ZAMPEN Native Chicken',
            'Vermicast',
            'Fresh Mushroom'
          ],
          datasets: [{
            label: 'Top Products',
            data: [200, 189, 100, 10],
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
      indexAxis: 'y',
      // Elements options apply to all of the options unless overridden in a dataset
      // In this case, we are setting the border of each horizontal bar to be 2px wide
      elements: {
        bar: {
          borderWidth: 2,
        }
      },
      responsive: true,
      plugins: {
        legend: {
          position: 'right',
        },
        title: {
          display: true,
          text: 'Chart.js Horizontal Bar Chart'
        }
      }
    },
  });

}
renderTopProducts()

function renderTopSeller(){

    const ctx = document.getElementById('topSeller');    
    

    new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            'Maria',
            'Juan',
            'April',
            'Kent'
          ],
          datasets: [{
            axis: 'y',
            label: 'Overall Revenue',
            data: [1800, 1547, 1201, 1120],
            fill: false,
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
      indexAxis: 'y',
    }
  });

}
renderTopSeller()

function renderRetension(){
  const ctx = document.getElementById('retension');

  new Chart(ctx,{
    type: 'line',
    data: {
      labels: [
        'Jannuary',
        'February',
        'April',
        'May'
      ],
      datasets: [{
        label: 'My First Dataset',
        data: [65, 59, 80, 81, 56, 55, 40],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1,
        borderWidth: 1,
      }]
    },
  });
}
renderRetension()

function renderCategory(){

  const ctx = document.getElementById('category');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [
          'Mushroom',
          'Chicken',
          'Vermicast'
        ],
        datasets: [{
          axis: 'y',
          label: 'Top Category',
          data: [200, 189, 150 ,120],
          backgroundColor: [
            'rgb(255, 86, 86)',
            'rgb(255, 213, 86)',
            'rgb(86, 255, 125)',
          ],
          borderWidth: 1,
        }]
  },
    options: {
      indexAxis: 'y',
    }
});
}
renderCategory()

function renderBarangay(){
  
  const ctx = document.getElementById('barangay');    
    

  new Chart(ctx, {
  type: 'bar',
  data: {
      labels: [
          'Mercedes',
          'Divisoria',
          'Pasonanca',
          'Zambowood'
        ],
        datasets: [{
          axis: 'y',
          label: 'Top Barangay',
          data: [1800, 1547, 1201, 1120],
          fill: false,
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
    indexAxis: 'y',
  }
});
}
renderBarangay()

function renderStatus(){
  var ctx = document.getElementById('sellTrough');

  new Chart(ctx,{
    type: 'doughnut',
    data: { 
      labels: [
      'Pending',
      'In Process',
      'Shipped',
      'Delivered'
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [300, 20, 300, 1200],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(82, 94, 250)'
      ],
      hoverOffset: 4
    }]},
  });
}
renderStatus()