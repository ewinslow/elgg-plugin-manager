<?php
function plugin_manager_init() {
	global $CONFIG;

	if (get_context() == 'admin') {
		elgg_extend_view('metatags', 'links/admin/plugins');
		elgg_extend_view('metatags', 'links/jquery/ui');
		elgg_extend_view('metatags', 'scripts/admin/plugins');
	}
	
	elgg_view_register_simplecache('js/admin/plugins');
	 
	register_action('admin/plugins/save', FALSE, dirname(__FILE__)."/actions/admin/plugins/save.php", TRUE);
	register_action('admin/plugins/list', FALSE, dirname(__FILE__)."/actions/admin/plugins/list.php", TRUE);
	
	register_page_handler('pluginsettings', 'plugin_manager_page_handler');
}

function plugin_manager_page_handler($page) {
	switch ($page[0]) {
		case 'admin':
			set_input('plugin', $page[1]);
			include dirname(__FILE__).'/pages/pluginsettings/admin.php';
			break;
		default:
			forward('', '404');
			break;
	}
}

register_elgg_event_handler('init', 'system', 'plugin_manager_init');
