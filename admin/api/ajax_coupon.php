<?php
	include "config.php";
	function randomCoupon()
	{
		global $func;
		
		$f = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVXYZ", 5)), 0, 3);
		$m = substr(md5(time()),0,3);
		$l = $func->digitalRandom(0,9,3);

		return $f.$m.$l;
	}
	
	function checkCoupon($cp)
	{
		global $d;
		
		$tmp = $d->rawQuery("select id from #_coupon where ma = ?",array($cp));
		
		if(isset($tmp['id'])) return 1;
		else return 0;
	}
	if(isset($_POST['value']))
	{
	 
		 $value = (isset($_POST['value'])) ? htmlspecialchars($_POST['value']) : 0;

 				 for($i=0;$i<$value;$i++) {

 					$ck=1;
 					while($ck!=0)
 					{
 						$ma = randomCoupon();
 						$ck = checkCoupon($ma);
 					} ?>
 			    	<div class="form-group col-sm-3">
                         <label class="d-block">Mã <?=($i+1)?>:</label>
                         <a class="d-block bg-gradient-primary text-white p-2 rounded" href="#" title="Mã <?=($i+1)?>"><?=$ma?></a>
 			    		<input type="hidden" name="ma<?=$i?>" value="<?=$ma?>"/>
                     </div>
 			    <?php } 
	}
?>