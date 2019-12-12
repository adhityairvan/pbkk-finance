$(document).ready(function (){
   const chart = $('#myPieChart');
   fetch('/mutasi/pemasukanApi')
       .then(response => {
           response.json()
               .then(json => {
                   var myChart = new Chart(chart, {
                       type: 'doughnut',
                       data: {
                           labels: json.map((item) => item[0]),
                           datasets: [{
                               label: 'wow',
                               data: json.map(item => item[1]),
                               backgroundColor: ['red', 'green', 'blue', 'purple', 'pink', 'yellow', 'orange', 'lightblue']
                           }]
                       }
                   })
               })
       });
});