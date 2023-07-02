/* Validation form */
function validateForm(ele)
{
    window.addEventListener('load', function(){
        var forms = document.getElementsByClassName(ele);
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
        $("."+ele).find("input[type=submit],button[type=submit]").removeAttr("disabled");
    }, false);
}

/* Validation form chung */
validateForm("validation-form");

function isExist(ele)
{
    return ele.length;
}

function getLen(str)
{
    return (/^\s*$/.test(str)) ? 0 : str.length;
}

/* onChange Category */
function filterCategory(url)
{
	if($(".filter-category").length > 0 && url != '')
	{
		var id = '';
		var value = 0;

		$(".filter-category").each(function(){
			id = $(this).attr("id");
			if(id)
			{
				value = parseInt($("#"+id).val());
				if(value)
				{
					url += "&"+id+"="+value;
				}
			}
		});
	}

	return url;
}

function onchangeCategory(obj)
{
	var name = '';
	var keyword = $("#keyword").val();
	var url = LINK_FILTER;
	
	obj.parents(".form-group").nextAll().each(function(){
		name = $(this).find(".filter-category").attr("name");
		if($(this) != obj)
		{
			$(this).find(".filter-category").val(0);
		}
	});

	url = filterCategory(url);

	if(keyword)
	{
		url += "&keyword="+encodeURI(keyword);
	}

	return window.location = url;
}

/* Search */
function doEnter(evt,obj,url)
{
	if(url=='')
	{
		notifyDialog("Đường dẫn không hợp lệ");
        return false;
	}

    if(evt.keyCode == 13 || evt.which == 13)
    {
    	onSearch(obj,url);
    }
}
function onSearch(obj,url)
{
	if(url=='')
	{
		notifyDialog("Đường dẫn không hợp lệ");
        return false;
	}
	else
	{
		var keyword = $("#"+obj).val();
		url = filterCategory(url);
		
		if(keyword)
		{
			url += "&keyword="+encodeURI(keyword);
		}

		window.location = filterCategory(url);
	}
}

/* Action order (Search - Export excel - Export word) */
function actionOrder(url)
{
	var listid = "";
    var order_status = parseInt($("#order_status").val());
    var order_payment = parseInt($("#order_payment").val());
    var order_date = $("#order_date").val();
    var range_price = $("#range_price").val();
    var city = parseInt($("#id_city").val());
    var district = parseInt($("#id_district").val());
    var ward = parseInt($("#id_ward").val());
    var keyword = $("#keyword").val();

    $("input.select-checkbox").each(function(){
        if(this.checked) listid = listid+","+this.value;
    });

    listid = listid.substr(1);
    if(listid) url += "&listid="+listid;
    if(order_status) url += "&order_status="+order_status;
    if(order_payment) url += "&order_payment="+order_payment;
    if(order_date) url += "&order_date="+order_date;
    if(range_price) url += "&range_price="+range_price;
    if(city) url += "&id_city="+city;
    if(district) url += "&id_district="+district;
    if(ward) url += "&id_ward="+ward;
    if(keyword) url += "&keyword="+encodeURI(keyword);

    window.location = url;
}

/* Send email */
function sendEmail()
{
	var listemail="";

	$("input.select-checkbox").each(function(){
		if (this.checked) listemail = listemail+","+this.value;
	});

	listemail = listemail.substr(1);

	if(listemail == "")
    {
    	notifyDialog("Bạn hãy chọn ít nhất 1 mục để gửi");
    	return false;
    }

    $("#listemail").val(listemail);

    document.frmsendemail.submit();
}

/* Delete item */
function deleteItem(url)
{
	holdonOpen();
    document.location = url;
}

/* Delete all */
function deleteAll(url)
{
	var listid = "";

    $("input.select-checkbox").each(function(){
        if(this.checked) listid = listid+","+this.value;
    });

    listid = listid.substr(1);

    if(listid == "")
    {
    	notifyDialog("Bạn hãy chọn ít nhất 1 mục để xóa");
    	return false;
    }

    holdonOpen();
    document.location = url+"&listid="+listid;
}

/* Delete Color */
function deleteColor(id){
	if(id){
		$.ajax({
			url:'api/product.php',
			type: "POST",
			data: {id: id},
			success: function(result){
				$('.item-color'+id).remove();
			}
		});
	} 
}
function deleteGallery(id){
	if(id){
		$.ajax({
			url: "api/gallery.php",
			type: "GET",
			data: {
				id: id
			}
		});
	}
	$('.gallery-item-'+id).remove();
}
/* Create sort filer */
var sortable;
function createSortFiler()
{
	if($("#jFilerSortable").length)
	{
		sortable = new Sortable.create(document.getElementById('jFilerSortable'),{
			animation: 600,
			swap: true,
			disabled: true,
			// swapThreshold: 0.25,
		    ghostClass: 'ghostclass',
		    multiDrag: true,
			selectedClass: 'selected',
			forceFallback: false,
			fallbackTolerance: 3,
			onEnd: function(){
				/* Get all filer sort */
				listid = new Array();
				jFilerItems = $("#jFilerSortable").find('.my-jFiler-item');
				jFilerItems.each(function(index){
					listid.push($(this).data("id"));
				})

				/* Update number */
				var id_parent = ID;
				var com = COM;
				var kind = ACT;
				var type = TYPE;
				var colfiler = $(".col-filer").val();
				var actfiler = $(".act-filer").val();
				$.ajax({
					url: 'api/filer.php',
					type: 'POST',
					dataType: 'json',
					async: false,
					data: {
						id_parent: id_parent,
						listid: listid,
						com: com,
						kind: actfiler,
						type: type,
						colfiler: colfiler,
						cmd: 'updateNumb',
						hash: HASH
					},
					success: function(result)
					{
						var arrid = result.id;
						var arrnumb = result.numb;
						for(var i=0;i<arrid.length;i++) $('.my-jFiler-item-'+arrid[i]).find("input[type=number]").val(arrnumb[i]);
					}
				});
			},
		});
	}
}

