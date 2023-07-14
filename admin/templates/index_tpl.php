<!-- Main content -->
<section class="content mb-3">
  <div class="container-fluid">
    <h5 class="pt-3 pb-2">Dashboard</h5>
  </div>
</section>

<?php
/* Lấy đơn hàng - đã giao */
$monthCurrent = date('m', time());
$yearCurrent = date('y', time());
// Tháng 1
$t1_start = strtotime('1/1/' . $yearCurrent);
if ($monthCurrent == 1)
  $t1_end = time();
else
  $t1_end = strtotime('31/1/' . $yearCurrent);
$order_count_1 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created > '" . $t1_start . "' and date_created < '" . $t1_end . "' and order_status = 3");
$total_Order_1 = $order_count_1['sum(total_price)'];

// Tháng 2
$t2_start = strtotime('1/2/' . $yearCurrent);
if ($monthCurrent == 2)
  $t2_end = time();
else
  $t2_end = strtotime('1/3/' . $yearCurrent);
$order_count_2 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created > '" . $t2_start . "' and date_created < '" . $t2_end . "' and order_status = 3");
$total_Order_2 = $order_count_2['sum(total_price)'];

// Tháng 3
$t3_start = strtotime('1/3/' . $yearCurrent);
if ($monthCurrent == 3)
  $t3_end = time();
else
  $t3_end = strtotime('31/3/' . $yearCurrent);
$order_count_3 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created > '" . $t3_start . "' and date_created < '" . $t3_end . "' and order_status = 3");
$total_Order_3 = $order_count_3['sum(total_price)'];

// Tháng 4
$t4_start = strtotime('1/4/' . $yearCurrent);
if ($monthCurrent == 4)
  $t4_end = time();
else
  $t4_end = strtotime('30/4/' . $yearCurrent);
$order_count_4 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created > '" . $t4_start . "' and date_created < '" . $t4_end . "' and order_status = 3");
$total_Order_4 = $order_count_4['sum(total_price)'];

// Tháng 5
$t5_start = strtotime('1/5/' . $yearCurrent);
if ($monthCurrent == 5)
  $t5_end = time();
else
  $t5_end = strtotime('31/5/' . $yearCurrent);
$order_count_5 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created > '" . $t5_start . "' and date_created < '" . $t5_end . "' and order_status = 3");
$total_Order_5 = $order_count_5['sum(total_price)'];

// Tháng 6
$t6_start = strtotime('1/6/' . $yearCurrent);
if ($monthCurrent == 6)
  $t6_end = time();
else
  $t6_end = strtotime('30/6/' . $yearCurrent);
$order_count_6 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created > '" . $t6_start . "' and date_created < '" . $t6_end . "' and order_status = 3");
$total_Order_6 = $order_count_6['sum(total_price)'];

// Tháng 7
$t7_start = strtotime('1/7/' . $yearCurrent);
if ($monthCurrent == 7)
  $t7_end = time();
else
  $t7_end = strtotime('31/07/' . $yearCurrent);
;
$order_count_7 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created >= '" . $t7_start . "' and date_created <= '" . $t7_end . "' and order_status = 3");
$total_Order_7 = $order_count_7['sum(total_price)'];

// Tháng 8
$t8_start = strtotime('1/8/' . $yearCurrent);
if ($monthCurrent == 8)
  $t8_end = time();
else
  $t8_end = strtotime('31/08/' . $yearCurrent);
;
$order_count_8 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created >= '" . $t8_start . "' and date_created <= '" . $t8_end . "' and order_status = 3");
$total_Order_8 = $order_count_8['sum(total_price)'];

// Tháng 9
$t9_start = strtotime('1/9/' . $yearCurrent);
if ($monthCurrent == 9)
  $t9_end = time();
else
  $t9_end = strtotime('30/09/' . $yearCurrent);
;
$order_count_9 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created >= '" . $t9_start . "' and date_created <= '" . $t9_end . "' and order_status = 3");
$total_Order_9 = $order_count_9['sum(total_price)'];

// Tháng 10
$t10_start = strtotime('1/10/' . $yearCurrent);
if ($monthCurrent == 10)
  $t10_end = time();
else
  $t10_end = strtotime('31/10/' . $yearCurrent);
;
$order_count_10 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created >= '" . $t10_start . "' and date_created <= '" . $t10_end . "' and order_status = 3");
$total_Order_10 = $order_count_10['sum(total_price)'];

// Tháng 11
$t11_start = strtotime('1/11/' . $yearCurrent);
if ($monthCurrent == 11)
  $t11_end = time();
else
  $t11_end = strtotime('30/11/' . $yearCurrent);
;
$order_count_11 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created >= '" . $t11_start . "' and date_created <= '" . $t11_end . "' and order_status = 3");
$total_Order_11 = $order_count_11['sum(total_price)'];

// Tháng 12
$t12_start = strtotime('1/12/' . $yearCurrent);
if ($monthCurrent == 12)
  $t12_end = time();
else
  $t12_end = strtotime('30/12/' . $yearCurrent);
;
$order_count_12 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created >= '" . $t12_start . "' and date_created <= '" . $t12_end . "' and order_status = 3");
$total_Order_12 = $order_count_12['sum(total_price)'];
?>

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