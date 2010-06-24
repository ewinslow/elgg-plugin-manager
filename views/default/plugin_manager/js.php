<?php ?>
	
$(document).ready(function(){
	// toggle plugin's settings and more info on admin tools admin
	$('a.pluginsettings_link').unbind("click").click(function () {
		$(this.parentNode).children(".pluginsettings").slideToggle("fast");
		return false;
	});
	
	$('a.manifest_details').unbind("click").click(function () {
		$(this.parentNode).children(".manifest_file").slideToggle("fast");
		return false;
	});
});