/* Destroy sort filer */
function destroySortFiler()
{
	try{var destroy = sortable.destroy();}
	catch(e){}
}

/* Refresh filer when complete action */
function refreshFiler()
{
	$(".sort-filer, .check-all-filer").removeClass("active");
	$(".sort-filer").attr('disabled',false);
	$(".alert-sort-filer").hide();

	if($(".check-all-filer").find("i").hasClass("fas fa-check-square"))
	{
		$(".check-all-filer").find("i").toggleClass("far fa-square fas fa-check-square");
	}

	$(".my-jFiler-items .jFiler-items-list").find('input.filer-checkbox').each(function(){
		$(this).prop('checked',false); 
	});
}

/* Refresh filer if empty */
function refreshFilerIfEmpty()
{
	var id_parent = ID;
	var com = COM;
	var type = TYPE;
	var colfiler = $(".col-filer").val();
	var actfiler = $(".act-filer").val();
	var cmd = 'refresh';

	$.ajax({
		type: 'POST',
		dataType: 'html',
		url: 'api/filer.php',
		async: false,
		data: {
			id_parent: id_parent,
			com: com,
			kind: actfiler,
			type: type,
			colfiler: colfiler,
			cmd: cmd,
			hash: HASH
		},
		success: function(result)
		{
			$(".jFiler-items-list").first().find(".jFiler-item").remove();
			destroySortFiler();
			$tmp = '<div class="form-group form-group-gallery">'
			+'<label class="label-filer">Album hiện tại:</label>'
			+'<div class="action-filer mb-3">'
			+'<a class="btn btn-sm bg-gradient-primary text-white check-all-filer mr-1"><i class="far fa-square mr-2"></i>Chọn tất cả</a>'
			+'<button type="button" class="btn btn-sm bg-gradient-success text-white sort-filer mr-1"><i class="fas fa-random mr-2"></i>Sắp xếp</button>'
			+'<a class="btn btn-sm bg-gradient-danger text-white delete-all-filer"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>'
			+'</div>'
			+'<div class="alert my-alert alert-sort-filer alert-info text-sm text-white bg-gradient-info"><i class="fas fa-info-circle mr-2"></i>Có thể chọn nhiều hình để di chuyển</div>'
			+'<div class="jFiler-items my-jFiler-items jFiler-row">'
			+'<ul class="jFiler-items-list jFiler-items-grid row scroll-bar" id="jFilerSortable">'
			+result
			+'</ul></div></div>';
			$("#filer-gallery").parents(".form-group").after($tmp);
			createSortFiler();
		}
	});
}

/* Delete filer */
function deleteFiler(string)
{
	var str = string.split(",");
	var id = str[0];
	var folder = str[1];
	var cmd = 'delete';

	$.ajax({
		type: 'POST',
		url: 'api/filer.php',
		data: {
			id: id,
			folder: folder,
			cmd: cmd
		}
	});

	$('.my-jFiler-item-'+id).remove();

	if($(".my-jFiler-items ul li").length==0)
	{
		$(".form-group-gallery").remove();
	}
}

/* Delete all filer */
function deleteAllFiler(folder)
{
	var listid = "";
	var cmd = 'delete-all';

    $("input.filer-checkbox").each(function(){
        if(this.checked) listid = listid+","+this.value;
    });

    listid = listid.substr(1);

    if(listid == "")
    {
    	notifyDialog("Bạn hãy chọn ít nhất 1 mục để xóa");
    	return false;
    }

	$.ajax({
		type: 'POST',
		url: 'api/filer.php',
		data: {
			listid: listid,
			folder: folder,
			cmd: cmd
		}
	});

	listid = listid.split(",");

	for(var i=0;i<listid.length;i++)
	{
		$('.my-jFiler-item-'+listid[i]).remove();
	}

	if($(".my-jFiler-items ul li").length==0)
	{
		$(".form-group-gallery").remove();
	}

	refreshFiler();
}

/* Push OneSignal */
function pushOneSignal(url)
{
	document.location = url;
}

/* HoldOn */
function holdonOpen(theme="sk-circle",text="Loading...",backgroundColor="rgba(0,0,0,0.8)",textColor="white")
{
    var options = {
        theme: theme,
        message: text,
        backgroundColor: backgroundColor,
        textColor: textColor
    };

    HoldOn.open(options);
}
function holdonClose()
{
	HoldOn.close();
}

/* Go to element */
function goToByScroll(id, minusTop)
{
    minusTop = (parseInt(minusTop)) ? parseInt(minusTop) : 0;
    id = id.replace("#", "");
    $('html,body').animate({
        scrollTop: $("#" + id).offset().top - minusTop
    }, 'slow');
}

/* Show notify */
function showNotify(text='Notify text', title='Thông báo', status='success')
{
    new Notify ({
        status: status, // success, warning, error
        title: title,
        text: text,
        effect: 'fade',
        speed: 400,
        customClass: null,
        customIcon: null,
        showIcon: true,
        showCloseButton: true,
        autoclose: true,
        autotimeout: 3000,
        gap: 10,
        distance: 10,
        type: 3,
        position: 'right top'
    });
}

/* Notify */
function notifyDialog(content='', title='Thông báo', icon='fas fa-exclamation-triangle', type='blue')
{
    $.alert({
        title: title,
        icon: icon, // font awesome
        type: type, // red, green, orange, blue, purple, dark
        content: content, // html, text
        backgroundDismiss: true,
        animationSpeed: 600,
        animation: 'zoom',
        closeAnimation: 'scale',
        typeAnimated: true,
        animateFromElement: false,
        autoClose: 'accept|3000',
        escapeKey: 'accept',
        buttons: {
            accept: {
                text: '<i class="fas fa-check align-middle mr-2"></i>Đồng ý',
                btnClass: 'btn-blue btn-sm bg-gradient-primary'
            }
        }
    });
}

