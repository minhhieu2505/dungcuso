<!-- Main content -->
<section class="content mb-3">
  <div class="container-fluid">
    <h5 class="pt-3 pb-2">Dashboard</h5>
  </div>
</section>

<?php /* File Chart */
	require_once SOURCES . "index.php"; ?>

<section class="content pb-4">
  <div class="container-fluid">
    <div class="card">
      <div>
        <canvas id="myChart"></canvas>
      </div>
    </div>
  </div>
</section>


<script>
  var T1 = <?= (!empty($total_Order_1) ? $total_Order_1 : 0) ?>;
  var T2 = <?= (!empty($total_Order_2) ? $total_Order_2 : 0) ?>;
  var T3 = <?= (!empty($total_Order_3) ? $total_Order_3 : 0) ?>;
  var T4 = <?= (!empty($total_Order_4) ? $total_Order_4 : 0) ?>;
  var T5 = <?= (!empty($total_Order_5) ? $total_Order_5 : 0) ?>;
  var T6 = <?= (!empty($total_Order_6) ? $total_Order_6 : 0) ?>;
  var T7 = <?= (!empty($total_Order_7) ? $total_Order_7 : 0) ?>;
  var T8 = <?= (!empty($total_Order_8) ? $total_Order_8 : 0) ?>;
  var T9 = <?= (!empty($total_Order_9) ? $total_Order_9 : 0) ?>;
  var T10 = <?= (!empty($total_Order_10) ? $total_Order_10 : 0) ?>;
  var T11 = <?= (!empty($total_Order_11) ? $total_Order_11 : 0) ?>;
  var T12 = <?= (!empty($total_Order_12) ? $total_Order_12 : 0) ?>;
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
      datasets: [{
        label: 'Doanh thu',
        data: [T1, T2, T3, T4, T5, T6, T7, T8, T9, T10, T11, T12],
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