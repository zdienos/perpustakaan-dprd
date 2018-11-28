
var base_url = function(uri = ''){
	var base = 'http://sirbalami.co.id/';
	return base + uri;
};

$(function(){
	$('select.form-control').select2();
});