/* Confirm */
function confirmDialog(action, text, value, title='Thông báo', icon='fas fa-exclamation-triangle', type='blue')
{
	$.confirm({
	    title: title,
        icon: icon, // font awesome
        type: type, // red, green, orange, blue, purple, dark
        content: text, // html, text
        backgroundDismiss: true,
        animationSpeed: 600,
        animation: 'zoom',
        closeAnimation: 'scale',
        typeAnimated: true,
        animateFromElement: false,
        autoClose: 'cancel|3000',
        escapeKey: 'cancel',
	    buttons: {
	    	success: {
	            text: '<i class="fas fa-check align-middle mr-2"></i>Đồng ý',
	            btnClass: 'btn-blue btn-sm bg-gradient-primary',
	            action: function(){
	            	if(action == "create-seo") seoCreate();
	            	if(action == "push-onesignal") pushOneSignal(value);
	            	if(action == "send-email") sendEmail();
	            	if(action == "delete-filer") deleteFiler(value);
	            	if(action == "delete-all-filer") deleteAllFiler(value);
	            	if(action == "delete-item") deleteItem(value);
	            	if(action == "delete-all") deleteAll(value);
	            	if(action == "delete-product") deleteColor(value);
	            	if(action == "delete-gallery") deleteGallery(value);
	            }
	        },
	        cancel: {
	            text: '<i class="fas fa-times align-middle mr-2"></i>Hủy',
	            btnClass: 'btn-red btn-sm bg-gradient-danger'
	        }
	    }
	});
}

/* Rounde number */
function roundNumber(rnum, rlength)
{
    return Math.round(rnum*Math.pow(10,rlength))/Math.pow(10,rlength);
}

/* Max Datetime Picker */
function maxDate(element)
{
    if(MAX_DATE)
    {
        $(element).datetimepicker({
            timepicker: false,
            format: 'd/m/Y',
            formatDate: 'd/m/Y',
            // minDate: '1950/01/01',
            maxDate: MAX_DATE
        });
    }
}

/* Min Datetime Picker */
function minDate(element)
{
    if(MAX_DATE)
    {
        $(element).datetimepicker({
            timepicker: false,
            format: 'd/m/Y',
            formatDate: 'd/m/Y',
            minDate: MAX_DATE,
            // maxDate: MAX_DATE
        });
    }
}

/* Youtube preview */
function youtubePreview(url,element)
{
	var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
	var match = url.match(regExp);
	url = (match&&match[7].length==11)? match[7] : false;

    $(element).attr("src","//www.youtube.com/embed/"+url).css({"width": "250","height": "150"});
}

/* Slug */
function slugConvert(slug,focus=false)
{
    slug = slug.toLowerCase();
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/ /gi, "-");
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    
	if(!focus)
	{
		slug = '@' + slug + '@';
		slug = slug.replace(/\@\-|\-\@|\@/gi, '');
	}

    return slug;
}
function slugPreview(title,focus=false)
{
	var slug = slugConvert(title,focus);

	$("#slug").val(slug);
	$("#slugurlpreview strong").html(slug);
	$("#seourlpreview strong").html(slug);
}
function slugPreviewTitleSeo(title)
{
	if($("#title").length)
	{
		var titleSeo = $("#title").val();
		if(!titleSeo)
		{
			if(title) $("#title-seo-preview").html(title);
			else $("#title-seo-preview").html("Title");	
		}
	}
}
function slugPress()
{
	var inputArticle = $('.card-article input.for-seo');
	var id = $('.slug-id').val();
	var seourlstatic = true;

	inputArticle.each(function(index){
		var name = $(this).attr('id');
			if($("#"+name).length)
			{
				$('body').on("keyup","#"+name,function(e){
					var keyCode = e.keyCode || e.which;
					var title = $("#"+name).val();

					if(keyCode != 13)
					{
						if((!id || $("#slugchange").prop("checked")) && seourlstatic)
						{
							/* Slug preivew */
							slugPreview(title);
						}

						/* Slug preivew title seo */
						slugPreviewTitleSeo(title);

						/* slug Alert */
						slugAlert(2);
					}
				})
			}

			if($("#slug").length)
			{
				$('body').on("keyup","#slug",function(e){
					var keyCode = e.keyCode || e.which;
					var title = $("#slug").val();

					if(keyCode != 13)
					{
						/* Slug preivew */
						slugPreview(title,true);

						/* slug Alert */
						slugAlert(2);
					}
				})
			}
	});
}
function slugChange(obj)
{
	if(obj.is(':checked'))
	{
		/* Load slug theo tiêu đề mới */
		slugStatus(1);
		$(".slug-input").attr("readonly",true);
	}
	else
	{
		/* Load slug theo tiêu đề cũ */
		slugStatus(0);
		$(".slug-input").attr("readonly",false);
	}
}
function slugStatus(status)
{
	var sluglang = "vi,en";
	var inputArticle = $('.card-article input.for-seo');

	$('.card-article input.for-seo').keyup(function(){
		console.log('yum');
		var name = $(this).attr('id');
		var lang = name.substr(name.length-2);
		if(sluglang.indexOf(lang)>=0)
		{
			var title = "";
			if(status == 1)
			{
				if($("#"+name).length)
				{
					title = $("#"+name).val();

					/* Slug preivew */
					slugPreview(title,lang);

					/* Slug preivew title seo */
					slugPreviewTitleSeo(title,lang);
				}
			}
			else if(status == 0)
			{
				if($("#slug-default"+lang).length)
				{
					title = $("#slug-default"+lang).val();

					/* Slug preivew */
					slugPreview(title,lang);

					/* Slug preivew title seo */
					slugPreviewTitleSeo(title,lang);
				}
			}
		}
	});
}
function slugAlert(result,lang)
{
	if(result == 1)
	{
		$("#alert-slug-danger"+lang).addClass("d-none");
		$("#alert-slug-success"+lang).removeClass("d-none");
	}
	else if(result == 0)
	{
		$("#alert-slug-danger"+lang).removeClass("d-none");
		$("#alert-slug-success"+lang).addClass("d-none");
	}
	else if(result == 2)
	{
		$("#alert-slug-danger"+lang).addClass("d-none");
		$("#alert-slug-success"+lang).addClass("d-none");
	}
}
function slugCheck()
{
	var sluglang = "vi,en";
	var slugInput = $('.slug-input');
	var id = $('.slug-id').val();
	var copy = $('.slug-copy').val();

	slugInput.each(function(index){
		var slugId = $(this).attr('id');
		var slug = $(this).val();
		var lang = slugId.substr(slugId.length-2);
		if(sluglang.indexOf(lang)>=0)
		{
			if(slug)
			{
				$.ajax({
					url: 'api/slug.php',
					type: 'POST',
					dataType: 'html',
					async: false,
					data: {
						slug: slug,
						id: id,
						copy: copy
					},
					success: function(result){
						slugAlert(result,lang);
					}
				});
			}
		}
	});
}

