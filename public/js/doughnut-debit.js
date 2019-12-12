$(document).ready(function (){
   const chart = $('#myPieChart-debit');
   fetch('/mutasi/pengeluaranApi')
       .then(response => {
           response.json()
               .then(json => {
                   console.log(json);
                   var myChart = new Chart(chart, {
                       type: 'doughnut',
                       data: {
                           labels: json.map((item) => item[0]),
                           datasets: [{
                               label: 'Rp #',
                               data: json.map(item => item[1]),
                               backgroundColor: ['violet', 'lightgreen', 'lightblue', 'lightpurple', 'pink', 'yellow', 'orange']
                           }]
                       }
                   })
               })
       });
});