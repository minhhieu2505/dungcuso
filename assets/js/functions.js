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
		notifyDialog(LANG['no_keywords']);
		return false;
	} else {
		location.href = 'tim-kiem?keyword=' + encodeURI(keyword);
	}
}