/* Reader image */
function readImage(inputFile,elementPhoto)
{
	if(inputFile[0].files[0])
	{
		if(inputFile[0].files[0].name.match(/.(jpg|jpeg|png|gif)$/i))
		{
			var size = parseInt(inputFile[0].files[0].size) / 1024;

			if(size <= 4096)
			{
				var reader = new FileReader();
				reader.onload = function(e){
					$(elementPhoto).attr('src', e.target.result);
				}
				reader.readAsDataURL(inputFile[0].files[0]);
			}
			else
			{
				notifyDialog("Dung lượng hình ảnh lớn. Dung lượng cho phép <= 4MB ~ 4096KB");
				return false;
			}
		}
		else
		{
			$(elementPhoto).attr('src', '');
			notifyDialog("Định dạng hình ảnh không hợp lệ");
			return false;
		}
	}
	else
	{
		$(elementPhoto).attr('src', '');
		return false;
	}
}

/* Photo zone */
function photoZone(eDrag,iDrag,eLoad)
{
	if($(eDrag).length)
	{
		/* Drag over */
		$(eDrag).on("dragover",function(){
			$(this).addClass("drag-over");
			return false;
		});

		/* Drag leave */
		$(eDrag).on("dragleave",function(){
			$(this).removeClass("drag-over");
			return false;
		});

		/* Drop */
		$(eDrag).on("drop",function(e){
			e.preventDefault();
			$(this).removeClass("drag-over");

			var lengthZone = e.originalEvent.dataTransfer.files.length;

			if(lengthZone == 1)
			{
				$(iDrag).prop("files", e.originalEvent.dataTransfer.files);
				readImage($(iDrag),eLoad);
			}
			else if(lengthZone > 1)
			{
				notifyDialog("Bạn chỉ được chọn 1 hình ảnh để upload");
				return false;
			}
			else
			{
				notifyDialog("Dữ liệu không hợp lệ");
				return false;
			}
		});

		/* File zone */
		$(iDrag).change(function(){
			readImage($(this),eLoad);
		});
	}
}

/* Watermark */
function toDataURL(url, callback)
{
	var xhr = new XMLHttpRequest();
	xhr.onload = function()
	{
		var reader = new FileReader();
		reader.onloadend = function()
		{
			callback(reader.result);
		}
		reader.readAsDataURL(xhr.response);
	};
	xhr.open('GET', url);
	xhr.responseType = 'blob';
	xhr.send();
}
function previewWatermark()
{
	$o = $("#form-watermark");
	var formData = new FormData();
	formData.append('file', $('#file')[0].files[0]);
	formData.append('data', $o.serialize());

	$.ajax({
		type:'POST',
		url: "index.php?com=photo&act=save-watermark&type=" + TYPE,
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(data){
			var url = 'index.php?com=photo&act=preview-watermark&type='+TYPE+'&position='+data.position+'&img='+data.image+'&watermark='+data.path+'&upload='+data.upload+'&opacity='+data.data.opacity+'&per='+data.data.per+'&small_per='+data.data.small_per+'&min='+data.data.min+'&max='+data.data.max+"&t="+data.time;
			toDataURL(url, function(dataUrl){
				notifyDialog('<img src="'+dataUrl+'" alt="Preview Watermark">', 'Preview Watermark', 'fas fa-image', 'blue')
			});
		},
		error: function(data){
			console.log("error");
		}
	});
	
	return false;
}

/* Login */
function login()
{
	var username = $("#username").val();
	var password = $("#password").val();

	if($(".alert-login").hasClass("alert-danger") || $(".alert-login").hasClass("alert-success"))
	{
		$(".alert-login").removeClass("alert-danger alert-success");
		$(".alert-login").addClass("d-none");
		$(".alert-login").html("");
	}

	if($(".show-password").hasClass("active"))
	{
		$(".show-password").removeClass("active");
		$("#password").attr("type","password");
		$(".show-password").find("span").toggleClass("fas fa-eye fas fa-eye-slash");
	}

	$(".show-password").addClass("disabled");
	$(".btn-login .sk-chase").removeClass("d-none");
	$(".btn-login span").addClass("d-none");
	$(".btn-login").attr("disabled",true);
	$("#username").attr("disabled",true);
	$("#password").attr("disabled",true);

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: 'api/login.php',
		async: false,
		data: {username:username,password:password},
		success: function(result)
		{
			if(result.success)
			{
				window.location = "index.php";
			}
			else if(result.error)
			{
				$(".alert-login").removeClass("d-none");
				$(".show-password").removeClass("disabled");
				$(".btn-login .sk-chase").addClass("d-none");
				$(".btn-login span").removeClass("d-none");
				$(".btn-login").attr("disabled",false);
				$("#username").attr("disabled",false);
				$("#password").attr("disabled",false);
				$(".alert-login").removeClass("alert-success");
				$(".alert-login").addClass("alert-danger");
				$(".alert-login").html(result.error);
			}
		}
	});
}

