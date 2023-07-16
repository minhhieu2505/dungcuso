<!-- Js Config -->
<script type="text/javascript">
	var CONFIG_BASE = '<?=$configBase?>';
	var TOKEN = '';
    var ADMIN = '<?=ADMIN?>';
    var ASSET = '<?=ASSET?>';
	var LINK_FILTER = '<?=(!empty($linkFilter)) ? $linkFilter : ''?>';
	var LINK_OD_STATUS = '<?=(!empty($linkStatus)) ? $linkStatus : ''?>';
	var LINK_OD_SEARCH = '<?=(!empty($linkSearch)) ? $linkSearch : ''?>';
	var LINK_OD_PAYMENT = '<?=(!empty($linkPayment)) ? $linkPayment : ''?>';
	var LINK_OD_DATE = '<?=(!empty($linkDate)) ? $linkDate : ''?>';
	var ID = <?=(!empty($id)) ? $id : 0?>;
	var COM = '<?=(!empty($com)) ? $com : ''?>';
	var ACT = '<?=(!empty($act)) ? $act : ''?>';
	var TYPE = '<?=(!empty($type)) ? $type : ''?>';
	var BASE64_QUERY_STRING = '<?=base64_encode($_SERVER['QUERY_STRING'])?>';
	var LOGIN_PAGE = <?=(empty($_SESSION[$loginAdmin]['active'])) ? 'true' : 'false'?>;
	var MAX_DATE = '<?=date("Y/m/d",time())?>';

</script>

<!-- Js Files -->

<script src="assets/js/moment.min.js"></script>
<script src="assets/confirm/confirm.js"></script>
<script src="assets/select2/select2.full.js"></script>
<script src="assets/sumoselect/jquery.sumoselect.js"></script>
<script src="assets/datetimepicker/php-date-formatter.min.js"></script>
<script src="assets/datetimepicker/jquery.mousewheel.js"></script>
<script src="assets/datetimepicker/jquery.datetimepicker.js"></script>
<script src="assets/daterangepicker/daterangepicker.js"></script>
<script src="assets/rangeSlider/ion.rangeSlider.js"></script>
<script src="assets/js/priceFormat.js"></script>
<script src="assets/jscolor/jscolor.js"></script>
<script src="assets/filer/jquery.filer.js"></script>
<script src="assets/holdon/HoldOn.js"></script>
<script src="assets/sortable/Sortable.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/adminlte.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script src="assets/simplenotify/simple-notify.js"></script>
<script src="assets/comment/comment.js"></script>
<script src="assets/fileuploader/fileuploader.min.js"></script>
<script src="assets/js/chart.umd.min.js"></script>
<script src="assets/js/chart_jquery.js"></script>
<script src="assets/js/apps.js"></script>