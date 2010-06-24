$(function() {
	//Avoids the nested form problem in Chrome.
	$('#elgg-reorder-plugins').submit(function() {
		$(this).append($('input[name^=enabled_plugins], input[name^=plugins]').clone().hide());
	});
	
	//Plugin enable/disable
	$('.plugin_details input[name^=enabled_plugins]').click(function() {
		$(this).closest('.plugin_details').toggleClass('active').toggleClass('not-active');
	});
	
	$('.enableallplugins').click(function() {
		$('input[name^=enabled_plugins]:not(:checked)').click();
	});
	
	$('.disableallplugins').click(function() {
		$('input[name^=enabled_plugins]:checked').click();
	});
	
	//plugin drag/drop
	$('.drag').addClass('ui-icon ui-icon-grip-dotted-vertical');
	
	$('#plugin_list').sortable({
		axis: 'y',
		items: '> li',
		handle: '> .plugin_details > .controls > .drag'
	});
	
	$('.secondary_controls > li').live('hover', function() {
		$(this).toggleClass('ui-state-hover');
	}).addClass('ui-state-default ui-corner-all');
	
	//move plugin to top of list
	$('a.top').live('click', function() {
		$('#plugin_list').prepend($(this).closest('.plugin_details').parent());
	}).addClass('ui-icon ui-icon-arrowthickstop-1-n');
	
	//move plugin to bottom of list
	$('a.bottom').live('click', function() {
		$('#plugin_list').append($(this).closest('.plugin_details').parent());
	}).addClass('ui-icon ui-icon-arrowthickstop-1-s');
	
	//Plugin settings toggle button
	$('a.pluginsettings_link').unbind('click').live('click', function() {
		$(this).closest('.plugin_details').children('.pluginsettings').slideToggle('fast');
	}).addClass('ui-icon ui-icon-gear');
	
	//Plugin info toggle button
	$('a.manifest_details').unbind('click').live('click', function() {
		$(this).closest('.plugin_details').children('.manifest_file').slideToggle('fast');
	}).addClass('ui-icon ui-icon-info');
});