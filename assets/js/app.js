
var base_url = function(uri = ''){
	var base = 'http://perpustakaan-dprd/';
	return base + uri;
};

$(function(){
	$('select.form-control').select2();
});
