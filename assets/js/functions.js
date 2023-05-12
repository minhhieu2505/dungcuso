function isExist(ele) {
	return ele.length;
}
function loadPaging(url='',eShow='')
{
    if($(eShow).length && url)
    {
        $.ajax({
            url: url,
            type: "GET",
            data: {
                eShow: eShow
            },
            success: function(result){
                $(eShow).html(result);
            }
        });
    }
}

function doEnter(event, obj) {
	if (event.keyCode == 13 || event.which == 13) onSearch(obj);
}
function onSearch(obj) {
	var keyword = $('#' + obj).val();

	if (keyword == '') {
		notifyDialog("Không có từ khóa tìm kiếm");
		return false;
	} else {
		location.href = CONFIG_BASE + 'tim-kiem?keyword=' + encodeURI(keyword);
	}
}


function deleteCart(obj) {
	var formCart = $('.form-cart');
	var code = obj.data('code');
	var ward = formCart.find('.select-ward-cart').val();

	$.ajax({
		type: 'POST',
		url: 'api/cart.php',
		dataType: 'json',
		data: {
			cmd: 'delete-cart',
			code: code,
			ward: ward
		},
		success: function (result) {
			$('.count-cart').html(result.max);
			if (result.max) {
				formCart.find('.load-price-temp').html(result.tempText);
				formCart.find('.load-price-total').html(result.totalText);
				formCart.find('.procart-' + code).remove();
			} else {
				$('.wrap-cart').html(
					'<a href="" class="empty-cart text-decoration-none"><i class="fa-duotone fa-cart-xmark"></i><p>' +
						"Bạn muốn xóa sản phẩm này" +
						'</p><span class="btn btn-warning">' +
						"Về trang chủ" +
						'</span></a>'
				);
			}
		}
	});
}


function confirmDialog(action, text, value, title = 'Thông báo', icon = 'fas fa-exclamation-triangle', type = 'blue') {
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
				text: 'Đồng ý',
				btnClass: 'btn-sm btn-primary',
				action: function () {
					if (action == 'delete-procart') deleteCart(value);
				}
			},
			cancel: {
				text: 'Hủy',
				btnClass: 'btn-sm btn-danger'
			}
		}
	});
}
