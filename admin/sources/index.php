<?php 
if(!defined('SOURCES')) die("Error");
/* Lấy đơn hàng - đã giao */
$monthCurrent = date('m', time());
$yearCurrent = date('Y', time());
// Tháng 1
//Doanh số bán ra
$t1_start = strtotime('1-1-' . $yearCurrent);
$t1_end = strtotime('31-1-' . $yearCurrent);
$order_count_1 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created > '" . $t1_start . "' and date_created < '" . $t1_end . "' and order_status = 3");
$total_Order_1 = $order_count_1['sum(total_price)'];
//Doanh số mua về
//Doanh số mua về
$xuatkho_1 = $d->rawQueryOne("select * from `warehouse` where date_created >= '" . $t1_start . "' and date_created <= '" . $t1_end . "' ");
$xuatkho_chitiet_1 = $d->rawQuery("select * from `warehouse_detail` where id_warehouse = ? ",array($xuatkho_1['id']));
$sum_1 = 0;
foreach ($xuatkho_chitiet_1 as $key => $v) {
  $sum_1 += $v['import_price'] * $v['quantity'];
}
$total_Order_1 = $total_Order_1 - $sum_1;
// Tháng 2
$t2_start = strtotime('1-2-' . $yearCurrent);
$t2_end = strtotime('1-3-' . $yearCurrent);
$order_count_2 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created > '" . $t2_start . "' and date_created < '" . $t2_end . "' and order_status = 3");
$total_Order_2 = $order_count_2['sum(total_price)'];
//Doanh số mua về
$xuatkho_2 = $d->rawQueryOne("select * from `warehouse` where date_created >= '" . $t2_start . "' and date_created <= '" . $t2_end . "' ");
$xuatkho_chitiet_2 = $d->rawQuery("select * from `warehouse_detail` where id_warehouse = ? ",array($xuatkho_2['id']));
$sum_2 = 0;
foreach ($xuatkho_chitiet_2 as $key => $v) {
  $sum_2 += $v['import_price'] * $v['quantity'];
}
$total_Order_2 = $total_Order_2 - $sum_2;
// Tháng 3
$t3_start = strtotime('1-3-' . $yearCurrent);
$t3_end = strtotime('31-3-' . $yearCurrent);
$order_count_3 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created > '" . $t3_start . "' and date_created < '" . $t3_end . "' and order_status = 3");
$total_Order_3 = $order_count_3['sum(total_price)'];
//Doanh số mua về
$xuatkho_3 = $d->rawQueryOne("select * from `warehouse` where date_created >= '" . $t3_start . "' and date_created <= '" . $t3_end . "' ");
$xuatkho_chitiet_3 = $d->rawQuery("select * from `warehouse_detail` where id_warehouse = ? ",array($xuatkho_3['id']));
$sum_3 = 0;
foreach ($xuatkho_chitiet_3 as $key => $v) {
  $sum_3 += $v['import_price'] * $v['quantity'];
}
$total_Order_3 = $total_Order_3 - $sum_3;

// Tháng 4
$t4_start = strtotime('1-4-' . $yearCurrent);
$t4_end = strtotime('30-4-' . $yearCurrent);
$order_count_4 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created > '" . $t4_start . "' and date_created < '" . $t4_end . "' and order_status = 3");
$total_Order_4 = $order_count_4['sum(total_price)'];
//Doanh số mua về
$xuatkho_4 = $d->rawQueryOne("select * from `warehouse` where date_created >= '" . $t4_start . "' and date_created <= '" . $t4_end . "' ");
$xuatkho_chitiet_4 = $d->rawQuery("select * from `warehouse_detail` where id_warehouse = ? ",array($xuatkho_4['id']));
$sum_4 = 0;
foreach ($xuatkho_chitiet_4 as $key => $v) {
  $sum_4 += $v['import_price'] * $v['quantity'];
}
$total_Order_4 = $total_Order_4 - $sum_4;
// Tháng 5
$t5_start = strtotime('1-5-' . $yearCurrent);
$t5_end = strtotime('31-5-' . $yearCurrent);
$order_count_5 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created > '" . $t5_start . "' and date_created < '" . $t5_end . "' and order_status = 3");
$total_Order_5 = $order_count_5['sum(total_price)'];
//Doanh số mua về
$xuatkho_5 = $d->rawQueryOne("select * from `warehouse` where date_created >= '" . $t5_start . "' and date_created <= '" . $t5_end . "' ");
$xuatkho_chitiet_5 = $d->rawQuery("select * from `warehouse_detail` where id_warehouse = ? ",array($xuatkho_5['id']));
$sum_5 = 0;
foreach ($xuatkho_chitiet_5 as $key => $v) {
  $sum_5 += $v['import_price'] * $v['quantity'];
}
$total_Order_5 = $total_Order_5 - $sum_5;

// Tháng 6
$t6_start = strtotime('1-6-' . $yearCurrent);
$t6_end = strtotime('30-6-' . $yearCurrent);
$order_count_6 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created > '" . $t6_start . "' and date_created < '" . $t6_end . "' and order_status = 3");
$total_Order_6 = $order_count_6['sum(total_price)'];
//Doanh số mua về
$xuatkho_6 = $d->rawQueryOne("select * from `warehouse` where date_created >= '" . $t6_start . "' and date_created <= '" . $t6_end . "' ");
$xuatkho_chitiet_6 = $d->rawQuery("select * from `warehouse_detail` where id_warehouse = ? ",array($xuatkho_6['id']));
$sum_6 = 0;
foreach ($xuatkho_chitiet_6 as $key => $v) {
  $sum_6 += $v['import_price'] * $v['quantity'];
}
$total_Order_6 = $total_Order_6 - $sum_6;

