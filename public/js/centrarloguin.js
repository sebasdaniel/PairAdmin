
$(document).ready(function(){
  
  //CENTRAR LOGIN
  
	$('input[type="text"], input[type="password"]').focus(function(){
		$(this).animate({'width': '+=10px', 'padding': '0 +=8px'}, 180)
	}).focusout(function(){
		$(this).animate({'width': '-=10px', 'padding': '0 5px'}, 180)
	});

});