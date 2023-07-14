<?php
$linkMan = $linkFilter = "index.php?source=order&act=man";
$linkEdit = "index.php?source=order&act=edit";
$linkDelete = "index.php?source=order&act=delete";
$arr_status = array("Mới đặt", "Đã Xác Nhận", "Đã Giao", "Đã Hủy");
(!empty($order_status) ? $linkStatus = "&order_status=" . $order_status : '');
(!empty($keyword) ? $linkSearch = "&keyword=" . $keyword : '');
(!empty($order_payment) ? $linkPayment = "&order_payment=" . $order_payment : '');
(!empty($order_date) ? $linkDate = "&order_date=" . $order_date : '');
?>
<!-- Content Header -->
<section class="content-header text-sm">
   <div class="container-fluid">
      <div class="row">
         <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
            <li class="breadcrumb-item active">Quản lý đơn hàng</li>
         </ol>
      </div>
   </div>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box">
            <div class="info-box-content">
               <span class="info-box-text text-primary font-weight-bold text-capitalize text-sm">Mới đặt</span>
               <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold">
                     <?= $allNewOrder ?>
                  </span></p>
               <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold"><?= $func->formatMoney($totalNewOrder) ?></span></p>
            </div>
         </div>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box mb-3">
            <div class="info-box-content">
               <span class="info-box-text text-info font-weight-bold text-capitalize text-sm">Đã xác nhận</span>
               <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold">
                     <?= $allConfirmOrder ?>
                  </span></p>
               <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold"><?= $func->formatMoney($totalConfirmOrder) ?></span></p>
            </div>
         </div>
      </div>
      <div class="clearfix hidden-md-up"></div>
      <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box mb-3">
            <div class="info-box-content">
               <span class="info-box-text text-success font-weight-bold text-capitalize text-sm">Đã giao</span>
               <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold">
                     <?= $allDeliveriedOrder ?>
                  </span></p>
               <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold"><?= $func->formatMoney($totalDeliveriedOrder) ?></span></p>
            </div>
         </div>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box mb-3">
            <div class="info-box-content">
               <span class="info-box-text text-danger font-weight-bold text-capitalize text-sm">Đã hủy</span>
               <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold">
                     <?= $allCanceledOrder ?>
                  </span></p>
               <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold"><?= $func->formatMoney($totalCanceledOrder) ?></span></p>
            </div>
         </div>
      </div>
   </div>
   <div class="card-footer text-sm sticky-top">
      <div class="row">
         <div class="col-3">
            <div><label>Tìm kiếm:</label></div>
            <div class="form-inline form-search d-inline-block align-middle w-100">
               <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar text-sm w-100" type="search" id="keyword"
                     placeholder="Tìm kiếm" aria-label="Tìm kiếm"
                     value="<?= (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>"
                     onkeypress="doEnter(event,'keyword','<?= $linkMan ?>')">
                  <div class="input-group-append bg-primary rounded-right">
                     <button class="btn btn-navbar text-white" type="button"
                        onclick="onSearch('keyword','<?= $linkMan ?>')">
                        <i class="fas fa-search"></i>
                     </button>
                  </div>
               </div>
            </div>
         </div>
         <div class="form-group col-3">
            <div><label>Tình trạng đơn hàng:</label></div>
            <select name="" class="select-status select2 w-100">
               <option value="">Tình trạng đơn hàng</option>
               <?php foreach ($arr_status as $key => $v) { ?>
                  <option value="<?= $key + 1 ?>" <?= ($order_status == $key + 1 ? 'selected' : '') ?>><?= $v ?></option>
               <?php } ?>
            </select>
         </div>
         <div class="form-group col-3">
            <label>Hình thức thanh toán:</label>
            <select name="" class="select-payment select2 w-100">
               <option value="">Hình thức thanh toán</option>
               <option value="1" <?= ($order_payment == 1 ? 'selected' : '') ?>>Ship Cod</option>
               <option value="2" <?= ($order_payment == 2 ? 'selected' : '') ?>>Thanh toán Online</option>
            </select>
         </div>
         <div class="form-group col-3">
            <label>Ngày đặt:</label>
            <div class="input-group bg-light form-date">
               <input type="text" class="form-control float-right text-sm" name="order_date" id="order_date"
                  value="<?= (isset($_GET['order_date'])) ? $_GET['order_date'] : '' ?>" readonly>
               <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="card card-primary card-outline text-sm mb-0">
      <div class="card-header">
         <h3 class="card-title card-title-order d-inline-block align-middle float-none">Danh sách đơn hàng</h3>
      </div>
      <div class="card-body table-responsive p-0">
         <table class="table table-hover">
            <thead>
               <tr>
                  <?php ?>
                  <th class="align-middle text-center" width="10%">STT</th>
                  <?php ?>
                  <th class="align-middle">Mã đơn hàng</th>
                  <th class="align-middle" style="width:15%">Họ tên</th>
                  <th class="align-middle">Ngày đặt</th>
                  <th class="align-middle">Tổng giá</th>
                  <th class="align-middle">HÌnh thức thanh toán</th>
                  <th class="align-middle">Tình trạng</th>
                  <th class="align-middle text-center">Thao tác</th>
               </tr>
            </thead>
            <?php if (empty($items)) { ?>
               <tbody>
                  <tr>
                     <td colspan="100" class="text-center">Không có dữ liệu</td>
                  </tr>
               </tbody>
            <?php } else { ?>
               <tbody>
                  <?php for ($i = 0; $i < count($items); $i++) { ?>
                     <tr>
                        <td class="align-middle">
                           <input type="number" class="form-control form-control-mini m-auto update-numb" min="0"
                              value="<?= $i + 1 ?>">
                        </td>
                        <td class="align-middle">
                           <a class="text-primary" href="<?= $linkEdit ?>&id=<?= $items[$i]['id'] ?>"
                              title="<?= $items[$i]['code'] ?>"><?= $items[$i]['code'] ?></a>
                        </td>
                        <td class="align-middle">
                           <a class="text-primary" href="<?= $linkEdit ?>&id=<?= $items[$i]['id'] ?>"
                              title="<?= $items[$i]['fullname'] ?>"><?= $items[$i]['fullname'] ?></a>
                        </td>
                        <td class="align-middle">
                           <?= date("h:i:s A - d/m/Y", $items[$i]['date_created']) ?>
                        </td>
                        <td class="align-middle">
                           <span class="text-danger font-weight-bold"><?= $func->formatMoney($items[$i]['total_price']) ?></span>
                        </td>
                        <td class="align-middle">
                           <span class="text-danger font-weight-bold">
                              <?= $items[$i]['order_payment'] ?>
                           </span>
                        </td>
                        <td class="align-middle">
                           <?php $arr_status = array("Mới đặt", "Đã Xác Nhận", "Đã Giao", "Đã Hủy"); ?>
                           <span class="text-capitalize">
                              <?= $arr_status[$items[$i]['order_status'] - 1] ?>
                           </span>
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                           <a class="mr-2 btn btn-success me-2" href="<?= $linkEdit ?>&id=<?= $items[$i]['id'] ?>"
                              title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                           <a class="mr-2 btn btn-primary me-2" href="index.php?source=excel&id=<?= $items[$i]['id'] ?>"
                              title="Chỉnh sửa"><i class="fas fa-file-excel"></i></a>
                           <a class="btn btn-danger" id="delete-item" data-url="<?= $linkDelete ?>&id=<?= $items[$i]['id'] ?>"
                              title="Xóa"><i class="fas fa-trash-alt"></i></a>
                        </td>
                     </tr>
                  <?php } ?>
               </tbody>
            <?php } ?>
         </table>
      </div>
   </div>
   <?php if ($paging) { ?>
      <div class="card-footer text-sm pb-0">
         <?= $paging ?>
      </div>
   <?php } ?>
   <div class="card-footer text-sm">
   </div>
</section>