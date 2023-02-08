<div class="menu-custom">
    <div class="wrap-content dflex align-items-center">
        <div class="category">
            <span class="title-category">DANH MỤC SẢN PHẨM <i class="fas fa-caret-right ml-2"></i></span>
            <div class="caterogy-table">
            	<ul class="p-0 m-0 list-unstyled scrrol-view" id="box">
            		<?php foreach ($splist as $vlist): 
            			$spcat = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc",array($vlist['id'])); 
            			?>
            			<li>
            				<a href="<?=$vlist[$sluglang]?>" title="<?=$vlist['name'.$lang]?>">
            					<span><?=$vlist['name'.$lang]?></span>
            					<?php if ($spcat): ?><i class="fas fa-angle-right"></i><?php endif ?>
            				</a>
            				<?php if ($spcat): ?>
            					<ul class="table-cat">
            						<?php foreach ($spcat as $vcat): 
            							$spitem = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_item where id_cat = ? and find_in_set('hienthi',status) order by numb,id desc",array($vcat['id']));
            						?>
            							<li><a href="<?=$vcat[$sluglang]?>" title="<?=$vcat['name'.$lang]?>" class="title-cat"><?=$vcat['name'.$lang]?></a>
	            							<?php if ($spitem): ?>
	            								<ul class="">
	            									<?php foreach ($spitem as $vitem): ?>
	            										<li><a href="<?=$vitem[$sluglang]?>" title="<?=$vitem['name'.$lang]?>"><?=$vitem['name'.$lang]?></a></li>
	            									<?php endforeach ?>
	            								</ul>
	            							<?php endif ?>
	            						</li>
            						<?php endforeach ?>
            					</ul>
            				<?php endif ?>
            			</li>
            		<?php endforeach ?>
            	</ul>
            </div>
        </div>
        <div class="menu">
        	<ul class="dflex align-items-center">
        		<li><a class="<?php if($com=='thuong-hieu') echo 'active'; ?> transition" href="thuong-hieu" title="Thương hiệu">Thương hiệu</a>
                    <?php if ($brand): ?>
                        <ul>
                            <?php foreach ($brand as $v): ?>
                                <li><a href="<?=$v[$sluglang]?>"><?=$v['name'.$lang]?></a></li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif ?>
                </li>
        		<li><a class="<?php if($com=='khuyen-mai') echo 'active'; ?> transition" href="khuyen-mai" title="Khuyến mãi">Khuyến mãi</a></li>
        		<li><a class="<?php if($com=='san-pham-moi') echo 'active'; ?> transition" href="san-pham-moi" title="Sản phẩm mới">Sản phẩm mới</a></li>
        		<li><a class="<?php if($com=='huong-dan-mua-hang') echo 'active'; ?> transition" href="huong-dan-mua-hang" title="Hướng dẫn mua hàng">Hướng dẫn mua hàng</a></li>
        		<li><a class="<?php if($com=='kinh-nghiem') echo 'active'; ?> transition" href="kinh-nghiem" title="Kinh nghiệm">Kinh nghiệm</a></li>
        		<li><a class="<?php if($com=='lien-he') echo 'active'; ?> transition" href="lien-he" title="Liên hệ">Liên hệ</a></li>
        	</ul>
        </div>
        <div class="check-order">
            <?php if(array_key_exists($loginMember, $_SESSION) && $_SESSION[$loginMember]['active'] == true) { ?>
            	<a href="account/thong-tin">KIỂM TRA ĐẶT HÀNG</a>
            <?php } ?>
        </div>
    </div>
</div>