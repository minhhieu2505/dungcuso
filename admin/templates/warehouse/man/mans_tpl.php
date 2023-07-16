<?php 
	$linkView = $configBase;
	$linkMan = "index.php?source=warehouse&act=man";
	$linkAdd = "index.php?source=warehouse&act=add";
    $linkEdit = "index.php?source=warehouse&act=edit";

?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Quản lý đơn hàng nhập</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card-footer text-sm sticky-top">
    	<a class="btn btn-sm bg-gradient-primary text-white" href="<?=$linkAdd?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        <a class="btn btn-sm bg-gradient-danger text-white" href="../upload/file/DSSP.xlsx" title="Tải file mẫu"><i class="fas fa-download mr-2"></i>Tải file mẫu</a>
    </div>
    <div>
        <div class="text-danger">Lưu ý file dữ liệu nhập vào phải theo định dạng, thứ tự cột của file mẫu trên.</div>
    </div>
    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách đơn hàng nhập</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="align-middle text-center" width="10%">STT</th>
						<th class="align-middle">Mã đơn hàng</th>
						<th class="align-middle" style="width:30%">Tiêu đề</th>
                        <th class="align-middle text-center">Danh sách sản phẩm</th>
                        <th class="align-middle">Ngày tạo đơn</th>
                    </tr>
                </thead>
                <?php if(empty($items)) { ?>
                    <tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody>
                <?php } else { ?>
                    <tbody>
                        <?php for($i=0;$i<count($items);$i++) { ?>
                            <tr>
                                <td class="align-middle">
                                    <input type="number" class="form-control form-control-mini m-auto update-numb" min="0" value="<?=$i+1?>" data-id="<?=$items[$i]['id']?>" data-table="warehouse">
                                </td>
                                <td class="align-middle">
                                <a class="text-dark text-break" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['code_invoice']?>"><?=$items[$i]['code_invoice']?></a>

                                    </td>
                                <td class="align-middle">
                                    <a class="text-dark text-break" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['name_invoice']?>"><?=$items[$i]['name_invoice']?></a>
                                </td>
                                <td class="align-middle text-center text-md text-nowrap">
                                    <a class="mr-2 btn btn-success me-2" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="Danh sách sản phẩm"><i class="fas fa-eye"></i></a>
                                </td>
                                <td class="align-middle">
                                    <a class="text-dark text-break" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['date_created']?>"><?=date('d/m/Y',$items[$i]['date_created'])?></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php if($paging) { ?>
        <div class="card-footer text-sm pb-0"><?=$paging?></div>
    <?php } ?>
    <div class="card-footer text-sm">
    	<a class="btn btn-sm bg-gradient-primary text-white" href="<?=$linkAdd?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
    </div>
</section>