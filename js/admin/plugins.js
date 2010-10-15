$(function() {
	//Plugin enable/disable
	$('.plugin_details > input[type=checkbox]').click(function() {
		$(this).closest('.plugin_details').toggleClass('active').toggleClass('not-active');
	});

	$('.enableallplugins').click(function() {
		$('input[name^=enabled_plugins]:not(:checked)').click();
	});

	$('.disableallplugins').click(function() {
		$('input[name^=enabled_plugins]:checked').click();
	});

	$('a.top').live('click', function() {
		$(this).closest('.plugin_details').remove().insertBefore('.plugin_details:first').slideDown();
	});

	$('a.bottom').live('click', function() {
		$(this).closest('.plugin_details').remove().insertAfter('.plugin_details:last').slideDown();
	});

	//Drag/drop plugin reordering
	$('#plugins').sortable({
		axis: 'y',
		items: '> li',
		handle: '> .plugin_details > .controls > li > .drag'
	});

	/* Extension to facilitate the testing process */

	// Show extension Box with test-input
	$('.extensiontestplugins').click(function(){
		if($("#extensionTestBox:visible").length>0){
			$("#extensionTestBox").slideUp();
		}else{
			$("#extensionTestBox").slideDown();
		}
	}
	);

	// Submit string of plugins name and change the action of form to plugins/list
	$('#extension_test_button').click(function(){            
		var form = $(this).parents("form");
		var action = form.attr("action");
		action = action.replace("plugins/save","plugins/list");
		form.attr("action",action);
		form.submit();
	});

	//Clear string with list of plugin
	$('#extension_test_clear').click(function(){
		$("#plugins_list").val('');
	});

	// Select text
	$('#extension_test_copy').click(function(){
		$("#plugins_list").select();
	});

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
	$('.secondary_controls > li').live('hover', function() {
		$(this).toggleClass('ui-state-hover');
	});

	//move plugin to top of list
	$('a.top').live('click', function() {
		$('#plugin_list').prepend($(this).closest('.plugin_details').parent());
	});

	//move plugin to bottom of list
	$('a.bottom').live('click', function() {
		$('#plugin_list').append($(this).closest('.plugin_details').parent());
	});

	//Plugin info toggle button
	$('a.manifest_details').unbind('click').live('click', function() {
		$(this).closest('.plugin_details').children('.manifest_file').slideToggle('fast');
		return false;
	});
});