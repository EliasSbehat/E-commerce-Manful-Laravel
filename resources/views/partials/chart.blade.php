<div class="my-5">
<canvas id="myChart" height="100px"></canvas>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script type="text/javascript">

      var sales = [{{$totalSales}}];
      const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];

const d = new Date();
let name = month[d.getMonth()];
  
      const data = {
        labels: month,
        datasets: [{
          label: 'Total Sales',
          backgroundColor: 'rgb(49, 0, 173)',
          borderColor: 'rgb(49, 0, 173) ',
          data: sales,
        }]
      };
  
      const config = {
        type: 'bar',
        data: data,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        },
      };
  
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
  
</script>