// Tháng 7
$t7_start = strtotime('1-7-' . $yearCurrent);
$t7_end = strtotime('31-07-' . $yearCurrent);
$order_count_7 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created >= '" . $t7_start . "' and date_created <= '" . $t7_end . "' and order_status = 3");
$total_Order_7 = $order_count_7['sum(total_price)'];
//Doanh số mua về
$xuatkho_7 = $d->rawQueryOne("select * from `warehouse` where date_created >= '" . $t7_start . "' and date_created <= '" . $t7_end . "' ");
$xuatkho_chitiet_7 = $d->rawQuery("select * from `warehouse_detail` where id_warehouse = ? ",array($xuatkho_7['id']));
$sum_7 = 0;
foreach ($xuatkho_chitiet_7 as $key => $v) {
  $sum_7 += $v['import_price'] * $v['quantity'];
}
$total_Order_7 = $total_Order_7 - $sum_7;
// Tháng 8
$t8_start = strtotime('1-8-' . $yearCurrent);
$t8_end = strtotime('31-08-' . $yearCurrent);
$order_count_8 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created >= '" . $t8_start . "' and date_created <= '" . $t8_end . "' and order_status = 3");
$total_Order_8 = $order_count_8['sum(total_price)'];
//Doanh số mua về
$xuatkho_8 = $d->rawQueryOne("select * from `warehouse` where date_created >= '" . $t8_start . "' and date_created <= '" . $t8_end . "' ");
$xuatkho_chitiet_8 = $d->rawQuery("select * from `warehouse_detail` where id_warehouse = ? ",array($xuatkho_8['id']));
$sum_8 = 0;
foreach ($xuatkho_chitiet_8 as $key => $v) {
  $sum_8 += $v['import_price'] * $v['quantity'];
}
$total_Order_8 = $total_Order_8 - $sum_8;

// Tháng 9
$t9_start = strtotime('1-9-' . $yearCurrent);
$t9_end = strtotime('30-09-' . $yearCurrent);
$order_count_9 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created >= '" . $t9_start . "' and date_created <= '" . $t9_end . "' and order_status = 3");
$total_Order_9 = $order_count_9['sum(total_price)'];
//Doanh số mua về
$xuatkho_9 = $d->rawQueryOne("select * from `warehouse` where date_created >= '" . $t9_start . "' and date_created <= '" . $t9_end . "' ");
$xuatkho_chitiet_9 = $d->rawQuery("select * from `warehouse_detail` where id_warehouse = ? ",array($xuatkho_9['id']));
$sum_9 = 0;
foreach ($xuatkho_chitiet_9 as $key => $v) {
  $sum_9 += $v['import_price'] * $v['quantity'];
}
$total_Order_9 = $total_Order_9 - $sum_9;
// Tháng 10
$t10_start = strtotime('1-10-' . $yearCurrent);
$t10_end = strtotime('31-10-' . $yearCurrent);
$order_count_10 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created >= '" . $t10_start . "' and date_created <= '" . $t10_end . "' and order_status = 3");
$total_Order_10 = $order_count_10['sum(total_price)'];
//Doanh số mua về
$xuatkho_10 = $d->rawQueryOne("select * from `warehouse` where date_created >= '" . $t10_start . "' and date_created <= '" . $t10_end . "' ");
$xuatkho_chitiet_10 = $d->rawQuery("select * from `warehouse_detail` where id_warehouse = ? ",array($xuatkho_10['id']));
$sum_10 = 0;
foreach ($xuatkho_chitiet_10 as $key => $v) {
  $sum_10 += $v['import_price'] * $v['quantity'];
}
$total_Order_10 = $total_Order_10 - $sum_10;

// Tháng 11
$t11_start = strtotime('1-11-' . $yearCurrent);
$t11_end = strtotime('30-11-' . $yearCurrent);
$order_count_11 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created >= '" . $t11_start . "' and date_created <= '" . $t11_end . "' and order_status = 3");
$total_Order_11 = $order_count_11['sum(total_price)'];
//Doanh số mua về
$xuatkho_11 = $d->rawQueryOne("select * from `warehouse` where date_created >= '" . $t11_start . "' and date_created <= '" . $t11_end . "' ");
$xuatkho_chitiet_11 = $d->rawQuery("select * from `warehouse_detail` where id_warehouse = ? ",array($xuatkho_11['id']));
$sum_11 = 0;
foreach ($xuatkho_chitiet_11 as $key => $v) {
  $sum_11 += $v['import_price'] * $v['quantity'];
}
$total_Order_11 = $total_Order_11 - $sum_11;

// Tháng 12
$t12_start = strtotime('1-12-' . $yearCurrent);
$t12_end = strtotime('30-12-' . $yearCurrent);
$order_count_12 = $d->rawQueryOne("select count(id), sum(total_price), id from `order` where date_created >= '" . $t12_start . "' and date_created <= '" . $t12_end . "' and order_status = 3");
$total_Order_12 = $order_count_12['sum(total_price)'];
//Doanh số mua về
$xuatkho_12 = $d->rawQueryOne("select * from `warehouse` where date_created >= '" . $t12_start . "' and date_created <= '" . $t12_end . "' ");
$xuatkho_chitiet_12 = $d->rawQuery("select * from `warehouse_detail` where id_warehouse = ? ",array($xuatkho_12['id']));
$sum_12 = 0;
foreach ($xuatkho_chitiet_12 as $key => $v) {
  $sum_12 += $v['import_price'] * $v['quantity'];
}
$total_Order_12 = $total_Order_12 - $sum_12;
?>