/* Random password */
function randomPassword()
{
	var str = "";

	for(i=0;i<9;i++)
	{
		str += "!@#$%^&*()?abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890".charAt(Math.floor(Math.random()*62));
	}

	$('#new-password').val(str);
	$('#renew-password').val(str);
	$('#show-password').html(str);
}

/* Check permissions */
function loadPermissions()
{
	if($('.card-permission').find("input[type=checkbox]:checked").length == $('.card-permission').find("input[type=checkbox]").length)
	{
		$("input#selectall-checkbox").prop("checked",true);
	}
	else
	{
		$("input#selectall-checkbox").prop("checked",false);
	}
}

$(document).ready(function(){ 

	/* Login */
	if(LOGIN_PAGE)
	{
		$("#username, #password").keypress(function(event){
			if(event.keyCode == 13 || event.which == 13) login();
		});

		$(".btn-login").click(function(){
			login();
		});

		$(".show-password").click(function(){
			if($("#password").val())
			{
				if($(this).hasClass("active"))
				{
					$(this).removeClass("active");
					$("#password").attr("type","password");
				}
				else
				{
					$(this).addClass("active");
					$("#password").attr("type","text");
				}
				$(this).find("span").toggleClass("fas fa-eye fas fa-eye-slash");
			}
		});
	}

	/* Menu */
	if($(".sidebar").length)
	{
		if($(".menu-group").length)
		{
			var navlink = $(".menu-group").find(".nav-link.active").first();
			if(navlink.length)
			{
				var menugroup = navlink.parents(".menu-group");
				menugroup.addClass("menu-open");
				menugroup.find(">.nav-link").addClass("active");
			}
		}
	}

	/* Order */
	if(ORDER_ADVANCED_SEARCH)
	{
		/* Date range picker */
		$('#order_date').daterangepicker({
			callback: this.render,
			autoUpdateInput: false,
			timePicker: false,
			timePickerIncrement: 30,
			locale: {
				format: 'DD/MM/YYYY'
                // format: 'DD/MM/YYYY hh:mm A'
            }
        });

		$('#order_date').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
		});

		$('#order_date').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		/* rangeSlider */
		$('#range_price').ionRangeSlider({
			skin: "flat",
			min     : ORDER_MIN_TOTAL,
			max     : ORDER_MAX_TOTAL,
			from    : ORDER_PRICE_FROM,
			to      : ORDER_PRICE_TO,
			type    : 'double',
			step    : 1,
            // prefix  : 'đ ',
            postfix : ' đ',
            prettify: true,
            hasGrid : true
        });
	}

	/* Product */
	if($(".regular_price").length && $(".sale_price").length)
	{
		$(".regular_price, .sale_price").keyup(function(){
			var regular_price = $('.regular_price').val();
			var sale_price = ($('.sale_price').length) ? $('.sale_price').val() : 0;
			var discount = 0;

			if(regular_price=='' || regular_price=='0' || sale_price=='' || sale_price=='0')
			{
				discount = 0;
			}
			else
			{
				regular_price = regular_price.replace(/,/g,"");
				sale_price = (sale_price) ? sale_price.replace(/,/g,"") : 0;
				regular_price = parseInt(regular_price);
				sale_price = parseInt(sale_price);

				if(sale_price < regular_price)
				{
					discount = 100-((sale_price * 100) / regular_price);
					discount = roundNumber(discount,0);
				}
				else
				{
					$('.regular_price, .sale_price').val(0);
					if($(".discount").length)
					{
						discount = 0;
						$('.sale_price').val(0);
					}
				}
			}

			if($(".discount").length)
			{
				$('.discount').val(discount);
			}
		});
	}

	/* Max Datetime Picker */
	if($('.max-date').length)
	{
		maxDate('.max-date');
	}

	/* Min Datetime Picker */
	if($('.min-date').length)
	{
		minDate('.min-date');
	}

	/* Select 2 */
	if($('.select2').length)
	{
		$('.select2').select2();
	}

	/* Format price */
	if($(".format-price").length)
	{
		$(".format-price").priceFormat({
			limit: 13,
			prefix: '',
			centsLimit: 0
		});
	}

	/* PhotoZone */
	if($("#photo-zone").length)
	{
		photoZone("#photo-zone","#file-zone","#photoUpload-preview img");
	}

	/* Sumoselect */
	if($('.multiselect').length)
	{
		window.asd = $('.multiselect').SumoSelect({
			placeholder: 'Chọn danh mục',
            selectAll: true,
            search: true,
            searchText: 'Tìm kiếm',
            locale :  ['OK', 'Hủy', 'Chọn hết'],
            captionFormat: 'Đã chọn {0} mục',
            captionFormatAllSelected: 'Đã chọn tất cả {0} mục'
		});
	}

	/* Ckeditor */
	if($(".form-control-ckeditor").length)
	{
		$(".form-control-ckeditor").each(function(){
			var id = $(this).attr("id");
			CKEDITOR.replace(id);
		});
	}

	/* Comment */
    if($(".comment-manager").length)
    {
        $(".comment-manager").comments({
            url: 'api/comment.php'
        });
    }

	/* Ajax category */
	if($(".select-category"))
	{
		$('body').on('change','.select-category', function(){
			var id = $(this).val();
			var child = $(this).data("child");
			var level = parseInt($(this).data('level'));
			var table = $(this).data('table');
			var type = $(this).data('type');

			if($("#"+child).length)
			{
				$.ajax({
					url: 'api/category.php',
					type: 'POST',
					data: {
						level: level,
						id: id,
						table: table,
						type: type
					},
					success: function(result)
					{
						var op = "<option value='0'>Chọn danh mục</option>";

						if(level == 0)
						{
							$("#id_cat").html(op);
							$("#id_item").html(op);
							$("#id_sub").html(op);
						}
						else if(level == 1)
						{
							$("#id_item").html(op);
							$("#id_sub").html(op);
						}
						else if(level == 2)
						{
							$("#id_sub").html(op);
						}
						$("#"+child).html(result);
					}
				});

				return false;
			}
		});
	}

	/* Ajax place */
	if($(".select-place").length)
	{
		$('body').on('change','.select-place', function(){
			var id = $(this).val();
			var child = $(this).data("child");
			var level = parseInt($(this).data('level'));
			var table = $(this).data('table');

			if($("#"+child).length)
			{
				$.ajax({
					url: 'api/place.php',
					type: 'POST',
					data: {
						level: level,
						id: id,
						table: table
					},
					success: function(result)
					{
						var op = "<option value='0'>Chọn danh mục</option>";

						if(level == 0)
						{
							$("#id_district").html(op);
							$("#id_ward").html(op);
						}
						else if(level == 1)
						{
							$("#id_ward").html(op);
						}
						$("#"+child).html(result);
					}
				});
			}

			return false;
		});
	}

	/* Database */
	if($('.btn-database').length)
	{
		$('body').on('click','.btn-database', function(){
			var action = $(this).data("action");

			if(action)
			{
				holdonOpen();
				$.ajax({
					url: 'api/database.php',
					type: 'POST',
					dataType: 'json',
					data: {
						action: action
					},
					error: function()
					{
						holdonClose();
					},
					success: function(result)
					{
						if(result)
						{
							$(".result-database").html('');
							for(var i=0; i<result.length; i++)
							{
								$str = '';
								$str += '<div class="col-md-4">';
								$str += '<div class="alert alert-success alert-dismissible bg-gradient-success">';
								$str += '<h6><strong>'+result[i].table+'</strong></h6>';
								$str += '<div><strong>Action:</strong> '+result[i].action+'</div>';
								$str += '<div><strong>Status:</strong> '+result[i].text+'</div>';
								$str += '</div>';
								$str += '</div>';
								$(".result-database").append($str);
							}
						}
						else
						{
							$(".result-database").html('<div class="col-12"><span class="text-danger">Xử lý thất bại. Vui lòng thử lại sau.</span></div>');
						}

						holdonClose();
					}
				});
			}

			return false;
		});
	}

	/* Check required form */
	if($('.submit-check').length)
	{
		$('.submit-check').click(function(){
			var formCheck = $(this).parents("form.validation-form");

			/* Holdon */
			holdonOpen();

			/* Check slug */
			slugCheck();

			/* Elements */
			var flag = true;
			var slugs = '';
			var slugOffset = $('.card-slug');
			var slugsInValid = $('.card-slug :required:invalid');
			var slugsError = $('.card-slug .text-danger').not(".d-none");
			var cardOffset = 0;
			var elementsInValid = $('.card :required:invalid');

			/* Check if has slug vs name */
			if(slugsInValid.length || slugsError.length)
			{
				flag = false;
				slugs = (slugsError.length) ? slugsError : slugsInValid;

				/* Check elements empty */
				slugs.each(function(){
					$this = $(this);
					var tabPane = $this.parents('.tab-pane');
					var tabPaneID = tabPane.attr('id');
					$('.nav-tabs a[href="#'+tabPaneID+'"]').tab('show');
					return false;
				});
				
				/* Scroll to error */
				setTimeout(function(){
					$('html,body').animate({scrollTop: slugOffset.offset().top - 40},'medium');
				},500);
			}
			else if(elementsInValid.length)
			{
				flag = false;

				/* Check elements empty */
				elementsInValid.each(function(){
					$this = $(this);
					cardOffset = $this.parents('.card-body');
					var cardCollapsed = $this.parents(".card.collapsed-card");

					if(cardCollapsed.length)
					{
						cardCollapsed.find('.card-body').show();
						cardCollapsed.find('.btn-tool i').toggleClass('fas fa-plus fas fa-minus');
						cardCollapsed.removeClass('collapsed-card');
					}

					var tabPane = $this.parents('.tab-pane');
					var tabPaneID = tabPane.attr('id');
					$('.nav-tabs a[href="#'+tabPaneID+'"]').tab('show');

					return false;
				});

				/* Scroll to error */
				if(cardOffset)
				{
					setTimeout(function(){
						$('html,body').animate({scrollTop: cardOffset.offset().top - 100},'medium');
					},500);
				}
			}

			/* Holdon close */
			holdonClose();

			/* Check form validated */
			if(!flag)
			{
				formCheck.addClass("was-validated");
			}
			else
			{
				formCheck.removeClass("was-validated");
			}

			return flag;
		});
	}

    /* Send email */
    if($("#send-email").length)
    {
		$('body').on('click','#send-email', function(){
			confirmDialog("send-email","Bạn muốn gửi thông tin cho các mục đã chọn ?","");
	    });
    }

    /* Check item */
    if($(".select-checkbox").length)
    {
	    var lastChecked = null;
	    var $checkboxItem = $(".select-checkbox");

	    $checkboxItem.click(function(e){
	    	if(!lastChecked)
	    	{
	    		lastChecked = this;
	    		return;
	    	}

	    	if(e.shiftKey)
	    	{
	    		var start = $checkboxItem.index(this);
	    		var end = $checkboxItem.index(lastChecked);
	    		$checkboxItem.slice(Math.min(start, end), Math.max(start, end) + 1).prop('checked', true);
	    	}

	    	lastChecked = this;
	    });
    }

	/* Check all */
	if($("#selectall-checkbox").length)
	{
		$('body').on('click','#selectall-checkbox', function(){
			var parentTable = $(this).parents('table');
			var input = parentTable.find('input.select-checkbox');

			if($(this).is(':checked'))
			{
				input.each(function(){
					$(this).prop('checked',true);
				});
			}
			else
			{
				input.each(function(){
					$(this).prop('checked',false); 
				});
			}
		});
	}

    /* Delete item */
    if($("#delete-item").length)
    {
    	$('body').on('click','#delete-item', function(){
			var url = $(this).data("url");
			confirmDialog("delete-item","Bạn có chắc muốn xóa mục này ?",url);
	    });
    }

    /* Delete all */
    if($("#delete-all").length)
    {
		$('body').on('click','#delete-all', function(){
			var url = $(this).data("url");
			confirmDialog("delete-all","Bạn có chắc muốn xóa những mục này ?",url);
	    });
    }

	/* Load name input file */
	if($(".custom-file input[type=file]").length)
	{
		$('body').on('change','.custom-file input[type=file]', function(){
			var fileName = $(this).val();
			fileName = fileName.substr(fileName.lastIndexOf('\\') + 1, fileName.length);
			$(this).siblings('label').html(fileName);
		});
	}

	/* Change status */
	if($(".show-checkbox").length)
	{
		$('body').on('click','.show-checkbox',function(){
			var id = $(this).attr('data-id');
			var table = $(this).attr('data-table');
			var attr = $(this).attr('data-attr');
			var $this = $(this);

			$.ajax({
				url: 'api/status.php',
				type: 'POST',
				dataType: 'html',
				data: {
					id: id,
					table: table,
					attr: attr
				},
				success: function()
				{
					if($this.is(':checked')) $this.prop('checked',false);
					else $this.prop('checked',true); 
				}
			});

			return false;
		});
	}

	/* Change numb */
	if($("input.update-numb").length)
	{
		$('body').on("change","input.update-numb",function(){
			var id = $(this).attr('data-id');
			var table = $(this).attr('data-table');
			var value = $(this).val();

			$.ajax({
				url: 'api/numb.php',
				type: 'POST',
				dataType: 'html',
				data: {
					id: id,
					table: table,
					value: value
				}
			});

			return false;
		});
	}

	/* Slug */
	slugPress();
	if($("#slugchange").length)
	{
		$('body').on("click","#slugchange",function(){
			slugChange($(this));
		});
	}
	/* Sort filer */
	if(ACTIVE_GALLERY)
	{
		createSortFiler();
	}

	/* Check all filer */
	$('body').on('click','.check-all-filer', function(){
		var parentFiler = $(".my-jFiler-items .jFiler-items-list");
		var input = parentFiler.find('input.filer-checkbox');
		var jFilerItems = $("#jFilerSortable").find('.my-jFiler-item');

		$(this).find("i").toggleClass("far fa-square fas fa-check-square");
		if($(this).hasClass('active'))
		{
			$(this).removeClass('active');
			$(".sort-filer").removeClass("active");
			$(".sort-filer").attr('disabled',false);
			input.each(function(){
				$(this).prop('checked',false); 
			});
		}
		else
		{
			sortable.option("disabled",true);
			$(this).addClass('active');
			$(".sort-filer").attr('disabled',true);
			$(".alert-sort-filer").hide();
			$(".my-jFiler-item-trash").show();
			input.each(function(){
				$(this).prop('checked',true);
			});
			jFilerItems.each(function(){
				$(this).find('input').attr('disabled',false);
			});
			jFilerItems.each(function(){
				$(this).removeClass('moved');
			});
		}
	});
	
	/* Check filer */
	$('body').on('click','.filer-checkbox',function(){
		var input = $(".my-jFiler-items .jFiler-items-list").find('input.filer-checkbox:checked');

		if(input.length) $(".sort-filer").attr('disabled',true);
		else $(".sort-filer").attr('disabled',false);
	});

	/* Sort filer */
	$('body').on('click','.sort-filer', function(){
		var jFilerItems = $("#jFilerSortable").find('.my-jFiler-item');

		if($(this).hasClass('active'))
		{
			sortable.option("disabled",true);
			$(this).removeClass('active');
			$(".alert-sort-filer").hide();
			$(".my-jFiler-item-trash").show();
			jFilerItems.each(function(){
				$(this).find('input').attr('disabled',false);
				$(this).removeClass('moved');
			});
		}
		else
		{
			sortable.option("disabled",false);
			$(this).addClass('active');
			$(".alert-sort-filer").show();
			$(".my-jFiler-item-trash").hide();
			jFilerItems.each(function(){
				$(this).find('input').attr('disabled',true);
				$(this).addClass('moved');
			});
		}
	});

	/* Delete filer */
	$("body").on("click",".my-jFiler-item-trash",function(){
		var id = $(this).data("id");
		var folder = $(this).data("folder");
		var str = id+","+folder;
		confirmDialog("delete-filer","Bạn có chắc muốn xóa hình ảnh này ?",str);
    });

    /* Delete all filer */
	$("body").on("click",".delete-all-filer",function(){
		var folder = $(".folder-filer").val();
		confirmDialog("delete-all-filer","Bạn có chắc muốn xóa các hình ảnh đã chọn ?",folder);
    });

    /* Hash upload multi filer */
	$("form.validation-form").append('<input type="hidden" name="hash" value="'+HASH+'" />');
	$("#filer-gallery").attr({'data-params':BASE64_QUERY_STRING,'data-hash':HASH});



	/* Ckeditor */
	if($(".form-control-ckeditor").length)
	{
		CKEDITOR.editorConfig = function(config){
			/* Config General */
			config.language = 'vi';
			config.skin = 'moono-lisa';
			config.width = 'auto';
			config.height = 620;

			/* Allow element */
			config.allowedContent = true;

			/* Entities */
			config.entities = false;
			config.entities_latin = false;
			config.entities_greek = false;
			config.basicEntities = false;

			/* Config CSS */
			config.contentsCss =
			[
				CONFIG_BASE + ADMIN + '/ckeditor/contents.css',
				CONFIG_BASE + ADMIN + '/ckeditor/fonts/fontawesome512/all.css'
			];

			/* All Plugins */
			config.extraPlugins = 'ckeditorfa,texttransform,copyformatting,html5video,html5audio,flash,youtube,wordcount,tableresize,widget,lineutils,clipboard,dialog,dialogui,widgetselection,lineheight,video,videodetector';

			/* Config Lineheight */
			config.line_height = '1;1.1;1.2;1.3;1.4;1.5;2;2.5;3;3.5;4;4.5;5';

			/* Config Word */
			config.pasteFromWordRemoveFontStyles = false;
			config.pasteFromWordRemoveStyles = false;

			/* Config CKFinder - ELFinder */
			if(navigator.userAgent.match(/(iPod|iPhone|iPad)/) && navigator.userAgent.match(/AppleWebKit/))
			{
				config.filebrowserBrowseUrl = 'ckfinder/ckfinder.html?token=' + TOKEN;
				config.filebrowserUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&token=' + TOKEN;
			}
			else
			{
				config.filebrowserBrowseUrl = 'elfinder/index.php?token=' + TOKEN;
			}

			/* Config ToolBar */
			config.toolbar = [
				{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
				{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', 'PasteFromExcel', '-', 'Undo', 'Redo' ] },
				{ name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
				{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
				'/',
				{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
				{ name: 'texttransform', items: [ 'TransformTextToUppercase', 'TransformTextToLowercase', 'TransformTextCapitalize', 'TransformTextSwitcher' ] },
				{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
				{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
				{ name: 'insert', items: [ 'Image', 'Flash', 'Youtube', 'VideoDetector', 'Html5video', 'Video', 'Html5audio', 'Iframe', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak','ckeditorfa' ] },
				'/',
				{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize', 'lineheight' ] },
				{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
				{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
				{ name: 'about', items: [ 'About' ] }
			];
			
			/* Config StylesSet */
			config.stylesSet = [
			    { name : 'Font Seguoe Regular', element : 'span', attributes : { 'class' : 'segui' } },
			    { name : 'Font Seguoe Semibold', element : 'span', attributes : { 'class' : 'seguisb' } },
			    { name:'Italic title', element:'span', styles:{'font-style':'italic'} },
			    { name:'Special Container', element:'div', styles:{'background' : '#eee', 'border' : '1px solid #ccc', 'padding' : '5px 10px'} },
			    { name:'Big', element:'big' },
			    { name:'Small', element:'small' },
			    { name:'Inline ', element:'q' },
			    { name : 'marker', element : 'span', attributes : { 'class' : 'marker' } }
			];
			
			/* Config Wordcount */
			config.wordcount = {
			    showParagraphs: true,
			    showWordCount: true,
			    showCharCount: true,
			    countSpacesAsChars: false,
			    countHTML: false,
			    filter: new CKEDITOR.htmlParser.filter({
			        elements: {
			            div: function( element ) {
			                if(element.attributes.class == 'mediaembed') {
			                    return false;
			                }
			            }
			        }
			    })
			};

		};
		CKEDITOR.dtd.$removeEmpty['span'] = false;

		CKEDITOR.dtd.$removeEmpty.i = 0;

		CKEDITOR.config.protectedSource = [/<i[^>]*><\/i>/g];
	}

	$('#review-file-photo').getEvali({
		limit: 10,
		maxSize: 30,
		extensions: ["jpg","png","jpeg","JPG","PNG","JPEG","Png"],
		editor: false,
		addMore: true,
		enableApi: false,
		dragDrop: true,
		changeInput: 
		'<div class="review-fileuploader">' + 
		'<div class="review-fileuploader-caption"><strong>${captions.feedback}</strong></div>' + 
		'<div class="review-fileuploader-text mx-3">${captions.or}</div>' + 
		'<div class="review-fileuploader-button btn btn-sm btn-primary text-capitalize font-weight-500 py-2 px-3">${captions.button}</div>' + 
		'</div>',
		theme: 'dragdrop',
		captions: {
			feedback: '(Kéo thả ảnh)',
			or: '-hoặc-',
			button: 'Chọn ảnh',
		},
		thumbnails: {
			popup: false,
			canvasImage: false
		},
		dialogs: {
			alert: function(e){
				return notifyDialog(e);
			},
			confirm: function(e,t){
				$.confirm({
					title: 'Thông báo',
					icon: 'fas fa-exclamation-triangle',
					type: 'orange',
					content: e,
					backgroundDismiss: true,
					animationSpeed: 600,
					animation: 'zoom',
					closeAnimation: 'scale',
					typeAnimated: true,
					animateFromElement: false,
					autoClose: 'cancel|3000',
					escapeKey: 'cancel',
					buttons: {
						success: {
							text: 'Đồng ý',
							btnClass: 'btn-sm btn-warning',
							action: function(){
								t()
							}
						},
						cancel: {
							text: 'Hủy',
							btnClass: 'btn-sm btn-danger'
						}
					}
				});
			}
		},
		afterSelect: function(){},
		onEmpty: function(){},
		onRemove: function(){}
	});


	/* Delete Gallery */
	$('body').on('click','.delete-img',function(){
		var id = $(this).data('id');
		confirmDialog("delete-gallery","Bạn có chắc muốn xóa hình ảnh này ?",id);
	});

	/* Select Category */
	$('body').on("change",".select-prolist",function() {
		var id = $(this).val();
		if(id > 0){
			window.location.href = CONFIG_BASE + "admin/" +LINK_FILTER  +"&id_cate="+id;
		}
	});


});