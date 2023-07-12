<!-- Main content -->
<section class="content mb-3">
    <div class="container-fluid">
        <h5 class="pt-3 pb-2">Dashboard</h5>
    </div>
</section>



<section class="content pb-4">
    <div class="container-fluid">
        <div class="card">
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
      datasets: [{
        label: 'Doanh thu',
        data: [1200, 2400, 5600, 7827, 1200, 3567],
        borderWidth: 1
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
</script>
 