<div class="photoUpload-zone">
	<div class="photoUpload-detail" id="photoUpload-preview">
		<img src="<?="../".$photoDetail['upload'] ."/". $photoDetail['image']?>" width="<?=$photoDetail['width']?>" height="<?=$photoDetail['height']?>" alt="" onerror="this.src='../assets/images/No-Image.png'">
	</div>
	<label class="photoUpload-file" id="photo-zone" for="file-zone">
		<input type="file" name="file" id="file-zone">
		<i class="fas fa-cloud-upload-alt"></i>
		<p class="photoUpload-drop">Kéo và thả hình vào đây</p>
		<p class="photoUpload-or">hoặc</p>
		<p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
	</label>
	<div class="photoUpload-dimension"><?=$photoDetail['dimension']?></div>
</div>