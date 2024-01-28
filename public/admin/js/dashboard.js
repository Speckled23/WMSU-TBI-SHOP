

var OverallRevenueChart = document.getElementById('barchart');
var OverallRevenueChartVar ;
function renderSales(){
    var year = $('#overallRevenue').val()
    var monthdata = [0,0,0,0,0,0,0,0,0,0,0,0]
    var monthlabel = ['January','February','March','April','May','June','July','August','September','October','November','December']
    var bgcolor = []
    const randomBetween = (min, max) => min + Math.floor(Math.random() * (max - min + 1));
    $.ajax({url: 'dashboard-adminoverallRevenue/'+year, 
      success: function(result){
        result.forEach(element  => {
          monthdata[element.month-1] = element.total_per_month
          bgcolor.push('rgb('+(randomBetween(0, 255))+','+(randomBetween(0, 255))+','+(randomBetween(0, 255))+')')
        });
        if(OverallRevenueChartVar){
          OverallRevenueChartVar.destroy();
        }
        OverallRevenueChartVar = new Chart(OverallRevenueChart, {
          type: 'bar',
          data: {
            labels: monthlabel,
              datasets: [{
                label: 'Overall Revenue',
                data: monthdata,
                backgroundColor: bgcolor,
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
    });
}
renderSales()


var TopProducts = document.getElementById('topProdChart');  
var TopProductsVar ;
function renderTopProducts(){
  var year = $('#topProducts').val()
  var labels = []
  var data = []
  var color = [];
  const randomBetween = (min, max) => min + Math.floor(Math.random() * (max - min + 1));
  $.ajax({url: 'dashboard-admintopProducts/'+year, 
    success: function(result){
      result.forEach(element  => {
        labels.push(element.product_name)
        data.push(element.total_product_sales)
        color.push('rgb('+(randomBetween(0, 255))+','+(randomBetween(0, 255))+','+(randomBetween(0, 255))+')')
       
        if(TopProductsVar){
          TopProductsVar.destroy();
        }
        TopProductsVar = new Chart(TopProducts, {
          type: 'bar',
          data: {
              labels: labels,
                datasets: [{
                  label: 'Top Products',
                  data: data,
                  backgroundColor: color,
                  borderWidth: 1,
                }]
          },
          options: {
            indexAxis: 'y',
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
      });
    }
  });
      
 

}
renderTopProducts()

var topSellers = document.getElementById('topSeller');    
var topSellersvar;
function renderTopSeller(){
  var sellerLabels = [];
  var sellerTotolOrders = [];
  var color = [];
  var year = $('#topSellers').val()
  const randomBetween = (min, max) => min + Math.floor(Math.random() * (max - min + 1));
  $.ajax({url: 'dashboard-admintopSellers/'+year, 
    success: function(result){
      result.forEach(element  => {
        sellerLabels.push(element.name)
        sellerTotolOrders.push(element.total_revenue)
        color.push('rgb('+(randomBetween(0, 255))+','+(randomBetween(0, 255))+','+(randomBetween(0, 255))+')')
      });
      if(topSellersvar){
        topSellersvar.destroy();
      }
      topSellersvar = new Chart(topSellers, {
      type: 'bar',
      data: {
        labels: sellerLabels,
          datasets: [{
            axis: 'y',
            label: 'Overall Revenue',
            data: sellerTotolOrders,
            fill: false,
            backgroundColor: color,
            borderWidth: 1,
          }]
        },
        options: {
          indexAxis: 'y',
        }
      });
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

var topCategory = document.getElementById('category');
var topCategoryvar;
function renderCategory(){
  var labels =[];
  var data = [];
  var colors = [];
  var year = $('#topCategory').val()
  const randomBetween = (min, max) => min + Math.floor(Math.random() * (max - min + 1));
  $.ajax({url: 'dashboard-admintopCategory/'+year, 
    success: function(result){
      result.forEach(element  => {
        labels.push(element.category_name)
        data.push(element.total_product_qty)
        colors.push('rgb('+(randomBetween(0, 255))+','+(randomBetween(0, 255))+','+(randomBetween(0, 255))+')')
      });
      if(topCategoryvar){
        topCategoryvar.destroy();
      }
      topCategoryvar = new Chart(topCategory, {
        type: 'bar',
        data: {
          labels:labels,
            datasets: [{
              axis: 'y',
              label: 'Top Category',
              data: data,
              backgroundColor: colors,
              borderWidth: 1,
            }]
      },
        options: {
          indexAxis: 'y',
        }
    });
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

var orderStatus = document.getElementById('sellTrough');
var orderStatusVar ;
function renderStatus(){
  var labels =[];
  var data = [];
  var colors = [];
  var year = $('#orderStatus').val()
  const randomBetween = (min, max) => min + Math.floor(Math.random() * (max - min + 1));
  $.ajax({url: 'dashboard-adminorderStatus/'+year, 
    success: function(result){
      result.forEach(element  => {
        if(element.item_status == null || element.item_status == '' || element.item_status == 'Pending'){
          if(!labels.find(element  => {
            if(element == 'Pending'){
              return true;
            }
          })){
            labels.push('Pending')
            data.push(element.item_status_count)
          }else{
            for (let index = 0; index < labels.length; index++) {
              if(labels[index] == 'Pending'){
                data[index]+=element.item_status_count;
              }
            }
          }
        }else{
          labels.push(element.item_status)
          data.push(element.item_status_count)
        }
        colors.push('rgb('+(randomBetween(0, 255))+','+(randomBetween(0, 255))+','+(randomBetween(0, 255))+')')
      });
      if(orderStatusVar){
        orderStatusVar.destroy();
      }
      orderStatusVar = new Chart(orderStatus,{
        type: 'doughnut',
        data: { 
          labels: labels,
        datasets: [{
          label: 'Order Status',
          data:data,
          backgroundColor:colors,
          hoverOffset: 4
        }]},
      });

    }
  });  
}
renderStatus()
