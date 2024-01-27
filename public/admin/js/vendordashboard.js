
function rendervendorsales() {
  const ctx = document.getElementById('vendorsales');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['January', 'February', 'April', 'May'],
      datasets: [{
        label: 'Revenue',
        data: [52, 48, 40, 58, 0],
        backgroundColor: [
          'rgb(255, 86, 86)',
          'rgb(255, 213, 86)',
          'rgb(86, 255, 125)',
          'rgb(86, 230, 255)',
        ],
        borderWidth: 1,
      }],
    },
  });
}
rendervendorsales();


function rendervendorAve(){

  const ctx = document.getElementById('vendorave');

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
          label: 'Average Order Value',
          data: [ 80, 78, 69, 80, 0],
          backgroundColor: [
            'rgb(255, 86, 86)',
            'rgb(255, 213, 86)',
            'rgb(86, 255, 125)',
            'rgb(86, 230, 255)'
          ],
          borderWidth: 1,
        }]
  }
});

}
rendervendorAve()

function rendervendorTop() {
  const ctx = document.getElementById('topselling');

  new Chart(ctx, {
      type: 'bar',
      data: {
          labels: [
              'Mushroom Chips',
              'Vermicast',
              'ZAMPEN Native Chicken',
              'Fresh Mushroom'
          ],
          datasets: [{
              label: 'Top Products By Sales',
              data: [178, 168, 158, 138],
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
          indexAxis: 'y',  // Set the index axis to 'y' for horizontal bar chart
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
rendervendorTop();

function renderTurnOver(){
  const ctx = document.getElementById('inventory');

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
        label: '',
        data: [65, 59, 80, 81, 56, 55, 40],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1,
        borderWidth: 1,
      }]
    },
  });
}
renderTurnOver()


function renderCancelation(){
  var ctx = document.getElementById('cancelation');

  new Chart(ctx,{
    type: 'pie',
    data: { 
      labels: [
      'Pending',
      'In Process',
      'Shipped',
      'Delivered'
    ],
    datasets: [{
      data: [300, 20, 300, 1200],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(82, 94, 250)'
      ],
      hoverOffset: 4,
      borderWidth: 0.08,
      borderColor: ('#111112')
    }]},
  });
}
renderCancelation()

function renderSalesGrownth(){
  const ctx = document.getElementById('salesgrowth');

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
        label: '',
        data: [65, 59, 80, 81, 56, 55, 40],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1,
        borderWidth: 1,
      }]
    },
  });
}
renderSalesGrownth()