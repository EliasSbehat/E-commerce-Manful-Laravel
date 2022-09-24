<div class="my-5">
<canvas id="myChart" height="100px"></canvas>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script type="text/javascript">
      // Display Chart
      var sales = [0,0,0,0,0,0,0,0,{{$totalSales}}];
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
  

  //Display greeting according to time of day(Admin)
      let greeting = document.getElementById('greeting');
      var now = new Date();
      var hrs = now.getHours();
      var msg = "";

      if (hrs >  4) msg = "Good morning";      // After 5am
      if (hrs > 12) msg = "Good afternoon";    // After 12pm
      if (hrs > 17) msg = "Good evening";      // After 5pm
      if (hrs > 22 && hrs >= 0) msg = "Have a good night"; //After 10pm
      greeting.innerText = msg;

</script>